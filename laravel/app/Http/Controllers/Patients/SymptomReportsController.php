<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Patient,App\Treatment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class SymptomReportsController extends Controller
{
    public function create()
    {
        //Get Treatment with Sysmptoms
        $treatment  = Treatment::where('patient_id',Auth::user()->id)->with(['symptoms'])->get();
        //print_r($treatment->toArray()); exit;
        if(!empty($treatment))
        {
        	return view('patients.symptopsreports.create')
    		->withTreatments($treatment);
    	}
    }
}
