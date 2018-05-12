<?php

namespace App\Http\Controllers;

use App\Symptom;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use Validator;
use DB;

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


    function Symp_delete ($id)
    {
        $deleting=  DB::table ('symptoms')->where('id','=',$id )->delete();

//      if query failed
        if($deleting!=1){
            SweetAlert::error('There is an error! ')->persistent("Close");
            return redirect()->route('symptoms.index');

        }
        else {

            SweetAlert::success('Deleted successfully')->persistent("Close");
            return redirect()->route('symptoms.index');
        }

    }

    public function Symp_edit($id)
    {

        $symptom = symptom::find($id);
        // Load user/createOrUpdate.blade.php view
        return view('symptoms.edit',compact('symptom','id'));
    }



    public function Symp_update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
            'importance_level' => 'required|numeric'
        ]);
        $symptom= symptom::find($id);
        $symptom->name=$request->get('name');
        $symptom->importance_level=$request->get('importance_level');
        $symptom->save();


        //   if update failed
        if($symptom==null){
            SweetAlert::error('There is an error! ')->persistent("Close");
            return redirect()->route('symptoms.index');

        }
        else {
            SweetAlert::success('Updated successfully')->persistent("Close");
            return redirect()->route('symptoms.index');
        }


    }
}
