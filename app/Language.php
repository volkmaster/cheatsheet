<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'highlight',
    ];

    public function cheatsheets()
    {
        return $this->hasMany('App\Cheatsheet');
    }

    public function knowledgePieces()
    {
        return $this->hasMany('App\KnowledgePiece');
    }
}
