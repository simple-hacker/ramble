<?php

namespace App\Models;

use App\Traits\CanLike;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory, CanLike;

    protected $guarded = [];

    public function ramble()
    {
        return $this->belongsTo('App\Models\Ramble');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
