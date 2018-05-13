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
        if (Auth::user()->isDoctor()){

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
            SweetAlert::error('There is an error! Please provide madication name')->persistent("Close");
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

    public function edit($id)
    {

        $medication = medication::find($id);

        return view('medications.edit',compact('medication','id'));
    }



    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required'
//            'drug_strengths' => 'required'
        ]);
        $medication= medication::find($id);
        $medication->name=$request->get('name');
//        $medication->importance_level=$request->get('drug_strengths');
        $medication->save();


//      if update failed
        if($medication==null){
            SweetAlert::error('There is an error! ')->persistent("Close");
            return redirect()->route('medications.index');

        }
        else {
            SweetAlert::success('Updated successfully')->persistent("Close");
            return redirect()->route('medications.index');
        }

    }



}
