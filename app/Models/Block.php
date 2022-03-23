<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Block extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['section_id', 'name', 'meta', 'slug', 'poster_path'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
