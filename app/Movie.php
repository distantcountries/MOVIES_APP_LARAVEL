<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    
    protected $fillable = [
        'title', 'director', 'imageUrl', 'duration', 'releaseDate', 'genre'
    ];

    const STORE_RULES = [
        'title' => 'required|unique:title|max:255',
        'director' => 'required',
        'duration' => 'required|numeric|min:1|max:500',
        'releaseDate' => 'required|unique:releaseDate',
        'imageUrl' => 'url'
    ];

    public static function search($word)
    {
        return self::where('title', 'LIKE', '%'.$word.'%')->get();
    }

    // public static function search($word, $skip, $take)
    // {
    //     return self::where('name', 'LIKE', '%'.$word.'%')->skip($skip)->take($take)->get();
    // }
}
