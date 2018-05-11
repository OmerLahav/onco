@extends ('layouts.portal')

@section ('content')


    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Dashboard</h1>

            {{--Doctors dashboard--}}
            @if ((Auth::user()->isNurse()) or (Auth::user()->isDoctor()) )
                {{--Data boxes--}}
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dash-box dash-box-color-1">
                                <div class="dash-box-icon">
                                    <i class="fas fa-heartbeat"></i>
                                </div>
                                <div class="dash-box-body">
                                    {{--<span class="dash-box-count">{{$res1}}</span>--}}
                                    <span class="dash-box-title">Critical symptom reports</span>
                                </div>

                                <div class="dash-box-action">
                                    <button class="stuff_btn"><a href="#" >More Info</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dash-box dash-box-color-2">
                                <div class="dash-box-icon">
                                    <i class="fas fa-pills" aria-hidden="true"></i>
                                </div>
                                <div class="dash-box-body">
                                    <span class="dash-box-count">100</span>
                                    <span class="dash-box-title">Medication not reported</span>
                                </div>

                                <div class="dash-box-action">
                                    <button class="stuff_btn"><a href="#" >More Info</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dash-box dash-box-color-3">
                                <div class="dash-box-icon">
                                    <i class="far fa-calendar-check"></i>
                                </div>
                                <div class="dash-box-body">
                                    <span class="dash-box-count">2502</span>
                                    <span class="dash-box-title">Appointments Today</span>
                                </div>

                                <div class="dash-box-action">
                                    <button class="stuff_btn"><a href="#" >More Info</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dash-box dash-box-color-1">
                                <div class="dash-box-icon">
                                    <i class="fa fa-exclamation-triangle fa-3x" aria-hidden="true"></i>
                                </div>
                                <div class="dash-box-body">
                                    <span class="dash-box-count">8,252</span>
                                    <span class="dash-box-title">Lesson Plan</span>
                                </div>

                                <div class="dash-box-action">
                                    <button class="stuff_btn"><a href="#" >More Info</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

 <div class="container">    
   <div class="row " style="margin-top:20px;margin-bottom:60px;">
  <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        {{--<div class="card-text">    @include('charts.google-2-chart',['active'=>$active])</div>--}}
        
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        {{--<div class="card-text">   @include('charts.google-pie-cancer-type-chart',['visitor'=>$visitor])</div>--}}
        
      </div>
    </div>
  </div>
       
        <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        {{--<div class="card-text">   @include('charts.google-pie-cancer-type-chart',['visitor'=>$visitor])</div>--}}
       
      </div>
    </div>
  </div>
       
           
       
       
</div>
            </div>


            {{--action boxes--}}

                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dash-box dash-box-color-1">
                                <div class="dash-box-icon">
                                    <i class="fas fa-heartbeat"></i>
                                </div>
                                <div class="dash-box-body">
                                    <span class="dash-box-count">8,252</span>
                                    <span class="dash-box-title">My Patients</span>
                                </div>

                                <div class="dash-box-action">
                                    <button class="stuff_btn"><a href="#" >More Info</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dash-box dash-box-color-2">
                                <div class="dash-box-icon">
                                    <i class="fas fa-pills" aria-hidden="true"></i>
                                </div>
                                <div class="dash-box-body">
                                    {{--<span class="dash-box-count">{{$treatments}}</span>--}}
                                    <span class="dash-box-title">Treatments</span>
                                </div>

                                <div class="dash-box-action">
                                    <button class="stuff_btn"><a href="#" >More Info</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dash-box dash-box-color-3">
                                <div class="dash-box-icon">
                                    <i class="far fa-calendar-check"></i>
                                </div>
                                <div class="dash-box-body">
                                    <span class="dash-box-count">2502</span>
                                    <span class="dash-box-title">Patients reports</span>
                                </div>

                                <div class="dash-box-action">
                                    <button class="stuff_btn"><a href="#" >More Info</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dash-box dash-box-color-1">
                                <div class="dash-box-icon">
                                    <i class="fa fa-exclamation-triangle fa-3x" aria-hidden="true"></i>
                                </div>
                                <div class="dash-box-body">
                                    <span class="dash-box-count">8,252</span>
                                    <span class="dash-box-title">Lesson Plan</span>
                                </div>

                                <div class="dash-box-action">
                                    <button class="stuff_btn"><a href="#" >More Info</a></button>
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
                                <h2 class="heading-md">Self Reports</h2>
                                <div class="text-box">
                                    <p>You have not recorded any symptoms for the last day. </p>
                                </div>
                                <button type="button" class="btn-style">Report Now</button>

                            </div>
                        </div>

                        <div class="box col-sm-6 ">
                            <div class="servive-block servive-block-2">
                                <i class="icon-3x color-light fas fa-stethoscope fa-3x"></i>
                                <h2 class="heading-md">Patients Treatments</h2>
                                <div class="text-box">
                                    <p></p>
                                </div>
                                <button type="button" class="btn-style">Add new treatment</button>

                            </div>
                        </div>
                        <div class="box col-sm-6">
                            <div class="servive-block rounded servive-block-3">
                                <i class="icon-3x color-light fas fa-pills fa-3x"></i>
                                <h2 class="heading-md">Medications</h2>
                                <div class="text-box">
                                    <p>2</p>
                                </div>
                                <button type="button" class="btn-style">Add new medications</button>
                            </div>
                        </div>
                        <div class="box col-sm-6">
                            <div class="servive-block rounded servive-block-3">
                                <i class="icon-3x color-light fas fa-pills fa-3x"></i>
                                <h2 class="heading-md">Medications</h2>
                                <div class="text-box">
                                    <p>2</p>
                                </div>
                                <button type="button" class="btn-style">Add new medications</button>
                            </div>
                        </div>



                    </div>



                </div>
                
                
      
                
                @endif
            
        

        </div>
    </div>

@stop
