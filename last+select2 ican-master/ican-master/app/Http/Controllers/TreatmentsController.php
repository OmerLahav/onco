<?php

namespace App\Http\Controllers;

use App\Medication;
use App\Symptom;
use App\Treatment;
use Illuminate\Http\Request;

class TreatmentsController extends Controller
{
    public function index()
    {
    	return view('treatments.index')
    		->withTreatments(Treatment::all());
    }

    public function create()
    {
    	return view('treatments.create')
    		->withSymptoms(Symptom::all())
    		->withMedications(Medication::all());
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'description' => 'required',
    	]);

    	$treatment = Treatment::create(
    		$request->only((new Treatment)->getFillable())
    	);

    	$treatment->symptoms()->sync($request->symptoms);
    	$treatment->medications()->sync($request->medications);

    	return redirect()->route('treatments.index');
    }

    public function show(Treatment $treatment)
    {
    	return view('treatments.show')
    		->withTreatment($treatment);
    }
}
