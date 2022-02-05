<!DOCTYPE html>
<html lang="en">

    <script type="text/javascript">
        var omitformtags=["input", "textarea", "select"]
        omitformtags=omitformtags.join("|")
        function disableselect(e){
        if (omitformtags.indexOf(e.target.tagName.toLowerCase())==-1)
        return false
        }
        function reEnable(){
        return true
        }
        if (typeof document.onselectstart!="undefined")
        document.onselectstart=new Function ("return false")
        else{
        document.onmousedown=disableselect
        document.onmouseup=reEnable
        }
        </script>
        
        
        <script type="text/javascript">
       // document.addEventListener('contextmenu', event => event.preventDefault());

        //<![CDATA[
        function nocontext(e) {
        var clickedTag = (e==null) ? event.srcElement.tagName : e.target.tagName;
        if (clickedTag == "IMG") {
        alert(alertMsg);
        return false;
        }
        }
        var alertMsg = "ناتوانیت ئەمە لەبەربگریتەوە";
        document.oncontextmenu = nocontext;
        //]]>
        </script>
        
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <script src="http://localhost/restaurant/www/public/printThis.js"></script>
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

    .cardPosition{
        background:none;
        transition: .7s;
        box-shadow: 7px 7px 10px rgba(0, 0, 0, 0.8),
                    -2px -2px 10px rgba(255, 255, 255, 0.2);
    }
    
    .cardPosition > * {
        position: relative;
    }
    .cardPosition > .card-header{
        color: #0092ff ;
    }

    .cardPosition  .btn {
        border-radius: 15px ;
    }
    
    .cardPosition:hover::before{
        top: 0px;
    }


    /*  feedback   */
    .cardFeedback{
        background: none;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.8) inset ,
                    -2px -2px 5px rgba(255, 255, 255, 0.2) inset;   
                    
        color: #59b984;
        text-shadow: 0px 0px 20px #59b984;            
         }
    i{
        transition: .4s;
    }
    .cardFeedback:hover  .topicon {
        transform: rotate(360deg);
    }

    .cardFeedback > .card-footer{
        background: none; 
        order:none !important;
       
    }

    .cardFeedback  .card-text{
        background: none;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.8) ,
                    -2px -2px 5px rgba(255, 255, 255, 0.2);
        text-align: center; padding: 10px;
        border-radius: 20px;
    }

    .cardFeedback .card-footer i:hover {
        color: red !important;
        animation: trash 3s infinite;
    }
    .cardFeedback .clock{
        font-size: 12px;
        
    }
    .trashbtn{
        background: none ;
        border:none;
        color: #59b984;
        text-shadow: 0px 0px 20px #59b984;
    }


/* card user */
    .users{
    }
    .card-user{
        background: none;
        overflow: hidden;
        color: #59b984;
        padding:20px !important;
        border:none;
        box-shadow: 5px 5px 20px #000000 ,
                    -2px -2px 10px rgba(255, 255, 255, 0.2);
        margin-top: 10px;
    }
    a {
        color: #cbced1;
    }
    a p , a .ic {
        color: #59b984;
    }
    a:hover {
        color: #cbced1;
        text-decoration: none;
    }
    a:hover .ic{
        color: #cbced1;
    }
    .card-user *{
        position: relative;

    }
    .card-user::before{
        content: '';
        width: 100%;
        height: 100%;
        position: absolute;
        background-color: #59b984;
        top:100%;
        left: 0px;
        transition: .4s;

    }
    .card-user:hover::before{
        top: 50%;
    }
    .card-user:hover > .ic{
        color:  #1d1d1d;
    }
    .ic{
        text-shadow: 4px 8px 30px #000000;
    }

    /* card food */

    .card-food{
        background: none;
        border:none;
        
    }
    .det *{
        position: relative;
    }
    .card-food > .det{
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 1),
                    -2px -2px 10px rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 40px;
    }
    .card-food  .pname{
        background-color: none;
        border-radius: 10px;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 1) inset,
                    -2px -2px 10px rgba(255, 255, 255, 0.2) inset;
        color: #59b984
    }
    .card-food img{
        border-radius: 10px;
    }


    .modal-body{
        background: #1d1d1d; 
        color: white !important;
        padding:20px !important;
    }

    .modalInp{
        width: 100%;
        padding:8px;
        box-shadow: 4px 4px 10px #000000 inset,-4px -4px 10px #555 inset; 
        border-radius: 20px;
        margin-top: 10px;
    }
    .modalInp input{
        width: 95%;
        background: none;
        outline: none;        
        border:none;
        color: #cbced1;
        padding-left: 20px;
    }
    .modalInp select{
        width: 100%;
        background: none;
        border:none;outline: none;
        color: #cbced1;
        
    }
    

    .cardTypefood{
        background: none;
        border:none;
        color: #cbced1 !important;

    }
    .cardTypefood .cardDet{
        background: none;
        border-radius: 20px;
        transition: .4s;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.8),
                    -2px -2px 5px rgba(255, 255, 255, 0.2);
        }

    
   .cardTypefood h5 {
       border-radius: 10px;
   }
   .cardTypefood .div-image , .card-food .div-image{
       width: 100%;
       height: 250px;
       border-radius: 20px;
       overflow: hidden;
   }
    
    
    @keyframes trash{
        20%{
            transform: rotate(20deg);
        }
        40%{
            transform: rotate(-20deg);
        }
        60%{
            transform: rotate(20deg);
        }
        80%{
            transform: rotate(-20deg);
        }
    }


    @media only screen and (max-width:1005px){
        .cardFeedback .card-text{
            font-size: 14px;
        }

    @media only screen and (max-width:515px){
        .cardFeedback .card-text{
        font-size: 13px;
    }

    }
    }


    .cardPosition  ,.cardPositionOrder ,.cardPositionWaiting ,.cardPositionDone  {
        background:none;
        overflow: hidden;
        transition: .7s;
    }
      .imgT{
        width: 100%;
        border-radius: 20px;
    }
    
    .cardPosition > * {
        position: relative;
    }
    .cardPosition > .card-header{
        color: #cbced1 ;
    }

   
   
 
  
    .order-card{
        background:none;
        color: white;height: 150px;
        border:none;
        text-align: center;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.8) inset,
                    -2px -2px 5px rgba(255, 255, 255, 0.2) inset;
        color: #59b984;
        text-shadow: 0px 0px 20px #59b984;
    }

    .alert{
        border-radius: 20px;
        background: #59b984; 
        font-size: 18px;color: white;
        border:none;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.8) inset,
                    -2px -2px 10px rgba(255, 255, 255, 1) inset
    }
    
    .editDiv{
        border-radius: 20px;
        background:#1d1d1d; 
        font-size: 18px;color: white;
        padding: 20px;
        box-shadow: 8px 9px 15px rgba(0, 0, 0, 0.8) inset;
    }

    .boxDiv{
        box-shadow: 8px 9px 15px rgba(0, 0, 0, 0.8) ,
                    -2px -2px 10px rgba(255, 255, 255, 0.2) ;
        padding: 20px;
        border-radius: 20px;
        margin-bottom: 20px;
    }
    .boxDiv div .inp{
        background: none;
        box-shadow: 7px 7px 5px rgba(0, 0, 0, 0.6) inset;
        border-radius: 20px;
        width: 100%;
        padding: 8px;
        border:none;
        outline: none;
        text-align: center;
        color:#cbced1;
    }

    .editDiv .inp{
        background: #dee0e5;
        box-shadow: 0px 0px 5px 1px black;
        border-radius: 20px;
    }
    
  /* admins bar */

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
    
.modalButton{
    background: #1d1d1d !important;
    padding:10px;
    border-radius: 20px;
    color: #59b984;
    box-shadow: 4px 4px 10px #000000 inset,
                -4px -4px 10px rgba(255, 255, 255, 0.2) inset;
    cursor: pointer;
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
    }

input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            transition: background-color 5000s ease-in-out 0s;
        }

        input:-webkit-autofill {
            -webkit-box-shadow: /*your box-shadow*/,0 0 0 50px #cbced1 inset;
            -webkit-text-fill-color: #cbced1;
        } 
        
        .editButton{
            border:none;
            outline: none !important;
            background: #1d1d1d;
            border:1px solid #59b984;
            padding: 4px;
            text-align: center;
            border-radius: 20px;
            color: #59b984;
            cursor: pointer;
        }

        .deleteButton{
            border:none;
            outline: none !important;
            background: #1d1d1d;
            border:1px solid #a12f2f;
            padding: 4px;
            text-align: center;
            border-radius: 20px;
            color: #a12f2f ;
            cursor: pointer;

        }


        .selects select {
            width: 100%;
            background: none;
            border: none;
            outline: none;
            color: #59b984;
        }

        
        .selects input {
            width: 100%;
            background: none;
            border: none;
            outline: none;
            color: #59b984;
            text-align: right;
        }

        .selects{
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.8) inset ,
                        -2px -2px 5px rgba(255, 255, 255, 0.2) inset;
            padding: 10px;
            border-radius: 20px;
        }

table{
    width: 100%;
    text-align: center;
    color: #cbced1;
    margin-top: 10px;
}
table thead{
    width: 100%;
    box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.6),
                -2px -2px 5px rgba(255, 255, 255, 0.2);
    color: #59b984 !important;
    text-shadow: 0px 0px 20px #59b984;
}

table tbody{
    width: 100%;
    box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.6) inset,
                -2px -2px 5px rgba(255, 255, 255, 0.2) inset;
                border-bottom-left-radius: 20px;
                border-bottom-right-radius: 20px;
}

table thead tr th{
    padding: 10px;
}

table tbody tr th{
    padding: 10px;
  
}

</style>
    <title>restaurant</title>
</head>
<body>

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