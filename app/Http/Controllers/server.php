<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\foods_drinks;
use App\position;
use App\typesFoodsAndDrinks;
use App\feedback;
use App\User;

class server extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('IsServer');
    }
    public function index(Request $request )
    {
        
        $request->Session()->forget('id_position');       
         return view('server.index');
         
    }

  


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position=position::all();
        foreach($position as $row){
            echo "<div class='col-6 col-md-4 col-lg-2 mt-5'>";
            if($row->status=="null")
              echo '<div class="card  cardPosition p-1">';
             else if($row->status=="0" || $row->status=="1")
                echo '<div class="card  cardPositionOrder p-1">';
                    else 
                         echo '<div class="card cardPositionDone p-1">';
           
                         echo ' <div class="card-header text-center" style="font-size:13px;">   
                            '.$row->name.'  <i class="fas fa-chair"></i>
                                                     </div>
                      
                    <div>
                        <img src="http://localhost/restaurant/www/public/wallpaper/table.jpg"  class=" imgT">
                     </div>
                      

                        <div class="card-body">   
                            <a href="'.route("server.show",$row->id).'" class="buton btn-block ">داواكردن</a>
                        </div>


                  </div>
            </div>

            </div>';

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
   
         $user=Auth::user()->id;
         $id_positions=$request->positionSession;
         $orderlevel=position::find($id_positions)->update(['status'=>'0']);
          typesFoodsAndDrinks::find($request->id)->positions()->attach($id_positions,['user_id'=>$user]);
        
         $order=typesFoodsAndDrinks::find($request->id);
         $size;
            if($order->size==null)
            $size='';
            else
            $size=$order->size;
         echo '<div class="alert alert-success alert-dismissible">
                <a href="#" class="close alert-order" data-dismiss="alert" aria-label="close">&times;</a><p class="text-center">'.$order->name.
         "<br>".$size."</p></div>";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        Session(['id_position'=>$id]);
        $check=position::find($id);
        $food=foods_drinks::all();
        return view("server.foodsAndDrinks.index",compact("food","check"));
    }

    public function typeFood(Request $request , $id){
        $positionSession=$request->positionSession;
        $id_food=$id;
        $typeFood=typesFoodsAndDrinks::where("foodsAndDrinks_id","=",$id)->get();
        return view("server.foodsAndDrinks.typeFood.index",compact('typeFood','id_food','positionSession'));
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

    public function storeFeedBack(Request $request)
    {
        User::find(Auth::user()->id)->feedback()->create(['feedback'=>$request->feedback]);
        $position_id= $request->Session()->get('id_position');
        return redirect('server/'.$position_id);
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
       $position_id= $request->Session()->get('id_position');
       position::find($position_id)->update(['status'=>"2"]);
       return redirect('server/'.$position_id);
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
