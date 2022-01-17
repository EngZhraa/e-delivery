<?php

namespace App\Http\Livewire;

use Livewire\Component;

class History extends Component
{

    public $trans;
    public function render()
    {

        return view('livewire.history');
    }
}
