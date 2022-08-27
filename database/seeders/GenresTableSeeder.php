<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'Fantasy',
            'Thriller',
            'Crime'
        ];

        foreach($genres as $genre){
            if(!DB::table('genres')->where('name', $genre)->exists()){
                $insert = new Genre(['name'=>$genre]);
                $insert->save();
            }
        }

    }
}
