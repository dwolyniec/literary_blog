<?php

namespace App\Models;

use AbdullahFaqeir\LaravelRating\Traits\Rate\Rateable;
use App\Filters\WritingFilter;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writing extends Model
{
    use HasFactory, Rateable;

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

    public function readers(){
        return $this->belongsToMany(User::class);
    }

    public function scopeFilter(Builder $builder, $request)
    {   
        return (new WritingFilter($request))->filter($builder);
    }
}
