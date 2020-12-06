<?php

namespace App\Http\Livewire;

use App\Models\Ramble;
use Livewire\Component;

class CreateComment extends Component
{
    public $body = '';

    public $disabled = true;

    public $ramble;

    protected $listeners = [
        'commentAdded' => '$refresh',
    ];

    public function rules()
    {
        return [
            'body' => 'required|string|min:1|max:' . config('ramble.max_length'),
        ];
    }

    public function updated()
    {
        $this->disabled = strlen($this->body) > config('ramble.max_length');

        $this->validate();      
    }

    public function getCharactersRemainingProperty()
    {
        return config('ramble.max_length') - strlen($this->body);
    }

    public function addComment()
    {
        $this->validate();

        $this->ramble->comments()->create([
            'user_id' => auth()->user()->id,
            'body' => $this->body,
        ]);

        $this->emit('commentAdded');

        $this->body = '';
    }

    public function render()
    {
        return view('livewire.create-comment');
    }
}
