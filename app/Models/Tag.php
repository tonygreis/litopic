<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['tag_name', 'slug'];

    public function setTagNameAttribute($value)
    {
        $this->attributes['tag_name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
