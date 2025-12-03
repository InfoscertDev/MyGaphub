<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected  $fillable = [
        'user_id',
        'action',
        'seen',
        'title',
        'category',
        'message',
        'type',
        'data',
        'received_at',
        'read_at',
    ];

    protected $casts = [
        'data' => 'array',
        'seen' => 'boolean',
        'read_at' => 'datetime',
        'received_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mark notification as read
    public function markAsRead()
    {
        $this->update([
            'seen' => true,
            'read_at' => now(),
        ]);
    }

    // Scope for unread notifications
    public function scopeUnread($query)
    {
        return $query->where('seen', false);
    }

    // Scope for read notifications
    public function scopeRead($query)
    {
        return $query->where('seen', true);
    }

    // Scope by category
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Scope by type
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }
}
