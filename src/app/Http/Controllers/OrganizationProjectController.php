<?php

namespace App\Http\Controllers;

use App\Models\OrganizationSkill;
use App\Models\Project;
use App\Models\Team;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class OrganizationProjectController extends Controller
{
    public function index(){
        if(auth()->user()->organization == null){
            $projects = Project::paginate(5);
        } else {
            $projects = Project::where('organization_id', auth()->user()->organization->id)->paginate(5);
        }

        $teams = Team::all();

        return view('admin.pages.projects.index', compact('projects', 'teams'));
    }

    public function create(){
        $technologies = OrganizationSkill::all()->pluck('name', 'id');

        $roles = Role::all()->pluck('name', 'id');

        // Remove the admin role from the list of roles
        $roles = $roles->except(1);

        // Formating roles name
        $roles = $roles->map(function($role){
            return ucwords(str_replace('_', ' ', $role));
        });

        return view('admin.pages.projects.create', compact('technologies', 'roles'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'technologies' => 'required',
            'roles' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $project = Project::create([
            'organization_id' => auth()->user()->organizations->first()->id,
            'name' => $request->name,
            'description' => $request->description,
            'team_size' => $request->team_size,
            'needed_roles' => json_encode($request->roles),
            'technologies_used' => json_encode($request->technologies),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('admin.projects')->with('success', 'Project created successfully');
    }

    public function edit(Project $project){
        $technologies = OrganizationSkill::all()->pluck('name', 'id');

        $roles = Role::all()->pluck('name', 'id');

        // Remove the admin role from the list of roles
        $roles = $roles->except(1);

        // Formating roles name
        $roles = $roles->map(function($role){
            return ucwords(str_replace('_', ' ', $role));
        });

        return view('admin.pages.projects.edit', compact('project', 'technologies', 'roles'));
    }

    public function update(Request $request, Project $project){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'technologies' => 'required',
            'roles' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'team_size' => $request->team_size,
            'needed_roles' => json_encode($request->roles),
            'technologies_used' => json_encode($request->technologies),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('admin.projects')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project){
        $project->delete();

        return redirect()->route('admin.projects')->with('success', 'Project deleted successfully');
    }
}
