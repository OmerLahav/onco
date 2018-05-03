<?php

namespace App\Http\Controllers;

use App\Medication;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;

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

    	$create = Medication::create(
    		$request->only((new Medication)->getFillable())
    	);

    	if($create){
            SweetAlert::success('Created successfully')->persistent("Close");
        }else{
            sweetAlert::error('There is an error! try again later');
        }

    	return redirect()->route('medications.index');
    }



}
