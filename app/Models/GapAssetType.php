<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GapAssetType extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'acqusition',
        'status',
        'name',
        'description'
    ];
}
