<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';

    protected $guarded = array();
    
    protected $fillable = ['name','username','email','password','profile_img', 'phone','user_token','country','state','city','zip_code','status'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
