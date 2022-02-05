
@extends('layouts.admin')

@section('body')
    <div class="col-5 col-md-3  col-lg-2 text-center mt-5 mb-5 modalButton" data-target="#addUser" data-toggle="modal" >
        <i class="fas fa-user-plus " style="font-size:20px;"></i> زیادكردن 
    </div>
     

        <div id="addUser" class="modal fade ">
            <div class="modal-dialog ">
                <div class="modal-content bg-light text-dark">
                    <div class="modal-body">
                        {{ Form::open(['method'=>"POST","url"=>"users","class"=>'from-group','files'=>true])  }}
                         <div class="modalInp"> {{ Form::Text("name",null,['placeholder'=>'users name ...']) }}        </div>
                         <div class="modalInp"> {{ Form::email("email",null,['placeholder'=>'example@gmail.com']) }}   </div>
                         <div class="modalInp"> {{ Form::password("password",['placeholder'=>'password']) }}           </div>
                         <div class="modalInp"> {{ Form::select('role_id',[''=>'choose option']+$roles,null) }}        </div>
                          {{ Form::submit("add user",['class'=>'buton btn-block mt-1']) }}

                        {{ Form::close() }}
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
  <div class="col-12 col-sm-10 col-md-9 mx-auto mt-3  text-dark row">
    
    @foreach ($users as $user )
        <div class="users col-12 cols-m-10 col-md-6 col-lg-4">
            <div class="card  card-user mx-auto bg-none mt-5 p-2">
                <a href="{{ url('users/'.$user->id.'/edit') }}" > <div class="card-body">
                    <p class="card-text text-center  h5">{{ $user->name  }}</p>
                    <p style="font-size:13px;text-align:center">{{$user->role->name}}</p>
                </div>
            
                @if($user->role->name=="shef")
                <p class="display-3 text-center ic"><i class="fad fa-hat-chef"></i></p>
                @elseif($user->role->name=="server")
                <p class="display-3 text-center ic"><i class="fal fa-concierge-bell"></i></p>
                @else
                <p class="display-3 text-center ic"><i class="fal fa-desktop"></i></p>
                @endif
                </a>
            </div>
        </div>
     @endforeach 
   
  </div>
@endsection