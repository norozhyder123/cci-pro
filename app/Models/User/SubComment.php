<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubComment extends Model
{
    use HasFactory;

    public function comment()
    {
        return $this->belongsTo(BlogComment::class, 'comment_id');
    }

    public function parentcomment()
    {
        return $this->belongsTo(BlogComment::class, 'parent_comment_id');
    }
}
