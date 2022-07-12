<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;

    protected $table = 'user_requests';

    protected $fillable = ['user_id', 'to_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'to_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function friendsOfFriend()
    {
        return $this->belongsTo(User::class, 'to_id')->where('profile_visibility', 'friends-of-friend');
    }
    public function blogs()
    {
        return $this->hasOne(User\Blog::class,'user_id', 'to_id')->where(['status'=>'published', 'type' => 'blog'])->orderBy('created_at', 'desc');
    }

    public function posts()
    {
        return $this->hasOne(User\Blog::class,'user_id', 'to_id')->where(['status'=>'published', 'type' => 'post'])->orderBy('created_at', 'desc');
    }
}
