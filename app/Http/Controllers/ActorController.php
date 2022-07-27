<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function getActors() 
    {
        //get all the movies
        $actors = Actor::all();

        return response()->json(['actors' => $actors]);
    }

    public function create()
    {
        return view('actors.create');
    }

    public function store(Request $request)
    {
        $actor = new Actor;

        $actor->name = $request->name;
        $actor->sex = $request->sex;
        $actor->date_of_birth = $request->dob;
        $actor->bio = $request->bio;

        $actor->save();

        return redirect()->route('movies.create')->with('success', 'Actor added successfully');
    }
}
