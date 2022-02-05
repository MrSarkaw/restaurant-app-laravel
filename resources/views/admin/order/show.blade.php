@extends('layouts.admin')

@section("body")

<div class="col-10 col-sm-10 col-md-6 col-lg-4 ">
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

<br>
<br>
<br>
<br>
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


 @foreach($order as $row)
    @foreach ($row->orders()->get() as $item)
@php $price=$price+$item->price @endphp 
    @endforeach
@endforeach
<p class="alert text-center clear-both col-12">
 {{$price}} : كۆی گشتی
</p>
</div>



<div class="col-12 mx-auto row">
    {!! Form::open(['method'=>"PATCH","url"=>("orderAdmin/".$id_position),'class'=>'col-12 p-0 col-md-3 ']) !!}
     {!! Form::button('<i class="fad fa-save"></i> پاراستن',['type'=>"submit",'class'=>"buton btn-block col-12 "]) !!}
    {!! Form::close() !!}

    <button class="buton float-right col-12 col-md-3  ml-2" id="print"><i class="fad fa-print"></i> پرێنت كردن</button>
    

</div>


<script>
$('#print').click(function(){
    $('.container').printThis();
})
</script>

@endsection