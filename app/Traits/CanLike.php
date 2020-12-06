<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

trait CanLike
{
    public function toggleLike()
    {
        if (! Auth::check()) {
            return;
        }

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
        return (Auth::check()) ? $this->likes->where('user_id', auth()->user()->id)->isNotEmpty() : false;
    }

    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }
}