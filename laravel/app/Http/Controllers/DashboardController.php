<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon;
$CURRENT_DATE = Carbon\Carbon::now();


class DashboardController extends Controller
{
    public function index()
    {
		//staff Business Logic
        $dashboardData = array();
		
		//Patients Business Logic
		$dashboardData2 = array();
		
        //google charts
        $googlepie   = new ChartsController();
        $chartsArray = $googlepie->googleLineChart();
        $dashboardData['visitorChartData'] = $chartsArray;

        $googlechart  = new ChartsController();
        $chartsArray2 = $googlechart->googleLineChart2();
        $dashboardData['activeChartData']    = $chartsArray2;


        //Start count Data Business Logic
        $dashboardData['PatientCountData'] = DB::table('treatments')
			->where('user_id','=',Auth::id())
            ->count();
        //End count Data Business Logic

        //Start Treatments count Data Business Logic
        $dashboardData['treatmentCountData'] = DB::table('treatments')
			->where('user_id','=',Auth::id())
            ->count();
        //End Treatment Data Business Logic

        //Start doctors Appointments count Data Business Logic
        $dashboardData['AppointmentCountData'] = DB::table('appointments')
            ->whereRaw('Date(appointment_date) = CURDATE()')
			->where('medical_staff_id','=',Auth::id())
            ->count();
        //End doctors Appointments Business Logic


        //Start doctors critical count Data Business Logic
        $dashboardData['CriticalCountData'] = DB::table('patient_data')
			->where('doctor_id','=',Auth::id())
            ->where('patient_status', '=' ,'Critical')
                   //where this is the doctor -> to see only his appointments
            ->count();
        //End doctors Appointments Business Logic

		
		//patient Business Logic
		 //Start patient count Data Business Logic
			
			$dashboardData2['PatientCountData2'] = DB::table('users')
            ->where('role', '=', 3)
            ->count();
			
       
		
		 //Start Treatments count Data Business Logic
			$dashboardData2['treatmentCountDataPatient'] = DB::table('treatments')
			->where('patient_id','=',Auth::id())
            ->count();
			
        //End Treatment Data Business Logic
		//Start Treatments count Data Business Logic
		
      
			
        //End Treatment Data Business Logic

		
		
        //Auth check
        if ((Auth::user()->isDoctor()) or (Auth::user()->isNurse()))
            return view('dashboard.index', $dashboardData);

        else
            return view('dashboard.index');

		
		if (Auth::user()->isPatient())
            return view('dashboard.index', $dashboardData);

        else
            return view('dashboard.index');
        //End Update Data Business Logic

    }

}



