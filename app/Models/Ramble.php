<?php

namespace App\Models;

use App\Traits\CanLike;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ramble extends Model
{
    use HasFactory, CanLike;

    protected $guarded = [];

    protected $with = ['user', 'likes'];

    protected $append = ['mostPopularComment'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment')->withCount('likes')->latest();
    }

    public function getMostPopularCommentAttribute()
    {
        return $this->comments
                    ->filter(function ($comment) {
                        return $comment->likes_count > 0;
                    })
                    ->sortByDesc('likes_count')
                    ->first();
    }
}
