@extends ('layouts.portal')

@section ('content')
<h1>All Staff</h1>
<a href="{{ route('team.create') }}" class="btn btn-info pull-right">Create</a>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Role</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($team as $member)
			<tr>
				<td>{{ $member->name }}</td>
				<td>{{ $member->role }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
@stop
