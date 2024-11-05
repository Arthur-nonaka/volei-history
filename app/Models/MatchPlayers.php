<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchPlayers extends Model
{
    protected $table = 'match_players';

    protected $fillable = ['match_id', 'player_id', 'attack_in', 'attack_out', 'block', 'block_out', 'serve_in', 'serve_out', 'dig', 'recieve', 'missed_recieve', 'missed_dig'  ];

    public function match()
    {
        return $this->belongsTo(VolleyMatch::class, 'match_id');
    }

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
