<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class SymptomReportsController extends Controller
{
    public function create()
    {
        //Get Treatment with Sysmptoms
        
        
        return view('patients.symptopsreports.create')
    		->withMedications($treatment);
    }
}
