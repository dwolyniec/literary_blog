<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {   
        $posts = Post::with('writing')->latest()->paginate(25);
        return view('home',compact('posts'));
    }

    public function show(\App\Models\Post $post)
    {   
        //$genre = \App\Models\Genre::where('id',$writing->genre_id)->first();
       //dd($genre);
        return view('posts.show',compact('post'));
    }

    public function create()
    {   
        $action_name = 'Create new post';
        $action = route('post.store');
       
        $post = new Post();
        return view('posts.create',compact('post', 'action', 'action_name'));
    }

    public function edit(Post $post)
    {   
        $action_name = 'Update post';
        $action = route('post.update',[$post->id]);
      
        return view('posts.create',compact('post', 'action', 'action_name'));
    }
}
