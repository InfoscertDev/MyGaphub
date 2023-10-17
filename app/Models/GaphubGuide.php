<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaphubGuide extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'video_link'
    ];
}
