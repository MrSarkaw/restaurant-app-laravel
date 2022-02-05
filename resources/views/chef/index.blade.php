@extends('layouts.chef')


@section('body')
<div class="show row"> 
  

</div> 
@endsection

<script>

setInterval(() => {
    display();
}, 3000);

setTimeout(() => {
    display();
}, 100);

function display(){
        var url="{{url('shef/create')}}";
        $.ajax({
            url:url,
            type:"GET",
            success: function(res){
                $(".show").html(res);
            }
        }); 

        } 

</script>