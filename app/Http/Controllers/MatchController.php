<?php

namespace App\Http\Controllers;

use App\Models\MatchPlayers;
use App\Models\VolleyMatch;
use App\Models\Player;
use App\Models\Team;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    // public function index($id)
    // {
    //     $teams = Team::findOrFail($id);
    //     $matches = array_merge($teams->matchesAsTeam1,$teams->matchesAsTeam2);
    //     return view('matches.index', compact('matches'));
    // }

    public function store(Request $request, $teamId) {
        $request->validate([
            'team2_id' => 'required|integer|exists:teams,id',
            'date' => 'required|date',
            'players' => 'required|array'
        ]);

        DB::transaction(function () use ($teamId, $request) {
            $team = Team::findOrFail($teamId);

            $match = VolleyMatch::create([
                'team1_id' => $teamId,
                'team2_id' => $request->team2_id,
                'date' => $request->date,
                'updated_at' => now(),
                'created_at' => now()
            ]);

            foreach ($request->players as $playerData) {
                MatchPlayers::create([
                    'match_id' => $match->id,
                    'player_id' => $playerData['id'],
                    'attack_in' => 0,
                    'attack_out' => 0,
                    'block' => 0,
                    'block_out' => 0,
                    'serve_in' => 0,
                    'serve_out' => 0,
                    'dig' => 0,
                    'recieve' => 0,
                    'missed_recieve' => 0,
                    'missed_dig' => 0,
                ]);
            }
        });

        return redirect()->route('teams.show', $teamId);
    }
}
