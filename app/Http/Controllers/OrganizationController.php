<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\OrganizationMember;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{
    public function signup($reference){
        if(!$reference){
            return redirect()->route('landing.index');
        }

        if(!Organization::where('reference', $reference)->exists()){
            return redirect()->route('landing.index');
        }

        $organization = Organization::where('reference', $reference)->first();
        return view('organization.signup', compact('organization'));
    }

    // Register emplyoee
    public function registerEmployee(Request $request, $reference){
        if(!$reference){
            return redirect()->route('landing.index');
        }

        if(!Organization::where('reference', $reference)->exists()){
            return redirect()->route('landing.index');
        }

        $organization = Organization::where('reference', $reference)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $user->assignRole('employee');

        $organizationMember = new OrganizationMember();
        $organizationMember->user_id = $user->id;
        $organizationMember->organization_id = $organization->id;
        $organizationMember->role = 'employee';
        $organizationMember->save();

        auth()->login($user);

        return redirect()->route('admin.dashboard');
    }
}
