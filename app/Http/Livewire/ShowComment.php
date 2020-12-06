<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShowComment extends Component
{
    use AuthorizesRequests;
    
    public Comment $comment;

    public $edit = false;

    public function rules()
    {
        return [
            'comment.body' => 'required|string|min:1|max:' . config('ramble.max_length'),
        ];
    }

    public function saveComment()
    {
        $this->authorize('update', $this->comment);

        $this->validate();
        
        $this->comment->save();

        $this->comment->refresh();

        $this->edit = false;
    }

    public function like()
    {
        $this->comment->toggleLike();

        $this->emit('likeToggled');

        $this->comment->refresh();
    }
    
    public function render()
    {
        return view('livewire.show-comment');
    }
}
