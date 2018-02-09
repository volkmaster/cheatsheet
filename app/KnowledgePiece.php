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
        'description', 'code', 'language_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function cheatsheets()
    {
        return $this->belongsToMany('App\Cheatsheet')->withTimestamps();
    }

    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
