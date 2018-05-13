<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;

class TeamController extends Controller
{
    public function index()
    {
    	return view('team.index')->withTeam(User::staff()->get());
    }

    public function create()
    {
    	return view('team.create');
    }

    public function store()
    {
    	$create= User::create([
    		'role' => request('role'),
    		'identification_number' => request('identification_number'),
    		'first_name' => request('first_name'),
    		'last_name' => request('last_name'),
    		'email' => request('email'),
    		'password' => bcrypt(request('password')),
    		'phone' => request('phone'),
    	]);
        if($create){
            SweetAlert::success('Added successfully')->persistent("Close");
        }else{
             SweetAlert::error('There is an error! ')->persistent("Close");
        }
    	return redirect()->route('team.index');
    }
}
