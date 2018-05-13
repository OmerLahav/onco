@extends ('layouts.portal')

@section ('content')
<div class="page-wrapper">
        <div class="page-wrapper-container">
<h1>Dashboard</h1>
<div class="container bootstrap snippet ">

    <div class="row margin-bottom-10  ">
        
        <div class="box col-sm-4 ">
            <div class="servive-block servive-block-0">
                <i class="icon-3x color-light fas fa-users fa-3x"></i>
                <h2 class="heading-md">Patients</h2>
                <div class="text-box">
                    <p>12 </p>
                </div>
                <a href="{{ route('patients.index') }}" class="btn-style">Add new patient</a>

            </div>
        </div>
        
        
        <div class="box col-sm-4 ">
            <div class="servive-block servive-block-1">
                <i class="icon-3x color-light fas fa-heartbeat fa-3x"></i>
                <h2 class="heading-md">Self Report</h2>
                <div class="text-box">
                    <p>You have not recorded any symptoms for the last day. </p>
                </div>
                <button type="button" class="btn-style">Report Now</button>

            </div>
        </div>
        
        <div class="box col-sm-4 ">
            <div class="servive-block servive-block-2">
                <i class="icon-3x color-light fas fa-stethoscope fa-3x"></i>
                <h2 class="heading-md">Treatments</h2>
                <div class="text-box">
                    <p>12 </p>
                </div>
                <button type="button" class="btn-style">Add new treatment</button>

            </div>
        </div>
        
        <div class="box col-sm-4">
            <div class="servive-block rounded servive-block-3">
                <i class="icon-3x color-light fas fa-pills fa-3x"></i>
                <h2 class="heading-md">Medications</h2>
                <div class="text-box">
                    <p>You have not taken a medication for the evening.</p>
                </div>
                <button type="button" class="btn-style">Add new medications </button>
            </div>
        </div>
        <div class="box col-sm-4">
            <div class="servive-block rounded servive-block-4">
                <i class="icon-3x color-light fas fa-calendar-check fa-3x"></i>
                <h2 class="heading-md">Appointments</h2>
                <div class="text-box">
                    <p>2</p>
                </div>
                <button type="button" class="btn-style">Appointment</button>
            </div>
        </div>

        <div class="box col-sm-4">
            <div class="servive-block rounded servive-block-5">
                <i class="icon-3x color-light fas fa-envelope fa-3x"></i>
                <h2 class="heading-md">Messages</h2>
                <div class="text-box">
                    <p>you have not messages.</p>
                </div>
                <button type="button" class="btn-style">See inbox</button>
            </div>
        </div>

    </div>
</div>
</div>
</div>

@stop
