@extends ('layouts.portal')

@section ('content')
	<h1>All treatments</h1>
	<a href="{{ route('treatments.create') }}" class="btn btn-info pull-right">Create</a>
	<table>
		@foreach ($treatments as $treatment)
			<tr>
				<td>{{ $treatment->id }}</td>
				<td>
					<a href="{{ route('treatments.show', [$treatment]) }}">{{ $treatment->name }}</a>
				</td>
			</tr>
		@endforeach
	</table>
@stop
