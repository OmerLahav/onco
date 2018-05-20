<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['identification_number','birth_date', 'first_name', 'last_name', 'email', 'phone', 'password', 'role'];

    protected $hidden = ['password', 'remember_token',];

    protected $attributes = [
        'role' => 0
    ];

    public function getRoleName($roleid)
    {
        $roles_name = ['1'=>'Doctor','2'=>'Nurse','3'=>'Patient','4'=>'Secratory','5'=>'Admin'];
        return (array_key_exists($roleid,$roles_name)?$roles_name[$roleid]:'--N/A--');
    }

    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function scopeStaff($query)
    {
        return $query->whereIn('role', [1,2,5]);
    }

    public function scopePatient($query)
    {
        return $query->where('role', 3);
    }

    public function isDoctor()
    {
        return $this->role == '1';
    }

    public function isNurse()
    {
        return $this->role == '2';
    }
	public function isPatient()
    {
        return $this->role == '3';
    }

    public function isSecratory()
    {
        return $this->role == '4';
    }
    public function isAdmin()
    {
        return $this->role == '5';
    }
    public function patient_data()
    {
        return $this->hasOne(PatientData::class, 'user_id');
    }

    //check already exist value by using key name and key value

    public static  function checkAlreadyExist($key,$value,$ids=[]){
        return self::where($key,$value)->whereNotIn('id',$ids)->count();
    } 


    public function doctor_treatments()
    {
        return $this->hasMany(Treatment::class)->where('user_id', Auth::user()->id);
    }

    public function medications()
    {
        return $this->hasManyThrough(TreatmentMedication::class, Treatment::class);
    }
}
