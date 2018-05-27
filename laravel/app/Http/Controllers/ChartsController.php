<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

use DB;


class ChartsController extends Controller
{


    public function googleLineChart()
    {
         if (Auth::user()->isDoctor())
         {
            $visitorChartData = DB::table('patient_data')
            ->select(
            DB::raw("type as type"),
            DB::raw("COUNT(user_id) as user_id"))
            ->groupBy("type")
            ->where('doctor_id','=',Auth::user()->id)
            ->get();
            }
            else
            {
            $visitorChartData = DB::table('patient_data')
            ->select(
            DB::raw("type as type"),
            DB::raw("COUNT(user_id) as user_id"))
            ->groupBy("type")
            ->get();

            }


        $result[] = ['type',' user_id'];
        foreach ($visitorChartData as $key => $value) {
            $result[++$key] = [ $value->type, $value->user_id];
        }


        return json_encode($result);

    }


    public function googleLineChart2()
    {

         if (Auth::user()->isDoctor())
         {
            $activeChartData = DB::table('patient_data')
            ->select(
            DB::raw("patient_status as patient_status"),
            DB::raw("COUNT(user_id) as user_id"))
            ->groupBy("patient_status")
            ->where('doctor_id','=',Auth::user()->id)
            ->get();
        }
        else
        {
             $activeChartData = DB::table('patient_data')
            ->select(
            DB::raw("patient_status as patient_status"),
            DB::raw("COUNT(user_id) as user_id"))
            ->groupBy("patient_status")
            ->get();
        }

        
           
        $result[] = ['patient_status',' user_id'];
        foreach ($activeChartData as $key => $value) {
            $result[++$key] = [ $value->patient_status, $value->user_id];
        }
        


        return json_encode($result);
    }


}
