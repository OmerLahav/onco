@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>All medications</h1>
            
            <div class="steps">
                <ol class="direction">
                    <li>
                        On this page, you can add new medications.
                    </li>
                    <li>
                        You need to choose the right memedication and its strength.
                    </li>
                </ol>
            </div>
            <a href="{{ route('medications.create') }}"  class="btn btn-info add-btn bg-info"><i class="fas fa-plus"></i>Add</a>
        <!--<table>
		@foreach ($medications as $medication)
            <tr>
                <td>{{ $medication->id }}</td>
				<td>{{ $medication->name }}</td>
				<td>{{ $medication->strength }}</td>
			</tr>
		@endforeach
                </table>-->

            <table id="medication-index" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Sr #</th>
                    <th>Medication Name</th>
                    <th>Strength</th>
                    @if(Auth::user()->isDoctor())
                        <th>Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach ($medications as $medication)
                    <tr>
                        <td>{{ $medication->id }}</td>
                        <td>{{ $medication->name }}</td>
                        <td>{{ $medication->strength }}</td>
                        @if(Auth::user()->isDoctor())
                        <td>
                            <a href="{{action('MedicationsController@edit',$medication->id)}}"  class="btn btn-primary opt-btn fa fa-edit"><span class="edit "> Edit </span></a>
                            <a href="/delete/{{$medication->id}}"  onclick="return confirm('Are you sure you want to delete this medication?');" class="btn btn-danger opt-btn far fa-trash-alt"><span class="edit del">Delete</span></a>

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
