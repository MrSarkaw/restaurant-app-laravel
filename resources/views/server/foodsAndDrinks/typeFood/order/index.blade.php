@extends('layouts.server')

@section("body")

<div class="col-10 col-sm-10 col-md-6 col-lg-4 mb-5">
    <div class="float-left iconsBar"> 
        <a onclick="goBack()">
           <i class="fad fa-caret-circle-left i"></i>
       </a>
    </div>  
</div>
<br>
<script>
function goBack() {
    window.history.back();
  }
  </script>
<div class="col-12 p-3 mt-3 mb-4" style="box-shadow: 0 12px 10px -5px rgba(0,0,0,0.8) inset;">
<p class="text-center mt-2 h3" style="color:#59b984">داواكراوەكان</p>
</div>

<div class="container row mx-auto">
    @foreach($foods as $detail=>$count)
        @foreach($count as $row)
        @php $counts=$row @endphp
         @endforeach
             @foreach( $counts->orders()->where('id','=',$detail)->get()->groupBy('name') as $row=>$countname)
                @foreach($countname as $rows)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-2 mt-2">
                            <div class="card order-card col-12">
                                <div class="card-body">
                                
                             
                                    <p class="card-title">{{ $count->count() }} <br>     {{$rows->name}}</p>
                                    @if($rows->size!=null)
                                    <p>{{ $rows->size }} <i class="fas fa-sort-size-up-alt"></i> </p>
                                    @endif 

                                    
                                </div>
                            </div>
                        </div>
             @endforeach
         @endforeach
     @endforeach
</div>



<div class="col-12  mt-5 p-3"
    style="box-shadow: 0 12px 10px -5px rgba(0,0,0,0.8) inset;">
    <p class="text-center mt-2 h3" style="color:#59b984">لابردن</p>
    </div>

<div class="container row mx-auto">

@if(count($order)>0)
@foreach($order as $row)
    @foreach ($row->orders()->get() as $item)
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-2 mt-2">
            <div class="card order-card col-12">
                {!! Form::open(['method'=>"DELETE",'class'=>'formdelete','url'=>('orders/'.$row->id)]) !!}
                    {!! Form::hidden('id',$row->id) !!}
                    <p class="text-right"> {!! Form::button('<i class="fas fa-minus-circle"></i>',['type'=>'submit','class'=>'btn btn-danger']) !!}</p>
                 {!! Form::close() !!}
               
                <div class="card-body" style="position:relative;top:-20px;">
                    <p class="card-title">{{$item->name}}</p>
                    @if($item->size!=null)
                    <p>{{ $item->size }} <i class="fas fa-sort-size-up-alt"></i> </p>
                    @endif
                    
                </div>
            </div>
        </div>
       
    @endforeach
@endforeach
@else
        <p class="alert alert-warning text-center col-6 mx-auto mt-2">هیچ خواردنێك داوا نەكراوە</p>

@endif
</div>
        
<script>
    $(document).ready(function () {
                   $(".formdelete").submit(function (e) { 
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
                           alert(response);   
                             
                           }
                       });
                   });
            })
</script>
     

@endsection