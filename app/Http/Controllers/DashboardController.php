<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\Hash;
use Auth, Session, Str, URL;

class DashboardController extends Controller
{
    public function index()
    {
        $organization = Organization::where('user_id', auth()->user()->id)->first();

        $organization_url = URL::to('/organization/' . $organization->reference . '/signup');
        $organization_members = $organization->employees;

        return view('dashboard.index', ['organization' => $organization, 'organization_url' => $organization_url, 'organization_members' => $organization_members]);
    }

    public function members()
    {
        $organization = Organization::where('user_id', auth()->user()->id)->first();
        $organization_members = $organization->employees;

        return view('dashboard.pages.members', ['organization' => $organization, 'organization_members' => $organization_members]);
    }

    public function removeMember($member)
    {
        $organization = Organization::where('user_id', auth()->user()->id)->first();
        $organization_member = $organization->employees()->where('id', $member)->first();

        if ($organization_member) {
            $organization_member->delete();
            session()->flash('success', 'Member removed successfully');
        }

        return redirect()->route('dashboard.members');
    }
}
