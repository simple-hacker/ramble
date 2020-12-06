<?php

namespace App\Models;

use App\Traits\CanLike;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ramble extends Model
{
    use HasFactory, CanLike;

    protected $guarded = [];

    protected $with = ['user', 'likes', 'comments'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment')->latest();
    }
}
