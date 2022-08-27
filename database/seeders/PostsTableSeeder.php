<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            'First chapter'=>['writing_id'=>1, 'content'=>'Loreal ipsum'],
            'Second chapter'=>['writing_id'=>1, 'content'=>'Twas like that'],
            'My love'=>['writing_id'=>2, 'content'=>'Love poem here'],
           
        ];

        foreach($posts as $title=>$post){
            if(!DB::table('posts')->where('title', $title)->exists()){
                $insert = new Post(['title'=>$title, 'writing_id'=>$post['writing_id'], 'content'=>$post['content']]);
                $insert->save();
            }
        }
    }
}
