<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CriticalSymtomMedication;
use DB;
use Auth;
use Carbon;
$CURRENT_DATE = Carbon\Carbon::now();


class DashboardController extends Controller
{
    public function index()
    {
		// Business Logic
        $dashboardData = array();

		
        //google charts
        $googlepie   = new ChartsController();
        $chartsArray = $googlepie->googleLineChart();
        $dashboardData['visitorChartData'] = $chartsArray;

        $googlechart  = new ChartsController();
        $chartsArray2 = $googlechart->googleLineChart2();
        $dashboardData['activeChartData']    = $chartsArray2;

         //doctors
         //Start count doctors patients Data Business Logic
       
         if(Auth::user()->isDoctor())
         {
            $dashboardData['PatientCountData'] = DB::table('patient_data')
            ->where('doctor_id','=',Auth::user()->id)
            ->count();
         } elseif(Auth::user()->isNurse()){
            $dashboardData['PatientCountData'] = DB::table('patient_data')
            ->count();
         }
            

        //End count Data Business Logic

        //Start doctors Treatments count Data Business Logic
        $dashboardData['treatmentCountData'] = DB::table('treatments')
			->where('user_id','=',Auth::id())
            ->count();
        //End Treatment Data Business Logic

        //Start doctors Appointments count Data Business Logic
        $dashboardData['AppointmentCountData'] = DB::table('appointments')
            ->where('medical_staff_id', '=',Auth::user()->id)
            ->where('appointment_date', '=',date('Y-m-d'))
            ->count();
        //End doctors Appointments Business Logic

        //Start doctors patients critical count Data Business Logic
        $dashboardData['CriticalCountData'] = DB::table('patient_data')
			->where('doctor_id','=',Auth::id())
            ->where('patient_status', '=' ,'Critical')
                   //where this is the doctor -> to see only his appointments
            ->count();
        //End doctors Appointments Business Logic
		
		 //Start Not Reported Medication Only for Previous Date  count for doctors Data Business Logic
        $docotreid = $patientid = $nurseid = 0;
    
        
        if (Auth::user()->isDoctor())
        {
            $docotreid = Auth::user()->id;
        }
        if (Auth::user()->isPatient())
        {
            $patientid = Auth::user()->id;
        }
        if (Auth::user()->isNurse())
        {
            $nurseid = Auth::user()->id;
        }
        $dashboardData['CurrentDayMedicationReportCount'] =   CriticalSymtomMedication::getCriticalMedication($docotreid,$patientid,$nurseid);
        $dashboardData['CurrentDaySymtomReportCount'] =   CriticalSymtomMedication::getCriticalSymtoms($docotreid,$patientid,$nurseid);
        //End  Not Reported Symtoms  Business Logic   


		//patient
		//Start patient Appointments count Data Business Logic
         $dashboardData['PatientAppointmentCount'] = DB::table('appointments')
         ->where('patient_id', '=',Auth::user()->id)
         ->where('appointment_date', '=',date('Y-m-d'))
         ->count();
       
        //End patient Appointments Business Logic

        //Start patient treatments count Data Business Logic
         $dashboardData['PatientTreatmentCount'] = DB::table('treatments')
         ->where('patient_id', '=',Auth::user()->id)
        ->where(DB::raw("DATE(treatments.ends_at)"),">=",date('Y-m-d'))
        ->count();
       
        //End patient treatments Business Logic

		//Admin
         //Start patients count Data Business Logic
        $dashboardData['PatientTotalCount'] = DB::table('users')
         ->where('role', '=', 3)
        ->count();
        
         //Start team count Data Business Logic
        $dashboardData['TeamTotalCount'] = DB::table('users')
         ->where('role', '!=', 3 )
        ->count();
        //End Admin  Data Business Logic
     

		//nurse
        //Start patients count Data Business Logic
        $dashboardData['PatientTotalCountNurse'] = DB::table('users')
         ->where('role', '=', 3)
        ->count();
        
         //Start  patients critical count Data Business Logic
            $dashboardData['CriticalCountDataNurse'] = DB::table('patient_data')
            ->where('patient_status', '=' ,'Critical')
            ->count();
        //End  Nurse patients critical Business Logic

        //Start Nurse Appointments count Data Business Logic
        $dashboardData['AppointmentCountDataNurse'] = DB::table('appointments')
            ->whereRaw('Date(appointment_date) = CURDATE()')
            ->count();
        //End  Nurse Appointments Business Logic

        //Start nuese Treatments count Data Business Logic
        $dashboardData['treatmentCountDataNurse'] = DB::table('treatments')
            ->count();
			
        if ((Auth::user()->isDoctor()) or (Auth::user()->isNurse()))
            return view('dashboard.index', $dashboardData);

        else
            return view('dashboard.index',$dashboardData);


    }

}



