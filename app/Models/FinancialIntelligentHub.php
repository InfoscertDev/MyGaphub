<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialIntelligentHub extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'category',
        'banner_image',
        'video_link',
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
        return asset('/assets/'. str_replace('public', 'storage', $this->banner_image));
    }

    /**
     * Extract video ID from YouTube link
     */
    public function getVideoIdAttribute()
    {
        if (strpos($this->video_link, 'youtube.com') !== false) {
            preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $this->video_link, $matches);
            return $matches[1] ?? null;
        }

        return null;
    }

    /**
     * Generate embed URL for video
     */
    public function getEmbedUrlAttribute()
    {
        if ($this->video_id) {
            return "https://www.youtube.com/embed/{$this->video_id}?autoplay=1";
        }

        return $this->video_link;
    }
}
