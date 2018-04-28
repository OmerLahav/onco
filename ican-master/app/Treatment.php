<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = ['name', 'description'];

    public function symptoms()
    {
    	return $this->belongsToMany(Symptom::class);
    }

    public function medications()
    {
    	return $this->belongsToMany(Medication::class);
    }
}
