<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cheatsheet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'language_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function knowledgePieces()
    {
        return $this->belongsToMany('App\KnowledgePiece')->withTimestamps();
    }

    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}
