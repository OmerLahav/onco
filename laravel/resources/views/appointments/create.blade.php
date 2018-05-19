@extends ('layouts.portal') @section ('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="page-wrapper">
    <div class="page-wrapper-container">
        <h1>Schedule an appointment</h1>
        <div class="steps">
            <ol class="direction">
                <li>
                   Select the medical provider.
                </li>
				<li>
                   Select the date.
                </li>
				<li>
                    Click on search button.
                </li>
				<li>
                    Choose your preferd time.
                </li>
            </ol>
        </div>

        <div class="container">
            <input type="hidden" name="ajax_slot_fetch_url" id="ajax_slot_fetch_url" value="{{ route('appointments.slots') }}">
            <form class="form-style" id="appointment_create" method="POST" action="{{ route('appointments.create') }}">
                @csrf 
                @if(Auth::user()->isPatient())

                <!-- Show List Of Doctor name and Nurse  For Patient -->
                <div class="form-group">
                    <label for="role">Select medical team:</label>
                    @if(isset($doctor))
                    <select class="form-control" id="medical_staff_type" name="role">
                        <option name="medical_staff_type" value="Doctor">{{$doctor['first_name']}} {{$doctor['last_name']}}</option>
                        <option name="medical_staff_type" value="Nurse">Nurse</option>
                    </select>
                    @endif
                </div>
                @else
                <div class="form-group">
                    <label for="role">Select medical team:</label>
                    @if(isset($doctor))
                    <select class="form-control" id="medical_staff_type" name="role">
                        <option name="medical_staff_type" value="Doctor">Doctor</option>
                        <option name="medical_staff_type" value="Nurse">Nurse</option>
                    </select>
                    @endif
                </div>
                @endif @if(Auth::user()->isSecratory())
                <!-- Show List Of Patient For Secratory -->
                <div class="form-group">
                    <label for="patient_id">Patient:</label>
                    <select class="form-control" id="patient_id" name="patient_id">
                        @if(!empty($users)) @foreach($users as $key => $value)
                        <option value="{{$value->id}}">{{$value->first_name}} {{$value->last_name}}</option>
                        @endforeach @endif
                    </select>
                </div>
                @else
                  <input type="hidden" name="patientId" id="patient_id" value="0">
                @endif

                <div class="form-group">
                    <label for="appointment_date">Appointment Date:</label>
                    <input type="date" class="form-control" id="appointment_date" name="appointment_date" required="required">
                </div>

               

               
                    <div>
                      
						 <label for="Available Appointments">Available Appointments:</label>
						 <br>
						 <button type="button" id="find_slots" class="btn btn-primary bg-info">Search</button>
                        <div id="slot_html">

                        </div>
                    </div>
                    <input type="hidden" name="appointment_time" id="appointment_time">
                    <input type="hidden" name="type" id="type">

                    @if(Auth::user()->isPatient())
                      <input type="hidden" name="doctor_id" id="doctor_id" value="{{$doctor['id']}}">
                    @else
                      <input type="hidden" name="doctor_id" id="doctor_id" value="0">
                    @endif

                    <button type="submit" id="add_appointment_btn" class="btn btn-primary bg-info">Book Appointment</button>

            </form>

        

            </div>
        </div>
    </div>
	
    
    <script src="{{ asset('js2/popper.min.js') }}"></script>
    <script src="{{ asset('js2/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js2/jquery.min.js') }}"></script>
    <script src=" {{ asset('js2/custom.js') }}"></script>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/patients-style/pages/add-appointment.css') }} ">	

    @stop