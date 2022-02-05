@extends('layouts.admin')

    @section('body')

    <div class="col-10 col-md-10 mx-auto row ">
        {!! Form::open(['method'=>"GET",'url'=>("raport/create"),'class'=>"col-11 row "]) !!}
            <div class="col-11 ml-1 col-md-5 selects">
                {!! Form::select('month',[
                    ''=>'مانگ هەڵبژێرە',
                    '1'=>'1',
                    '2'=>'2',
                    '3'=>'3',
                    '4'=>'4',
                    '5'=>'5',
                    '6'=>'6',
                    '7'=>'7',
                    '8'=>'8',
                    '9'=>'9',
                    '10'=>'10',
                    '11'=>'11',
                    '12'=>'12',

                    ],null) !!}
            </div>

            <div class="col-11 col-md-5 ml-1 selects">
                  {!! Form::number('year',null,['placeholder'=>"ساڵ بنووسە"]) !!}
            </div>
            {!! Form::submit('گەڕان',['class'=>" btn-block buton mt-3"]) !!}
        {!! Form::close() !!}
       
    </div>


    @endsection