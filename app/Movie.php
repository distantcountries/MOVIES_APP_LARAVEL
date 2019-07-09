<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    
    protected $fillable = [
        'title', 'director', 'imageUrl', 'duration', 'releaseDate', 'genre'
    ];

    const STORE_RULES = [
        'title' => 'required|unique:movies|max:255',
        'director' => 'required',
        'duration' => 'required|numeric|min:1|max:500',
        'releaseDate' => 'required|unique:movies',
        'imageUrl' => 'url'
    ];

    public static function search($title, $skip, $take) {
        return self::where('title', 'LIKE', '%' . $title . '%')->skip($skip)->take($take)->get();
    }

}
