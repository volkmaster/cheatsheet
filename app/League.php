<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'season_id', 'name', 'type', 'level', 'resource_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function season()
    {
        return $this->belongsTo('App\Season');
    }

    public function resource()
    {
        return $this->belongsTo('App\Resource');
    }

    public function games()
    {
        return $this->belongsToMany('App\Game');
    }

    public function teams()
    {
        return $this->belongsToMany('App\Team');
    }
}
