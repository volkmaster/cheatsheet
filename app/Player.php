<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'date_of_birth', 'team_id', 'resource_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function resource()
    {
        return $this->belongsTo('App\Resource');
    }

    public function games()
    {
        return $this->hasMany('App\Game');
    }
}
