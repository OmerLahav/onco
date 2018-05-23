<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Treatment extends Model
{
    protected $fillable = ['user_id', 'patient_id', 'name', 'description', 'ends_at'];

    protected $dates = ['ends_at'];

    public function symptoms()
    {
        return $this->belongsToMany(Symptom::class,'symptom_treatment','treatment_id','symptom_id')->with('symptom_desc');
    }

    public function medications()
    {
        return $this->hasMany(TreatmentMedication::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }


    public function medications_patient()
    {
        return $this->hasmany('App\TreatmentMedication','treatment_id','id');
    }

    public function getDatesAttribute()
    {
        return Collection::times($this->created_at->diffInDays(), function ($number) {
            dd($this);
            return $this->created_at->addDays($number-1)->format('Y-m-d');
        })->flip()->flatten();
    }
}
