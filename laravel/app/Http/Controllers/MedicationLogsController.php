<?php

namespace App\Http\Controllers;

use App\MedicationLog;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use DatePeriod,DateTime,DateInterval;
class MedicationLogsController extends Controller
{
    public function index()
    {
    	$treatments = Auth::user()->doctor_treatments()->orderBy('patient_id')->get();
    	$took = MedicationLog::whereIn('patient_id', $treatments->pluck('patient_id')->unique()->toArray())->get();
        $log = $dates = [];

        /*dd($took);
*/

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

		// print_r($dates); 
  //       print_r($treatments->toArray()); exit;
		
        /*if($treatments->count() > 0)
        {
            //old Logic
    		$dates = Collection::times($treatments->min('created_at')->diffInDays(), function ($number) use ($treatments) {
    			return $treatments->min('created_at')->addDays($number)->format('Y-m-d');
    		})->flip();
        }*/

    	return view('medicationlogs.index')->withTreatments($treatments)->withDates($dates);
    }
}
