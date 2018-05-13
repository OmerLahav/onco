@extends ('layouts.portal')

@section ('content')
	<h1>{{ $treatment->name }}</h1>
	<div>{{ $treatment->description }}</div>
	<hr>
	<table>
		<caption>Symptoms</caption>
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Importance_level</th>
				<th>Image</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($treatment->symptoms as $symptom)
				<tr>
					<td>{{ $symptom->id }}</td>
					<td>{{ $symptom->name }}</td>
					<td>{{ $symptom->importance_level }}</td>
					<td>{{ $symptom->image }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<hr>
	<table>
		<caption>Medications</caption>
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($treatment->medications as $medication)
				<tr>
					<td>{{ $medication->id }}</td>
					<td>{{ $medication->name }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop
