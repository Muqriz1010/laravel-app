<?php

namespace App\Http\Controllers;

use App\Models\Producer;
use Illuminate\Http\Request;

class ProducerController extends Controller
{
    public function getProducers() 
    {
        //get all the movies
        $producers = Producer::all();

        return response()->json(['producers' => $producers]);
    }

    public function store(Request $request)
    {
        $producer = new Producer;

        $producer->name = $request->name;
        $producer->sex = $request->sex;
        $producer->date_of_birth = $request->dob;
        $producer->bio = $request->bio;

        $producer->save();

        return redirect()->route('movies.create')->with('success', 'Producer added successfully');
    }
    
}
