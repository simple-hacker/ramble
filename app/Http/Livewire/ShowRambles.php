<?php

namespace App\Http\Livewire;

use App\Models\Ramble;
use Livewire\Component;

class ShowRambles extends Component
{
    protected $listeners = [
        'rambleAdded' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.show-rambles', [
            'rambles' => Ramble::with('user')->latest()->paginate(10),
        ]);
    }
}
