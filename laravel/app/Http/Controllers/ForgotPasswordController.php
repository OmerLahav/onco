<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Reminder;
use Mail;
use Sentinel;

class ForgotPasswordController extends Controller
{
    public function forgotPassword ()
    {
   return view('auth.forgot-password');
    }

     public function postForgotPassword (Request $request ) 
    {
   $user = User::whereEmail($request->email)->first();
    
    $sentinelUser = Sentinel::findById(user)->id;
    if(count($user) == 0)
        return redirect()->back->with([
            'success' => 'Reset code was sent to your email.'
            
            ]);
    
    $reminder = Reminder::Exists($sentinelUser) ?:  Reminder::
        create($user) ; 

    $this->sendEmail($user, $reminder->code);
    
    return redirect() ->back->with([
            'success'=>  'Reset code was sent to your email.'
            
            ]);
    
}

    private function sendEmail($user, $code)
    {
        Mail::send('emails.forgot-password',  [
            'user' => $user,
            'code' => $code
            ], function($message) use ($user) {
                $message->to($user->email);
                
                $message->subject("Hello $user->first_name,
                    reset your password.");
            });
        
    }
}

