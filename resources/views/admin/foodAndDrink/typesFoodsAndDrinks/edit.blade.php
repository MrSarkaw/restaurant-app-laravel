@extends("layouts.admin")

@section("body")
<div class="iconsBar">
  <a href="{{route('types.show',$idType)}}">
    <i class="fad fa-caret-circle-left i"></i>
</a>  
</div>

<div class="card cardTypefood col-12 col-sm-6 col-md-6 col-lg-4 mx-auto p-2 mt-1">
    <div class="col-12 cardDet">
    <h5 class="text-center mt-2 p-1">{{$food->name}} <i class="fad fa-knife-kitchen"></i></h5>
    <div class="div-image">
         <img class="card-img" src="http://localhost/Restaurant/www/public/wallpaper/{{$food->image}}" alt="">
    </div>
        <div class="row p-2 ">
            <p class="h6  col-6 text-center">{{ $food->price }} <i class="fad fa-dollar-sign"></i> : نرخ </p>
            @if($food->size!=null)
            <p class="h6 col-6 text-center"> سایز : {{ $food->size }} <i class="fas fa-sort-size-up-alt"></i>   </p>
            @endif  
        </div>
        <div class="p-1 col-12">
            <button class="editButton  btn-block mx-auto" data-target="#upDate" data-toggle="modal" ><i class="fad fa-cog"></i></button>
            
            {!! Form::open(["method"=>"DELETE","url"=>('types/'.$food->id)]) !!}
                {!! Form::button('<i class="fad fa-dumpster"></i>',["type"=>"submit","class"=>"mt-1 deleteButton btn-block"]) !!}
            {!! Form::close() !!}
     </div>
    </div>
</div>


<div id="upDate" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                {!! Form::model($food,["method"=>"PATCH","files"=>true,'url'=>("types/".$food->id)]) !!}
                   
                <div class="modalInp">    {!! Form::file("image",["id"=>"my-input"]) !!}                                </div>
                <div class="modalInp">    {!! Form::Text("name",null,["class"=>"text-center"]) !!}         </div>
                <div class="modalInp">    {!! Form::number("price",null,["class"=>"l text-center mt-1"]) !!} </div>
                <div class="modalInp">    {!! Form::select("size",[""=>"ئەگەر سایزی هەیە هەڵیژێرە",
                                             "بچووك"=>"بچووك","ناوەند"=>"ناوەند",
                                             "گەورە"=>"گەورە"],null,["class"=>" mt-1"]) !!}                </div>
                    {!! Form::button('تازەكردنەوە <i class="fad fa-pen-square"></i>',['type'=>'submit','class'=>'buton mt-1 btn-block']) !!}
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