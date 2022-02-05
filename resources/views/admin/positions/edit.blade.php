@extends('layouts.admin')

@section('body')
<a href="{{route('positions.index')}}">
   <div class="iconsBar"><i class="fad fa-caret-circle-left  i"></i></div> 
</a> 


<div class="col-12 col-md-9 col-lg-4 mx-auto boxDiv">
    {!! Form::model($editPosition,['url'=>'positions/'.$editPosition->id,'method'=>'PATCH']) !!}
     <div>
        {!! Form::text('name',null,['class'=>'inp text-center ','placeholder'=>'ناوی مێز']) !!} </div>
        {!! Form::submit('تازەكردنەوە',['class'=>'mt-3 buton btn-block']) !!}
    {!! Form::close() !!}

</div>
    @foreach ($errors->all() as $error )
           <div class="alert alert-danger alert-dismissible col-12 col-sm-9 col-md-6 mx-auto mt-2"> 
                <p> {{$error}}</p>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            @endforeach


@endsection

@section('footer')
<div class="col-10 mx-auto row mb-5"> 
    @foreach ($pos as $row )
        <div class=" p-2 col-12 col-md-6 col-lg-4  mt-2 ">
            <div class="card col-12 cardPosition p-0">
                <div class="m-1" ><img src="http://localhost/Restaurant/www/public/wallpaper/table.jpg" alt="" class="imgT"></div>
                <div class="card-header text-center ">
                    {{ $row->name }} <i class="fas fa-chair"></i>
                </div>
                
                <div class="card-body row" style="box-shadow:0px 0px 20px black;">
                  {!! Form::model($row,['method'=>"DELETE",'files'=>true,"class"=>' col-sm-12 col-lg-6 mt-2 p-0','url'=>('positions/'.$row->id)])!!}
                    {!! Form::submit('سڕینەوە', ["class"=>'btn-block deleteButton ']) !!}
                  {!! Form::close() !!}  
                  
                  
                <a href="{{url('positions/'.$row->id.'/edit')}}"  class="editButton col-sm-12  col-lg-6 mt-2 ">دەستكاری</a>
                </div>
            </div>
        </div>
        @endforeach
    
        
    </div> 


@endsection