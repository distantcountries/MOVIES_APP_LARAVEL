<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    
    protected $fillable = [
        'title', 'director', 'imageUrl', 'duration', 'releaseDate', 'genre'
    ];

    //zbog metode checkIfExists u kontroleru nece stajati
        // 'title' => 'required|unique:movies|max:255'
        // 'releaseDate' => 'required|unique:movies'
    //brisemo unique jer je metoda dovoljna



    const STORE_RULES = [
        'title' => 'required|max:255',
        'director' => 'required',
        'duration' => 'required|numeric|min:1|max:500',
        'releaseDate' => 'required',
        'imageUrl' => 'url'
    ];

    public static function search($title, $skip, $take) {
        return self::where('title', 'LIKE', '%' . $title . '%')->skip($skip)->take($take)->get();
    }

}
