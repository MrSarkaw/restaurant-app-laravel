<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\role;
use App\User;
use App\order;
use App\foods_drinks;
use Illuminate\Support\Facades\Auth;
use App\Exports\UsersExport;

route::get('/home',function(){
    return redirect('/');
});
Route::get('/', function () {
  
    if(Auth::check()){
     
      $id=Auth::user()->id;
      $user=User::find($id);
    
   foreach($user->role()->get() as $row){
        
        if($row->name=="administrator"){
                return view('admin.index');
            }
            else if($row->name=="server"){
                return redirect("server");
            }
            else if($row->name=="shef"){
                return redirect("shef");
            }
        }  
    }
        else {
        return view('auth\login');
    }
 
});


Auth::routes();

    Route::group(['middleware' => 'web'], function () {
    Route::resource('/users', 'usersController');
    Route::resource('positions', 'positions');
    Route::resource('/orderAdmin', 'orderAdmin');
    Route::resource('/feedbacks','feedbacks');
    Route::resource("/foodsAndDrinks",'foodsAndDrinks');
    Route::resource('/types', 'typesFood');
    Route::resource('/server', 'server');
    //custom route to typefood insert
        Route::GET("/server/{id}/orders","server@typeFood");
    //custom route to store feedback 
        Route::POST("/server/storeFeedBack","server@storeFeedBack");   
    Route::resource('/orders', 'orderController');
    Route::resource('/shef', 'chef');
         //custom route to store feedback 
         Route::GET("/shef/{id}/showOrdered","chef@showOrdered");

    Route::resource('/backup','backup');
    Route::resource('/raport', 'raport');


}); 


  Route::get('/download',function(){
      return Excel::download(new UsersExport,'users.xlsx');
    });