<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Patient,App\Treatment,App\SymptomReport,App\PatientData,App\Symptom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use UxWeb\SweetAlert\SweetAlert;
use App\Helpers\MailSendHelper;
use App\EmailTemplates;

class SymptomReportsController extends Controller
{
    public function create()
    {
        //Get Treatment with Sysmptoms
        $treatment  = Treatment::where(DB::raw("DATE(treatments.ends_at)"),">=",date('Y-m-d'))->where('patient_id',Auth::user()->id)->with(['symptoms'])->get();
        //print_r($treatment->toArray()); exit;
        if(!empty($treatment))
        {
          	return view('patients.symptopsreports.create')
    		->withTreatments($treatment);
    	}	
    }

    public function store(Request  $request)
    {
        $alreadyexists = SymptomReport::where('treatment_id',$request->treatment_id)
            ->where('symptoms_id',$request->symptoms_id)
            ->where('patient_id',Auth::user()->id)
            ->where(DB::raw("DATE(symptom_reports.created_at)"),"=",date('Y-m-d'))
            ->count();

        if($alreadyexists == 0)
        {

            $symptopsreports = new SymptomReport;
            $symptopsreports->treatment_id = $request->treatment_id;
            $symptopsreports->symptoms_id = $request->symptoms_id;
            $symptopsreports->level_text = $request->level_text;
            $symptopsreports->patient_level = $request->patient_level;
            $symptopsreports->patient_id = Auth::user()->id;
           
            if($symptopsreports){

                //check importance level is less then usr level then set pateint status is critical 
                $symptoms_importance_level = Symptom::where('id',$request->symptoms_id)->first()->importance_level;

                if($symptoms_importance_level <= $request->patient_level)
                {
                    //Get Patient Data and Change Status
                    
                    $patientdata = PatientData::where('user_id',Auth::user()->id)->with(['doctore_data'])->first();
                    $patientdata->patient_status = 'Critical';
                    $patientdata->save();

                    //Update Symtom Status

                    Symptom::where('id',$request->symptoms_id)->update(['symtom_status'=>'Critical']);
                    $symptopsreports->status = 'Critical';
                    //send to patient for this critical status

	                    //Send Email 
                    	$email_data = EmailTemplates::get_details(7);
						if(!empty($email_data)) 
				        {      
				            //Send Email TO Patient 
		                    MailSendHelper::send_email($email_data,[Auth::user()->email]);
				        	
				        	//Send Email To Contact Person
		                    if(isset($patientdata))
				        	{
		                    	 MailSendHelper::send_email($email_data,[$patientdata->contact_email]);
				        	}
				        }

	                    //Send SMS
				        	//Send SMS to Patiet
		                    if(isset(Auth::user()->phone))
					        {
					        	\Nexmo::message()->send([
					        	'to' => Auth::user()->phone,
					        	'from' => 'ICan',
					        	'text' => "Dear patient ".Auth::user()->first_name." your status is defined critical, because of your last symptom report. Please contact your doctor."
						        ]);
					        }

					        //Send SMS to Patient contact person 
							
							if(isset($patientdata))
					        {
					        	\Nexmo::message()->send([
					        	'to' => $patientdata->contact_phone,
					        	'from' => 'ICan',
					        	'text' => "Dear Contact {$patientdata->contact_name}, ".Auth::user()->first_name." is defined critical, because of his last symptom report. Please check for his condition."
						        ]);
					        }		                    



                    // Send to patient doctor for this critical status 
	                    //Send Email 
				        $email_data = EmailTemplates::get_details(8);
						if(!empty($email_data)) 
				        {      
				        	if(isset($patientdata->doctore_data))
				        	{
				            	//Send Email Helper Function 
		                    	MailSendHelper::send_email($email_data,[$patientdata->doctore_data->email]);
				        	}
				        }

	                    //Send SMS

				        if(isset($patientdata->doctore_data))
				        {
				        	\Nexmo::message()->send([
				        	'to' => $patientdata->doctore_data->phone,
				        	'from' => 'ICan',
				        	'text' => "Dear Doctor {$patientdata->doctore_data->first_name}, {$patientdata->doctore_data->first_name} is defined critical,because of your last symptom report Please check for his condition ."
					        ]);
				        }
                }   
                SweetAlert::success('The symptom was reported successfully!')->persistent("Close");
             } 
             else
             {
                sweetAlert::error('Error on the server side.');
             }
              $symptopsreports->save();
        }
        else
        {
            sweetAlert::error('This sympton was already submitted by you today.')->persistent("Close");
        }
        return redirect()->route('symptopsreports.create');
        
    }
}
