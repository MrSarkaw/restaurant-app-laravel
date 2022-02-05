<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\typesFoodsAndDrinks;
use App\order;
use App\User;
use DB;
use App\position;


class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('IsServer');
    }
    public function index(Request $request)
    {
         $id_position=$request->positionSession;
        $price=0;
        $counts='';
          $order=order::where('positions_id','=',$id_position)->where('safe_status','=','0')->get();  
          $foods= order::where('positions_id','=',$id_position)->where('safe_status','=','0')->get()->groupBy('foodsDrinks_id');
           return view('server.foodsAndDrinks.typeFood.order.index',compact("order",'id_position','price','foods','counts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $id='';
         $counts=0;
         $position=position::where('status','<>','null')->get();
        
         return view('server.readyFood.index',compact('id','counts','position'));

        




       
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
           $id=$id; 
          $order=order::where('positions_id','=',$id)->where('ready_status','<>','0')->get();
       
          return view('server.readyFood.show',compact('order','id'));
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

        order::find($id)->update(['ready_status'=>"2"]);
        $done=0;
        $check=order::where('positions_id','=',$request->id)->get();
        foreach($check as $row){
            if($row->ready_status=="2"){
                $done=1;
            }else {
                $done=0;
            }
        }

        if($done==1){
            position::find($request->id)->update(['status'=>2]);
        }

        return redirect('orders/'.$request->id);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        order::find($request->id)->delete();
        echo "سڕایەەوە";
    }
}
