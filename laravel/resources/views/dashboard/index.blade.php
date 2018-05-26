@extends ('layouts.portal') @section ('content')


<div class="page-wrapper">
    <div class="page-wrapper-container">
        <h1>Dashboard</h1>

        {{--Doctors dashboard--}} @if ((Auth::user()->isNurse()) or (Auth::user()->isDoctor()) ) {{--Data boxes--}}
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="dash-box dash-box-color-3">
                        <div class="dash-box-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>

                        <div class="dash-box-body">
                            <span class="dash-box-count">{{$CurrentDayMedicationReportCount or '0'}}</span>
                        
                            <span class="dash-box-title">Medications left to report today</span>
                        </div>

                        <div class="dash-box-action">
                            <button class="stuff_btn"><a href="#">More Info</a></button>
                        </div>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="dash-box dash-box-color-1">
                        <div class="dash-box-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>

                        <div class="dash-box-body">
                            <span class="dash-box-count">{{$CurrentDaySymtomReportCount or '0'}}</span>
                        
                            <span class="dash-box-title">Critical symptoms reports</span>
                        </div>

                        <div class="dash-box-action">
                            <button class="stuff_btn"><a href="#">More Info</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dash-box dash-box-color-2">
                        <div class="dash-box-icon">
                            <i class="fas fa-pills" aria-hidden="true"></i>
                        </div>
                        <div class="dash-box-body">
                            @if (Auth::user()->isDoctor())
                            <span class="dash-box-count">{{$CriticalCountData or '0'}}</span>
                            @elseif (Auth::user()->isNurse())
                            <span class="dash-box-count">{{$CriticalCountDataNurse or '0'}}</span>
                             @endif
                            <span class="dash-box-title">Patients in critical condition</span>
                        </div>

                        <div class="dash-box-action">
                            <button class="stuff_btn"><a href="{{ route('medicationlogs.index') }}">More Info</a></button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        {{--Data boxes--}}

        <div class="container">
            <div class="row">
			<div class="col-md-4">
                    <div class="dash-box dash-box-color-3">
                        <div class="dash-box-icon">
                            <i class="far fa-calendar-check"></i>
                        </div>
                        <div class="dash-box-body">
                            @if (Auth::user()->isDoctor())
                            <span class="dash-box-count">{{$AppointmentCountData or '0'}}</span>
                            @elseif (Auth::user()->isNurse())
                             <span class="dash-box-count">{{$AppointmentCountDataNurse or '0'}}</span>
                            @endif
                            <span class="dash-box-title">Appointments today</span>
                        </div>

                        <div class="dash-box-action">
                            <button class="stuff_btn"><a href="{{ route('appointments.get') }}">More Info</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dash-box dash-box-color-1">
                        <div class="dash-box-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="dash-box-body">
                             @if (Auth::user()->isDoctor())
                            <span class="dash-box-count">{{$PatientCountData or '0'}}</span>
                             @elseif (Auth::user()->isNurse())
                            <span class="dash-box-count">{{$PatientTotalCountNurse or '0'}}</span>
                            @endif
                            <span class="dash-box-title">Patients</span>
                        </div>

                        <div class="dash-box-action">
                            <button class="stuff_btn"><a href="{{ route('patients.index') }}">More Info</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dash-box dash-box-color-2">
                        <div class="dash-box-icon">
                            <i class="fas fa-pills" aria-hidden="true"></i>
                        </div>

                        <div class="dash-box-body">
                             @if (Auth::user()->isDoctor())
                            <span class="dash-box-count">{{$treatmentCountData or '0'}}</span>
                            @elseif (Auth::user()->isNurse())
                            <span class="dash-box-count">{{$treatmentCountDataNurse or '0'}}</span>
                            @endif
                            <span class="dash-box-title">Treatments</span>
                        </div>

                        <div class="dash-box-action">
                            <button class="stuff_btn"><a href="{{ route('treatments.index') }}">More Info</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--charts--}}
        <div class="container">
            <div class="row " style="margin-top:20px;margin-bottom:60px;">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Patients Data</h5>
                            <div class="card-text">
                                <div id="wrapper" style="min-height:500px;height: 100%;width: 100%;margin:auto;background:#fff;text-align:center">
                                    @if(isset($activeChartData)) @include('charts.google-2-chart',['activeChartData'=>$activeChartData]) @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Patients Data</h5>
                            <div class="card-text">
                                <div id="wrapper" style="min-height:500px;height: 100%;width: 100%;margin:auto;background:#fff;text-align:center">
                                    @if(isset($visitorChartData)) @include('charts.google-pie-cancer-type-chart',['visitorChartData'=>$visitorChartData]) @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @elseif(Auth::user()->isPatient())
        <div class="container bootstrap snippet ">
            <div class="row margin-bottom-10  ">
                <div class="box col-sm-6 ">
                    <div class="servive-block servive-block-1">
                        <i class="icon-3x color-light fas fa-heartbeat fa-3x"></i>
                        <h2 class="heading-md">Medication Reports</h2>
                        <div class="text-box">
                            Remaining report: &nbsp;{{$CurrentDayMedicationReportCount or '0'}}
                        </div>
                        <button type="button" class="btn-style"><a href="{{ route('patients.medicationreports.create') }}">
                        Report Now</a></button>
                    </div>
                </div>
                <div class="box col-sm-6 ">
                    <div class="servive-block servive-block-2">
                        <i class="icon-3x color-light fas fa-stethoscope fa-3x"></i>
                        <h2 class="heading-md">Symptom Reports</h2>
                        <div class="text-box">
                           Number of Critical Reports: &nbsp;{{$CurrentDaySymtomReportCount or '0'}}
                        </div>
                         <button type="button" class="btn-style"><a href="{{ route('symptopsreports.create') }}">
                        Report Now</a></button>

                    </div>
                </div>
                <div class="box col-sm-6">
                    <div class="servive-block rounded servive-block-3">
                        <i class="icon-3x color-light fas fa-pills fa-3x"></i>
                        <h2 class="heading-md">Treatments</h2>
                        <div class="text-box">
                        Number of treatments: ???????
                        </div>
                    </div>
                </div>
                 <div class="box col-sm-6">
                    <div class="servive-block rounded servive-block-4">
                        <i class="icon-3x color-light fas fa-pills fa-3x"></i>
                        <h2 class="heading-md">Appointments</h2>
                        <div class="text-box">
                              Today appointments: ???????
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif(Auth::user()->isSecratory())
        <div class="container bootstrap snippet ">
            <div class="row margin-bottom-10  ">
                <div class="box col-sm-6 ">
                    <div class="servive-block servive-block-1">
                        <i class="icon-3x color-light fas fa-heartbeat fa-3x"></i>
                        <h2 class="heading-md">Schedule</h2>
                        <div class="text-box">
                            <p>Create new schedule for the doctors </p>
                        </div>
                        <button type="button" class="btn-style"><a href="{{ route('slots_time.index') }}">Show Schedule</a></button>

                    </div>
                </div>

                <div class="box col-sm-6 ">
                    <div class="servive-block servive-block-2">
                        <i class="icon-3x color-light fas fa-stethoscope fa-3x"></i>
                        <h2 class="heading-md">Today Appointments</h2>
                        <div class="text-box">
                            <p>{{$AppointmentCountDataNurse or '0'}}</p>
                        </div>
                        <button type="button" class="btn-style">Show Appointments</button>

                    </div>
                </div>

            </div>
        </div>
        @endif @if(Auth::user()->isAdmin())
          <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="dash-box dash-box-color-2">
                        <div class="dash-box-icon">
                            <i class="fas fa-pills" aria-hidden="true"></i>
                        </div>
                        <div class="dash-box-body">
                            <span class="dash-box-count">{{$PatientTotalCount or '0'}}</span>
                            <span class="dash-box-title">Patients</span>
                        </div>

                        <div class="dash-box-action">
                            <button class="stuff_btn"><a href="{{ route('patients.index') }}">More Info</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="dash-box dash-box-color-2">
                        <div class="dash-box-icon">
                            <i class="fas fa-pills" aria-hidden="true"></i>
                        </div>
                        <div class="dash-box-body">
                            <span class="dash-box-count">{{$TeamTotalCount or '0'}}</span>
                            <span class="dash-box-title">Medical staff</span>
                        </div>
                        <div class="dash-box-action">
                            <button class="stuff_btn"><a href="{{ route('team.index') }}">More Info</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
        @endif
    <script>
        $(window).resize(function() {
            drawChart();
        });
    </script>


    @stop