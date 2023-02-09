<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAudit extends Model
{
    protected $casts = [
        'wheel_point_at' => 'array',
    ];
}
