<?php

namespace App\Http\Controllers;

use App\Models\OrganizationMember;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class OrganizationMemberController extends Controller
{
    public function members(){
        $organization = auth()->user()->organizations->first()->organization;
        $members = $organization->members;

        // return members as user object
        $members = $members->map(function($member){
            return $member->user;
        });

        // Remove the current user from the list
        $members = $members->filter(function($member){
            return $member->id != auth()->id();
        });

        return view('admin.pages.members.index', compact('members'));
    }

    public function editMember($id){
        $organization = auth()->user()->organizations->first()->organization;
        $member = $organization->members->where('user_id', $id)->first();

        $member = $member->user;

        $roles = Role::all()->pluck('name', 'id');

        // Formating roles name
        $roles = $roles->map(function($role){
            return ucwords(str_replace('_', ' ', $role));
        });

        // Remove organization_admin role from the list
        $roles = $roles->filter(function($role){
            return $role != 'Organization Admin';
        });

        $skills = $organization->skills->pluck('name', 'id');

        return view('admin.pages.members.edit', compact('member', 'roles', 'skills'));
    }

    public function updateMember(Request $request, $id){
        $organization = auth()->user()->organizations->first()->organization;
        $member = $organization->members->where('user_id', $id)->first();
        $member = $member->user;

        // verify request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required|exists:roles,id'
        ]);

        $member->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $member->syncRoles([]);

        foreach($request->role as $role){
            $member->assignRole(Role::find($role)->name);
        }

        // Updating skills
        $member->skills()->sync($request->skills);

        return redirect()->back()->with('success', 'Member updated successfully');
    }
    
    public function removeMember($id){
        $organization = auth()->user()->organizations->first()->organization;
        $member = $organization->members->where('user_id', $id)->first();
        $member->delete();
        return redirect()->back()->with('success', 'Member removed successfully');
    }
}
