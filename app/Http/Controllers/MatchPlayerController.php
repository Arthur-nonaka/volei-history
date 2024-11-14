<?php

namespace App\Http\Controllers;

use App\Models\MatchPlayers;
use Illuminate\Http\Request;

class MatchPlayerController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'attack_in' => 'nullable|integer',
            'attack_out' => 'nullable|integer',
            'block' => 'nullable|integer',
            'block_out' => 'nullable|integer',
            'serve_in' => 'nullable|integer',
            'serve_out' => 'nullable|integer',
            'dig' => 'nullable|integer',
            'recieve' => 'nullable|integer',
            'missed_recieve' => 'nullable|integer',
            'missed_dig' => 'nullable|integer',
            'match_id' => 'required|exists:match:id',
            'player_id' => 'required|exists:players:id',
        ]);
        
        MatchPlayers::create([
            'attack_in' => $request->attack_in,
            'attack_out' => $request->attack_out,
            'block' => $request->block,
            'block_out' => $request->block_out,
            'serve_in' => $request->serve_in,
            'serve_out' => $request->serve_out,
            'dig' => $request->dig,
            'recieve' => $request->recieve,
            'missed_recieve' => $request->missed_recieve,
            'missed_dig' => $request->missed_dig,
            'match_id' => $request->match_id,
            'player_id'=> $request->player_id,
        ]);

    }
}
