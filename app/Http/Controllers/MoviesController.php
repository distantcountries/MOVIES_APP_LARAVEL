<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{

    public function index()
    {
        return Movie::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $movie = new Movie();

        $movie->title = $request->input('title');
        $movie->director = $request->input('director');
        $movie->imageUrl = $request->input('imageUrl');
        $movie->duration = $request->input('duration');
        $movie->releaseDate = $request->input('releaseDate');
        $movie->genre = $request->input('genre');

        $movie->save();

        return $movie;
    }

    public function show($id)
    {
        return Movie::find($id);
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);

        //1
        // $movie->title = $request->input('title');
        // $movie->director = $request->input('director');
        // $movie->imageUrl = $request->input('imageUrl');
        // $movie->duration = $request->input('duration');
        // $movie->releaseDate = $request->input('releaseDate');
        // $movie->genre = $request->input('genre');

        // $movie->save();

        //2
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
