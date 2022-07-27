<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use App\Models\Producer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MovieController extends Controller
{
    public function index() 
    {
        $movies = Movie::all();

        return view('movies.index')->with('movies', $movies);
    }

    public function show($id)
    {
        return view('movies.show')->with('movie', Movie::findOrFail($id));
    }

    public function getMovieActors($id)
    {
        $actors = Movie::find($id)->actors;

        return response()->json(['actors' => $actors]);
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'name' => 'required',
            'year_of_release' => 'required',
            'plot' => 'required',
            'image' => 'required',
            'producer_list' => 'required',
            'actor_list' => 'required'
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        
        $movieData = $request->all();

        if ($movieData['actor_list']['0'] == '-1') {
            unset($movieData['actor_list']['0']);
        }

        $actorIdList = [];
        foreach ($movieData['actor_list'] as $key => $value) {
            $actorIdList[] = $value;
        }

        $movie->update(
            [
                'name' => data_get($movieData, 'name'),
                'year_of_release' => data_get($movieData, 'year_of_release'),
                'plot' => data_get($movieData, 'plot'),
                'image' => $imageName,
                'producer_id' => data_get($movieData, 'producer_list'),
            ]
        );

        $movie->actors()->sync(data_get($movieData, 'actor_list'));
    
        return redirect()->route('movies.index')->with('success','Product updated successfully');
    }

    public function create()
    {
        return view('movies.create');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully');
    }

    public function store(Request $request)
    {
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        $movie = new Movie;

        $movie->name = $request->name;
        $movie->year_of_release = $request->year_of_release;
        $movie->plot = $request->plot;
        $movie->image = $imageName;

        $movie->save();

        foreach ($request->actor_list as $key => $val) {
            $movie->actors()->attach($val);
        }

        Producer::find($request->producer_list)->movies()->save($movie);

        return redirect()->route('movies.index')->with('success', 'Movie added successfully');
    }
}
