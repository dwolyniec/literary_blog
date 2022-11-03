<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Post;
use App\Models\User;
use App\Models\Writing;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WritingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        $writings = Writing::filter($request)->has('posts')
            ->latest()
            ->paginate(25);
       
        //filter private writings that authenticated user cant view
        $writings = $writings->filter(function ($writing, $key) {
            if($writing->private == 0)
            return true;
            
            return (Auth::user() ? Auth::user()->can('view',$writing) : false);
        });
        
        $genres = Genre::orderBy('name')->get();
        $authors = User::has('writings')->orderBy('name')->get();
        $action = route('home');
        return view('writings.index',compact('writings', 'genres', 'action','authors'));
    }
    
    public function filter(Request $request)
    {   
        $writings = Writing::filter($request)->has('posts')->latest()->paginate(25);
       
        return view('components.filtered_writings',compact('writings'));
    }

    public function my()
    {   
        $this->middleware('auth');

        $writings = Writing::where('user_id', auth()->user()->id)->latest()->paginate(25);

        return view('writings.my',compact('writings'));
    }

    public function create()
    {   
        $this->middleware('auth');

        $action_name = 'Create new writing';
        $action = route('writing.store');
        $genres = Genre::orderBy('name')->get();
        $readers = User::orderBy('name')->get();
        $writing = new Writing;
        return view('writings.create',compact('genres', 'writing', 'action', 'action_name','readers'));
    }

    public function edit(\App\Models\Writing $writing)
    {   
        $this->middleware('auth');
        $this->authorize('update',$writing);
        
        $action_name = 'Update writing';
        $action = route('writing.update',[$writing->id]);
        $genres = Genre::orderBy('name')->get();
        $readers = User::orderBy('name')->get();
        return view('writings.create',compact('genres','writing', 'action', 'action_name','readers'));
    }

    public function show(\App\Models\Writing $writing)
    {   
        $genre = \App\Models\Genre::where('id',$writing->genre_id)->first();

        return view('writings.show',compact('writing', 'genre'));
    }

    public function store()
    {   
        $data = request()->validate([
            'name' =>'required|max:255',
            'genre_id' =>'integer|required',
            'private' =>'integer',
            'readers' => 'array',
            'readers.*' => 'integer|exists:users,id',
        ]);

        $new_writing = auth()->user()->writings()->create($data);
        $new_writing->readers()->toggle($data['readers']);

        return redirect(url('/my'))->with('success', 'New writing created'); 
    }

    public function update(\App\Models\Writing $writing)
    {   
        $this->middleware('auth');
        $this->authorize('update',$writing);
        $data = request()->validate([
            'name' =>'required|max:255',
            'genre_id' =>['integer', 'required'],
            'private' =>'integer',
            'readers' => 'array',
            'readers.*' => 'integer|exists:users,id',
        ]);
        
        $writing->update($data);
        $writing->readers()->sync($data['readers']);

        return redirect(url('/my'))->with('success', $writing->name.' updated'); 
    }

    public function rate(\App\Models\Writing $writing)
    {
        dd($_POST, $writing);
    }
}
