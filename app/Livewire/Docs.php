<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title("API Docs")]

class Docs extends Component
{
    public function render()
    {
        return view('livewire.docs');
    }
}
