@extends ('layouts.portal') @section ('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="page-wrapper">
    <div class="page-wrapper-container">
        <h1>Add patient</h1>
        <div class="steps">
            <ol class="direction">
                <li>
                    Please enter your appointment details.
                </li>
            </ol>
        </div>

        <div class="container">
            <input type="hidden" name="ajax_slot_fetch_url" id="ajax_slot_fetch_url" value="{{ route('appointments.slots') }}">
            <form class="form cf" id="appointment_create" method="POST" action="{{ route('appointments.create') }}">
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

                <button type="button" id="find_slots" class="btn btn-primary bg-info">Search Avalable Slots</button>

                <div class="text-md-center  " style="
  margin: auto;
  text-align:center;
    width:100%;

    margin-bottom: 10px;
    margin-top: 10px;

">
                    <div>
                        <p>Available Appointments:</p>
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

            <!-- Form For Clender Api -->
            <form class="form cf" method="POST" action="{{ route('api.google_calender_for_book_appoinment') }}">
                @csrf
                <input type="hidden" name="appointment_date" id="api_appointment_date">
                <input type="hidden" name="appointment_time" id="api_appointment_time">
                <button disabled type="submit" id="google_clender_btn" class="btn btn-primary bg-info">Add to Claender</button>
            </form>

            </div>
        </div>
    </div>
    <script src="{{ asset('js2/jquery.min.js') }}"></script>
    <script src="{{ asset('js2/popper.min.js') }}"></script>
    <script src="{{ asset('js2/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-form-big.css') }} ">
    <script src=" {{ asset('js2/custom.js') }}"></script>

    @stop