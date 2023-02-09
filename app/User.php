<?php

namespace App;

use App\Models\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Notifications\VerifyEmail;

class User extends Authenticatable implements MustVerifyEmail,JWTSubject 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'surname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array 
     */
    protected $hidden = [   
        'password', 'remember_token',
    ]; 

    protected $appends = [
        'unseen_notifications', 'user_profile'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }  

    public function getJWTCustomClaims()
    {
        return [];
    }
  
    public function profile(){
        return  $this->hasOne('App\UserProfile', 'id', 'profile_id');
    }

    public function getUserProfileAttribute(){
        $profile = UserProfile::find($this->profile_id);
        return $profile;  
    }

    public function getUnseenNotificationsAttribute(){ 
        return Notification::where('user_id', $this->id)->where('seen',0)->count();
    }
    
    public function sendEmailVerificationNotification()
    {
        
        $this->notify(new VerifyEmail); // my notification
    }
}
