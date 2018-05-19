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


Route::get('/phpinfo', function () {    
    echo phpinfo();
});




Auth::routes();

// Application Api CronJob Route Start.
    Route::group(['prefix' => 'cron-jobs','namespace' => 'CronJobs'], function () {
        Route::any("/patient-tratment-status",array(  //1)set status of patient base on medicine he taken on a particular time 
            'uses' => 'CronController@patient_treatment_status'));

    });
// Application Api CronJob Route End.



//error
Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);
Route::get('405',['as'=>'405','uses'=>'ErrorHandlerController@errorCode405']);


Route::get('settings', 'SettingsController@index')->name('settings');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/forgot-password','ForgotPasswordController@forgotPassword');
Route::post('/forgot-password','ForgotPasswordController@postForgotPassword');


Route::post('/forgot-password-new','ForgotPasswordController@postForgotPasswordNew')->name('password.email');

//Start User Reset Password Route 

Route::any("reset-password/{fcode}",array(//1)user reset password form in web side
    'as'=>'userforgotpassword',
    'uses' => 'ForgotPasswordController@user_reset_password_form'));

Route::post("reset-password",array( //2)user reset password submit form in web side
    'as'=>'reset_password_submit',
    'uses' => 'ForgotPasswordController@user_reset_password_submit'));

Route::get("reset-password_msg/{msg}",array( //3)user reset password msg screen in web side
            'as'=>'reset_password_msg',
            'uses' => 'ForgotPasswordController@reset_password_msg'));



//End User Reset Password Route



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

//symptoms
Route::resource('slots_time', 'SloteTimeController',
    ['only' => ['index', 'create', 'store'],
     'names' => ['index' => 'slots_time.index']
]);
Route::get('/Slot_delete/{slot}' ,'SloteTimeController@Slot_delete');
Route::get('/Slot_edit/{slot}','SloteTimeController@Slot_edit');
Route::post('/Slot_update/{slot}','SloteTimeController@Slot_update');



//treatments
Route::resource('treatments', 'TreatmentsController', ['only' => ['index', 'create', 'store', 'show']]);
Route::get('/Treatment_delete/{treatmentid}' ,'TreatmentsController@Treatment_delete');
Route::get('/Treatment_edit/{treatmentid}','TreatmentsController@Treatment_edit');
Route::post('/Treatment_update/{treatmentid}','TreatmentsController@Treatment_update');



Route::resource('patients', 'PatientsController', ['only' => ['index', 'create', 'store', 'show']]);
Route::post('patients/{patient}', 'PatientsController@addTreatment')->name('patients.add_treatment');


//Team
Route::get('team', 'TeamController@index')->name('team.index');
Route::get('team/add', 'TeamController@create')->name('team.create');
Route::post('team', 'TeamController@store')->name('team.store');
Route::get('Team_delete/{member}', 'TeamController@Team_delete');
Route::get('/Team_edit/{member}','TeamController@Team_edit');
Route::post('/Team_update/{member}','TeamController@Team_update');



//dashboard charts
Route::get('google-pie-cancer-type-chart', 'ChartsController@googleLineChart');
Route::get('google-2-chart', 'ChartsController@googleLineChart2');

//reportsGenetator
Route::get('generateReport', 'GenerateReportController@index');

//Google Calender API Redirect for Save Details

Route::any("api/google_calender",array( 
            'as'=>'api.google_calender_for_book_appoinment',
            'uses' => 'AppointmentsController@googleCalendarLink'));


//Start Appointment Related Routes



Route::get("appointments",array( 
            'as'=>'appointments.get',
            'uses' => 'AppointmentsController@getAppointments'));

Route::any("appointments/add",array( 
            'as'=>'appointments.create',
            'uses' => 'AppointmentsController@addAppointments'));


Route::any("appointments/{appointmentsid}/edit",array( 
            'as'=>'appointments.edit',
            'uses' => 'AppointmentsController@editAppointments'));

Route::any("appointments/slots",array( 
            'as'=>'appointments.slots',
            'uses' => 'AppointmentsController@getAppointmentsSlots'));

Route::any("appointments/{appointmentsid}/delete",array( 
            'as'=>'appointments.delete',
            'uses' => 'AppointmentsController@deleteAppointment'));



//End Appointment Related Routes


Route::post('treatmentmedications', 'TreatmentMedicationsController@store')->name('treatmentmedications.store');
Route::get('patients/medicationreports/create', 'Patients\MedicationReportsController@create')->name('patients.medicationreports.create');
Route::post('medicationlogs', 'Patients\MedicationLogsController@postMedicationByPatient');
Route::post('patients/{patient}', 'PatientsController@addTreatment')->name('patients.add_treatment');
Route::get('medicationlogs', 'MedicationLogsController@index')->name('medicationlogs.index');

Route::get('symptom-reports/create', 'Patients\SymptomReportsController@create')->name('symptopsreports.create');


