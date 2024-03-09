<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Exception;

class OrganizationController extends Controller
{
    public function signup($reference)
    {
        $organization = Organization::where('reference', $reference)->first();

        return view('organization.register', ['organization' => $organization]);
    }

    public function registerEmployee(Request $request, $reference)
    {
        try {
            $credentials = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]);

            $empoyee = Employee::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'organization_id' => Organization::where('reference', $reference)->first()->id,
            ]);

            $empoyee->assignRole('employee');
            Auth::login($empoyee);
        } catch (Exception $exception) {
            throw $exception;
        }

        return to_route('dashboard.index');
    }
}
