<?php

namespace App\Http\Controllers;

use App\SymptomReport;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use DatePeriod,DateTime,DateInterval;
class SymtomsLogsController extends Controller
{
    public function index()
    {
    	$treatments = Auth::user()->doctor_treatments()->orderBy('patient_id')->get();
    	$took = SymptomReport::whereIn('patient_id', $treatments->pluck('patient_id')->unique()->toArray())->get();
        $log = $dates = [];


        if($treatments->count() > 0)
        {
	        $dates_ary = array_column($treatments->toArray(),'created_at');

	        usort($dates_ary, function($a, $b) {
			    $dateTimestamp1 = strtotime($a);
			    $dateTimestamp2 = strtotime($b);

			    return $dateTimestamp1 < $dateTimestamp2 ? -1: 1;
			});

			$dates = array();
	        $current = strtotime(date('Y-m-d',strtotime($dates_ary[0])));
		    $last = strtotime(date('Y-m-d'));

		    while( $current <= $last ) {

		        $dates[] = date('Y-m-d', $current);
		        $current = strtotime('+1 day', $current);
		    }
		  }
    	return view('symtomsreportslog.index')->withTreatments($treatments)->withDates($dates);
    }
}
