@extends ('layouts.portal')

@section ('content')
   <h1>Dashboard</h1>
    <div class="container bootstrap snippet ">

        <div class="row margin-bottom-10  ">
            <div class="box col-sm-6 ">
                <div class="servive-block servive-block-pink">
                    <i class="icon-3x color-light fas fa-heartbeat fa-3x"></i>
                    <h2 class="heading-md">Self Report</h2>
                    <div class="text-box">
                        <p>You have not recorded any symptoms for the last day. </p>
                    </div>
                    <button type="button" class="btn-style">Report Now</button>

                </div>
            </div>
            <div class="box col-sm-6">
                <div class="servive-block rounded servive-block-parklife">
                    <i class="icon-3x color-light fas fa-pills fa-3x"></i>
                    <h2 class="heading-md">Medications</h2>
                    <div class="text-box">
                        <p>You have not taken a medication for the evening.</p>
                    </div>
                    <button type="button" class="btn-style">Report Now </button>
                </div>
            </div>
            <div class="box col-sm-6">
                <div class="servive-block rounded servive-block-caramel">
                    <i class="icon-3x color-light fas fa-calendar-check fa-3x"></i>
                    <h2 class="heading-md">Appointment</h2>
                    <div class="text-box">
                        <p>You have an appointment on Thursday, 24 June,2018.</p>
                    </div>
                    <button type="button" class="btn-style">Appointment</button>
                </div>
            </div>

            <div class="box col-sm-6">
                <div class="servive-block rounded servive-block-blue">
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
@stop
