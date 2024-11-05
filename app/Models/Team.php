<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = ['name', 'logo', 'city'];
    public $timestamps = true;
    public function players()
    {
        return $this->hasMany(Player::class);
    }
    public function matchesAsTeam1()
    {
        return $this->hasMany(VolleyMatch::class, 'team1_id');
    }

    public function matchesAsTeam2()
    {
        return $this->hasMany(VolleyMatch::class, 'team2_id');
    }
}
