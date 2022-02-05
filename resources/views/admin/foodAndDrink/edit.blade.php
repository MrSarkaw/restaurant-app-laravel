@extends('layouts.admin')

@section('body')
    <div class="iconsBar mb-3">
        <a href="{{route('foodsAndDrinks.index')}}"><i class="fad fa-caret-circle-left  i "></i></a> 
    </div>

<p class="alert h5 text-center">ئاگاداربە ، لەكاتی سڕینەوەی هەر بەشێك لەمانە ، دەیتا پەیوەندیدارەكانیش دەسڕێنەوە</p>

<div class="container card-food">
        <div class=" det col-12 col-sm-10 col-md-6 col-lg-4 mx-auto p-1">
            <div class="pname">
              <p class="text-center p-2 ">{{$food->name}} <i class="far fa-utensil-fork"></i></p>
            </div>
        <img class="card-img-top " src="http://localhost/Restaurant/www/public/wallpaper/{{$food->image}}" alt="" >
            <div class="card-body mx-auto col-12  mt-2 row ">
            {!! Form::open(['method'=>"DELETE",'files'=>true,"url"=>("foodsAndDrinks/".$food->id),"class"=>'col-12 mb-1 p-0']) !!}
                {!! Form::button("سڕینەوە <i class='fad fa-trash'></i>",["type"=>"submit",'class'=>'deleteButton btn-block ']) !!}
            {!! Form::close() !!}

                <a class="editButton btn-block" data-target="#editFood" data-toggle="modal">تازەكردنەوەی خواردن <i class="fas fa-comment-alt-edit"></i></a>
            </div>
      </div>
    </div>

    <div id="editFood" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="modal-body text-dark">
                    {!! Form::model($food,["method"=>"PATCH","url"=>('foodsAndDrinks/'.$food->id),'files'=>true]) !!}
                       <div class="custom-file mb-2">
                            <div class="modalInp">
                                {!! Form::file("image",["id"=>"my-input"]) !!}  
                            </div>
                         </div>
                         <div class="modalInp mt-4">  {{ Form::Text('name',null,['class'=>'text-right']) }} </div>

                        {{ Form::button('تازەكردنەوە',["type"=>"submit",'class'=>'buton btn-block mt-4']) }}
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>


    @foreach ($errors->all() as $error )
           <div class="alert alert-danger alert-dismissible col-6 mx-auto mt-2"> 
                <p> {{$error}}</p>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            @endforeach
            
@endsection