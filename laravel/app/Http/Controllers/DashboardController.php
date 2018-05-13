<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;


class DashboardController extends Controller
{
    public function index()
    {
		//staff Business Logic
        $dashboardData = array();

        //google charts
        $googlepie   = new ChartsController();
        $chartsArray = $googlepie->googleLineChart();
        $dashboardData['visitorChartData'] = $chartsArray;

        $googlechart  = new ChartsController();
        $chartsArray2 = $googlechart->googleLineChart2();
        $dashboardData['activeChartData']    = $chartsArray2;


        //Start count Data Business Logic
        $dashboardData['PatientCountData'] = DB::table('users')
            ->where('role', '=', 3)
            ->count();
        //End count Data Business Logic

        //Start Treatment Data Business Logic
        $dashboardData['treatmentCountData'] = DB::table('patient_treatment')
            ->where('id', '!=', 0)
            ->count();
        //End Treatment Data Business Logic

		
        //Auth check
        if ((Auth::user()->isDoctor()) or (Auth::user()->isNurse()))
            return view('dashboard.index', $dashboardData);

        else
            return view('dashboard.index');

		
		 //patient Business Logic
		 //Start patient count Data Business Logic
		
		 $dashboardData2 = array();
        $dashboardData2['PatientCountData2'] = DB::table('users')
            ->where('role', '=', 3)
            ->count();
			
        //End count Data Business Logic
		
		 //Auth check
		if (Auth::user()->isPatient())
            return view('dashboard.index', $dashboardData);

        else
            return view('dashboard.index');
        //End Update Data Business Logic

    }

}



