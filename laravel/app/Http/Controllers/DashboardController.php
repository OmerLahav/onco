<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;


class DashboardController extends Controller
{
    public function index()
    {

        //google charts
        $googlepie   = new ChartsController();
        $chartsArray = $googlepie->googleLineChart();
        $visitor     = $chartsArray;

        $googlechart  = new ChartsController();
        $chartsArray2 = $googlechart->googleLineChart2();
        $active       = $chartsArray2;


        if ((Auth::user()->isDoctor()) or (Auth::user()->isNurse()))
            return view('dashboard.index', ['visitor' => $visitor],['active' => $active]);
        else
            return view('dashboard.index');

    }
    //doctors dashboard top data
//    public function updateData()
//    {
//        $res1 = DB::table('users')
//            ->where('role', '=', 3)
//            ->get();
//
//        $res1 = (count($res1));
//
//        if ((Auth::user()->isDoctor()) or (Auth::user()->isNurse()))
//            return view('dashboard.index', compact('res1'));
//        else
//            return view('dashboard.index');
//
//    }


}



