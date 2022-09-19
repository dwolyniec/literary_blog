<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Post;
use App\Models\Writing;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {   
        $posts = Post::with('writing')->latest()->paginate(25);
        return view('writings.index',compact('posts'));
    }

    public function show(\App\Models\Post $post)
    {   
        //$genre = \App\Models\Genre::where('id',$writing->genre_id)->first();
       //dd($genre);
        return view('posts.show',compact('post'));
    }

    public function create(Writing $writing)
    {   
        $action_name = 'Create new post';
        $action = route('post.store');
       
        $post = new Post();
        return view('posts.create',compact('post', 'action', 'action_name', 'writing'));
    }

    public function edit(Post $post)
    {   
        $action_name = 'Update post';
        $action = route('post.update',[$post->id]);
        $writing = $post->writing;
        return view('posts.create',compact('post', 'action', 'action_name', 'writing'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' =>'required|max:255',
            'content' =>'required',
            'writing_id' =>['integer', 'required'],
        ]);
        
        auth()->user()->post()->create($data);

        return redirect(url('/my'))->with('success', 'New post created'); 
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' =>'required|max:255',
            'content' =>'required',
            'writing_id' =>['integer', 'required'],
        ]);
        
        $post->update($data);


        return redirect(url('/my'))->with('success', $post->title.' updated'); 
    }
}
