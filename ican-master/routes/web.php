<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);

Route::get('405',['as'=>'405','uses'=>'ErrorHandlerController@errorCode405']);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/forgot-password','ForgotPasswordController@forgotPassword');
Route::post('/forgot-password','ForgotPasswordController@postForgotPassword');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('medications', 'MedicationsController', ['only' => ['index', 'create', 'store']]);
Route::resource('symptoms', 'SymptomsController', ['only' => ['index', 'create', 'store']]);
Route::resource('treatments', 'TreatmentsController', ['only' => ['index', 'create', 'store', 'show']]);
Route::resource('patients', 'PatientsController', ['only' => ['index', 'create', 'store', 'show']]);
Route::post('patients/{patient}', 'PatientsController@addTreatment')->name('patients.add_treatment');
Route::get('team', 'TeamController@index')->name('team.index');
Route::get('team/add', 'TeamController@create')->name('team.create');
Route::post('team', 'TeamController@store')->name('team.store');
