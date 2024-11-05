<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index($id) {
        $team = Team::findOrFail($id);
        $players = $team->players;
        return view('teams.players.index', compact('teams', 'players'));
    }

    public function show($teamId, $playerId)
    {
        $team = Team::findOrFail($teamId);
        $player = Player::findOrFail($playerId);
        return view('teams.players.show', compact('team', 'player'));
    }

    public function store(Request $request, $itemId) {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photo = null;
        if ($request->hasFile('photo')) {
            $photo = file_get_contents($request->file('photo')->getRealPath());
        }

        $team = Team::findOrFail($itemId);
        $team->players()->create([
            'name' => $request->name,
            'photo' => $photo,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        return redirect()->route('teams.show', $team->id);
    }
}
