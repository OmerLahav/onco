@extends ('layouts.portal')

@section ('content')
	<h1>All symptoms</h1>
	<a href="{{ route('symptoms.create') }}" class="btn btn-info pull-right">Create</a>
	<table>
		@foreach ($symptoms as $symptom)
			<tr>
				<td>{{ $symptom->id }}</td>
				<td>{{ $symptom->name }}</td>
			</tr>
		@endforeach
	</table>
@stop
