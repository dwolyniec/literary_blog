<?php

// WritingFilter.php

namespace App\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class WritingFilter extends AbstractFilter
{
    protected $filters = [
        'genre_id' => GenreFilter::class,
        'name' => NameFilter::class,
        'title' => TitleFilter::class,
        'author' => AuthorFilter::class,
    ];
}