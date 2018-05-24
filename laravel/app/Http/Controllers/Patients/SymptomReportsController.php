<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Patient,App\Treatment,App\SymptomReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use UxWeb\SweetAlert\SweetAlert;
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

    public function store(Request  $request)
    {
        $alreadyexists = SymptomReport::where('treatment_id',$request->treatment_id)
            ->where('symptoms_id',$request->symptoms_id)
            ->where('patient_id',Auth::user()->id)
            ->where(DB::raw("DATE(symptom_reports.created_at)"),"=",date('Y-m-d'))
            ->count();

        if($alreadyexists == 0)
        {
            $symptopsreports = new SymptomReport;
            $symptopsreports->treatment_id = $request->treatment_id;
            $symptopsreports->symptoms_id = $request->symptoms_id;
            $symptopsreports->level_text = $request->level_text;
            $symptopsreports->symptom_desc_id = $request->symptom_desc_id;
            $symptopsreports->symptom_desc_id = $request->symptom_desc_id;
            $symptopsreports->patient_id = Auth::user()->id;
            $symptopsreports->save();
            if($symptopsreports){
                 SweetAlert::success('symtom reports successfully.')->persistent("Close");
             } 
             else
             {
                sweetAlert::error('Some Error IN Server Side.');
             }
        }
        else
        {
            sweetAlert::error('symtom reports already submited by you for today.');
        }
        return redirect()->route('symptopsreports.create');
        
    }
}
