@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/admin-styles/pagesforgot-password.css') }}">

<div id="forgot-page" class="row" >
         <div class="col s12 z-depth-6 card-panel">
            <form class="login-form" action="{{ route('password.request') }}">
               <div class="row">
                  <div class="input-field col s12 center">
                     <img src="images/logo.png" alt="" class="responsive-img valign profile-image-login">
                  </div>
               </div>
			      <div class="row margin password">
                  <div class="input-field col s12">
                     <p>Enter the email address associated with your ICan account, then click Continue. We will email instructions on how you can create a new password.</p>
                  </div>
               </div>
               <div class="row margin">
                  <div class="input-field col s12">
                     <i class="mdi-social-person-outline prefix"></i>
                     <input class="validate" id="email" type="email" class="stored">
                     <label for="email" data-error="Please include an '@' in the email address " data-success="right" class="center-align" >Email</label>
                  </div>
               </div>


               <div class="row">
                  <div class="input-field col s12">
                     <button type="submit" class="btn waves-effect waves-light col s12" >Continue</button> 
                  </div>
               </div>
            </form>
         </div>
      </div>
      <!-- jQuery Library -->
      <script src="js/jquery.min.js"></script>
      <!--materialize js-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <footer>
         <p>© 2018 Ican - All rights Reserved</p>
      </footer>
@endsection
