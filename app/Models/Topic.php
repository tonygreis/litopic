<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'poster_path', 'meta'];
    protected $casts = ['meta' => 'array'];


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_topic');
    }
}
