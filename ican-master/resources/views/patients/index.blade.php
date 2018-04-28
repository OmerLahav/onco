@extends ('layouts.portal')

@section ('content')
<h1>Patients</h1>
<a href="{{ route('patients.create') }}" class="btn btn-info pull-right">Create</a>
<table>
	<thead>
		<tr>
			<th>
				Name
			</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($patients as $patient)
			<tr>
				<td>
					<a href="{{ route('patients.show', [$patient]) }}">{{ $patient->name }}</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@stop
