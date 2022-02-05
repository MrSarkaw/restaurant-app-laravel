<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\position;

class orderAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware("IsAdmin");
    }
    public function index()
    {
        $newRow='';
        $order=order::all()->where('safe_status','=','0')->groupBy('positions_id');
        return view('admin.order.index',compact('order','newRow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_position= $id;
        $price=0;
        $counts='';
          $order=order::where('positions_id','=',$id_position)->get();  
          $foods= order::where('positions_id','=',$id_position)->get()->groupBy('foodsDrinks_id');
           return view('admin.order.show',compact("order",'id_position','price','foods','counts'));
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
        order::where('positions_id','=',$id)->update(['safe_status'=>"1"]);
        position::find($id)->update(['status'=>'null']);


        $newRow='';
        $order=order::all()->groupBy('positions_id');
        return redirect('/');
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
