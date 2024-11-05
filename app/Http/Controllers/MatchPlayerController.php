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
        
    }
}
