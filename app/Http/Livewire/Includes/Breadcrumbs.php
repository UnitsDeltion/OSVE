<?php

namespace App\Http\Livewire\Includes;

use Livewire\Component;

class Breadcrumbs extends Component
{
    public function mount($page)
    {
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.includes.breadcrumbs');
    }
}
