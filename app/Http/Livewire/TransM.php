<?php

namespace App\Http\Livewire;

use App\Models\Attachment;
use App\Models\Center;
use App\Models\Status;
use App\Models\Transaction;
use App\Models\TransactionHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Image;
use Livewire\WithFileUploads;

class TransM extends Component
{
    use WithPagination,WithFileUploads;

    public $centers,$status;
    public $searchValue;
    public $center_id;

    // for update form
    public $new_status_id,$reason;
    public $files = [];// declare as multiple file
    public $selectedTrans;
    // function __construct()
    // {
    //     $this->center_id = 1;
    // }
    public function render()
    {
        $user = Auth::user();
        $data = Transaction::
        where(function($q) use($user){
            if($user->sector_id)
            {
                $q->where('sector_id',$user->sector_id);
            }
        })
        ->
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
        $this->status = Status::all();
        return view('livewire.trans-m',[
            'data'=>$data
        ]);
    }

    public function submit()
    {
        // validate
        
        $this->validate([
            'selectedTrans' =>'required',
            'new_status_id'=>'required|numeric|exists:status,id',
            'reason'=>'required|string',
            'files.*'=>'image|mimes:png,jpg,jpeg|max:2048'// kB
        ]);
        // logic
        // 1- Update transaction status
        $transaction = Transaction::find($this->selectedTrans['id']);
        $transaction->status_id = $this->new_status_id;
        $transaction->save();
        // Create history for this change
        $history = TransactionHistory::create([
            'transaction_id'=>$transaction->id,
            'user_id'=>Auth::user()->id,
            'status_id'=>$this->new_status_id,
            'reason'=>$this->reason
        ]);
        // store attachments
        foreach($this->files as $file)
        {
            $newName = $transaction->phone.'_'.microtime().'_'.$file->getClientOriginalName();

        Attachment::create([
            'name'=>$newName,
            'type'=>'image',
            'transaction_id'=>$transaction->id
        ]);
        $img = Image::make($file->getRealPath());
            $img->resize(512, 512, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(Storage::disk('images')->path('/').$newName);
            // $file->storeAs('images',$newName);
        }

        // redirect to the user
        return redirect()->to('/transactions');
    }
    public function update($t)
    {
        $this->reason = '';
        $this->new_status_id = 1;
        $this->files = [];
        $this->selectedTrans = $t;
    }
    public function goToHistory($transaction)
    {
       redirect()->to('/transactions/'.$transaction['id']);
    }
}
