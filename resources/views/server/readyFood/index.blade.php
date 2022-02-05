@extends('layouts.server')


@section("body")


<div class="container-fuild show mx-auto row p-1"> 
    @foreach($position as $row)
        @foreach($row->order()->get()->groupBy('positions_id') as $item=>$count)
            @foreach($count as $rows)
                @php $id= $rows->positions_id; @endphp
            @endforeach
          @php $count=$count->where('ready_status','=','1')->count(); @endphp
        @endforeach 
        
        @if($row->id==$id)
            <div class="col-12 col-md-3 mt-1">
                @if($row->status==2)

                <div class="col-12 text-center p-3 rounded" 
                style="box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.8) inset,
                         -2px -2px 5px rgba(255, 255, 255, 0.2) inset;
                       background:#59b984">

                @elseif($count>0)

                    <div class="col-12 text-center p-3 rounded"
                         style="box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.8) inset,
                                -2px -2px 5px rgba(255, 255, 255, 0.2) inset;
                                color:#59b984">

                @else
                <div class="col-12  text-center p-3 rounded"
                    style="box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.8) ,
                                      -2px -2px 5px rgba(255, 255, 255, 0.2) ;">
                @endif
                    <p>{{$row->name}} <i class="fad fa-chair"></i></p> 
                    @if($row->status==2)
                    <p>  هەموو خواردنەكان گەیەنراون <i class="fad fa-bread-loaf "></i></p>
                    @elseif($count>0)
                    <p>{{$count}} : خواردنی ئامادەبوو <i class="fad fa-bread-loaf "></i></p>
                    @else
                    <p>{{$count}} : خواردنی ئامادەبوو <i class="fad fa-bread-loaf "></i></p>
                    @endif

                    {!! Form::open(['method'=>"GET",'files'=>true,'url'=>('orders/'.$row->id)]) !!}
                     {!! Form::button('بینین',['type'=>'submit','class'=>'buton btn-block'])!!}
                    {!! Form::close() !!}
                   
                </div>
            </div> 
        @endif
    @endforeach

</div> 
 

@endsection

