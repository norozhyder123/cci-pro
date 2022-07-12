<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Image;
class Blog extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function commentsCount()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function blogLikes()
    {
        return $this->hasMany(BlogLike::class);
    }
    
    public function blogViews()
    {
        return $this->hasMany(BlogView::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
