<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolleyMatch extends Model
{
    protected $table = 'match';

    protected $fillable = ['team1_id', 'team2_id', 'date'];

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }
}
