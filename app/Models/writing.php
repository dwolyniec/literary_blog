<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writing extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'genre_id',
        'user_id',
        'private'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function genre(){
        return $this->hasOne(Genre::class);
    }
}
