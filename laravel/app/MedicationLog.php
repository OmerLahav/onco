<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicationLog extends Model
{
    protected $fillable = ['patient_id', 'treatment_medication_id'];
}
