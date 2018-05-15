@extends ('layouts.portal')

@section ('content')
    
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
            <a href="{{route('api.google_calender_for_book_appoinment')}}" target="_blank" ><button type="button" id="google_clender_btn" class="btn btn-primary bg-info">Add Claender</button> </a>

            <div class="container">
              <input type="hidden" name="ajax_slot_fetch_url" id="ajax_slot_fetch_url" value="{{ route('appointments.slots') }}">
               <form class="form cf" id="appointment_create" method="POST" action="{{ route('appointments.create') }}">
                    @csrf
                    <div class="form-group">
                        <label for="role">Select medical team:</label>
                        @if(isset($doctor))
                        <select class="form-control" id="medical_staff_type" name="role">
                            <option name="medical_staff_type" value="Doctor">{{$doctor['first_name']}} {{$doctor['last_name']}}</option>
                            <option name="medical_staff_type" value="Nurse">Nurse</option>
                        </select>
                        @endif
                    </div>

					
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
                  <div >
                    <p>Available Appointments:</p>
                    <div id="slot_html">

                    </div>
                  </div>
                  <input type="hidden" name="appointment_time" id="appointment_time">
                  <input type="hidden" name="type" id="type">

                  <input type="hidden" name="doctor_id" id="doctor_id" value="{{$doctor['id']}}">
                  
                  <button type="submit" id="add_appointment_btn" class="btn btn-primary bg-info">Book Appointment</button>


                  
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
