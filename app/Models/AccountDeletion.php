<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountDeletion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'reason',
        // 'deleted_by_admin',
        // 'restored_at',
        // 'restored_by_admin_id'
    ];


}
