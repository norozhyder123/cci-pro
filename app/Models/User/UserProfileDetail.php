<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfileDetail extends Model
{
    use HasFactory;


    public function userProfile()
    {
    	
    	return $this->morphTO();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
