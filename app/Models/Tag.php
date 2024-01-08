<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug','user_id','description'];


    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
