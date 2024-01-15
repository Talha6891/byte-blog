<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['post_id','user_id','comment'];

    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
    public function comments_replies() : HasMany
    {
        return $this->hasMany(CommentReply::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
