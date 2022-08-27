<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Post;
use App\Models\Writing;
use Illuminate\Http\Request;

class WritingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('writings.my');
    }
    public function my()
    {   
        $writings = Writing::where('user_id', auth()->user()->id)->latest()->paginate(25);

        return view('writings.my',compact('writings'));
    }

    public function create()
    {   
        $action_name = 'Create new writing';
        $action = route('writing.store');
        $genres = Genre::orderBy('name')->get();
        $writing = new Writing;
        return view('writings.create',compact('genres', 'writing', 'action', 'action_name'));
    }

    public function edit(\App\Models\Writing $writing)
    {   
        $action_name = 'Update writing';
        $action = route('writing.update',[$writing->id]);
        $genres = Genre::orderBy('name')->get();
        return view('writings.create',compact('genres','writing', 'action', 'action_name'));
    }

    public function show(\App\Models\Writing $writing)
    {   
        $genre = \App\Models\Genre::where('id',$writing->genre_id)->first();
       //dd($genre);
        return view('writings.show',compact('writing', 'genre'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' =>'required',
            'genre_id' =>['integer', 'required'],
            'private' =>'integer'
        ]);
        
        auth()->user()->writings()->create($data);

        return redirect(url('/my'))->with('success', 'New writing created'); 
    }

    public function update(\App\Models\Writing $writing)
    {
        $data = request()->validate([
            'name' =>'required',
            'genre_id' =>['integer', 'required'],
            'private' =>'integer'
        ]);
        
        $writing->update($data);


        return redirect(url('/my'))->with('success', $writing->name.' updated'); 
    }

}
