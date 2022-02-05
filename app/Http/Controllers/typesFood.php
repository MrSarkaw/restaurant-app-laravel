<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\typesFoodsAndDrinks;
use illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestTypeFood;


class typesFood extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function store(RequestTypeFood $request )
    {
        $user_id=Auth::user()->id;
        $id_food= $request->session()->get('id');
        $image=$request->image;
        $name_image=$image->getClientOriginalName();
        $image->move("wallpaper",$name_image);
        typesFoodsAndDrinks::create(['user_id'=>$user_id,'foodsAndDrinks_id'=>$id_food,
                                     'name'=>$request->name,'image'=>$name_image,
                                     'price'=>$request->price,'size'=>$request->size]);

                                     return redirect(route("types.show",$id_food));

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        session(['id'=>$id]);
        $typeFood=typesFoodsAndDrinks::where('foodsAndDrinks_id',$id)->orderBy('id',"desc")->get();
        return view("admin.foodAndDrink.typesFoodsAndDrinks.index",compact("typeFood",'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {
        $idType=$request->session()->get('id');
        $food=typesFoodsAndDrinks::findOrFail($id);
        return view("admin.foodAndDrink.typesFoodsAndDrinks.edit",compact('food','idType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestTypeFood $request, $id)
    {
        $user_id=Auth::user()->id;
        $type_id=$request->session()->get('id');
        $image=$request->image;
        $name=$image->getClientOriginalName();
       $image->move('wallpaper',$name);
        typesFoodsAndDrinks::find($id)->update(['name'=>$request->name,
                                                'image'=>$name,
                                                'price'=>$request->price,
                                                'size'=>$request->size,
                                                'user_id'=>$user_id]);
                    return redirect('types/'.$type_id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        typesFoodsAndDrinks::find($id)->delete();
        $type= $request->session()->get('id');
         return redirect("types/".$type);
    }
}
