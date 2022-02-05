<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use Carbon\Carbon;
use Excel;

class raport extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('IsAdmin');
    }
    public function index()
    {
        return view('admin.raport.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $year=$request->year;
        $month=$request->month;
        $food_arr[]=array('food name','size','quantity');
        $food='';
        $sum=0;
        $order= order::whereYear('created_at', $request->year)
        ->whereMonth('created_at', $request->month)->where('ready_status','=','2')->get()->groupBy('foodsDrinks_id');
        return view('admin.raport.show',compact('order','food','sum','year','month'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food_arr[]=array('food name','size','quantity');
        $food;
        $sum=0;
        $order= order::whereYear('created_at', $request->year)
        ->whereMonth('created_at', $request->month)->where('ready_status','=','2')->get()->groupBy('foodsDrinks_id');
        foreach($order as $row=>$count){
            foreach($count as $rows){
                $food= $rows;   
            }
            foreach($food->orders()->where('id','=',$row)->get()->groupBy('name') as $foods=>$foodCount){
                foreach($foodCount as $foodsRow){
                    $sum=$count->count()*$foodsRow->price;
                    echo $foodsRow->name ."||".$count->count()."||".$sum."<br>";
                    $sum=0;
                    $food_arr[]=array(
                        'food name'=>$foodsRow->name,
                        'size'=>$foodsRow->size,
                        'quantity'=>$count->count()
                    );
                }
            } 
        }

        Excel::store('order Foods Data',function($excel) use($food_arr){
            $excel->setTitle('order Foods Data');
            $excel->sheet('order Foods Data',function($sheet)use($food_arr){
                $sheet->fromArray($food_arr,null,'a1',false,false);
            });
        },'users.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
