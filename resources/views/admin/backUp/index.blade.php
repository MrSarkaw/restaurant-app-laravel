@extends('layouts.admin')
@section('body')
    <div class="col-12 col-md-6 alert  mx-auto">
        {!! Form::open(['method'=>'post','url'=>('backup'),'files'=>true]) !!}
            {!! Form::button(' <i class="fas fa-database"></i> وەرگرتنی باك ئەپی تازە  ',
                            ['type'=>'submit','class'=>'btn btn-block',"style"=>"background:none;color:#cbced1;font-size:20px"]) !!}
        {!! Form::close()!!}
    </div>
@endsection