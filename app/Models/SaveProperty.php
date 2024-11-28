<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveProperty extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'property_id',
        'meta'
    ];


    protected $casts = [
        'meta' => 'json',
    ];


}
