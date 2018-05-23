<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
	protected $fillable = [
		'name', 'importance_level', 'image'
	];

	public function reports()
	{
	    return $this->hasMany('App\SymptomReport');
	}

	public function treatments()
    {
        return $this->belongsToMany(Treatment::class,'symptom_treatment','symptom_id','treatment_id');
    }

    public function symptom_desc()
	{
	    return $this->hasMany('App\SymptomDesc');
	}
	
}
