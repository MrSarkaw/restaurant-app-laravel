@extends('layouts.server')
@section('body')
    <div class="iconsBar">
        <a href="{{route('orders.create')}}">
            <i class="fad fa-caret-circle-left i"></i>
        </a> 
    </div>
    <div class="col-10 row mx-auto">
        @foreach($order as $row)
            @foreach($row->orders()->get() as $rows)
                <div class="col-6 col-md-4 col-lg-3 p-2">
                    @if($row->ready_status=="2")
                    <div class="col-12  rounded p-3"
                         style="box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.8) inset,
                         -2px -2px 5px rgba(255, 255, 255, 0.2) inset;
                         background:#59b984" >
                    @else
                    <div class="col-12 rounded p-3"
                        style="box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.8) inset,
                        -2px -2px 5px rgba(255, 255, 255, 0.2) inset;">
                    @endif
                        <p class="h5 text-center">{{$rows->name}}</p>
                    
                    @if($row->ready_status=="1")
                        {!! Form::open(['method'=>"PATCH",'files'=>true,'url'=>('orders/'.$row->id)]) !!}
                        {!! Form::button('گەیاندن',['type'=>'submit','class'=>'buton btn-block '])!!}
                        {!! Form::hidden('id',$id)!!}
                       {!! Form::close() !!}
                    @endif
                    </div>
                </div>
            @endforeach
         @endforeach
    </div>
@endsection