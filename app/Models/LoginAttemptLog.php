<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class LoginAttemptLog extends Model
{
    public $appends = [
        'user'
    ];

    public function getUserAttribute(){ 
        return User::find($this->user_id); 
        return $this->hasOne('App\User', 'user_id', 'id'); 
    }
}
 