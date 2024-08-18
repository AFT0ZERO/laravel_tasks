<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class MovieController extends Controller
{
 
    public function index()
    {
        $moviesFromDB=Movie::all();
        
        return view('movies.index',['movies'=>$moviesFromDB]);
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store()
    {

        request()->validate(
            [
                'name'=>['required','min:4'],
                'description'=>['required','min:5'],
                'gener'=>['required','min:4']
            ]
            );
        $name=request()->name;
        $description=request()->description;
        $gener=request()->gener;

        Movie::create([
            'movie_name'=>$name,
            'movie_description'=>$description,
            'movie_gener'=>$gener
        ]);
        return to_route('movies.index');
    }

    public function show(Movie $movie )
    {
        return view('movies.show',['movie'=>$movie]);
    }


    public function edit(Movie $movie)
    {
        return view('movies.edit',['movie'=>$movie]);
    }

    
    public function update(Movie $movie)
    {
       
        request()->validate(
            [
                'name'=>['required','min:4'],
                'description'=>['required','min:5'],
                'gener'=>['required','min:4']
            ]
            );

        $name=request()->name;
        $description=request()->description;
        $gener=request()->gener;

        // $singeMovieFromDB=Movie::find($movieId);
        $movie->update(
            [
                'movie_name'=>$name,
                'movie_description'=>$description,
                'movie_gener'=>$gener
                ]
            );
            // @dd($singeMovieFromDB);
        return to_route('movies.show',$movie->id);
    }


    public function destroy(Movie $movie)
    {
        $movie->delete();
        return to_route('movies.index');
    }
}
