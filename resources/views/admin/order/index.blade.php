@extends('layouts.admin')

@section('body')
<div class="container-fuild show mx-auto row"> 

    @foreach($order as $id=>$row)
        @foreach($row as $row2)
           @php $newRow=$row2 @endphp
        @endforeach
          
            @php $positions=$newRow->positions()->get(); @endphp
          @foreach($positions as $rowPos)
         
           <div class='col-6 col-md-4 col-lg-3 mt-2'>
       
                <div class="card  cardPosition p-1">
      
                    <div class="card-header text-center ">   
                                {{$rowPos->name}} <i class="fas fa-chair"></i>
                                                        </div>
              
                    <div>
                            <img src="http://localhost/restaurant/www/public/wallpaper/table.jpg"  class=" imgT">
                        </div>
              
 
                    <div class="card-body">   
                        <a href='{{route("orderAdmin.show",$rowPos->id)}}' class="buton btn-block ">بینینی خواردن</a>
                    </div>
                    
                  </div>
 
          </div>
            
        @endforeach
     @endforeach
    
    {{-- @foreach($positions as $row)
          
     
   
    @endforeach --}}

</div> 
@endsection

