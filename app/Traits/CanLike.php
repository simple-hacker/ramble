<?php

namespace App\Traits;

use Illuminate\Support\Facades\Gate;

trait CanLike
{
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