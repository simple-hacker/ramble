<?php

namespace App\Http\Livewire;

use App\Models\Ramble;
use Livewire\Component;

class ShowFullRamble extends Component
{
    public Ramble $ramble;

    protected $listeners = [
        'commentAdded',
    ];
    
    public function commentAdded()
    {
        $this->ramble->refresh();
    }

    public function render()
    {
        return view('livewire.show-full-ramble');
    }
}
