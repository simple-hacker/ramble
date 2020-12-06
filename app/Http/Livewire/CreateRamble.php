<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CreateRamble extends Component
{
    public $body = '';

    public $disabled = true;

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

    public function postRamble()
    {
        $data = $this->validate();   

        auth()->user()->rambles()->create($data);

        $this->emit('rambleAdded');

        session()->flash('postAdded', 'Ramble posted successfully');

        $this->reset();
    }

    public function getCharactersRemainingProperty()
    {
        return config('ramble.max_length') - strlen($this->body);
    }

    public function render()
    {
        return view('livewire.create-ramble');
    }
}
