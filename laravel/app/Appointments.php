<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Appointments extends Model
{
    public $timestamps = true;
    protected $table = 'appointments';    
    
    //Set Fillable Property

    protected $fillable = ['patient_id','appointment_date','medical_staff_type','appointment_time', 'status','type','medical_staff_id'];


    //Define model level constant related to table
    const TYPE_REGULAR  = 'Regular';
    const TYPE_PRESERVED = 'Preserved';
    
    const STAFF_TYPE_DOCTOR  = 'Doctor';
    const STAFF_TYPE_NURSE = 'Nurse';
        
            
    const STATUS_REGULAR  = 'None';
    const STATUS_SCHEDULES = 'Scheduled';
    const STATUS_UNSCHEDULED = 'Unscheduled';
    
    
    //Define model Level laravel relationship
    public function provider()
    {
        return $this->hasOne('App\User','id','medical_staff_id');
    }

    public function patient()
    {
        return $this->hasOne('App\User','id','patient_id');
    }


    //Model Level Query Function
    public static function get_list($key_value_array) {
        return  self::where($key_value_array)->with(['provider','patient'])->get();               
    }

    public static function checkAlreadyBookAppointment($appointment_date,$appointment_time,$role) {
        return self::where('appointment_date','=',$appointment_date)->where('appointment_time','=',$appointment_time)->where('medical_staff_type','=',$role)->count();
    }

}
