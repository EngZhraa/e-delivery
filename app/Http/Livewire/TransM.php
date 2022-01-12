<?php

namespace App\Http\Livewire;

use App\Models\Center;
use App\Models\Transaction;
use Livewire\Component;

class TransM extends Component
{
    public $data,$centers;
    public $searchValue;
    public $center_id;
    public function render()
    {
        
        $this->data = Transaction::
        where(
            'fullname',
            'like',
            '%'.$this->searchValue.'%'
        )
        ->orWhere(
            'trans_id',
            '=',
            $this->searchValue
        )
        ->orWhere(
            'center_id',
            '=',
            $this->center_id
        )
        ->get();
        // load centers
        $this->centers = Center::all();
        return view('livewire.trans-m');
    }
}
