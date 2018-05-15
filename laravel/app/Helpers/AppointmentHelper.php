<?php
namespace App\Helpers;
class AppointmentHelper {

  public static function  createSlots($starttime,$endtime,$duration,$booked_slots) 
  {
    $slots = [];
    if($starttime < $endtime)
    {
      $start_time    = strtotime ($starttime); //change to strtotime
      $end_time      = strtotime ($endtime); //change to strtotime
      $add_mins  = $duration * 60;
      while ($start_time <= $end_time) // loop between time
      {
        if(!in_array(date("H:i:s", $start_time),$booked_slots))
        {
         $slots[] = date ("H:i:s", $start_time);
         $start_time += $add_mins; // to check endtie=me
        }
      }
    }
    return $slots;
  }
}

?>