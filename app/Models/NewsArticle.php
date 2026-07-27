<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class NewsArticle extends Model
{
    use HasFactory;
    protected $table = "news";
   protected $fillable = [
    'image',
    'title',
    'body',
    'created_at',
    'updated_at',
];


  protected function image(): Attribute
    {
        return Attribute::get(function ($value) {
            // 1. If the database value is null, return the placeholder
            if (!$value) {
                return 'https://placehold.co/600x400';
            }

            // 2. If it's an external link (starts with http), return it as is
            if (str_starts_with($value, 'http')) {
                return $value;
            }

            // 3. Otherwise, return the correct storage URL
            return Storage::url($value);
        });
    }
    }
