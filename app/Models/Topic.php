<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Topic extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name', 'slug', 'poster_path', 'meta'];
    protected $casts = ['meta' => 'array'];


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_topic');
    }
}
