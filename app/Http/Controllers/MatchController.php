<?php

namespace App\Http\Controllers;

use App\Models\MatchPlayers;
use App\Models\VolleyMatch;
use App\Models\Player;
use App\Models\Team;

use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index($id)
    {
        $teams = Team::findOrFail($id);
        $matches = $teams->matches;
        return view('matches.index', compact('matches'));
    }

    public function store(Request $request, $teamId) {
        $request->validate([
            'team2_id' => 'required|integer|exists:teams,id',
        ]);

        $team = Team::findOrFail($teamId);
        $team->matches()->create([
            'team1_id' => $teamId,
            'team2_id' => $request->team2_id,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        return redirect()->route('teams.show', $teamId);
    }
}
