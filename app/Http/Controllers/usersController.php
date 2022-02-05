<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Users;

class usersController extends Controller
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
          $roles=role::pluck('name','id')->all();
        $users=User::all();
        return view("admin.users.index",compact('users','roles'));  
        
       
        
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
    public function store(users $request)
    {
        User::create(["name"=>$request->name,
                     'email'=>$request->email,
                     'password'=>Hash::make($request->password),
                     'role_id'=>$request->role_id]);
        return redirect("users");
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
        

        $uEdit=User::find($id);
        $roles=role::pluck('name','id')->all();
        $users=User::all();
        return view('admin.users.edit',compact('uEdit','roles','users'));  
      
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(users $request, $id)
    {
        
            User::find($id)->update(['name'=>$request->name,
                                     'email'=>$request->email,
                                     'password'=>Hash::make($request->password),
                                     'role_id'=>$request->role_id]);
        
            return redirect('users/'.$id.'/edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('users');
    }
}
