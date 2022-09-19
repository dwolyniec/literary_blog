<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'writing_id'
    ];

    public function writing(){
        return $this->belongsTo(Writing::class);
    }

    protected static function booted()
    {
        static::created(function ($post) {
            $post->writing()->update([]);
        });
    }
}
