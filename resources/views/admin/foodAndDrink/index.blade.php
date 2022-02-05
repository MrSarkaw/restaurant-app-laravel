@extends("layouts.admin")
@section('body')
<div class="iconsBar mt-4 mb-4">
<i class="fad fa-plus  text-primary  i" data-target="#addfood" data-toggle="modal"></i>
</div>


<div id="addfood" class="modal fade ">
    <div class="modal-dialog ">
        <div class="modal-content bg-light text-dark">
            <div class="modal-body">
                {!! Form::open(['method'=>"POST","url"=>"foodsAndDrinks",'files'=>true]) !!}
                 <div class="custom-file">
                    <div class="modalInp mt-3">
                        {!! Form::file("image",["id"=>"my-input",'class'=>""]) !!} </div> 
                </div>
                <div class="modalInp mt-4">  {!! Form::Text("name",null,['placeholder'=>'جۆریخوارن','class'=>"text-right pr-4"]) !!}  </div>             
                    {!! Form::submit("زیادكردن",['class'=>'buton btn-block mt-1']) !!}
                {!! Form::close() !!}
              
            </div>
            
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

@section('footer')
<p class="h4 text-center mb-5" style="color: #59b984;">جۆری خوارنەكان و خواردنەوەكان</p>

<div class="col-12 row  mx-auto" 
        style="box-shadow: 0 12px 10px -5px rgba(0,0,0,0.8) inset;
                border-radius:20px;">
    @foreach ($foodsAndDrinks as $row )
    <div class="card-food card mt-4 p-2 col-12 col-sm-6 col-md-4 col-lg-4 mx-auto">    
        
        <div class=" det col-12 p-1">
                <div class="pname">
                  <p class="text-center p-2 ">{{$row->name}} <i class="far fa-utensil-fork"></i></p>
                </div>
                    <div class="div-image"> 
                        <img class="card-img-top" src="http://localhost/Restaurant/www/public/wallpaper/{{$row->image}}" alt="" >
                    </div>
                <div class="card-body mx-auto col-12 row">
                <a class="editButton btn-block" href="{{route('foodsAndDrinks.edit',$row->id)}}">دەستكاری كردن <i class="fas fa-cogs"></i></a>
                <a class="buton btn-block " href="{{route("types.show",$row->id)}}">بینینی خواردن <i class="fad fa-eye"></i></a>
                </div>
        </div>
    </div>
    @endforeach

</div>
@endsection