<?php

namespace App\Http\Livewire;

use App\Models\Center;
use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class TransM extends Component
{
    use WithPagination;

    public $centers;
    public $searchValue;
    public $center_id;

    // function __construct()
    // {
    //     $this->center_id = 1;
    // }
    public function render()
    {
        $data = Transaction::
        where(function($q){
            $q->where(
                'fullname',
                'like',
                '%'.$this->searchValue.'%'
            )
            ->orWhere(
                'trans_id',
                '=',
                $this->searchValue
            );
        })
        ->where(
           function($query){
              if($this->center_id)
              {
                $query->where('center_id',
                '=',
                $this->center_id);
              }
           }
        )
        ->paginate(10);
        // ->get();
        // load centers
        $this->centers = Center::all();
        return view('livewire.trans-m',[
            'data'=>$data
        ]);
    }
}
