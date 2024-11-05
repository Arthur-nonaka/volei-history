<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';

    protected $fillable = ['name', 'photo', 'team_id'];

    public $timestamps = true;

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
