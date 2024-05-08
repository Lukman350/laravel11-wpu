<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    // define the fillable attribute
    protected $fillable = ['title', 'body', 'author', 'slug'];


    // define the getRouteKeyName method
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // define the setTitleAttribute method
    public static function getSlug(string $title): string
    {
        return Str::slug($title);
    }
}
