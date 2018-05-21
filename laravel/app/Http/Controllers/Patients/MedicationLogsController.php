<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\MedicationLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert;
class MedicationLogsController extends Controller
{
    public function postMedicationByPatient()
    {
        $this->validate(request(), [
    		'treatmentmedications' => 'required'
    	]);

    	collect(request('treatmentmedications'))->each(function($medication) {
    		MedicationLog::create([
    			'patient_id' => Auth::id(),
    			'treatment_medication_id' => $medication,
    		]);
    	});

        SweetAlert::success('Your medications reported sucessfully.')->persistent("Close");
    	return redirect('/patients/medicationreports/create');
    }
}