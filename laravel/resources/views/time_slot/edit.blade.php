@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Edit Time Slot</h1>

            <form class="form-style" method="post" action="{{action('SloteTimeController@Slot_update',$slot_range->id)}}">
                {{csrf_field()}}
                <input type="hidden" name=_method" value="PATCH"/>

                
                <div class="form-group">
                        <label for="user_type">User Type:</label>
                        <select class="form-control" id="user_type" name="user_type">
                            <option <?php if($slot_range->user_type == 'Doctor'){ ?> selected="selected" <?php } ?>  value="Doctor">Doctor</option>
                          <!--   <option   <?php if($slot_range->user_type == 'Nurse'){ ?> selected="selected" <?php } ?> value="Nurse">Nurse</option> -->
                        </select>
                </div>

                <div class="form-group">
                        <label for="user_id">Users:</label>
                        <select class="form-control" id="user_id" name="user_id">
                            @if(!empty($users))
                                @foreach($users as $key => $value)
                                    <option <?php if($slot_range->user_id == $value->id){ ?> selected="selected" <?php } ?> value="{{$value->id}}">{{$value->first_name}} {{$value->last_name}}</option>
                                @endforeach
                            @endif
                        </select>
                </div>

                <div class="form-group">
                        <label for="slot_date">Slot Date:</label>
                        <input type="date" class="form-control" value="{{$slot_range->slot_date}}" id="slot_date" name="slot_date" required="required">
                </div>
                 <div class="form-group">
                        <label for="slot_date">Slot Start Time:</label>
                        <input type="time" value="{{$slot_range->start_time}}" class="form-control" id="start_time" name="start_time" required="required">
                </div>
                 <div class="form-group">
                        <label for="slot_date">Slot End Time:</label>
                        <input type="time" class="form-control" id="end_time" value="{{$slot_range->end_time}}" name="end_time" required="required">
                </div>
                <div class="form-group">
                        <label for="type">Slot Type:</label>
                        <select class="form-control" id="type" name="type">
                            <option <?php if($slot_range->type == 'Regular'){ ?> selected="selected" <?php } ?> value="Regular">Regular</option>
                            <option <?php if($slot_range->type == 'Critical'){ ?> selected="selected" <?php } ?> value="Critical">Critical</option>
                        </select>
                </div>

                <div class="form-group">
                    <label for="slot_time_in_minute">Slot Time In Minutes:</label>
                    <input type="number" value="{{$slot_range->slot_time_in_minute}}" name="slot_time_in_minute" id="slot_time_in_minute" placeholder="Slot Time In Minutes" class="form-control">
                </div>

                <div>
                    <button type="submit" value="Update" class="btn btn-primary bg-info">Update</button>
                </div>
            </form>
        </div>
    </div>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-form.css') }} ">
@stop
