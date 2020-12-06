<?php

namespace App\Http\Livewire;

use App\Models\Ramble;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class ShowFullRamble extends Component
{
    use WithPagination;
    
    public Ramble $ramble;

    protected $listeners = [
        'commentSaved' => 'refreshRamble',
        'likeToggled' => 'refreshRamble',
    ];
    
    public function refreshRamble()
    {
        $this->resetPage();
        $this->ramble->refresh();
    }

    public function render()
    {
        return view('livewire.show-full-ramble', [
            'ramble' => $this->ramble,
            'comments' => Comment::where('ramble_id', $this->ramble->id)->latest()->paginate(10),
        ]);
    }
}
