<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicationReportsController extends Controller
{
    public function create()
    {
    	$medications = Patient::find(Auth::id())
    		->medications()
    		->where('treatment_medications.ends_at', '>=', Carbon::now())
    		->get()
    		->map(function($treatment) {
    			return [
    				'name' => $treatment->medication->name,
    				'id' => $treatment->medication_id,
    				'strength' => $treatment->medication->strength,
    				'day_part' => $treatment->day_part
    			];
    		})->groupBy('day_part');

    	return view('patients.medicationreports.create')
    		->withMedications($medications);
    }
}
