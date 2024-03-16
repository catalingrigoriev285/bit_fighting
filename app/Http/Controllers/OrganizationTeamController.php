<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class OrganizationTeamController extends Controller
{
    public function index(){
        $teams = Team::all();

        return view('admin.pages.teams.index', compact('teams'));
    }
    public function create(){
        $projects = Project::all()->where('organization_id', auth()->user()->organizations->first()->id);

        return view('admin.pages.teams.create', compact('projects'));
    }

    public function getUserTeamPercentage($project){
        $users = User::all();
        $team = [];

        foreach($users as $user){
            array_push($team, [
                'user' => $user->name,
                'percentage' => $user->experience($project)
            ]);
        }

        return $team;
    }

    public function store(Request $request){
        return $request->all();
    }
}
