<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User,App\EmailTemplates;
use Reminder;
use Mail;
use Illuminate\Support\Facades\Input;
use Sentinel,Redirect,View,Hash;

use App\Helpers\MailSendHelper;

class ForgotPasswordController extends Controller {
    public function forgotPassword() {
        return view('auth.forgot-password');
    }

    //Forgot Password Function With New functionality 
    public function postForgotPasswordNew(Request $request) {
        $user = User::whereEmail($request->email)->first();
        if (empty($user)) {
            return redirect()->back->with(['error_msg' => MSG_ENTER_REGISTER_EMAILID]);
        }
        //Generate Random Code
        $code = rand(000000, 999999);
        
        //Save code in db
        $user->forgot_password_code = $code;
        $user->forgot_password_date = CURRENT_DATE_TIME;
        $user->save();

        //Send Email To use forforgot password helper function.
        $email_data = EmailTemplates::get_details(1);
        
        if(!empty($email_data)) 
        {
            
            $email_data->template_body = str_replace('[LINK]',SITE_URL.'reset-password/'.$code,$email_data->template_body);
            $email_data->template_body = str_replace('[USERNAME]',$user->first_name.' '.$user->last_name,$email_data->template_body);
            $email_data->template_body = str_replace("[BUTTON_LINK]",SITE_URL.'images/goto-link.png',$email_data->template_body);

            //Send Email In Background Asycronosoly
            /*ob_end_clean();
            header("Connection: close");
            ignore_user_abort(); 
            ob_start();
            header('HTTP/1.1 200 OK', true, 200);
            header('Content-Type: application/plain');
            echo "TRUE";
            $size = ob_get_length();
            header("Content-Length: $size");
            ob_end_flush();
            flush();
            session_write_close();// mail sent to user with new link 
         */

            //Send Email Helper Function 
            MailSendHelper::send_email($email_data, [$user->email]);
        }
        return redirect()->back()->with(['success' => 'Reset code was sent to your email.']);
    }
    //End Forgot Password function
    

    //Start Reset Password Form  Display Function
    public function user_reset_password_form($fcode)
    {
        $user_details = User::where("forgot_password_code","=",$fcode)->first();
    
        if (!empty($user_details) > 0)
        {
            $t1 = strtotime(CURRENT_DATE_TIME);
            $t2 = strtotime($user_details->forgot_password_date);
            $diff = $t1 - $t2;
            $hours = $diff / ( 60 * 60 );
        
            if($hours > 24)
            {
              $user_details->forgot_password_code="";
              $user_details->save();
              return Redirect::route('reset_password_msg', array(str_replace("/","",PW_RESET_TIME_EXCEED)));
            }
            else
            {
              return View::make('reset_password.reset_password', array('ccode' => $fcode,'emailid'=>$user_details->email,'user'=>$user_details,'title' => 'Password-Reset'));
           }
        } else {
            return Redirect::route('reset_password_msg', array(str_replace("/","",PW_RESET_ERROR)));
        }

    }

    //Start Reset Password Submit Form Function

  public function user_reset_password_submit()
  {
    $passwords = Input::all();
    $user_details = User::where("forgot_password_code","=",Input::get('vfcode'))->first();

    if(!empty($user_details) > 0)
    {
        // Get passwords from the user's input
        $npass = Input::get('password');
        $cpass = Input::get('cpassword');
        // test input password against the existing one
        if ($npass == $cpass)
        {
            $user_details->password = Hash::make($npass);
            $user_details->forgot_password_code = '';
            // save the new password
            if($user_details->save())
            {
                return Redirect::route('reset_password_msg', array(str_replace("/","",PW_RESET_SUCCESS)));
            }
        } 
        else
        {
            return Redirect::route('reset_password_msg', array(str_replace("/","",PW_RESET_ERROR)));
        }
    } 
    else
    {
        return Redirect::route('reset_password_msg', array(str_replace("/","",PW_RESET_ERROR)));
    }
  }

  
    //End Reset Password Submit Form Function

    //End Reset Password Form Display Function

    public function reset_password_msg($msg)
    {
        return View::make('reset_password.reset_password_message_screen', array('title' => 'Password-Reset'))->with('message', $msg);
    }
    //Start Reset Password Sucess/Error Message Display

    
    //End Reset Password Sucess/Error Message Display

    public function postForgotPassword(Request $request) {
        $user = User::whereEmail($request->email)->first();
        $sentinelUser = Sentinel::findById(user)->id;
        if (count($user) == 0) return redirect()->back->with(['success' => 'Reset code was sent to your email.']);
        $reminder = Reminder::Exists($sentinelUser) ? : Reminder::create($user);
        $this->sendEmail($user, $reminder->code);
        return redirect()->back->with(['success' => 'Reset code was sent to your email.']);
    }



    private function sendEmail($user, $code) {
        Mail::send('emails.forgot-password', ['user' => $user, 'code' => $code], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject("Hello $user->first_name,
                    reset your password.");
        });
    }
}

