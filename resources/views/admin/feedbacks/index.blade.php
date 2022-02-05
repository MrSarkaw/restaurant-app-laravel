@extends('layouts.admin')
@section('body')
 
<div class="col-12 col-md-10 col-lg-11 mx-auto row">

@foreach ($feedback as $row )
    

    <div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-3 ">
        <div class="card cardFeedback">
           <center> 
               <div class="iconsBar">
                                <i class="fas fa-user-circle topicon mt-3 i"></i> 
  
               </div>
            </center>
            <div class="card-body">
                
                <p class="card-text">{{ $row->feedback }}</p>
              
                <p class="text-right d-inline clock">{{ $row->created_at->diffForHumans() }} </p>
            </div>
            <div >
                {!! Form::open(['method'=>'DELETE','url'=>('feedbacks/'.$row->id)]) !!}
                    {!! Form::button(' <i class="fas fa-trash-alt ml-3 h3 "></i>',['type'=>'submit' , 'class'=>'trashbtn']) !!} 
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endforeach
</div>



@endsection

