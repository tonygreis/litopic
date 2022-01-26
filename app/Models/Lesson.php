<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Lesson extends Model
{
    use HasFactory;
    use Searchable;
    public $asYouType = true;

    protected $fillable = [
        'serie_id',
        'title',
        'slug',
        'duration',
        'embed_html',
        'thumbnail_url',
        'description',
        'external_id',
        'published_at',
        'approved_at'
    ];

    protected $dates = ['published_at'];

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

}
