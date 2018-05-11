<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = ['user_id', 'patient_id', 'name', 'description', 'ends_at'];

    protected $dates = ['ends_at'];

    public function symptoms()
    {
    	return $this->belongsToMany(Symptom::class);
    }

    public function medications()
    {
    	return $this->hasMany(TreatmentMedication::class);
    }

    public function patient()
    {
    	return $this->belongsTo(Patient::class);
    }
}
