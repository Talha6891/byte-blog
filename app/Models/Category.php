<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug','user_id', 'description'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function posts() : HasMany
    {
        return  $this->hasMany(Post::class);
    }
}