<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\Governorate;
use App\Models\Sector;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $govers = Governorate::all();
        $centers = Center::all();
        $sectors = Sector::all();
        return view('request',[
            'govers'=>$govers,
            'centers'=>$centers,
            'sectors'=>$sectors
        ]);
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
        // validate inputs
       $validated =  $request->validate([
            'fullname' => 'required|min:4|max:255',
            'email' => 'nullable|email',
            'phone'=>'required|digits:10',
            'mahala'=>'required|numeric',
            'zokak'=>'required|numeric',
            'dar'=>'required|numeric',
            'nearest_point'=>'required|string|min:4|max:255',
            'gover_id'=>'required|numeric',
            'center_id'=>'required|numeric',
            'sector_id'=>'required|numeric'
        ]);
        
        // merging on validated input 
        $validated['trans_id']=Str::uuid();
        $validated['status_id'] = 1;
      
        // insert input
        
        $transaction = Transaction::create($validated);
        // response  user
        return redirect('requests')->with('message', 'Transaction has been created successfully, reference number: #'.$validated['trans_id']);

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
