@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>All Appointments</h1>
            <a href="{{ route('appointments.create') }}" class="btn btn-info add-btn bg-info"><i class="fas fa-plus"></i>Add</a>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Sr #</th>
                    <th>Provider Name</th>
                    <th>Patient Name</th>
                    
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Status</th>
                    <th>Medical Staff Type</th>
                    <th>Type </th>
                    <th>Created at </th>
                    
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($appointments as $appointment)
                    <tr>

                        <td>{{ $appointment->id }}</td>
                        @if($appointment->medical_staff_id != "" && $appointment->medical_staff_id > 0)
                           <td>{{ $appointment->provider->first_name . ' ' . $appointment->provider->last_name }}</td>
                        @else
                            <td>--N\A--</td>
                        @endif
                        <td>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</td>
                        <td>{{ date('Y-m-d', strtotime($appointment->appointment_date)) }}</td>
                        <td>{{ date('H:i', strtotime($appointment->appointment_time))}}</td>
                        <td>{{ $appointment->status }}</td>
                        <td>{{ $appointment->medical_staff_type }}</td>
                        <td>{{ $appointment->type }}</td>
                        <td>{{ date('Y-m-d', strtotime($appointment->created_at)) }}</td>
                        
                        <td>
                            <a href="{{action('AppointmentsController@editAppointments',$appointment->id)}}"  class="btn btn-primary opt-btn fa fa-edit"><span class="edit "> Edit </span></a>
                            <a href="/Appointment_delete/{{$appointment->id}}"  onclick="return confirm('Are you sure you want to delete this appointment?');" class="btn btn-danger opt-btn far fa-trash-alt"><span class="edit del">Delete</span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index.css') }} ">
@stop
