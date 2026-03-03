<?php

namespace App;

use App\Models\AccountDeletion;
use App\Models\Notification;
use App\Models\UserActivityTracking;
use App\Models\UserDevice;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail, JWTSubject
{
    use Notifiable, SoftDeletes;


    protected $dates = ['deleted_at'];

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

    public function accountDeletion()
    {
        return $this->hasOne(AccountDeletion::class);
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

     /**
     * Relationship with UserActivityTracking
     */
    public function activityTracking()
    {
        return $this->hasOne(UserActivityTracking::class);
    }

    /**
     * Relationship with UserDevices
     */
    public function devices()
    {
        return $this->hasMany(UserDevice::class);
    }

    /**
     * Relationship with Notifications
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * Check if user has been active recently
     */
    public function isActiveUser($days = 7)
    {
        $tracking = $this->activityTracking;

        if (!$tracking || !$tracking->last_app_open) {
            return false;
        }

        return $tracking->last_app_open->gte(now()->subDays($days));
    }

    /**
     * Get user's unread notification count
     */
    public function getUnreadNotificationCountAttribute()
    {
        return $this->notifications()->where('seen', false)->count();
    }


}
