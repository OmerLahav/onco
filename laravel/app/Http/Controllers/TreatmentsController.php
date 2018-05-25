<?php

namespace App\Http\Controllers;

use App\Medication;
use App\Symptom;
use App\Treatment;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use Validator;
use DB,Auth;
class TreatmentsController extends Controller
{
    public function index()
    {
        if(Auth::user()->isDoctor())
        {
            //Doctor Show only His Treatments
           return view('treatments.index')
    		->withTreatments(Treatment::where('user_id',Auth::user()->id)->with(['patient'])->get());
        }
        elseif(Auth::user()->isNurse() || Auth::user()->isAdmin())
        {
            //Nurse Show All treatment
            return view('treatments.index')
            ->withTreatments(Treatment::with(['patient'])->all());
        }
    }

    public function create()
    {
    	return view('treatments.create')
    		->withSymptoms(Symptom::all())
    		->withMedications(Medication::all());
    }

    public function store(Request $request)
    {
        
        $validation = Validator::make($request->all(),[
    		'name' => 'required',
    		'description' => 'required',
    	]);

        if($validation->fails()){
            SweetAlert::error('There is an error! Please provide your name')->persistent("Close");
            return redirect()->route('treatments.create');
        }

    	$create=$treatment = Treatment::create(
    		$request->only((new Treatment)->getFillable())
    	);

        $treatment->symptoms()->sync($request->symptoms);
    	//$treatment->medications()->sync($request->medications);

        if($create){
            SweetAlert::success('Added successfully')->persistent("Close");
        }
    	return redirect()->route('treatments.index');
    }

    public function show(Treatment $treatment)
    {
    	return view('treatments.show')
    		->withTreatment($treatment);
    }

    function Treatment_delete($id)
    {
        $deleting=  DB::table ('treatments')->where('id','=',$id )->delete();

//      if query failed
        if($deleting!=1){
            SweetAlert::error('There is an error! ')->persistent("Close");
            return redirect()->route('treatments.index');

        }
        else {

            SweetAlert::success('Deleted successfully')->persistent("Close");
            return redirect()->route('treatments.index');
        }

    }

    public function Treatment_edit($id)
    {
        $treatment_sympotoms = [];
        $treatments = Treatment::where('id',$id)->with(['symptoms'])->first();

        if(isset($treatments->symptoms))
        {
            $treatment_sympotoms = array_column($treatments->symptoms->toArray(),'id');
        }
        
        // Load user/createOrUpdate.blade.php view
        return view('treatments.edit',compact('treatments','id'))->withSymptoms(Symptom::all())
            ->withMedications(Medication::all())->withTreatmentSymptoms($treatment_sympotoms);
    }



    public function Treatment_update(Request $request,$id)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'ends_at' => 'required',
        ]);

        if($validation->fails()){
            SweetAlert::error('There is an error! Please provide your name')->persistent("Close");
            return redirect()->route('treatments.create');
        }

        
        $treatments= Treatment::find($id);
        $treatments->name=$request->get('name');
        $treatments->description=$request->get('description');
        $treatments->ends_at = date('Y-m-d H:i:s',strtotime($request->get('ends_at')));
        $treatments->save();

        //Remove Current Sympotos of this Treatments
       
        DB::table ('symptom_treatment')->where('treatment_id','=',$id )->delete();



        if(isset($request->symptoms) && $request->symptoms != "" )
        {
            //Add sympotoms of this Treatment 
            $treatments->symptoms()->sync($request->symptoms);
        }            

        //   if update failed
        if($treatments==null){
            SweetAlert::error('There is an error! ')->persistent("Close");
            return redirect()->route('treatments.index');

        }
        else {
            SweetAlert::success('Updated successfully')->persistent("Close");
            return redirect()->route('treatments.index');
        }


    }
}
