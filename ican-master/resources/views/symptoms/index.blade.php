
@extends ('layouts.portal')

@section ('content')

	<link href="{!! asset('stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"') !!}" media="all" rel="stylesheet" type="text/css" />
	

	<h1>All symptoms</h1>
	<a href="{{ route('symptoms.create') }}" class="btn btn-info pull-right">Create</a>
	<table id="example" class="table table-striped table-bordered" style="width:100%">
		<tr class="header">
			<th>ID</th>
			<th>Name</th>
		</tr>
		<tbody>
		@foreach ($symptoms as $symptom)

			<tr>
				<td>{{ $symptom->id }}</td>
				<td>{{ $symptom->name }}</td>
			</tr>
		@endforeach
		</tbody>

	</table>

@stop
