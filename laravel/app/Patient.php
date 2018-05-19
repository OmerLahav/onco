<?php

namespace App;

class Patient extends User
{
    protected $table = 'users';

    public static function allPatients()
    {
    	return User::patient()->get();
    }

    public function treatments()
    {
    	return $this->hasMany(Treatment::class);
    }

    public function medications()
    {
    	return $this->hasManyThrough(TreatmentMedication::class, Treatment::class);
    }
}
