<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentMedication extends Model
{
    protected $fillable = ['treatment_id', 'medication_id', 'day_part', 'ends_at'];

    protected $dates = ['ends_at'];

    const DAY_PARTS = ['Morning', 'Afternoon', 'Evening', 'Night'];

    public function medication()
    {
    	return $this->belongsTo(Medication::class);
    }
}
