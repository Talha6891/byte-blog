<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, SoftDeletes ,InteractsWithMedia;

    protected $fillable = [
        'title',
        'content',
        'excerpt',
        'slug',
        'views_count',
        'status',
        'published_at',
        'user_id',
        'category_id',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //category
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    //tag
    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    // comments
    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('post')
        ->singleFile();
    }
}
