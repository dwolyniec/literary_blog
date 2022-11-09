<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Writing;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WritingsTest extends TestCase
{
    Use RefreshDatabase;
    
    public function test_private_writing_can_be_accessed_by_author()
    {   
        $user = User::make();
        $writing = Writing::make(['name'=>'test book', 'user_id'=>$user->id, 'genre_id'=>1, 'private'=>1]);

        $response = $this->actingAs($user)->get('/writing/'.$writing->id);
        $response->assertStatus(200);
    }
}
