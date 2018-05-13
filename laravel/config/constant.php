<?php
$SITE_URL = $app->make('url')->to('/')."/";

define('SITE_FOLDER_NAME','mediplus/domains/med.dev.webstorm.co.il/');

define('WWW_ROOT',$_SERVER['DOCUMENT_ROOT'].'/'.SITE_FOLDER_NAME.'/');
define('SITE_NAME','ICan , 2018');
define('SITE_URL',$SITE_URL);
define('ASSET_URL',$SITE_URL.'assets/');


define('APP_LOGO_PATH','images/logo.png');

define('CURRENT_DATE_TIME',date('Y-m-d H:i:s'));
define('CURRENT_DATE_TIME_FORMAT','Y-m-d H:i:s');
define('CURRENT_DATE_FORMAT','Y-m-d');
define('CURRENT_DATE_DISPLAY_FORMAT','d-m-Y');
define('CURRENT_DATE',date('Y-m-d'));
define('CURRENT_DATE_DISPLAY',date('d-m-Y'));




/*Api All HTTP Code */

define("HTTP_UNAUTHORIZED",401);
define("HTTP_SUCCESS",200);
define("HTTP_NOT_FOUND",404);
define("HTTP_INTERNAL_SERVER_ERROR",500);




/*  Email Verification / Reset Password Blade Message List */
define("EMAIL_VERIFY","Email Verification."); 
define("MSG_EMAIL_VERIFY_SUCCESS","Your email id has been  verified successfully."); 
define("MSG_EMAIL_ALREADY_VERIFY","You have already verified your email address."); 
define("MSG_EMAIL_VERIFY_LINK_INVALID","Invalid verification link."); 
define("MSG_ENTER_REGISTER_EMAILID","Please enter registered email address.");
define("PW_RESET_SUCCESS","Password has been reset successfully.");
define("PW_RESET_ERROR","Could not recover your password.");
define("PW_RESET_TIME_EXCEED","Your reset password link has been expired!");



// API CONSTANTS END

function user_role_name_base_on_id($roleid){
    $roles = ['1'=>'Doctor','2'=>'Nurse','3'=>'Secretary','4'=>'Admin'];
    return $roles[$roleid];
}

  function  pr($arr) {
      echo "<pre>";
      print_r($arr);
      echo "</pre>";    
  }
?>