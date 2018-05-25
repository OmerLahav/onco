@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Schedule</h1>
            
            @if(Auth::user()->isSecratory())

                <a href="{{ route('slots_time.create') }}" class="btn btn-info add-btn bg-info"><i class="fas fa-plus"></i>Add
                </a>

                <div class="steps">
                    <ol class="direction">
                        <li>
                            On this page you can add a new slot's for the doctors.
                        </li>
                        <li>
                            Press the "ADD" button to add.
                        </li>
                    </ol>
                </div>
            @endif
            @if(Auth::user()->isDoctor())
               <div class="steps">
                    <ol class="direction">
                        <li>
                            On this page you can add see your available slots and their date.
                        </li>
                    
                    </ol>
                </div> 
            @endif
            <table id="slots" class="table table-striped table-bordered col-sm-12 " style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    @if(Auth::user()->isSecratory())
                        <th>Provider</th>
                    @endif
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Type</th>
                    <th>Slot Time</th>
                    @if(Auth::user()->isSecratory())
                        <th>Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach ($timeslots as $timeslot)
                
                    <tr>
                        <td>{{ $timeslot->id }}</td>
                        
                        @if(Auth::user()->isSecratory())

                            @if($timeslot->user_id != "" && $timeslot->user_id > 0)
                               <td>{{ $timeslot->provider->first_name . ' ' . $timeslot->provider->last_name }}</td>
                            @else
                                <td>--N\A--</td>
                            @endif

                        @endif

                        
                        <!-- <td>{{ $timeslot->slot_date }}</td>-->
                        <td>{{ \Carbon\Carbon::parse($timeslot->slot_date)->format('d/m/Y')}}</td>
                        <td>{{ $timeslot->start_time }}</td>
                        <td>{{ $timeslot->end_time }}</td>
                        <td>{{ $timeslot->type }}</td>
                        <td>{{ $timeslot->slot_time_in_minute }}</td>
                        @if(Auth::user()->isSecratory())

                        <td>
                            <a href="{{action('SloteTimeController@Slot_edit',$timeslot->id)}}"  class="btn btn-primary opt-btn fa fa-edit" style="margin-bottom:5px;"><span class="edit "> Edit </span></a>
                            <a href="/Slot_delete/{{$timeslot->id}}"  onclick="return confirm('Are you sure you want to delete this timeslot?');" class="btn btn-danger opt-btn far fa-trash-alt"><span class="edit del">Delete</span></a>
                        </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

	<!--css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index.css') }} ">
	<link href="{!! asset('css/data-tables.css') !!}" media="all" rel="stylesheet" type="text/css" />
@stop
