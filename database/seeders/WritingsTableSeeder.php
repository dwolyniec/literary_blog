<?php

namespace Database\Seeders;

use App\Models\Writing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WritingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $writings = [
            'Adventure book'=>['user_id'=>1, 'genre_id'=>2, 'private'=>0],
            'Love poem'=>['user_id'=>2, 'genre_id'=>2, 'private'=>1],
        ];

        foreach($writings as $name=>$writing){
            if(!DB::table('writings')->where('name', $name)->exists()){
                $insert = new Writing(['name'=>$name, 'user_id'=>$writing['user_id'], 'genre_id'=>$writing['genre_id'], 'private'=>$writing['private']]);
                $insert->save();
            }
        }
    }
}
