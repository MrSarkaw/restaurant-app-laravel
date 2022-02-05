<style>
    .smdiv{
        height: 170px;
        color:#cbced1;
        padding: 4px;  
        overflow: hidden;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .main{
        
    }
    i{
        color: #59b984;
    }
    .bxshdow{
        border-radius: 20px;
        box-shadow:-8px -8px 10px rgba(255, 255, 255,0.1 ) inset,
                    4px 4px 10px #000000 inset
                     ;
        height: 200px;
    }

.link{
    text-decoration: none !important;
}



</style>
@extends('layouts.admin')

@section('body')

<div class="col-12  col-md-6 col-lg-3 p-2  float-left mx-auto">
    <a href="{{route("users.index")}}" class="link">
        <div class="col-12 p-2 smDiv" >
              <div class="bxshdow"> 
                <center><i class="fa fa-users m-2" style="font-size:100px;"></i></center>
                 <p class="h4 text-center">ئەدمینەكان</p>
              </div> 
        </div>
    </a>
</div>


    
    <div class="col-12  col-md-6 col-lg-3 p-2 float-left">
        <a href="{{route('positions.index')}}" class="link">
            <div class="col-12  smDiv" >
                <div class="bxshdow"> 
                    <center><i class="fas fa-couch m-2" style="font-size:100px;"></i></center>
                    <p class="h4 text-center">شوێنەكان</p>
                </div>
            </div>
        </a>
     </div>
   

    
     <div class="col-12  col-md-6 col-lg-3 p-2 float-left">
        <a href="{{route('foodsAndDrinks.index')}}" class="link">
            <div class="col-12  smDiv" >
                <div class="bxshdow"> 
                    <center><i class="fas fa-burger-soda m-2" style="font-size:100px;"></i></center>
                    <p class="h4 text-center">خواردن و خواردنەوەكان</p>
                </div>
            </div>
        </a>
    </div>

    
    <div class="col-12  col-md-6 col-lg-3 p-2 float-left">
        <a href="{{route('orderAdmin.index')}}" class="link">
            <div class="col-12  smDiv" >
                <div class="bxshdow"> 
                    <center><i class="fas fa-sack-dollar m-2" style="font-size:100px;"></i></center>
                    <p class="h4 text-center">كڕدراوەكان</p>
                </div>
            </div>
        </a>  
    </div>
    
    
     <div class="col-12  col-md-6 col-lg-3 p-2 float-left">
        <a href="{{route('feedbacks.index')}}" class="link">
            <div class="col-12   smDiv" >
                <div class="bxshdow"> 
                    <center><i class="fas fa-comment-smile m-2" style="font-size:100px;"></i></center>
                    <p class="h4 text-center">قسەی موشتەری</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12  col-md-6 col-lg-3 p-2 float-left">
      <a href="{{route('raport.index')}}" class="link">
            <div class="col-12   smDiv" >
                <div class="bxshdow"> 
                    <center><i class="fas fa-file m-2" style="font-size:100px;"></i></center>
                    <p class="h4 text-center">ڕاپۆرت</p>
                </div>
            </div>
        </a>
    </div>
   
    <div class="col-12  col-md-6 col-lg-3 p-2 float-left">
      <a href="{{route('backup.index')}}" class="link">
            <div class="col-12  smDiv" >
                <div class="bxshdow"> 
                    <center><i class="fad fa-arrow-alt-from-left m-2" style="font-size:100px;"></i></center>
                    <p class="h4 text-center">باكئەپ</p>
                </div>
            </div>
        </a>  
    </div>

    

@endsection