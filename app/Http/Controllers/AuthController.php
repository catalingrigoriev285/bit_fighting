<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth, Session, Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $credentials = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'organization_name' => ['required', 'string', 'max:255'],
                'headquarter_address' => ['required', 'string', 'max:255'],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Organization::updateOrCreate([
                'name' => $request->organization_name,
                'headquarter_address' => $request->headquarter_address,
                'reference' => Str::random(10),
                'user_id' => $user->id,
            ]);

            $user->assignRole('organization_admin');
            Auth::login($user);
        } catch (Exception $exception) {
            throw $exception;
        }

        return to_route('dashboard.index');
    }

    public function registerEmployee(Request $request, $reference)
    {
        try {
            $credentials = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]);

            $empoyee = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'organization_reference' => Organization::where('reference', $reference)->first()->id,
            ]);

            $empoyee->assignRole('employee');   
            Auth::login($empoyee);
        } catch (Exception $exception) {
            throw $exception;
        }

        return to_route('employee.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return to_route('dashboard.index');
        }

        return back()->withErrors([
            'email' => 'Login failed. Please try again.',
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return to_route('landing.index');
    }
}
