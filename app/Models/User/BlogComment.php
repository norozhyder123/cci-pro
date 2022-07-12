<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class BlogComment extends Model
{
    use HasFactory;

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentsLike()
    {
        return $this->hasMany(CommentsLike::class);
    }

    public function subcomment()
    {
        return $this->hasMany(SubComment::class, 'parent_comment_id');
    }
}
