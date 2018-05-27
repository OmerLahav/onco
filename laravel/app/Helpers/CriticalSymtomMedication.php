<?php
namespace App\Helpers;
use App\Treatment;
use App\TreatmentMedication;
use App\MedicationLog;
use App\SymptomReport;
use  App\TreatmentSymtoms;
use DB;
class CriticalSymtomMedication {

  public static function  getCriticalMedication($doctoreid=0,$patientid = 0,$nurseid = 0) 
  {

    //Get All Previous Day Running Treatment 
    if($patientid != 0)
    {
       $treatmentIds = Treatment::where('patient_id',$patientid)->where(DB::raw("DATE(treatments.ends_at)"),">=",date('Y-m-d'))->pluck('id')->toArray();
    }
    if($doctoreid != 0)
    {
      $treatmentIds = Treatment::where('user_id',$doctoreid)->where(DB::raw("DATE(treatments.ends_at)"),">=",date('Y-m-d'))->pluck('id')->toArray();
    }
    if($nurseid != 0)
    {
      $treatmentIds = Treatment::where(DB::raw("DATE(treatments.ends_at)"),">=",date('Y-m-d'))->pluck('id')->toArray();
    }

    if(!empty($treatmentIds))
    {
      //Get All Tratment Medication related to above id
      $treatmentmedicationIds = TreatmentMedication::where(DB::raw("DATE(treatment_medications.ends_at)"),">=",date('Y-m-d'))->whereIn('treatment_id',$treatmentIds)->pluck('id')->toArray();
  
   
      if(!empty($treatmentmedicationIds))
      {
          //Get All Medication Lofs
          $query  = MedicationLog::where(DB::raw("DATE(medication_logs.created_at)"),"=",date('Y-m-d'));
          if($patientid != 0)
          {
            $query = $query->where('patient_id',$patientid);
          }

          $submited_medicationlog_count = $query->whereIn('treatment_medication_id',$treatmentmedicationIds)->count();

          $countTreatment =  count($treatmentmedicationIds);
          if($submited_medicationlog_count > 0)
          {
             return $countTreatment  - $submited_medicationlog_count;
          }
          else
          {
            return $countTreatment;
          }
      }
    }
    return 0;                   
  }

  public static function  getCriticalSymtoms($doctoreid=0,$patientid = 0,$nurseid = 0) 
  {

    //Get All Previous Day Running Treatment 
    if($patientid != 0)
    {
       $treatmentIds = Treatment::where('patient_id',$patientid)->where(DB::raw("DATE(treatments.ends_at)"),">=",date('Y-m-d'))->pluck('id')->toArray();
    }
    if($doctoreid != 0)
    {
      $treatmentIds = Treatment::where('user_id',$doctoreid)->where(DB::raw("DATE(treatments.ends_at)"),">=",date('Y-m-d'))->pluck('id')->toArray();
    }

    if($nurseid != 0)
    {
      $treatmentIds = Treatment::where(DB::raw("DATE(treatments.ends_at)"),">=",date('Y-m-d'))->pluck('id')->toArray();
    }

    if(!empty($treatmentIds))
    {
      //Get All Tratment Symtoms related to above id
      $treatmentsymtomsIds = TreatmentSymtoms::whereIn('treatment_id',$treatmentIds)->pluck('symptom_id')->toArray();
  
   
      if(!empty($treatmentsymtomsIds))
      {
          //Get All Symtom Reports Lofs
          $query  = SymptomReport::where(DB::raw("DATE(symptom_reports.created_at)"),"=",date('Y-m-d'));
          if($patientid != 0)
          {
            $query = $query->where('patient_id',$patientid);
          }

          $submited_symtomsreports_count = $query->whereIn('symptoms_id',$treatmentsymtomsIds)->where('status','Critical')->count();

          return $submited_symtomsreports_count;
          
      }
    }
    return 0;                   
  }
}

?>