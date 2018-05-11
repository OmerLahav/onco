<?php

namespace App\Http\Controllers;

use App\Medication;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use Validator;
use Auth;
use DB;

class MedicationsController extends Controller
{

    public function index()
    {
        if ((Auth::user()->isDoctor())or (Auth::user()->isNurse())){

        return view('medications.index')
            ->withMedications(Medication::all());
        }
        else
            return view('errors.404');

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
//        if query failed

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

    function delete ($id)
    {
      $deleting=  DB::table ('medications')->where('id','=',$id )->delete();


//      if query failed
        if($deleting!=1){
            SweetAlert::error('There is an error! ')->persistent("Close");
            return redirect()->route('medications.index');

        }
            else {
                SweetAlert::success('Deleted successfully')->persistent("Close");
                return redirect()->route('medications.index');
            }

    }



}
