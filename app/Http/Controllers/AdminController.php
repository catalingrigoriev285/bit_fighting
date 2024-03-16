<?php

namespace App\Http\Controllers;

use App\Models\OrganizationMember;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller
{
    public function login()
    {
        if(auth()->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function register()
    {
        if(auth()->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.register');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',

            'organization_name' => 'required',
            'headquarter_address' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // Create organization
        $organization = Organization::updateOrCreate([
            'name' => $request->organization_name,
            'headquarters_address' => $request->headquarter_address,
            'reference' => Str::random(10),
        ]);

        // Assign member to organization
        OrganizationMember::create([
            'user_id' => $user->id,
            'organization_id' => $organization->id,
            'role' => 'admin'
        ]);

        // Assign user to organization_admin
        $user->assignRole('organization_admin');

        auth()->login($user);

        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $organization_url = auth()->user()->organizations->first()->organization->reference;
        $organization_url = URL::to('/organization/' . $organization_url . '/signup');

        $organization = auth()->user()->organizations->first()->organization;

        return view('admin.index')->with([
            'organization_url' => $organization_url,
            'organization' => $organization
        ]);
    }
}
