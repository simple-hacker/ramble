<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ramble extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = [
        'user',
        'likes'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function toggleLike()
    {                     
        $like = $this->likes->firstWhere('user_id', auth()->user()->id);
        
        if ($like) {
            Gate::authorize('delete', $like);
            $like->delete();
        } else {
            $this->likes()->create([
                'user_id' => auth()->user()->id,
            ]);
        }
    }

    public function userHasLiked()
    {
        return $this->likes->where('user_id', auth()->user()->id)->isNotEmpty();
    }

    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }
}
