<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\foods_drinks;
use illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestFoodAndDrink;

class foodsAndDrinks extends Controller
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
        $foodsAndDrinks=foods_drinks::all();
        return view("admin.foodAndDrink.index",compact('foodsAndDrinks'));
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
    public function store(RequestFoodAndDrink $request)
    {
        $user_id=Auth::user()->id;
        $image=$request->image;
        $name=$image->getClientOriginalName();
        $image->move("wallpaper",$name);
        foods_drinks::create(['user_id'=>$user_id,'name'=>$request->name,"image"=>$name]);
        return redirect("foodsAndDrinks");
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
        $food=foods_drinks::find($id);
        return view('admin.foodAndDrink.edit',compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestFoodAndDrink $request, $id)
    {
        $image=$request->image;
        $name_image=$image->getClientOriginalName();
        $image->move('wallpaper',$name_image);

        foods_drinks::find($id)->update(['name'=>$request->name,'image'=>$name_image]);
        return redirect('foodsAndDrinks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        foods_drinks::find($id)->delete();
        return redirect('foodsAndDrinks');
    }
}
