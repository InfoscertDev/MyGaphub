<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcquisitionOpportunityCms extends Model
{
    use HasFactory;

    // public function getPhotoAttribute($photo){
    //     return (str_contains($photo,'public')) ? asset('/assets/'. str_replace('public', 'storage', $photo)) : $photo;
    // } 

    public function getPhotoAttribute($photo){
        return  asset('/assets/'. str_replace('public', 'storage', $photo));
    } 
}
