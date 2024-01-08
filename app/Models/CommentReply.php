<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;

    protected $fillable = ['comment_id', 'comment'];

    public function comments_replies()
    {
        return $this->belongsTo(Comment::class);
    }
}
