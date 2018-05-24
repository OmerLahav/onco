<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class ChartsController extends Controller
{


    public function googleLineChart()
    {
        $visitorChartData = DB::table('patient_data')
            ->select(

                DB::raw("type as type"),
              DB::raw("COUNT(user_id) as user_id"))
            ->groupBy("type")

            ->get();


        $result[] = ['type',' user_id'];
        foreach ($visitorChartData as $key => $value) {
            $result[++$key] = [ $value->type, $value->user_id];
        }


        return json_encode($result);

    }


    public function googleLineChart2()
    {
        $activeChartData = DB::table('patient_data')
            ->select(

                 DB::raw("patient_status as patient_status"),
              DB::raw("COUNT(user_id) as user_id"))
            ->groupBy("patient_status")
            ->get();
           
        $result[] = ['patient_status',' user_id'];
        foreach ($activeChartData as $key => $value) {
            $result[++$key] = [ $value->patient_status, $value->user_id];
        }
        


        return json_encode($result);
    }


}
