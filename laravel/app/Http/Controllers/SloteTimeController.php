<?php
namespace App\Http\Controllers;

use App\SlotRange,App\User;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use Validator;
use DB,Auth;

class SloteTimeController extends Controller
{
    public function index()
    {
        //Return login secratory user all created slots or particular doctore so base on login user role
        if(Auth::user()->isDoctor())
        {
            return view('time_slot.index')->withTimeslots(SlotRange::where('user_id','=',Auth::user()->id)->get());
        }
        else
        {
            return view('time_slot.index')->withTimeslots(SlotRange::where('created_by','=',Auth::user()->id)->get());
        }
    }

    public function create()
    {
        //Get All Nurse and Doctore of that secratory
        $users = User::whereIn('role',['1','2'])->get();
    	return view('time_slot.create')->withUsers($users);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'user_id' => 'required|numeric',
            'user_type' => 'required',
            'slot_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'slot_time_in_minute' => 'required',
            'type'      => 'required'
        ]);

    	if($validation->fails()){
            SweetAlert::error('There is an error! Please pass all input.')->persistent("Close");
            return redirect()->route('slots_time.create');
        }

    	$create = SlotRange::create(
    		$request->only((new SlotRange)->getFillable())
    	);

        if($create){
            SweetAlert::success('Created successfully')->persistent("Close");
        }

    	return redirect()->route('slots_time.index');
    }


    function Slot_delete($id)
    {
        $deleting=  DB::table ('slot_range')->where('id','=',$id )->delete();

//      if query failed
        if($deleting!=1){
            SweetAlert::error('There is an error! ')->persistent("Close");
            return redirect()->route('slots_time.index');

        }
        else {

            SweetAlert::success('Deleted successfully')->persistent("Close");
            return redirect()->route('slots_time.index');
        }

    }

    public function Slot_edit($id)
    {

        $slot_range = SlotRange::find($id);
        //Get All Nurse and Doctore of that secratory
        
        $users = User::whereIn('role',['1','2'])->get();
        return view('time_slot.edit',compact('slot_range','id'))->withUsers($users);
    

     }



    public function Slot_update(Request $request,$id)
    {
        $this->validate($request,[
            'user_id' => 'required|numeric',
            'user_type' => 'required',
            'slot_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'slot_time_in_minute' => 'required',
            'type'      => 'required'
        ]);
        $slot_time= SlotRange::find($id);
        $slot_time->user_id=$request->get('user_id');
        $slot_time->user_type=$request->get('user_type');
        $slot_time->slot_date=$request->get('slot_date');
        $slot_time->start_time=$request->get('start_time');
        $slot_time->end_time=$request->get('end_time');
        $slot_time->slot_time_in_minute=$request->get('slot_time_in_minute');
        $slot_time->type=$request->get('type');
        $slot_time->save();


        //   if update failed
        if($slot_time==null){
            SweetAlert::error('There is an error! ')->persistent("Close");
            return redirect()->route('slots_time.index');

        }
        else {
            SweetAlert::success('Updated successfully')->persistent("Close");
            return redirect()->route('slots_time.index');
        }


    }
}
