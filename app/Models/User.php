<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
        'profile_img',
        'user_token',
        'country',
        'state',
        'city',
        'zip_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullName()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    public function education()
    {
        return $this->morphMany(User\UserProfileDetail::class, 'userProfile')->where(['status' => 'active', 'type' => 'education']);
    }
    public function workHistory()
    {
        return $this->morphMany(User\UserProfileDetail::class, 'userProfile')->where(['status' => 'active', 'type' => 'workhistory']);
    }
    public function skills()
    {
        return $this->morphMany(User\UserProfileDetail::class, 'userProfile')->where(['status' => 'active', 'type' => 'skills']);
    }
    public function political_Preferences()
    {
        return $this->morphMany(User\UserProfileDetail::class, 'userProfile')->where(['status' => 'active', 'type' => 'politicalpreferences']);
    }
    public function religion_Preferences()
    {
        return $this->morphMany(User\UserProfileDetail::class, 'userProfile')->where(['status' => 'active', 'type' => 'religionpreferences']);
    }
    public function interests()
    {
        return $this->morphMany(User\UserProfileDetail::class, 'userProfile')->where(['status' => 'active', 'type' => 'interests']);
    }
    public function imageable()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function blogs()
    {
        return $this->hasMany(User\Blog::class)->where(['status' => 'published','type' =>'blog']);
    }

    public function posts()
    {
        return $this->hasMany(User\Blog::class)->where(['status' => 'published','type' =>'post']);
    }

    public function blogComments()
    {
        return $this->hasMany(User\BlogComment::class);
    }

    public function blogLikes()
    {
        return $this->hasMany(User\BlogLike::class);
    }

    public function blogViews()
    {
        return $this->hasMany(User\BlogView::class);
    }

    public function connectionRequests()
    {
        return $this->hasMany(UserRequest::class, 'to_id');
    }

    public function connected()
    {
        return $this->hasMany(UserRequest::class, 'user_id', 'id', 'to_id');
    }

    public function connectionsend()
    {
        return $this->hasMany(UserRequest::class);
    }

    public function MessageTo()
    {
        return $this->hasMany(Chat::class);   
    }

    public function MessageFrom()
    {
        return $this->hasMany(Chat::class, 'to_id');   
    }

    public function Conversations()
    {
        $to = $this->hasMany(Chat::class);   
        $from = $this->hasMany(Chat::class, 'to_id');

        return $to->union($from)->all();
    }
}
