<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Searchable;
use Wink\WinkPost;

class Post extends WinkPost
{
    use HasFactory, Searchable;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    #[SearchUsingPrefix(['id'])]
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
