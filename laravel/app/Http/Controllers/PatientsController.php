<?php

namespace App\Http\Controllers;

use App\Patient;
use App\User;
use App\Treatment;
use App\EmailTemplates;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert;
use App\Helpers\MailSendHelper;
use DB;
class PatientsController extends Controller
{
    public function index()
    {
        
        return view('patients.index')
        ->withPatients(User::with(['patient_data'])->where('role','=',3)->get());
    
    }

    public function create()
    {
    	return view('patients.create');
    }

    public function store()
    {
        
        if(User::checkAlreadyExist('email',request('email')) == 0)
        {
            if(User::checkAlreadyExist('identification_number',request('identification_number')) == 0)
            {

                $patient = Patient::create([
            		'role' => 3,
            		'identification_number' => request('identification_number'),
            		'first_name' => request('first_name'),'required',
            		'last_name' => request('last_name'),
            		'email' => request('email'),
            		'password' => bcrypt(request('password')),
                    'phone' => request('phone'),
            		'birth_date' => date('Y-m-d',strtotime(request('birth_date')))
            	]);

            	$create = $patient->patient_data()->create([
            		'gender' => request('gender'),
            		'type' => request('type'),
            		'contact_relation' => request('contact_relation'),
            		'contact_name' => request('contact_name'),
            		'contact_phone' => request('contact_phone'),
            		'contact_email' => request('contact_email'),
            		'is_active' => request('is_active'),
                    'patient_status' => request('patient_status'),
                    'doctor_id' =>(Auth::user()->role == 1 ?Auth::user()->id:0)
            	]);


                //Send Registration Email to Patient Using  Mail  Helper Function

                $email_data = EmailTemplates::get_details(2);

                if(!empty($email_data)) 
                {       
                    $email_data->template_body = str_replace('[USERNAME]',request('first_name').' '.request('last_name'),$email_data->template_body);
                    $email_data->template_body = str_replace('[EMAILID]',request('email'),$email_data->template_body);
                    $email_data->template_body = str_replace('[PASSWORD]',request('password'),$email_data->template_body);
                           
                   
                    //Send Email Helper Function 
                    MailSendHelper::send_email($email_data, [request('email')]);
                }
                
                
                //Send Email To Contact Person of Curent Registration Patients Using Mail Helper Function
                
                $email_data = EmailTemplates::get_details(4);

                if(!empty($email_data)) 
                {       
                    $email_data->template_body = str_replace('[USER_NAME]',request('first_name').' '.request('last_name'),$email_data->template_body);
                    $email_data->template_body = str_replace('[CONTACT_PERSON_NAME]',request('contact_name'),$email_data->template_body);
                           
                   
                    //Send Email Helper Function 
                    MailSendHelper::send_email($email_data, [request('contact_email')]);
                }
                

                if ($create) {
                    SweetAlert::success('Created successfully')->persistent("Close");
                } else {		
                    sweetAlert::error('There is an error! try again');
                }
            }
            else
            {
                sweetAlert::error('The Id already exist.');
                return redirect()->route('patients.create');
            }
        }
        else
        {
            sweetAlert::error('The email address already exist.');
            return redirect()->route('patients.create');
        }
    	return redirect()->route('patients.index');
    }

    //Delete Patient BY Doctore
     function Patient_delete($id)
    {
        $deleting=  DB::table ('users')->where('id','=',$id )->delete();
        $deleting2=  DB::table ('patient_data')->where('user_id','=',$id )->delete();

//      if query failed
        if($deleting!=1 && $deleting2!=1)
        {
            SweetAlert::error('There is an error! ')->persistent("Close");
            return redirect()->route('patients.index');
        }
        else 
        {
            SweetAlert::success('Deleted successfully. Dont forget to delete this patient treatments')->persistent("Close");
            return redirect()->route('patients.index');
        }
    }

    public function show(Patient $patient)
    {
        $patient->load('patient_data');

        return view('patients.show')
            ->withPatient($patient)
            ->withTreatments(Treatment::all());
    }

    public function Patient_edit($id)
    {
        $users = User::where('id',$id)->with(['patient_data'])->first();
        //print_r($users->toArray()); exit;
        return view('patients.edit',compact('users','id'));
    }

    public function Patient_update(Request $request,$id)
    {
        if(User::checkAlreadyExist('email',request('email'),[$id]) == 0)
        {
            if(User::checkAlreadyExist('identification_number',request('identification_number'),[$id]) == 0)
            {
                $users= User::find($id);
                $users->role = 3;
                $users->identification_number = request('identification_number');
                $users->first_name = request('first_name');
                $users->email = request('email');
                $users->last_name = request('last_name');
                $users->birth_date = request('birth_date');
                $users->phone = request('phone');
                if(request('password') != "")
                {
                    $users->password = bcrypt(request('password'));
                }
                $users->save();

                $users->patient_data()->update([
                    'gender' => request('gender'),
                    'type' => request('type'),
                    'contact_relation' => request('contact_relation'),
                    'contact_name' => request('contact_name'),
                    'contact_phone' => request('contact_phone'),
                    'contact_email' => request('contact_email'),
                    'is_active' => request('is_active'),
                    'patient_status' => request('patient_status'),
                    'doctor_id' =>(Auth::user()->role == 1 ?Auth::user()->id:0)
                ]);


                //   if update failed
                if($users==null){
                    SweetAlert::error('There is an error! ')->persistent("Close");
                    return redirect()->route('patients.index');
                }
                else {
                    SweetAlert::success('Updated successfully')->persistent("Close");
                    return redirect()->route('patients.index');
                }
            }
            else
            {
                sweetAlert::error('The Id already exist.');
                return redirect()->route('patients.edit',['id'=>$id]);
            }
        }
        else
        {
            sweetAlert::error('The email address already exist.');
            return redirect()->route('patients.edit',['id'=>$id]);
        }
    }

    public function addTreatment(Patient $patient)
    {
        $patient->treatments()->create([
            'user_id' => Auth::id(),
            'patient_id' => $patient->id,
            'name' => request('name'),
            'description' => request('description'),
            'ends_at' => Carbon::parse(request('ends_at')),
        ]);

        return redirect()->route('patients.show', [$patient]);
    }
}
