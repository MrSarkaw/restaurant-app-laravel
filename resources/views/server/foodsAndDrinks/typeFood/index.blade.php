
@extends('layouts.server')

@section('body')
<div class="col-10 col-sm-10 col-md-6 col-lg-4 mb-5">
    <div class="float-left iconsBar"> 
        <a onclick="goBack()">
           <i class="fad fa-caret-circle-left i"></i>
       </a>
    </div>  
</div>
<script>
    function goBack() {
      window.history.back();
    }
    </script>
@endsection

@section('footer')

<br>
<div class="row">
    <div class="order container">

    </div>

@if(count($typeFood)>0)
    @foreach($typeFood as $row)

    <div class="card cardTypefood col-9  col-md-4 col-lg-3 mx-auto p-2 mt-1">
        <div class="col-12 cardDet">
        <h5 class="text-center mt-2 p-1">{{$row->name}} <i class="fad fa-knife-kitchen"></i></h5>
        <div class="div-image">
             <img class="card-img" src="http://localhost/restaurant/www/public//wallpaper/{{$row->image}}" alt="">
        </div>
            <div class="row p-2">
                <p class="h6  col-6 text-center">{{ $row->price }} <i class="fad fa-dollar-sign"></i> : نرخ </p>
                @if($row->size!=null)
                <p class="h6 col-6 text-center"> سایز : {{ $row->size }} <i class="fas fa-sort-size-up-alt"></i>   </p>
                @endif  
            </div>
            
            <div class="p-1 col-12">
                {!! Form::open(['method'=>"POST","url"=>"server","class"=>'from-group orderform','files'=>true]) !!}
                {!! Form::hidden("id",$row->id)!!}
                {!! Form::hidden('positionSession',$positionSession) !!}
                    {!! Form::button(' داواكردن <i class="fad fa-plus-circle"></i>',['type'=>"submit",
                                                                                    'class'=>"buton btn-block  btnorder "]) !!}
                {!! Form::close() !!}
            </div>

        </div>
    </div>
    @endforeach 



       
    <script>


        $(document).ready(function () {
                   $(".orderform").submit(function (e) { 
                       e.preventDefault();
                       var link=$(this).attr("action");
                       var data=new FormData(this);
                       $.ajax({
                           processData:false,
                           cache:false,
                           contentType:false,
                           type: "POST",
                           data:data,
                           url:link,
                           success: function (response) {
                            $('.order').append(response);   
                             
                           }
                       });
                   });
            })
                
            </script>


@else
<p class="alert alert-info text-center col-12 h5">هیح خواردنیك بەردەست نییە لەم بەشە</p>
@endif
</div>

@endsection


