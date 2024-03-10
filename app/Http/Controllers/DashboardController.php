<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\Hash;
use Auth, Session, Str, URL;
use DB;
use Spatie\Permission\Models\Role;

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

    public function configureMember($member)
    {
        $organization = Organization::where('user_id', auth()->user()->id)->first();
        $organization_member = $organization->employees()->where('id', $member)->first();
        $skills = DB::table('organizations_skills')->where('organization_id', auth()->user()->organization->id)->get();
        $roles = Role::all()->reject(function ($role) {
            return $role->name === 'organization_admin';
        });

        return view('dashboard.pages.configure-member', ['organization' => $organization, 'organization_member' => $organization_member, 'skills' => $skills, 'roles' => $roles]);
    }

    // update member
    public function updateMember(Request $request, $member)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
            ]);

            $organization = Organization::where('user_id', auth()->user()->id)->first();
            $organization_member = $organization->employees()->where('id', $member)->first();

            if ($organization_member) {
                $organization_member->update([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'skills' => json_encode($request['skills'])
                ]);
            }

            // Remove all user roles
            if($organization_member->roles->count() > 0) {
                $organization_member->removeRole($organization_member->roles->first());
            }
            
            $organization_member->assignRole($request['user_role']);

            session()->flash('success', 'Member updated successfully');
            return redirect()->route('dashboard.members.configure', $member);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function skills()
    {
        $skills = DB::table('organizations_skills')->where('organization_id', auth()->user()->organization->id)->paginate(5);
        return view('dashboard.pages.skills', ['skills' => $skills]);
    }

    public function storeSkills(Request $request)
    {
        $organization = Organization::where('user_id', auth()->user()->id)->first();
        
        DB::table('organizations_skills')->insert(['organization_id'=>$organization->id, 'skill'=>$request['skill_name']]);

        session()->flash('success', 'Skills updated successfully');

        return redirect()->route('dashboard.skills');
    }

    public function removeSkill($skill)
    {
        $organization = Organization::where('user_id', auth()->user()->id)->first();
        $organization_skill = DB::table('organizations_skills')->where('id', $skill)->first();

        if ($organization_skill) {
            DB::table('organizations_skills')->where('id', $skill)->delete();
            session()->flash('success', 'Skill removed successfully');
        }

        return redirect()->route('dashboard.skills');
    }
}
