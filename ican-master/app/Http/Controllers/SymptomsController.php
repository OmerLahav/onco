<?php

namespace App\Http\Controllers;

use App\Symptom;
use Illuminate\Http\Request;

class SymptomsController extends Controller
{
    public function index()
    {
    	return view('symptoms.index')
    		->withSymptoms(Symptom::all());
    }

    public function create()
    {
    	return view('symptoms.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'importance_level' => 'required|numeric',
    	]);

    	Symptom::create(
    		$request->only((new Symptom)->getFillable())
    	);

    	return redirect()->route('symptoms.index');
    }
}
