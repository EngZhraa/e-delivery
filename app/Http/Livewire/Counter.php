<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $counter;
    function __construct()
    {
        $this->counter = 1;
    }
    
    public function render()
    {
       
        return view('livewire.counter');
    }
    public function inc()
    {
        $this->counter++;
    }
    public function dec()
    {
        $this->counter--;
    }
}
