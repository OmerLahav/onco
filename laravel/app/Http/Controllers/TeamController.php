<?php

namespace App\Http\Controllers;

use App\User;
use App\EmailTemplates;
use App\Helpers\MailSendHelper;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use DB;
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
        if(User::checkAlreadyExist('email',request('email')) == 0)
        {
            if(User::checkAlreadyExist('identification_number',request('identification_number')) == 0)
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
            
            
           /* $email_data = EmailTemplates::get_details(3);

            if(!empty($email_data)) 
            {       
                $email_data->template_body = str_replace('[USERNAME]',request('first_name').' '.request('last_name'),$email_data->template_body);
                $email_data->template_body = str_replace('[EMAILID]',request('email'),$email_data->template_body);
                $email_data->template_body = str_replace('[PASSWORD]',request('password'),$email_data->template_body);
                $email_data->template_body = str_replace('[USER_ROLE]',user_role_name_base_on_id(request('role')),$email_data->template_body);
                     
               
                //Send Email Helper Function 
                MailSendHelper::send_email($email_data, [request('email')]);
            }*/
        
        
            if($create){
                SweetAlert::success('Added successfully')->persistent("Close");
            }else{
                 SweetAlert::error('There is an error! ')->persistent("Close");
            }
        	return redirect()->route('team.index');
        }
        else
        {
            sweetAlert::error('The Id already exist.');
            return redirect()->route('team.create');
        }
    }
    else
    {
        sweetAlert::error('The email address already exist.');
        return redirect()->route('team.create');
    }
    return redirect()->route('team.index');
}
	
	 function Team_delete ($id)
    {
        $deleting=  DB::table ('users')->where('id','=',$id )->delete();

//      if query failed
        if($deleting!=1){
            SweetAlert::error('There is an error! ')->persistent("Close");
            return redirect()->route('team.index');
        }
        else {

            SweetAlert::success('Deleted successfully')->persistent("Close");
            return redirect()->route('team.index');
        }

    }


    public function Team_edit($id)
    {
        $users = User::find($id);
        // Load user/createOrUpdate.blade.php view
        return view('team.edit',compact('users','id'));
    }



    public function Team_update(Request $request,$id)
    {
        if(User::checkAlreadyExist('email',request('email'),[$id]) == 0)
        {
            if(User::checkAlreadyExist('identification_number',request('identification_number'),[$id]) == 0)
            {
    
                    $this->validate($request,[
                        'role' => 'required',
                        'identification_number' => 'required',
                        'first_name' => 'required',
                        'email' => 'required',
                        'last_name' => 'required',
                        'phone' => 'required'
                    ]);

                    $users= User::find($id);
                    $users->role = request('role');
                    $users->identification_number = request('identification_number');
                    $users->first_name = request('first_name');
                    $users->email = request('email');
                    $users->last_name = request('last_name');
                    $users->phone = request('phone');
                    if(request('password') != "")
                    {
                        $users->password = bcrypt(request('password'));
                    }
                    $users->save();

                    //   if update failed
                    if($users==null){
                        SweetAlert::error('There is an error! ')->persistent("Close");
                        return redirect()->route('team.index');
                    }
                    else {
                        SweetAlert::success('Updated successfully')->persistent("Close");
                        return redirect()->route('team.index');
                    }
                 }
            else
            {
                sweetAlert::error('The Id already exist.');
                return redirect()->route('team.edit',['id'=>$id]);
            }
        }
        else
        {
            sweetAlert::error('The email address already exist.');
            return redirect()->route('team.edit',['id'=>$id]);
        }
    }
}
