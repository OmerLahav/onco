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
}
