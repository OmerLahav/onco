<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Symptom;
class TreatmentSymtoms extends Model
{
    
    protected $table = 'symptom_treatment'; 
    protected $fillable = ['treatment_id', 'medication_id'];

    
    
    public function symtoms()
    {
    	return $this->belongsTo(Symptom::class);
    }
}
