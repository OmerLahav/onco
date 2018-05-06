<?php

namespace App\Http\Controllers;

use App\Medication;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use Validator;

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
        $validation = Validator::make($request->all(),[
    		'name' => 'required'
    	]);
        if($validation->fails()){
            SweetAlert::error('There is an error! Please provide your name')->persistent("Close");
            return redirect()->route('medications.create');
        }
    	$create = Medication::create(
    		$request->only((new Medication)->getFillable())
    	);

    	if($create){
            SweetAlert::success('Created successfully')->persistent("Close");
        }

    	return redirect()->route('medications.index');
    }



}
