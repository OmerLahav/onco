@extends ('layouts.portal')

@section ('content')
	<h1>All medications</h1>
	<a href="{{ route('medications.create') }}" class="btn btn-info pull-right bg-info">Create</a>
	<!--<table>
		@foreach ($medications as $medication)
			<tr>
				<td>{{ $medication->id }}</td>
				<td>{{ $medication->name }}</td>
				<td>{{ $medication->strength }}</td>
			</tr>
		@endforeach
	</table>-->

    <table id="example" class="display table" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Sr #</th>
            <th>Medication Name</th>
            <th>Strength</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        	@foreach ($medications as $medication)
        <tr>
            <td>{{ $medication->id }}</td>
            <td>{{ $medication->name }}</td>
            <td>{{ $medication->strength }}</td>
            <td>
                <a href="#" class="btn btn-primary fa fa-edit"></a>
               <a href="#" class="btn btn-danger fa fa-trash"></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
