@extends ('layouts.portal')

@section ('content')
	<h1>All medications</h1>
	<a href="{{ route('medications.create') }}" class="btn btn-info pull-right">Create</a>
	<table>
		@foreach ($medications as $medication)
			<tr>
				<td>{{ $medication->id }}</td>
				<td>{{ $medication->name }}</td>
				<td>{{ $medication->strength }}</td>
			</tr>
		@endforeach
	</table>
@stop
