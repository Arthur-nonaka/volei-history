<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index() {
        $teams = Team::all();
        return view('teams/teams', compact('teams'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'city' => 'required|string|max:255',
        ]);

        $logo = null;
        if ($request->hasFile('logo')) {
            $logo = file_get_contents($request->file('logo')->getRealPath());
        }


        Team::create([
            'name' => $request->name,
            'logo' => $logo,
            'city' => $request->city,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        return redirect()->route('teams.index');
    }

    public function show($id) {
        $team = Team::with(['matchesAsTeam1.team2', 'matchesAsTeam2.team1', 'players'])->findOrFail($id);
        $teams = Team::all();
        return view('teams.show', compact('team', 'teams'));
    } 

    public function edit($id) {
        $team = Team::findOrFail($id);
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, $id) {
        $team = Team::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'city' => 'required|string|max:255',
        ]);

        $logo = null;
        if ($request->hasFile('logo')) {
            $team->logo = file_get_contents($request->file('logo')->getRealPath());
        }

        $team->name = $request->name;
        $team->city = $request->city;
        $team->updated_at = now();
        $team->save();

        return view('teams.show', compact('team'));
    }

    public function destroy($id) {
        Team::destroy($id);
        return redirect()->route('teams.index');
    }
}
