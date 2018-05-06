<?php

namespace App\Http\Controllers;

use App\Symptom;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use Validator;

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
        $validation = Validator::make($request->all(),[
            'name' => 'required',
            'importance_level' => 'required|numeric'
        ]);

    	if($validation->fails()){
            SweetAlert::error('There is an error! Please provide your name')->persistent("Close");
            return redirect()->route('symptoms.create');
        }

    	$create = Symptom::create(
    		$request->only((new Symptom)->getFillable())
    	);

        if($create){
            SweetAlert::success('Created successfully')->persistent("Close");
        }

    	return redirect()->route('symptoms.index');
    }

}
