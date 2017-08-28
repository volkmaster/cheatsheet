<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KnowledgePiece extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pivot',
    ];

    public function cheatsheets()
    {
        return $this->belongsToMany('App\Cheatsheet')->withTimestamps();
    }
}
