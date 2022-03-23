<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Section extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['component_id', 'name', 'meta', 'slug'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }
}
