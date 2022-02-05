<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
</head>
    
    <style>
    
    body{
        
        font-family: "NRT";
        background-color: #1d1d1d !important;

        
    }
    ::-webkit-scrollbar {
     width: 10px;
    }
    ::-webkit-scrollbar-thumb {
        background:  #398d5f;     
         

    }
    @font-face{
        src: url("fonts/NRT.ttf");
        font-family: "NRT";
    }


/*  position   */

.cardPosition  ,.cardPositionOrder ,.cardPositionWaiting ,.cardPositionDone  {
        background:none;
        overflow: hidden;
        transition: .7s;
        box-shadow:4px 4px 10px rgba(0, 0, 0, 0.8)  ,
                        -2px -2px 5px rgba(255, 255, 255, 0.2) ;
    }
      .imgT{
        width: 100%;
        border-radius: 20px;
        border:1px solid #1d1d1d;
    }
    
    .cardPosition > * ,.cardPositionDone > * ,.cardPositionWaiting>* ,.cardPositionOrder>*{
        position: relative;
    }
  

    .cardPosition  .btn ,.cardPositionDone .btn , .cardPositionOrder .btn {
        border-radius: 15px ;
    }
    
    .cardPositionDone::before{
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: #59b984;
        clip-path: circle(200px at 100% 0%);
        left: 0px;
        top: 0px;
        transition: .7s;
        border-radius: 4px;
    }
    
    .cardPositionOrder::before{
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: #398d5f;
        clip-path: circle(80px at 3% 99%);
        left: 0px;
        top: 0px;
        transition: .7s;
        border-radius: 4px;
    }
   
    a{
        text-decoration: none !important;
        color: #cbced1 !important;
    }

    /* card-food */
    .card-food{
        background: none;
        border:none;
        
    }
    .det{
        background: none;
        box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.8),
                    -2px -2px 5px rgba(255, 255, 255, 0.2);
        color: #cbced1 !important;
    }
    .det *{
        position: relative;
        
    }
    .card-food > .det{
       
        border-radius: 20px;
        overflow: hidden;
    }
   
    .card-food img{
        border-radius: 10px;
    }


    .modalFeed{
        background: #1d1d1d;
    }
    .modalFeed textarea{
        background: none;
        color: #59b984 !important;
        outline: none;
        border: none;
    }

    .cardTypefood{
        background: none;
        border:none;
        
    }
    .cardTypefood .cardDet{
        background:none;
        border-radius: 30px;
        transition: .4s;
        box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.8),
                    -2px -2px 5px rgba(255, 255, 255, 0.2);
        color: #cbced1 !important;
        }   

    
   .cardTypefood .div-image , .card-food .div-image{
       width: 100%;
       height: 140px;
       border-radius: 20px;
       overflow: hidden;
   }
    
    .order-card{
        background: none; 
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.8) ,
                    -2px -2px 10px rgba(255, 255, 255, 0.2) ;
        color: white;height: 150px;
        border:none;
        text-align: center;
        color: #cbced1;
    }

    .alert{
        border-radius: 20px;
        background: #59b984; 
        font-size: 18px;color: white;
        border:none;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.8) inset,
                    -2px -2px 10px rgba(255, 255, 255, 1) inset
    }

    .iconsBar{
    border-radius: 50%;
    box-shadow: 4px 4px 10px #151515 inset,
                -4px -4px 10px #000000 inset;
    width: 50px;
    height: 50px;
    font-size: 30px;
    
}
.iconsBar .i{
    text-shadow: 0px 0px 20px #59b984;
    display: flex;
    justify-content: center;
    align-items: center;   
    color: #59b984 !important;
    position: relative;
    top: 10px;

}
 
.buton{        
    background: #398d5f;
    border-radius: 20px !important;
    border:none;
    outline: none !important;
    padding: 7px;
    font-weight: 800;
    color: #cbced1;
    text-align: center;
    cursor: pointer;
    border:1px solid #1d1d1d;
}
    

    
    </style>
    <title>restaurant</title>
</head>
<body >

    <div class="col-12">

        <nav class="navbar  shadow-sm" >
            <div class="container">
               
                <div id="navbarSupportedContent" class="col-12">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav  float-left">
                       <div class="iconsBar">
                            <a href="{{url('/')}}" ><i class="fad fa-home i"></i></a>
                       </div>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                           
                        @else
                            <li class="nav-item float-right">
                               

                                <div class="float-right">
                                    <a class="text-light link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <div class="iconsBar">
                                           <i class="fad fa-power-off i"></i>
                                        </div> 
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="col-sm-12 mx-auto  text-light mt-3">
        @yield('body')
        
    </div>

    <div class="col-sm-12 mx-auto  text-light ">
        @yield('footer')
       
       
       



    </div>

</body>
</html>