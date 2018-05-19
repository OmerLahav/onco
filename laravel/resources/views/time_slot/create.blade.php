@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Create Time Slot</h1>
            <div class="steps">
                <ol class="direction">
                    <li>
                        Please create new time slot.
                    </li>
                </ol>
            </div>
            <div class="container">
                <form class="form-style" method="POST" action="{{ route('slots_time.store') }}">
                    @csrf
                    <input type="hidden" name="created_by" id="created_by" value="{{Auth::user()->id}}">
                    

                    <div class="form-group">
                            <label for="user_type">User Type:</label>
                            <select class="form-control" id="user_type" name="user_type">
                                <option value="Doctor">Doctor</option>
                                <!-- <option value="Nurse">Nurse</option> -->
                            </select>
                    </div>

                    <div class="form-group">
                            <label for="user_id">Users:</label>
                            <select class="form-control" id="user_id" name="user_id">
                                @if(!empty($users))
                                    @foreach($users as $key => $value)
                                        <option value="{{$value->id}}">{{$value->first_name}} {{$value->last_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                    </div>

                    <div class="form-group">
                            <label for="slot_date">Slot Date:</label>
                            <input type="date" class="form-control" id="slot_date" name="slot_date" required="required">
                    </div>
                     <div class="form-group">
                            <label for="slot_date">Slot Start Time:</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" required="required">
                    </div>
                     <div class="form-group">
                            <label for="slot_date">Slot End Time:</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" required="required">
                    </div>
                    <div class="form-group">
                            <label for="type">Slot Type:</label>
                            <select class="form-control" id="type" name="type">
                                <option value="Regular">Regular</option>
                                <option value="Critical">Critical</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="slot_time_in_minute">Slot Time In Minutes:</label>
                        <input type="number" name="slot_time_in_minute" id="slot_time_in_minute" placeholder="Slot Time In Minutes" class="form-control">
                    </div>
                   
                    <div>
                        <button type="submit" class="btn btn-primary bg-info">Add</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--<-- css->--}}
    
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-form-big.css') }} ">

@stop
