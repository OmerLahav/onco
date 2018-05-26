<?php

namespace App\Http\Controllers;

use App\TreatmentMedication;
use UxWeb\SweetAlert\SweetAlert;
use Validator;

class TreatmentMedicationsController extends Controller
{
    public function store()
    {
        $validation = Validator::make(request()->all(),[
    		'treatment_id' => 'required',
    		'medication_id' => 'required',
    		'day_part' => 'required',
			'ends_at' => 'required',
    	]);

        if ($validation->fails()) {
        	dd($validation->errors);
            SweetAlert::error('There is an error! Please provide your name.')->persistent("Close");

            return redirect()->route('treatments.show', [request('treatment_id')]);
        }

    	$treatmentmedication = TreatmentMedication::create([
    		'treatment_id' => request('treatment_id'),
    		'medication_id' => request('medication_id'),
    		'day_part' => request('day_part'),
			'ends_at' => request('ends_at')
    	]);

        if ($treatmentmedication) {
            SweetAlert::success('Added successfully!')->persistent("Close");
        }

    	return redirect()->route('treatments.show', [request('treatment_id')]);
    }
}
