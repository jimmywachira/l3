<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'published', 'notifications'];

    // Cast booleans and notification payload so arrays are JSON encoded automatically
    protected $casts = [
        'published' => 'boolean',
        'notifications' => 'array',
    ];
}
