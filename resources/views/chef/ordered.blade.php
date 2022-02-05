@extends('layouts.chef')

@section('body')
<div class="show">
</div>





<script>
$(document).ready(function(){

setInterval(() => {
    display();
}, 4000);

setTimeout(() => {
    display();
}, 500);

function display(){
    var url="{{url('shef/'.$positions->id.'/showOrdered')}}";
        $.ajax({
            url:url,
            type:"GET",
            success: function(res){
                $('.show').html(res);
            }
        }); 

    }
})
</script>
@endsection