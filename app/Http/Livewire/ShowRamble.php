<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Ramble;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShowRamble extends Component
{
    use AuthorizesRequests;
    
    public Ramble $ramble;

    public $edit = false;

    public $showPermalink = true;

    protected $listeners = [
        'commentSaved' => '$refresh',
        'likeToggled' => '$refresh',
    ];

    public function rules()
    {
        return [
            'ramble.body' => 'required|string|min:1|max:' . config('ramble.max_length'),
        ];
    }

    public function saveRamble()
    {
        // Authorize
        $this->authorize('update', $this->ramble);

        $this->validate();
        
        $this->ramble->save();

        $this->ramble->refresh();

        $this->edit = false;
    }

    public function like()
    {
        $this->ramble->toggleLike();

        $this->ramble->refresh();
    }

    public function render()
    {
        return view('livewire.show-ramble');
    }
}
