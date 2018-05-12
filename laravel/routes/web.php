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

//error
Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);
Route::get('405',['as'=>'405','uses'=>'ErrorHandlerController@errorCode405']);


Route::get('settings', 'SettingsController@index')->name('settings');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/forgot-password','ForgotPasswordController@forgotPassword');
Route::post('/forgot-password','ForgotPasswordController@postForgotPassword');


//dashboard
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

//medications
Route::resource('medications', 'MedicationsController',
    ['only' => ['index', 'create', 'store'],
        'names' => ['index' => 'medications.index']
    ]);
Route::get('/delete/{medication}' ,'MedicationsController@delete');
Route::get('/edit/{medication}','MedicationsController@edit');
Route::post('/update/{medication}','MedicationsController@update');


//symptoms
Route::resource('symptoms', 'SymptomsController',
    ['only' => ['index', 'create', 'store'],
     'names' => ['index' => 'symptoms.index']
]);
Route::get('/Symp_delete/{symptom}' ,'SymptomsController@Symp_delete');
Route::get('/Symp_edit/{symptom}','SymptomsController@Symp_edit');
Route::post('/Symp_update/{symptom}','SymptomsController@Symp_update');



//treatments
Route::resource('treatments', 'TreatmentsController', ['only' => ['index', 'create', 'store', 'show']]);
Route::resource('patients', 'PatientsController', ['only' => ['index', 'create', 'store', 'show']]);
Route::post('patients/{patient}', 'PatientsController@addTreatment')->name('patients.add_treatment');


//Team
Route::get('team', 'TeamController@index')->name('team.index');
Route::get('team/add', 'TeamController@create')->name('team.create');
Route::post('team', 'TeamController@store')->name('team.store');
Route::post('Team_delete,{member}', 'TeamController@Team_delete');

//dashboard charts
Route::get('google-pie-cancer-type-chart', 'ChartsController@googleLineChart');
Route::get('google-2-chart', 'ChartsController@googleLineChart2');

//reportsGenetator
Route::get('generateReport', 'GenerateReportController@index');





