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


.cardPosition ,.cardPositionDone {
        background:none;
        overflow: hidden;
        transition: .7s;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.8)  ,
                        -2px -2px 5px rgba(255, 255, 255, 0.2) ;
    }
      .imgT{
        width: 100%;
        border-radius: 20px;
        border:1px solid #1d1d1d !important;
    }
    
    .cardPosition > *,.cardPositionDone>*{
        position: relative;
    }
    .cardPosition > .card-header{
        color: #cbced1 ;
    }

    a{
        color: #cbced1 !important;

    }

    .cardPosition  .btn ,.cardPositionDone{
        border-radius: 15px ;
    }
    
    .cardPositionDone::before{
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: #59b984; 
        clip-path: circle(150px at 20% 80% );
        left: 0px;
        top: 0px;
        transition: .7s;
    }
   
   
    

    
    .order-card-ready{
        background: #76b852;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.8) inset,
                    -2px -2px 5px rgba(255, 255, 255, 0.2) inset;
        color: white;height: 150px;
        border:none;
        text-align: center;
    }
    .order-card-noready{
        background: none;
        color: white;height: 150px;
        border:none;
        text-align: center;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.8) inset,
                    -2px -2px 5px rgba(255, 255, 255, 0.2) inset;
    }


    .alert{
        border-radius: 20px;
        background: #00c6ff; 
        background: -webkit-linear-gradient(to right, #0072ff, #00c6ff); 
        background: linear-gradient(to right, #0072ff, #00c6ff);
        font-size: 18px;color: white;
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

    .butonDel{        
            background: #a12f2f;
            border-radius: 20px !important;
            border:none;
            outline: none !important;
            padding: 7px;
            font-weight: 800;
            color: #cbced1;
            text-align: center;
            cursor: pointer;
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
    a{
        text-decoration: none !important;
    }
        
    
    </style>
    <title>restaurant</title>
</head>
<body >
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