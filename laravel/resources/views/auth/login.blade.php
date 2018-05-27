<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
      <title>Login </title>
      <!--Import materialize.css-->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
      <!-- CSS-->
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/login.css') }} ">

   </head>
   <body>
      <div id="login-page" class="row" >
         <div class="col s12 z-depth-6 card-panel">
            <form class="login-form" method="POST" action="{{ route('login') }}">
               <div class="row">
                  <div class="input-field col s12 center">
                     <img src="images/logo.png" alt="" class="responsive-img valign profile-image-login">
                  </div>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                   
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
               </div>
        <div class="position">
               <div class="row margin">
                  <div class="input-field col s12">
                     <i class="mdi-social-person-outline prefix"></i>
                     <input class="validate" id="email" type="email" class="stored" value="{{ old('email') }}" name="email">
                     <label for="email" data-error="Please include an '@' in the email address " data-success="" class="center-align" >{{ __('E-Mail') }}</label>
                  </div>
               </div>
               <div class="row margin password">
                  <div class="input-field col s12">
                     <i class="mdi-action-lock-outline prefix"></i>
                     <input id="password" type="password" name="password" class="stored">
                     <label for="password">{{ __('Password') }}</label>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12 m12 l12  login-text">
                     <input type="checkbox" id="remember-me" name="remember"  {{ old('remember') ? 'checked' : '' }} />
                     <label for="remember-me"> {{ __('Remember Me') }}</label>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12">
                     <button type="submit" class="btn waves-effect waves-light col s12" >{{ __('Login') }}</button> 
                  </div>
               </div>
               <p class="forgot-password"><a href="{{ route('password.email.show') }}">{{ __('Forgot password?') }}</a></p>
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>
            </form>
         </div>
      </div>
      <!-- jQuery Library -->
      <script src="js2/jquery.min.js"></script>
      <!--materialize js-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
      <script src="js2/bootstrap.min.js"></script>
      <footer>
         <p>© 2018 Ican - All rights Reserved</p>
      </footer>
   </body>
</html>
