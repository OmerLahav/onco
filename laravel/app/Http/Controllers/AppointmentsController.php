<?php

namespace App\Http\Controllers;

use App\User;
use App\PatientData;
use App\Appointments;
use App\EmailTemplates;
use App\Helpers\MailSendHelper;
use App\Helpers\AppointmentHelper;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use Illuminate\Support\Facades\Input;
use App\SlotRange;
use Auth;
use Illuminate\Support\Facades\Redirect;
use DB;

class AppointmentsController extends Controller
{
    //Function for get all appointments base on user role
    public function getAppointments()
    {
        if(Auth::user()->isPatient())
        {        
            $appointments = Appointments::get_list([["patient_id","=",Auth::user()->id]] );
    	}
        elseif(Auth::user()->isDoctor())
        {
            //Get All Patients of Login Doctore
           /* $patient_ids = PatientData::where('doctor_id',Auth::user()->id)->pluck('user_id')->toArray();
           
            $appointments = Appointments::whereIn('patient_id',$patient_ids)->with(['provider','patient'])->get();*/

            //Get Approved Apppintment Of Login Doctore 

            $appointments=Appointments::get_list([["medical_staff_id","=",Auth::user()->id],['medical_staff_type','=',Appointments::STAFF_TYPE_DOCTOR]] );
        }
        elseif(Auth::user()->isNurse())
        {
            //Get All Approved Appointment For Nurse
            $appointments=Appointments::get_list([["medical_staff_id","=",Auth::user()->id],['medical_staff_type','=',Appointments::STAFF_TYPE_NURSE]]);    
        }
        elseif(Auth::user()->isSecratory())
        {
            //Get All Approved Appointment For Nurse
            $appointments=Appointments::get_list([]);    
        }
        return view('appointments.index')->withAppointments($appointments);
    }


    //Function for add appointment
    public function addAppointments(Request $request)
    {
        if ($request->isMethod('post')) 
        {
            //check whether appointment book by some one else
            if(Appointments::checkAlreadyBookAppointment(request('appointment_date'),request('appointment_time'),request('role')) == 0)
            {
                if(Auth::user()->isSecratory())
                {
                    $patient_id = request('patient_id');
                }
                else
                {
                    $patient_id = Auth::user()->id;
                }

                $appointment = Appointments::create([
                    'patient_id'            => $patient_id,
                    'appointment_date'      => request('appointment_date'),
                    'appointment_time'      => request('appointment_time'),'required',
                    'type'                  => request('type'),
                    'medical_staff_type'    => request('role'),
                    'status'                => Appointments::STATUS_REGULAR,
                    'medical_staff_id'                => request('medical_staff_id'),
                     
                ]);

               


                //Send Appointment Email to Patient Using  Mail  Helper Function

                /*$email_data = EmailTemplates::get_details(3);

                if(!empty($email_data)) 
                {       
                    $email_data->template_body = str_replace('[USERNAME]',Auth::user()->first_name.' '.Auth::user()->last_name,$email_data->template_body);
                    $email_data->template_body = str_replace('[APPOINTMENT_TIME]',request('appointment_time'),$email_data->template_body);
                    $email_data->template_body = str_replace('[APPOINTMENT_DATE]',request('appointment_date'),$email_data->template_body);
                        
                    //Send Email Helper Function 
                    MailSendHelper::send_email($email_data, [Auth::user()->email]);
                }*/
                if ($appointment) {
                    SweetAlert::success('Created appointment successfully')->persistent("Close");
                    return redirect()->route('appointments.get');
                } else {        
                    sweetAlert::error('There is an error! try again');
                    return redirect()->route('appointments.create');
                }
            }
            else
            {
                sweetAlert::error('Appointment already booked by someone else.');
                return redirect()->route('appointments.create');
            }
        }
        else
        {
            $doctorData = $patientData = $doctor =  $users =  [];
            if(Auth::user()->isSecratory())
            {
                $users = User::where('role','3')->get();
                $doctor = User::where('role','1')->get();
            }
            else
            {
                //get login patient all appointments
                $patientData = PatientData::where('user_id','=',Auth::user()->id)->first();
                if(!empty($patientData) && isset($patientData->doctor_id))
                {
                    //Get Doctor Data From User Table
                    $doctorData = User::find($patientData->doctor_id)->toArray();
                }
            }
    	    return view('appointments.create')->withDoctor($doctorData)->withUsers($users)->withDoctor($doctor);
        }
    }

     function deleteAppointment($id)
    {
        $deleting=  DB::table ('appointments')->where('id','=',$id )->delete();
//      if query failed
        if($deleting!=1){
            SweetAlert::error('There is an error! ')->persistent("Close");
            return redirect()->route('appointments.get');

        }
        else {

            SweetAlert::success('Deleted successfully')->persistent("Close");
            return redirect()->route('appointments.get');
        }
    }

    //Function for edit appointment
    public function editAppointments(Request $request,$appoinmentid)
    {


    }
    //Function for Generate slot Base on diffrent time range
    public function getAppointmentsSlots()
    {   
        $slot_html = $type = '';
        if(Input::has('appointmentDate') && Input::get('appointmentDate') != "")
            {
                $booked_slots = $slots = [];
                $userId = 0;
                $appointmentDate = Input::get('appointmentDate');
                               
                
                //Fetch Appointment Date Booked Slots
                $booked_slots = Appointments::where('appointment_date','=',$appointmentDate)->pluck('appointment_time')->toArray();

                if(Input::get('medicalStaffType') == Appointments::STAFF_TYPE_DOCTOR)
                    {
                    $userId = Input::get('doctorId');
                }

                if(Auth::user()->isPatient())
                {
                    //Fetch Patient Data for check status crtical or normal
                    $patientData = PatientData::where('user_id','=',Auth::user()->id)->first();
                }
                else
                {
                    $patientData = PatientData::where('user_id','=',Input::get('patientId'))->first();
                }

               //Pick Regular Slots Base on Doctore wise OR Nurse Wise
                $regularSlots = SlotRange::where('slot_date','=',Input::get('appointmentDate'))->where('user_id','=',$userId)->where('type','=','Regular')->where('status','=','Active')->orderByRaw("RAND()")->first();
                if(!empty($regularSlots))
                {
                    $type = 'Regular';
                    $slots = AppointmentHelper::createSlots($regularSlots->start_time,$regularSlots->end_time,$regularSlots->slot_time_in_minute,$booked_slots);
                }
                if(count($slots) == 0 || $patientData->patient_status == 'Critical')
                {
                   //Pick Critical Slots
                    $criticalSlots = SlotRange::where('slot_date','=',Input::get('appointmentDate'))->where('user_id','=',$userId)->where('type','=','Critical')->where('status','=','Active')->orderByRaw("RAND()")->first();
                    if(!empty($criticalSlots))
                    {
                        $type = 'Preserved';
                        $slots = AppointmentHelper::createSlots($criticalSlots->start_time,$criticalSlots->end_time,$criticalSlots->slot_time_in_minute,$booked_slots);   
                    }
                }
                
                if(count($slots))
                {
                    $slot_html.= "<div class='time-select' style='display:inline-block;'>" ;
                    $i=1;
                    foreach ($slots as $key => $slot) {
                        if($i == 3)
                        {
                            $i=1;
                            $slot_html.="</div>";
                            $slot_html.="<div class='time-select' style='display:inline-block;'>";
                        }
                        $slot_html.="<a href='javascript:void(0)' class='btn btn-primary slots' slot_time='".$slot."'>".$slot."</a>"; 
                        $i++;
                    }
                    $slot_html.= "</div>";
                    $status = TRUE;
                    $msg = 'Slots get sucessfully.';
                }
                else
                {
                    $status = FALSE;
                    $msg = 'Slots not found.';
                }
        } else {
            $status = FALSE;
            $msg = 'Please select appoointment date.';
        }
        return ['html'=>$slot_html,'status'=>$status,'msg'=>$msg,'type'=>$type];
    }

   //Google Claneder Page for add details

    public function googleCalendarLink() 
    {
    	
    	$appointment_date = Input::get('appointment_date');
    	$appointment_time = Input::get('appointment_time');
    	
    	$params = array(
		'action' => 'TEMPLATE',
		'text' => urlencode('Appointment to'. Input::get('provider_name')),
		'dates' => '20180523T080000/20190523T170000',

		// 'Start' => '2019-12-04 12:30:00',
		// 'End' => '2019-12-04 14:30:00',

		//'details' => urlencode('blabla') ,
		'location' => urlencode('Meir Hospital, Petakh-Tikva') ,
		'trp' => 'false',

		// 'sprop'    => 'website:' . 'ican.com',

		);
		$base_url = 'https://calendar.google.com/calendar/r/eventedit?';
		$url = $base_url . '/' . http_build_query($params);
        return Redirect::to($url);
       
    }

}
