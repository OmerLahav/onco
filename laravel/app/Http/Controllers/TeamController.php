<?php

namespace App\Http\Controllers;

use App\User;
use App\EmailTemplates;
use App\Helpers\MailSendHelper;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;

class TeamController extends Controller
{
    public function index()
    {
    	return view('team.index')->withTeam(User::staff()->get());
    }

    public function create()
    {
    	return view('team.create');
    }

    public function store()
    {
        
    	$create= User::create([
    		'role' => request('role'),
    		'identification_number' => request('identification_number'),
    		'first_name' => request('first_name'),
    		'last_name' => request('last_name'),
    		'email' => request('email'),
    		'password' => bcrypt(request('password')),
    		'phone' => request('phone'),
    	]);
        
        
        $email_data = EmailTemplates::get_details(3);

        if(!empty($email_data)) 
        {       
            $email_data->template_body = str_replace('[USERNAME]',request('first_name').' '.request('last_name'),$email_data->template_body);
            $email_data->template_body = str_replace('[EMAILID]',request('email'),$email_data->template_body);
            $email_data->template_body = str_replace('[PASSWORD]',request('password'),$email_data->template_body);
            $email_data->template_body = str_replace('[USER_ROLE]',user_role_name_base_on_id(request('role')),$email_data->template_body);
                 
           
            //Send Email Helper Function 
            MailSendHelper::send_email($email_data, [request('email')]);
        }
        
        
        if($create){
            SweetAlert::success('Added successfully')->persistent("Close");
        }else{
             SweetAlert::error('There is an error! ')->persistent("Close");
        }
    	return redirect()->route('team.index');
    }
}
