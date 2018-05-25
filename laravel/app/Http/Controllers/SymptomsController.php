<?php

namespace App\Http\Controllers;

use App\Symptom,App\SymptomDesc;
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
            'importance_level' => 'required|numeric',
            'image'=>'required|image|mimes:jpeg,bmp,png|max:2000',
            'description' => 'required',
            'description_0' => 'required',
            'description_1' => 'required',
            'description_2' => 'required',
            'description_3' => 'required',
            'description_4' => 'required',
        ]);

    	if($validation->fails()){
            SweetAlert::error('There is an error! All input must be enter.')->persistent("Close");
            return redirect()->route('symptoms.create');
        }

        //Store Image on Server
         $file = $request->file('image');
   
        //Move Uploaded File
          $destinationPath = public_path().'/images/symptoms/';
          $filename = rand('111','999').$file->getClientOriginalName();
          $file->move($destinationPath,$filename);
          

          $createsympt = new Symptom;
          $createsympt->description = $request->description;
          $createsympt->name = $request->name;
          $createsympt->image = $filename;
          $createsympt->importance_level = $request->importance_level;
          $createsympt->save();
          
          //Save Symtoms Level with description
          for($i=0;$i<5;$i++)
          {
              $symdesc = new SymptomDesc;
              $symdesc->symptom_id = $createsympt->id;
              $symdesc->level = $i;
              $symdesc->description = request('description_'.$i);
              $symdesc->color = request('color_'.$i);
              $symdesc->save();
          }

    	/*$create = Symptom::create(
    		$request->only((new Symptom)->getFillable())
    	);*/

        if($createsympt){
            SweetAlert::success('Created successfully')->persistent("Close");
        }

    	return redirect()->route('symptoms.index');
    }


    function Symp_delete ($id)
    {
        $deleting=  DB::table ('symptoms')->where('id','=',$id )->delete();
        DB::table ('symptom_desc')->where('symptom_id','=',$id )->delete();


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

        $symptom = symptom::where('id',$id)->with(['symptom_desc'])->get()->toArray();
        // Load user/createOrUpdate.blade.php view
        return view('symptoms.edit',compact('symptom','id'));
    }



    public function Symp_update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
            'importance_level' => 'required|numeric',
            'description' => 'required',
            'description_0' => 'required',
            'description_1' => 'required',
            'description_2' => 'required',
            'description_3' => 'required',
            'description_4' => 'required',
        ]);

        $symptom= symptom::find($id);
        
        //check if image upload by user then save into db other wise it take old one
        if($request->image != "")
        {
            $destinationPath = public_path().'/images/symptoms/';
            $old_img_path = $destinationPath.$symptom->image;
            //Remove old image from folder becuz of dummy storage space no consume
            if(file_exists($old_img_path)) {
               @unlink($old_img_path);
            } 
            //Store Image on Server
            $file = $request->file('image');
            //Move Uploaded File
            $filename = rand('111','999').$file->getClientOriginalName();
            $file->move($destinationPath,$filename);
        } 

        $symptom->name=$request->get('name');

        if($request->image != "")
        {
            $symptom->image = $filename;
        }
        $symptom->description = $request->description; 
        $symptom->importance_level=$request->get('importance_level');
        $symptom->save();

        for($i=0;$i<5;$i++)
        {
          $symdesc = SymptomDesc::find(request('id_'.$i));
          $symdesc->level = $i;
          $symdesc->description = request('description_'.$i);
          $symdesc->color = request('color_'.$i);
          $symdesc->save();
        }

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
