<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\position;
use App\order;

class chef extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware("IsShef");
    }
    public function index()
    {

        return view('chef.index');
         
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
          
        $orders=order::all()->groupBy('positions_id');
            foreach($orders as $id=> $order){
                $positions=position::where('id','=',$id)->whereIn('status',['1','0'])->get();
                foreach($positions as $row){
                    if($row->status!=2){
                        echo "<div class='col-6 col-md-4 col-lg-3 mt-2'>";
                            if($row->status=="1")
                            echo '<div class="card cardPositionDone  p-1">';
                            if($row->status=="0")
                            echo '<div class="card cardPosition  p-1"   >';

                                      echo '<div class="card-header  text-center ">   
                                                    '.$row->name.'  <i class="fas fa-chair"></i>
                                            </div>
                                        
                                            <div>
                                                <img src="http://localhost/restaurant/www/public/wallpaper/table.jpg"  
                                                    class=" border border-light imgT">
                                            </div>
                                            
                                            <div class="card-body">   
                                                <a href="'.route("shef.show",$row->id).'" 
                                                class="buton btn-block ">بینینی خواردن</a>
                                            </div>
                                          
                                       </div>
                                   </div>
                                ';
                        }
                    }
                }
           
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
        $positions=position::find($id);
        return view('chef.ordered',compact('positions'));
    }

    public function showOrdered($id){
    
     $id_position=$id;
       
          $order=order::where('positions_id','=',$id_position)->where('safe_status','=','0')->get();  

          
echo '<div class="container row mx-auto">';


foreach($order as $row){
    foreach ($row->orders()->get() as $item){
        echo '<div class="col-12 col-sm-6 col-md-4 col-lg-3 p-2 mt-2">';
            if($row->ready_status=="1")
                echo '<div class="card order-card-ready col-12">';
            else
                 echo '<div class="card order-card-noready col-12">';
              
            
            echo '<div class="card-body p-3">
                      <p class="card-title">'.$item->name.'</p>';
                    if($item->size!=null){
                         echo '<p>'.$item->size.'<i class="fas fa-sort-size-up-alt"></i> </p>';
                        };

                if($row->ready_status=="1"){
                   echo '
                   <form method="GET" action="http://localhost/Restaurant/www/public/shef/'.$row->id.'/edit">
                        <input type="hidden" name="idPos" value="'.$row->positions_id.'">
                        <button class="butonDel">پەشیمان بوونەوە <i class="fad fa-times-circle"></i></button>
                   </form>';}

                   else{
                    echo '
                    <form method="GET" action="http://localhost/Restaurant/www/public/shef/'.$row->id.'/edit">
                        <input type="hidden" name="idPos" value="'.$row->positions_id.'">
                        <button class="buton"> ئامادەیە <i class="fad fa-check-square mt-1"></i> </button>
                   </form>';
                   }                        

                 
               echo  
               '</div>
            </div>
        </div>';
       
     }
 }

echo' </div>';
 }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
       $order=order::findOrFail($id);
        if($order->ready_status=="1"){
            order::find($id)->update(['ready_status'=>"0"]);
        }else{
            order::find($id)->update(['ready_status'=>"1"]);
        }

        $finalOrder=order::where('positions_id','=',$request->idPos)->get();
        $check=1;
        foreach($finalOrder as $row){
            if($row->ready_status=="1"){
                $check=$check*1;
            }else{
                $check=$check*0;
                position::find($request->idPos)->update(['status'=>"0"]);
            }
        }

        if($check==1){
            position::find($request->idPos)->update(['status'=>"1"]);
        }

         return redirect()->route('shef.show',$request->idPos);
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
