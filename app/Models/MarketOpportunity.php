<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketOpportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'banner_image',
        'button_text',
        'destination_link',
        'is_published',
        'display_order'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    protected $appends = [
        'banner_url'
    ];

    public function getBannerUrlAttribute(){
        return  asset('/assets/storage/'. str_replace('public', 'storage', $this->banner_image));
    }
}
