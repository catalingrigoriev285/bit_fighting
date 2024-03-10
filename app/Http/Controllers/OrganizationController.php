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
}
