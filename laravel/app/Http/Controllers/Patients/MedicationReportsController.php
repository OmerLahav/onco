<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Patient;
use App\MedicationLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class MedicationReportsController extends Controller
{
    public function create()
    {
        $currentDateMedicationLog = [];
        $medications = Patient::find(Auth::id())
    		->medications()
            ->where(DB::raw("DATE(treatment_medications.ends_at)"),">=",date('Y-m-d'))
    		->get()
    		->map(function($treatment) {
    			return [
                    'tm_id' => $treatment->id,
    				'name' => $treatment->medication->name,
    				'id' => $treatment->medication_id,
    				'strength' => $treatment->medication->strength,
    				'day_part' => $treatment->day_part
    			];
    		})->groupBy('day_part');

        //Get Current Date Patient Booked Medication for Not submit same tretment medicatoin again for today date
        $currentDateMedicationLog = MedicationLog::where('patient_id','=',Auth::id())->where('created_at','>=',date('Y-m-d'))->pluck('treatment_medication_id')->toArray();

        return view('patients.medicationreports.create')
    		->withMedications($medications)
            ->withCurrentDateMedicationLog($currentDateMedicationLog);
    }
}
