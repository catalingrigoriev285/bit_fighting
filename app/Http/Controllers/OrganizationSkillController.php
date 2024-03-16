<?php

namespace App\Http\Controllers;

use App\Models\OrganizationSkill;
use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationSkillController extends Controller
{
    public function index()
    {
        $organization = auth()->user()->organizations->first();
        $skills = OrganizationSkill::where('organization_id', $organization->id)->paginate(5);

        return view('admin.pages.skills.index', compact('skills', 'organization'));
    }
    public function store(Request $request)
    {
        $organization = auth()->user()->organizations->first();

        // validate the request
        $request->validate([
            'skill_name' => 'required',
        ]);

        $organizationSkill = new OrganizationSkill();
        $organizationSkill->name = $request->skill_name;
        // $organizationSkill->description = $request->description;
        $organizationSkill->organization_id = $organization->id;
        $organizationSkill->save();

        return redirect()->back()->with('success', 'Skill added successfully');
    }

    // destroy
    public function destroy($id)
    {
        $organizationSkill = OrganizationSkill::find($id);
        $organizationSkill->delete();

        return redirect()->back()->with('success', 'Skill deleted successfully');
    }
}
