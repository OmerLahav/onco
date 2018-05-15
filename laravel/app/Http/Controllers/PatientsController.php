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

class PatientsController extends Controller
{
    public function index()
    {
    	return view('patients.index')->withPatients(Patient::allPatients());
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
            		'birth_date' => request('birth_date')
            	]);

            	$create = $patient->patient_data()->create([
            		'gender' => request('gender'),
            		'type' => request('type'),
            		'contact_relation' => request('contact_relation'),
            		'contact_name' => request('contact_name'),
            		'contact_phone' => request('contact_phone'),
            		'contact_email' => request('contact_email'),
            		'is_active' => request('is_active'),
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

    public function show(Patient $patient)
    {
        $patient->load('patient_data');

        return view('patients.show')
            ->withPatient($patient)
            ->withTreatments(Treatment::all());
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
