<?php

namespace App\Http\Controllers\CronJobs;

use App\Patient;
use App\PatientData;
use App\Treatment;
use App\TreatmentMedication;
use App\MedicationLog;
use App\CronJobsLogs;
use App\User;
use App\Helpers\MailSendHelper;
use App\EmailTemplates;
use DB;
class CronController
{
	public function patient_treatment_status()
	{


		$cron_results = '';

	    $cron_results.="<<<<<<------- Start Execution of Cron Job Of Patient Treatment Status --------->>>>>><br>";
		$medications_logs = $treatments_medications = $critical_treatment_medications = [];
		//Take Patient with his All Teatments

		
		
		$treatments_medications = TreatmentMedication::where(DB::raw("DATE(treatment_medications.ends_at)"),">=",date('Y-m-d'))->pluck('id')->toArray();

		$cron_results.="<<<<<<------- Fetching Tratment Medications Table Treatment Id  --------->>>>>><br>";
		$cron_results.="<<<<<<------- Display Tratment Ids  --------->>>>>><br>";
		$cron_results.= "(".implode("|",$treatments_medications).")";

		$medications_logs = MedicationLog::where(DB::raw("DATE(medication_logs.created_at)"),"=",date('Y-m-d'))->pluck('treatment_medication_id')->toArray();


		$cron_results.="<<<<<<------- Fetching Medications Log Table Treatment Id  --------->>>>>><br>";
		$cron_results.="<<<<<<------- Display Tratment Ids  --------->>>>>><br>";
		$cron_results.= "(".implode("|",$medications_logs).")";


		$critical_treatment_medications = array_unique(array_diff($treatments_medications, $medications_logs));

		if(count($critical_treatment_medications))
		{
			$cron_results.="<<<<<<------- Subtract It and  Display Critical Patient Tratment Ids  --------->>>>>><br>";
			$cron_results.= "(".implode("|",$critical_treatment_medications).")";

			$treatments_ids = TreatmentMedication::whereIn('id',$critical_treatment_medications)->pluck('treatment_id')->toArray();

			$patient_ids = Treatment::whereIn('id',$treatments_ids)->pluck('patient_id')->toArray();
			
			$cron_results.="<<<<<<------- Patient Id from Treatment Ids --------->>>>>><br>";
			$cron_results.= "(".implode("|",$patient_ids).")";

			$doctoreIds = PatientData::where('patient_status','Regular')->where('doctor_id','!=','')->whereIn('id',$patient_ids)->pluck('doctor_id')->toArray();

			//Update Status Critical for All Reglar Patients

			PatientData::where('patient_status','Regular')->whereIn('user_id',$patient_ids)->update(array('patient_status'=>'Critical'));

			$cron_results.="<<<<<<------- Update Patient Status from Patients Ids --------->>>>>><br>";
			$cron_results.="<<<<<<------- End Execution of Cron Job Of Patient Treatment Status --------->>>>>><br>";
				
			//Save Cron Result Into Database
			$cronJobs =  new CronJobsLogs;
			$cronJobs->cron_name = 'Patient Status Change Base On Medications';
			$cronJobs->cron_type = 'PatientStatus';
			$cronJobs->cron_run_date_time = date('Y-m-d H:i:s');
			$cronJobs->cron_results = $cron_results;
			$cronJobs->save();

			//Send Email To All Patient Who's Status Update as A Critical
			$getAllPatientsEmailId = User::where('role','3')->whereIn('id',$patient_ids)->pluck('email')->toArray();

			$email_data = EmailTemplates::get_details(5);
	        if(!empty($email_data)) 
	        {      
	            //Send Email Helper Function 
	            //MailSendHelper::send_email($email_data, [$getAllPatientsEmailId]);
	        }

	        //Send SMS to contact person of patient about the status updated to Critical
	        \Nexmo::message()->send([
	        	'to' => $getAllPatientsEmailId->patient_data->contact_phone,
	        	'from' => 'ICan',
	        	'text' => "Hi {$getAllPatientsEmailId->patient_data->contact_name}, {$getAllPatientsEmailId->first_name} is defined critical"
	        ]);

	        //Send SMS to the patient's Doctor about the status updated to Critical
	        \Nexmo::message()->send([
	        	'to' => $getAllPatientsEmailId->patient_data->doctor->phone,
	        	'from' => 'ICan',
	        	'text' => "Hi {$getAllPatientsEmailId->patient_data->doctor->first_name}, {$getAllPatientsEmailId->first_name} is defined critical"
	        ]);


	        //Send Email To All Doctore Of that Patient Who's Status Update as A Critical
			
			if(count($doctoreIds))
			{
				$getAllDoctoreEmailId = User::where('role','1')->whereIn('id',$doctoreIds)->pluck('email')->toArray();

				$email_data = EmailTemplates::get_details(6);
				if(!empty($email_data)) 
		        {      
		            //Send Email Helper Function 
                    //MailSendHelper::send_email($email_data, [$getAllPatientsEmailId]);
		        }
		     }
	      }
	}
}
 