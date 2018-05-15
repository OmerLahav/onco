<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <script src="js/jquery.min.js"></script>
      <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
      <title>Reset password </title>
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
	   <link rel="stylesheet" type="text/css" href="{{ asset('css/reset_password.css') }} ">
	  
      <!-- CSS-->
  
   </head>

   <style>
   .message {
       font-size: 30px;
       text-align: center;
       margin-top: 63px;
       font-weight: bold;
       line-height: 30px;
       font-family:cursive;
   }
   .rededd {
       color: #C20E1A;
   }
   .greenery {
       color: green;
   }
   .center{
       margin-left: 45%;
   }
   </style>

   <body >
      <div id="login-page" class="row" >
         <div class="col s12 z-depth-6 card-panel">
               <div class="row">
                  <div class="input-field col s12 center">
                     <img src="images/logo.png" alt="" class="responsive-img valign profile-image-login">
                     <h4 > Reset Password </h4><br>
                      
                      <p class="message <?php if($message == PW_RESET_ERROR) { echo "rededd"; } else { echo "greenery"; } ?>">{{ $message }}</p>

                     <div class="row">
                        <div class="input-field col s12">
                           <a href="{{ route('login') }}">
                           <button type="button" class="btn waves-effect waves-light col s12" >Redirect To Login Page</button> 
                           </a>
                        </div>
                     </div>
               



                  </div>
               </div>
         </div>
      </div>
      <!-- Scripts-->
      
      <!-- jQuery Library -->
      <script src="js/jquery.min.js"></script>
      <!--materialize js-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
      <footer>
         <p>© 2018 Ican - All rights Reserved</p>
      </footer>
   </body>
</html>