@extends('layouts.server')

@section("body")
<div class="container mb-5 p-1">

  <div class="float-left iconsBar"> 
    <i class="fad fa-comment-lines i" data-target="#feedback" data-toggle="modal"></i>
  </div>    
 
  <div class=" float-right mb-5"> 
    {!! Form::open(['method'=>"GET",'files'=>true,'class'=>"col-12 mx-auto",'url'=>('orders')]) !!}
      {!! Form::hidden('positionSession',Session('id_position'))!!}
      {!! Form::button('<i class="fad fa-shopping-bag" ></i> داواكراوەكان',['class'=>'buton btn-block','type'=>'submit']) !!}
    {!! Form::close()!!}
 </div> 

</div>
<br><br>

<div class="container-fulid row mx-auto" 
      style="box-shadow: 0 12px 10px -5px rgba(0,0,0,0.8) inset;">
    @foreach ($food as $row )
    <div class="card-food card p-2 col-6 col-sm-6 col-md-4 col-lg-3 mt-4">    
        
        <div class=" det col-12 p-1">
                <div >
                  <p class="text-center pt-2 ">{{$row->name}} <i class="far fa-utensil-fork"></i></p>
                </div>

                <div class="div-image">
                     <img class="card-img" src="http://localhost/restaurant/www/public/wallpaper/{{$row->image}}" alt="">
                </div>

                <div class="card-body mx-auto col-12 p-0  mt-2 row ">
                  {!! Form::open(['method'=>"GET",'url'=>('/server/'.$row->id.'/orders'),"class"=>"col-12","files"=>true]) !!}
                    {!! Form::hidden('positionSession',Session('id_position')) !!}
                    {!! Form::button('بینین <i class="fas fa-eye"></i>',['type'=>'submit','class'=>'buton btn-block']) !!}
                  {!! Form::close() !!}
                </div>
        </div>
    </div>
    @endforeach




    <div id="feedback" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-body modalFeed">
                {!! Form::open(['method'=>"POST",'url'=>('server/storeFeedBack')]) !!}
                  {!! Form::textarea('feedback',null,['class'=>'text-center','placeholder'=>"رەخنە و پێشنیارت بنووسە"]) !!}
                  {!! Form::button('<i class="fad fa-paper-plane"></i>',['type'=>"submit",'class'=>"buton mt-2 btn-block"]) !!}
                {!! Form::close() !!}
              </div>
            
          </div>
      </div>
  </div>
@endsection