<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team1_id', 'team2_id', 'score1', 'score2', 'date', 'venue_id', 'referee_id', 'league_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function team1()
    {
        return $this->belongsTo('App\Team');
    }

    public function team2()
    {
        return $this->belongsTo('App\Team');
    }

    public function venue()
    {
        return $this->belongsTo('App\Venue');
    }

    public function referee()
    {
        return $this->belongsTo('App\Referee');
    }

    public function league()
    {
        return $this->hasOne('App\League');
    }

    public function players()
    {
        return $this->belongsToMany('App\Player');
    }
}
