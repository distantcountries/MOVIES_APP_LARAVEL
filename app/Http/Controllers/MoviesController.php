<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    //provera da ako postoji film pod odredjenim titlom ne moze se kreirati film sa istim titlom i date-om
    //isto ako postoji film sa odredjenim date-om ne moze se kreirati novi sa istim i titlom
    public function checkIfExists($title, $date)
    {
        if (Movie::where('title', $title)->first()) {
            if (Movie::where('releaseDate', $date)->first()) {
                return true;
            }
        }
        return false;
    }

    public function index()
    {
        $take = request()->input('take', Movie::get()->count());
        $skip = request()->input('skip', 0);
        $title = request()->input('title');

        if ($title) {
            return Movie::search($title, $skip, $take);
        } else if($skip && $take){
            return Movie::skip($skip)->take($take)->get();
        } else {
            return Movie::all();
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //1

        $request->duration = intval($request->duration);
        if ($this->checkIfExists($request->input('title'), $request->input('releaseDate'))) {
            print_r('Postoji film sa tim imenom i istim datumom');
            return;
        }

        $this->validate(request(), Movie::STORE_RULES);

        $movie = new Movie();

        $movie->title = $request->input('title');
        $movie->director = $request->input('director');
        $movie->imageUrl = $request->input('imageUrl');
        $movie->duration = $request->input('duration');
        $movie->releaseDate = $request->input('releaseDate');
        $movie->genre = $request->input('genre');

        $movie->save();

        return $movie;
        // return Movie::create($request->all());

    }

    public function show($id)
    {
        return Movie::find($id);
    }


    public function update(Request $request, $id)
    {
        $request->duration = intval($request->duration);
        if ($this->checkIfExists($request->input('title'), $request->input('releaseDate'))) {
            print_r('Postoji film sa tim imenom i istim datumom');
            return;
        }

        $this->validate(request(), Movie::STORE_RULES);

        $movie = Movie::find($id);

        $movie->update($request->all());

        return $movie;
    }

    public function destroy($id)
    {
        //1
        $movie = Movie::find($id);
        $movie->delete();
        return response()->json('Movie is deleted!');

        //2
        // Movie::destroy($id);
    }

    //php artisan make:controller MoviesController --resource
}
