@extends('layouts.server')


@section("body")

<div class="container">
    <div class="col-12 col-sm-6 col-md-3 p-2 mx-auto  text-center">
        {!! Form::open(['method'=>"GET",'route'=>('orders.create')]) !!}
        
            {!! Form::button('ئامادەبوەكان <i class="fad fa-bread-loaf "></i>',['type'=>'submit','class'=>" buton btn-block "]) !!}
        
        {!! Form::close() !!}
    </div>
</div>


<div class="container-fuild show mx-auto row mt-3"
     style="box-shadow: 0 12px 10px -5px rgba(0,0,0,0.8) inset;"> 
  

</div> 
 
 <script>

    $(document).ready(function(){


        setTimeout(() => {
            display();
        }, 500);

        setInterval(()=>{
        display();
        },2000)
        

        function display(){
        var url="{{url('server/create')}}";
        $.ajax({
            url:url,
            type:"GET",
            success: function(res){
                $(".show").html(res);
            }
        }); 

        } 
    })
    
    </script> 
@endsection

