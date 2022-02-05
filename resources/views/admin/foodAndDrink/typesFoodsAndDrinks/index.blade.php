@extends('layouts.admin')

@section('body')
<div class="col-10 col-sm-10 col-md-6 col-lg-4 mx-auto mb-5">
    <div class="float-left iconsBar"> 
        <a href="{{route('foodsAndDrinks.index')}}">
           <i class="fad fa-caret-circle-left i "></i>
       </a>
    </div> 
    <div class="float-right iconsBar"> 
        <a href="" data-target="#addType" data-toggle="modal">
           <i class="fad fa-plus-circle i"></i>
       </a>
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



<div id="addType" class="modal fade text-dark">
    <div class="modal-dialog " >
        <div class="modal-content">
            
           
            <div class="modal-body ">
                {!! Form::open(["method"=>"POST","files"=>true,"route"=>["types.store"]]) !!}
                   
                <div class="modalInp"> 
                    {!! Form::Text("name",null,
                                        ["class"=>"text-center","placeholder"=>"ناوی خواردن"]) !!} 
                        </div>
                
                    <div class="custom-file">
                        <div class="modalInp mt-2">
                             {!! Form::file("image",["id"=>"my-input"]) !!}   
                        </div>  
                    </div>

                    <div class="modalInp mt-3">
                          {!! Form::select("size",
                        [""=>'ئەگەر سایزی هەیە هەلی بژێرە','بچوك'=>"بچوك",'ناوەند'=>"ناوەند",'گەورە'=>"گەورە"]
                        ,null) !!} 
                    </div>

                    <div class="modalInp mt-2">
                         {!! Form::number("price",null,['class'=>"text-center",'placeholder'=>'نرخ']) !!}
                    </div>

                    {!! Form::submit("زیادكردن",['class'=>'buton btn-block mt-4']) !!}
                    
                {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>


@endsection

@section('footer')

<br>
<div class="row">
    
@if(count($typeFood)>0)
    @foreach($typeFood as $row)

    <div class="card cardTypefood col-12 col-sm-6 col-md-4 col-lg-3 mx-auto p-2 mt-1">
        <div class="col-12 cardDet">
        <h5 class="text-center mt-2 p-1">{{$row->name}} <i class="fad fa-knife-kitchen"></i></h5>
        <div class="div-image">
             <img class="card-img" src="http://localhost/Restaurant/www/public/wallpaper/{{$row->image}}" alt="">
        </div>
            <div class="row p-2">
                <p class="h6  col-6 text-center">{{ $row->price }} <i class="fad fa-dollar-sign"></i> : نرخ </p>
                @if($row->size!=null)
                <p class="h6 col-6 text-center"> سایز : {{ $row->size }} <i class="fas fa-sort-size-up-alt"></i>   </p>
                @endif  
            </div>
            <div class="p-1 col-12">
                <a href="{{ route('types.edit',$row->id) }}" class="buton btn-block mx-auto"><i class="fad fa-cog"></i></a>
            </div>
        </div>
    </div>
    @endforeach 

@else
<p class="alert alert-info text-center col-12 h5">هیح خواردنیك بەردەست نییە لەم بەشە</p>
@endif
</div>
@endsection