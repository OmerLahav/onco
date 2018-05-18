@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>All Time Slots</h1>
            
            @if(Auth::user()->isSecratory())

                <a href="{{ route('slots_time.create') }}" class="btn btn-info add-btn bg-info"><i class="fas fa-plus"></i>Add</a>
            @endif
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Sr #</th>
                    @if(Auth::user()->isSecratory())
                        <th>User Name</th>
                    @endif
                    <th>User Type</th>
                    <th>Slot Date</th>
                    <th>Slot Start Time</th>
                    <th>Slot End Time</th>
                    <th>Slot Type</th>
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

                        <td>{{ $timeslot->user_type }}</td>
                        <td>{{ $timeslot->slot_date }}</td>
                        <td>{{ $timeslot->start_time }}</td>
                        <td>{{ $timeslot->end_time }}</td>
                        <td>{{ $timeslot->type }}</td>
                        <td>{{ $timeslot->slot_time_in_minute }}</td>
                        @if(Auth::user()->isSecratory())

                        <td>
                            <a href="{{action('SloteTimeController@Slot_edit',$timeslot->id)}}"  class="btn btn-primary opt-btn fa fa-edit"><span class="edit "> Edit </span></a>
                            <a href="/Slot_delete/{{$timeslot->id}}"  onclick="return confirm('Are you sure you want to delete this timeslot?');" class="btn btn-danger opt-btn far fa-trash-alt"><span class="edit del">Delete</span></a>
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
