<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }

    public function register()
    {
        return view('landing.auth.register');
    }

    public function login()
    {
        return view('landing.auth.login');
    }
}
