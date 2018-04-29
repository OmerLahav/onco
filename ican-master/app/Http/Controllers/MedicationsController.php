<?php

namespace App\Http\Controllers;

use App\Medication;
use Illuminate\Http\Request;

class MedicationsController extends Controller
{
    public function index()
    {
    	return view('medications.index')
    		->withMedications(Medication::all());
    }

    public function create()
    {
    	return view('medications.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required'

    	]);

    	Medication::create(
    		$request->only((new Medication)->getFillable())
    	);

    	return redirect()->route('medications.index');
    }
}
