<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientData extends Model
{
	protected $table = 'patient_data';

    protected $fillable = [
		'gender', 'type','doctor_id','contact_relation', 'contact_name', 'contact_phone', 'contact_email', 'is_active'
    ];

    public function patient_data()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    
    public function doctore_data()
    {
        return $this->hasOne(User::class,'id','doctor_id');
    }
}
