<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFeedback extends Model
{
    protected $table = 'user_feedbacks';

    protected $fillable = [
        'user_id',
        'message',
        'subject',
        'extra'
    ];

    // protected $appends = [
    //     'user', 'user_id', 'id'
    // ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
