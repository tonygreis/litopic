<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Searchable;

class Lesson extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'course_id',
        'title',
        'slug',
        'duration',
        'embed_html',
        'thumbnail_url',
        'description',
        'external_id',
        'published_at',
        'approved_at',
        'meta'
    ];

    protected $dates = ['published_at'];
    protected $casts = ['meta' => 'array'];



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

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
