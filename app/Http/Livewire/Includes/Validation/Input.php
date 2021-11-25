<?php

namespace App\Http\Livewire\Includes\Validation;

use Livewire\Component;

class Input extends Component
{
    public $input;

    public function mount($input)
    {
        $this->input = $input;
    }

    public function render()
    {

        return view('livewire.includes.validation.input');
    }
}
