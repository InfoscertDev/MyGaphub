<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'author',
        'published_date',
        'reading_time',
        'excerpt',
        'content',
        'featured_image',
        'category_id',
        'is_featured'
    ];

    protected $dates = ['published_date'];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}