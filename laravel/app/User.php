<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['identification_number', 'first_name', 'last_name', 'email', 'phone', 'password', 'role'];

    protected $hidden = ['password', 'remember_token',];

    protected $attributes = [
        'role' => 0
    ];

    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function scopeStaff($query)
    {
        return $query->whereIn('role', [1,2]);
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

    public function patient_data()
    {
        return $this->hasOne(PatientData::class, 'user_id');
    }
}
