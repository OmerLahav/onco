<?php

namespace App\Http\Controllers;

use App\MedicationLog;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

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
            //old Logic
    		$dates = Collection::times($treatments->min('created_at')->diffInDays(), function ($number) use ($treatments) {
    			return $treatments->min('created_at')->addDays($number)->format('Y-m-d');
    		})->flip();
        }
       
       
       
    	return view('medicationlogs.index')->withTreatments($treatments)->withTook($took)->withDates($dates);
    }
}
