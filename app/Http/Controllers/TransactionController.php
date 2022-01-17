<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Transaction;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('transactions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'fullname' => ['required', 'string','min:4' ,'max:255'],
            'phone' => ['required', 'string','min:9' ,'max:255'],
            'email' => ['nullable','email'],
            'mahala'=>['required','string'],
            'zokak'=>['required','string'],
            'dar'=>['required','string'],
            'nearest_point'=>['required','string'],
            'gover_id'=>['required','numeric'],
            'center_id'=>['required','numeric'],
            'sector_id'=>['required','numeric'],
        ]);
      
        try {
        $trans_id = Str::uuid();
            $trans = Transaction::create([
                'trans_id'=> $trans_id,
                'fullname' => $request->fullname,
                'phone' => $request->phone,
                'email' => $request->email,
                'mahala'=> $request->mahala,
                'zokak'=>$request->zokak,
                'dar'=>$request->dar,
                'nearest_point'=>$request->nearest_point,
                'gover_id'=>$request->gover_id,
                'center_id'=>$request->center_id,
                'sector_id'=>$request->sector_id,
                'status_id'=>1// pending
            ]);
    
          
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
        
       return  view('result',[
           'msg'=>'Your request has been recevied, transaction ID is: <b>'.$trans_id.'</b>'
       ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $transaction = Transaction::find($id);
        
        return view('trans-history',[
            'data'=>$transaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
