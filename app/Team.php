<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'founded', 'resource_id', 'motto', 'homepage', 'logo', 'location_latitude', 'location_longitude', 'coach_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function resource()
    {
        return $this->belongsTo('App\Resource');
    }

    public function coach()
    {
        return $this->belongsTo('App\Coach');
    }

    public function leagues()
    {
        return $this->hasMany('App\League');
    }
}
