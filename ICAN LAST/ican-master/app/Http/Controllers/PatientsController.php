<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Treatment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert;


class PatientsController extends Controller
{
    public function index()
    {
    	return view('patients.index')->withPatients(Patient::allPatients());
    }

    public function create()
    {
    	return view('patients.create');
    }

    public function store()
    {
    	$patient = Patient::create([
    		'role' => 3,
    		'identification_number' => request('identification_number'),
    		'first_name' => request('first_name'),'required',
    		'last_name' => request('last_name'),
    		'email' => request('email'),
    		'password' => bcrypt(request('password')),
    		'phone' => request('phone'),
    	]);

    	$create=$patient->patient_data()->create([
    		'gender' => request('gender'),
    		'type' => request('type'),
    		'contact_relation' => request('contact_relation'),
    		'contact_name' => request('contact_name'),
    		'contact_phone' => request('contact_phone'),
    		'contact_email' => request('contact_email'),
    		'is_active' => request('is_active'),
    	]);
        if($create){
            SweetAlert::success('Created successfully')->persistent("Close");
        }else{
            sweetAlert::error('There is an error! try again later');
        }
    	return redirect()->route('patients.index');
    }

    public function show(Patient $patient)
    {
        $patient->load('patient_data');

        return view('patients.show')
            ->withPatient($patient)
            ->withTreatments(Treatment::all());
    }

    public function addTreatment(Patient $patient)
    {
        $patient->treatments()->attach(request('treatment_id'), [
            'user_id' => Auth::id(),
            'ends_at' => Carbon::parse(request('ends_at')),
        ]);

        return redirect()->route('patients.show', [$patient]);
    }
}
