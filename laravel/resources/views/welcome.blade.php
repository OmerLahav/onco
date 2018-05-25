<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <title>ICan </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-image: url("images/background.jpg");
			background-position: center;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        .logo{
            
            float: left;

        }
        .full-height {
            height: 100vh;
        }



        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right:50px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
  .links > a {
        

    font-size: 12px;
    font-weight: 700;
       padding: 15px 15px;
          border: 2px solid #77aaff;
    text-transform: uppercase;
    font-weight: 700;
    cursor: pointer;
    letter-spacing: .12em;
        border-radius: 25px;

        background-color: white;
        color:#233a77;
  }
  .links > a:hover {
     /* Green */
    color: white;
    background-color: rgb(83, 140, 198)!important;

}


.mockup{
position:relative;
    top: 200px;
    left: 5%;
}


footer{
    text-align: center;
    font-weight: bold;
    position: relative;
top: 150px;
    height: 30px;
 clear: both;
}
/* ------------------Responsive--------------*/

@media( max-width: 1920px) 

 {

}

@media (max-width: 768px) {
html, body {

    background-image: url(images/background.jpg);
    background-position: center;
    color: #636b6f;
    font-family: 'Raleway', sans-serif;
    font-weight: 100;
        height: 127vh;
    margin: 0;
}
    .logo {
   position:relative;
   left:50px;
}
.mockup{
position:relative;
    left: -220px;

}

footer{
top: 280px;
}

}


/*----mobile----*/
@media( max-width: 585px) {
    html, body {
    background-color: #f9f9fb;
    background-image: none;
height: 127vh;
        }

    .logo {
   position:relative;
   left:50px;
   top:40px;
}
.mockup{
position:relative;
width:80%;
height:80%;
display:none;
}
.top-right{
top: 248px;

}

.links > a{
display: block;
margin: 10px;
width: 200px;
text-align:center;
 font-size: 20px;
     position: relative;
    top: 62px;
       left: -1%;
}
footer{
top: 420px;
}
}
/* ------------------ End Responsive--------------*/








    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/dashboard') }}">Home</a>
            @else
                 <a href="{{ url('/login') }}">Login</a>
             
            @endif
        </div>
    @endif
 <img class="logo" src="images/logo.png" alt="ican logo" >

    <img class="mockup" src="images/mockupImage.png" alt="mockup"  width="358" height="700" >
  <footer>
<p>  2018 Ican - All rights Reserved</p>
</footer>



</div>
</body>
</html>
