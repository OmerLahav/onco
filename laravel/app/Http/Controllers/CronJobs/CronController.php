<?php

namespace App\Http\Controllers\CronJobs;

use App\Patient;
use App\PatientData;
use App\Treatment;
use App\TreatmentMedication;
use App\MedicationLog;
use App\CronJobsLogs;
use App\User;
use App\TreatmentSymtoms;
use App\SymptomReport;
use App\Helpers\MailSendHelper;
use App\EmailTemplates;
use DB;
class CronController
{
	//Cron For Change Patint Status Critical Base on Medication Taken By Every Patient Every Day
	public function patient_status_baseon_treatment_medications()
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

			$patients = PatientData::where('patient_status','Regular')->whereIn('user_id',$patient_ids)->update(array('patient_status'=>'Critical'));

			$cron_results.="<<<<<<------- Update Patient Status from Patients Ids --------->>>>>><br>";
			$cron_results.="<<<<<<------- End Execution of Cron Job Of Patient Treatment Status --------->>>>>><br>";
				
			
			//Send Email To All Patient Who's Status Update as A Critical
			$getAllPatients = User::where('role','3')->whereIn('id',$patient_ids)->get();

			$email_data = EmailTemplates::get_details(5);
	        if(!empty($email_data)) 
	        {   
	        	//Send Email Helper Function 
	            MailSendHelper::send_email($email_data,$getAllPatients->pluck('email')->toArray());
	        }
	        $patients = User::where('role','3')->with(['patient_data'])->where('phone','!=',"")->whereIn('id',$patient_ids)->get();
	        //Sending SMS Code To Patient and to its Contact
	        if(!empty($patients))
	        {
		        foreach ($patients as $key => $value) {
		        	
		        	\Nexmo::message()->send([
			        	'to' => $value->phone,
			        	'from' => 'ICan',
			        	'text' => "Dear patient {$value->first_name}, your status is defined critical. Please contact your doctor."
			        ]);

			        \Nexmo::message()->send([
			        	'to' => $value->patient_data->contact_phone,
			        	'from' => 'ICan',
			        	'text' => "Dear Contact {$value->patient_data->contact_name}, {$value->first_name} is defined critical. Please check for his condition."
			        ]);

			        //Send Email To Constact Perons
			        MailSendHelper::send_email($email_data,[$value->patient_data->contact_email]);
		        }
	        }

	        //Send Email To All Doctors Of that Patient Who's Status Update as A Critical
			$doctors = PatientData::where('doctor_id','!=','')->with(['patient_data','doctore_data'])->whereIn('user_id',$patient_ids)->get();

			if(count($doctors))
			{
				//Sending SMS Code To Doctore
				foreach ($doctors as $key => $value) {
	        	 	\Nexmo::message()->send([
		        	'to' => $value->doctore_data->phone,
		        	'from' => 'ICan',
		        	'text' => "Dear Doctor {$value->doctore_data->first_name}, {$value->patient_data->first_name} is defined critical. Please check for his condition ."
			        ]);
		        }

		        //Sending Email Code To Doctore
				$getAllDoctoreEmailId = User::where('role','1')->whereIn('id',$doctoreIds)->pluck('email')->toArray();

				$email_data = EmailTemplates::get_details(6);
				if(!empty($email_data)) 
		        {      
		            //Send Email Helper Function 
                    MailSendHelper::send_email($email_data,$getAllDoctoreEmailId);
		        }
		     }
	        }
		    //Save Cron Result Into Database
			$cronJobs =  new CronJobsLogs;
			$cronJobs->cron_name = 'Patient Status Change Base On Medications';
			$cronJobs->cron_type = 'PatientStatus';
			$cronJobs->cron_run_date_time = date('Y-m-d H:i:s');
			$cronJobs->cron_results = $cron_results;
			$cronJobs->save();

	}


	//Cron For Change Patint Status Critical Base on Submit  Symtoms Reports  By Every Patient Every Day
	public function patient_status_baseon_treatment_symtoms()
	{
		$cron_results = '';

	    $cron_results.="<<<<<<------- Start Execution of Cron Job Of Patient Treatment Status --------->>>>>><br>";
		$treatments_ids = $symtoms_ids = $symtoms_log_ids = $critical_treatment_symtoms = [];
		//Take Patient with his All Teatments
	
		$treatments_ids = Treatment::where(DB::raw("DATE(treatments.ends_at)"),">=",date('Y-m-d'))->pluck('id')->toArray();

		$symtoms_ids = TreatmentSymtoms::whereIn('treatment_id',$treatments_ids)->pluck('symptom_id')->toArray();


		$cron_results.="<<<<<<------- Fetching Tratment Symtoms Table Treatment Id  --------->>>>>><br>";
		$cron_results.="<<<<<<------- Display treatments_ids Ids  --------->>>>>><br>";
		$cron_results.= "(".implode("|",$treatments_ids).")";

		$symtoms_log_ids = SymptomReport::where(DB::raw("DATE(symptom_reports.created_at)"),"=",date('Y-m-d'))->pluck('symptoms_id')->toArray();


		$cron_results.="<<<<<<------- Fetching Symtoms Reports Log Table symtoms Id  --------->>>>>><br>";
		$cron_results.="<<<<<<------- Display Symtoms Ids  --------->>>>>><br>";
		$cron_results.= "(".implode("|",$symtoms_log_ids).")";


		$critical_treatment_symtoms = array_unique(array_diff($symtoms_ids, $symtoms_log_ids));

		if(count($critical_treatment_symtoms))
		{
			$cron_results.="<<<<<<------- Subtract It and  Display Critical Patient Tratment Ids  --------->>>>>><br>";
			$cron_results.= "(".implode("|",$critical_treatment_symtoms).")";

			$treatments_ids = TreatmentSymtoms::whereIn('symptom_id',$critical_treatment_symtoms)->pluck('treatment_id')->toArray();

			$patient_ids = Treatment::whereIn('id',$treatments_ids)->pluck('patient_id')->toArray();
			
			$cron_results.="<<<<<<------- Patient Id from Treatment Ids --------->>>>>><br>";
			$cron_results.= "(".implode("|",$patient_ids).")";

			$doctoreIds = PatientData::where('patient_status','Regular')->where('doctor_id','!=','')->whereIn('user_id',$patient_ids)->pluck('doctor_id')->toArray();
			//Update Status Critical for All Reglar Patients

			$patients = PatientData::where('patient_status','Regular')->whereIn('user_id',$patient_ids);
			$patients->update(array('patient_status'=>'Critical'));

			$cron_results.="<<<<<<------- Update Patient Status from Patients Ids --------->>>>>><br>";
			$cron_results.="<<<<<<------- End Execution of Cron Job Of Patient Treatment Status --------->>>>>><br>";
				
			
			//Send Email To All Patient Who's Status Update as A Critical
			$getAllPatientsEmailId = User::where('role','3')->whereIn('id',$patient_ids)->pluck('email')->toArray();
			$email_data = EmailTemplates::get_details(7);
	        if(!empty($email_data)) 
	        {      
	            //Send Email Helper Function 
	            MailSendHelper::send_email($email_data, $getAllPatientsEmailId);
	        }

	        $patients = User::where('role','3')->with(['patient_data'])->whereIn('id',$patient_ids)->get();

	        //Sending SMS Code To Patient and his contact 
	        if(!empty($patients))
	        {
		        foreach ($patients as $key => $value) {
		        	\Nexmo::message()->send([
			        	'to' => $value->phone,
			        	'from' => 'ICan',
			        	'text' => "Dear patient {$value->first_name} your status is defined critical. Please contact your doctor."
			        ]);

			        \Nexmo::message()->send([
			        	'to' => $value->patient_data->contact_phone,
			        	'from' => 'ICan',
			        	'text' => "Dear Contact {$value->patient_data->contact_name}, {$value->first_name} is defined critical. Please check for his condition."
			        ]);

			        //Send Email To Contact Person
			        MailSendHelper::send_email($email_data,[$value->patient_data->contact_email]);
		        }
	        }

	       
	        //Send Email To All Doctore Of that Patient Who's Status Update as A Critical
			$doctors = PatientData::where('doctor_id','!=','')->with(['patient_data','doctore_data'])->whereIn('user_id',$patient_ids)->get();

			
			if(count($doctors))
			{
				//Sending SMS Code To Doctore
				foreach ($doctors as $key => $value) {
	        	 	\Nexmo::message()->send([
		        	'to' => $value->doctore_data->phone,
		        	'from' => 'ICan',
		        	'text' => "Dear Doctor {$value->doctore_data->first_name}, {$value->patient_data->first_name} is defined critical. Please check for his condition ."
			        ]);
		        }
				//Send Email To Doctore
				$getAllDoctoreEmailId = User::where('role','1')->whereIn('id',$doctoreIds)->pluck('email')->toArray();

				$email_data = EmailTemplates::get_details(8);
				if(!empty($email_data)) 
		        {      
		            //Send Email Helper Function 
                    MailSendHelper::send_email($email_data, $getAllDoctoreEmailId);
		        }
			    
			}
	    }
	    //Save Cron Result Into Database
		$cronJobs =  new CronJobsLogs;
		$cronJobs->cron_name = 'Patient Status Change Base On Symtoms';
		$cronJobs->cron_type = 'PatientStatus';
		$cronJobs->cron_run_date_time = date('Y-m-d H:i:s');
		$cronJobs->cron_results = $cron_results;
		$cronJobs->save();
	}
}
 