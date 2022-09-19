<?php

// TitleFilter.php

namespace App\Filters;

class TitleFilter
{
    public function filter($builder, $value)
    {
        return $builder->
        select('writings.*')->
        join('posts', 'writings.id', '=', 'posts.writing_id')->
        where('title','LIKE',"%{$value}%");
    }
}