@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Appointments</h1>
            @if(Auth::user()->isPatient() || Auth::user()->isSecratory())
                <a href="{{ route('appointments.create') }}" class="btn btn-info add-btn bg-info"><i class="fas fa-plus"></i>Add</a>
            @endif
             <div class="steps">
                <ol class="direction">
                    <li>
                        On this page, you can review  your appointments.
                    </li>
                    @if(Auth::user()->isPatient() || Auth::user()->isSecratory())
                    <li>
                        In addition, you can add the appointment to your Google Calendar by pressing on the "G ADD" button.
                    </li>
                     @endif
                </ol>
            </div>

            
            <table id="appointments" id="appointments2" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                   <!--  @if(Auth::user()->isPatient() || Auth::user()->isSecratory()  || Auth::user()->isNurse()  || Auth::user()->isAdmin()) -->
                        <th>Provider Name</th>
                   <!--  @endif -->
                    @if(!Auth::user()->isPatient())
                     <th>Patient Name</th>
                    @endif
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Type </th>
                    @if(Auth::user()->isPatient() || Auth::user()->isSecratory() || Auth::user()->isNurse())
                        <th>Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach ($appointments as $appointment)
                    <tr>

                        <td>{{ $appointment->id }}</td>
                        @if(Auth::user()->isPatient() || Auth::user()->isSecratory() || Auth::user()->isNurse() || Auth::user()->isAdmin())
                            @if($appointment->medical_staff_id != "" && $appointment->medical_staff_id > 0)
                               <td>{{ $appointment->provider->first_name . ' ' . $appointment->provider->last_name }}</td>
                            @else
                                <td>--N\A--</td>
                            @endif
                        @endif
                        @if(!Auth::user()->isPatient())
                            @if(isset($appointment->patient->first_name) && isset($appointment->patient->last_name))
                                <td>{{ $appointment->patient->first_name . ' ' . $appointment->patient->last_name }} </td>
                            @else
                                <td>--N\A--</td>
                            @endif
                        @endif

                        <td>{{ date('d-m-Y', strtotime($appointment->appointment_date)) }}</td>
                        <td>{{ date('H:i', strtotime($appointment->appointment_time))}}</td>
                        <td>{{ $appointment->status }}</td>
                        <td>{{ $appointment->medical_staff_type }}</td>
                        @if(Auth::user()->isPatient() || Auth::user()->isSecratory() || Auth::user()->isNurse() || Auth::user()->isAdmin())
                            <td>

                           <!--  edit --> 
                             <!--   @if(!Auth::user()->isPatient())
                                 <a href="{{action('AppointmentsController@editAppointments',$appointment->id)}}"  class="btn btn-primary opt-btn fa fa-edit"><span class="edit "> Edit </span></a>
                                @endif  -->

                                <a href="/appointments/{{$appointment->id}}/delete"  onclick="return confirm('Are you sure you want to delete this appointment?');" class="btn btn-danger opt-btn far fa-trash-alt"><span class="edit del">Delete</span></a>
                              
                                @if($appointment->medical_staff_id != "" && $appointment->medical_staff_id > 0)

                                    <form class="form cf" method="POST" action="{{ route('api.google_calender_for_book_appoinment') }}">
                                     @csrf
                                     <input type="hidden" value="{{$appointment->appointment_date}}" name="appointment_date">

                                     <input type="hidden" value="{{$appointment->provider->first_name . ' ' . $appointment->provider->last_name}}" name="provider_name" >
                                     
                                     <input type="hidden" value="{{$appointment->appointment_time}}" name="appointment_time">
                                     <button  type="submit" class="btn g-btn btn-primary "><i class="fab fa-google"></i>Add</button>
                                   </form>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
     <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index.css') }} ">
@stop
