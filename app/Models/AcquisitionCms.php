<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcquisitionCms extends Model
{
    use HasFactory;


    public function getPhotoAttribute($photo){
        return  asset('/assets/'. str_replace('public', 'storage', $photo));
    } 
}
