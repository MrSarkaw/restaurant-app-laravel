<style>
    #back{
            color:white ;
            transition: .5s
        }

        #back:hover{
            color:moccasin;
        }

    @media only screen and (max-width:510px){
        .t{
            font-size: 10px;
            font-weight: bold
        }
        
    }
    </style>
    @extends('layouts.admin')
    
    @section('body')
    <div class="col-12 row">
       <div class="iconsBar"> 
            <a href="{{route('users.index')}}" id="back">
                <i class="fad fa-arrow-alt-circle-left i "></i>
            </a>
        </div>

            <div class=" col-12 col-md-6 col-lg-5  editDiv mx-auto text-center mt-4"> 
               
                    <p class="h5 mt-2  text-white ">{{ $uEdit->name }}</p>
                    <p class="h6 mt-2  text-success ">{{ $uEdit->role->name }}</p>
                
                <div class="col-12 text-center ">
                    <button class="editButton btn-block col-5 float-left text-center" data-target="#edit" data-toggle="modal">edit</button>
                {{ Form::model($uEdit,['route'=>['users.destroy',$uEdit->id],'method'=>'DELETE','class'=>" float-right col-5 p-0"]) }}    
                    {{ Form::submit('delete',['class'=>'deleteButton btn-block']) }}
                {{ Form::close() }}
             </div>
            
            </div>

        </div>
      
       
    
            
    
        <div id="edit" class="modal fade ">
            <div class="modal-dialog ">
                <div class="modal-content bg-light text-dark">
                    <div class="modal-body">
                        {{ Form::model($uEdit,['route'=>['users.update',$uEdit->id],'method'=>'PATCH']) }}    
                        <div class="modalInp"> {{ Form::text('name',null,['placeholder'=>' change users name ...']) }}         </div>
                        <div class="modalInp"> {{ Form::email('email',null,['placeholder'=>'change email']) }}                 </div>
                        <div class="modalInp"> {{ Form::password('password',['placeholder'=>'change passowrd !'])   }}    </div>
                        <div class="modalInp"> {{ Form::select('role_id',[''=>'change role']+$roles,null) }}                                         </div>
                         {{ Form::submit('update',['class'=>'buton mt-2 btn-block']) }} 
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
        <div class="users col-12 col-sm-10 col-md-6 col-lg-4">
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