@extends ('layouts.portal')

@section ('content')
<h1>All Staff</h1>
<a href="{{ route('team.create') }}" class="btn btn-info pull-right bg-info">Create</a>

<!--<table>
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
</table>-->

    <table id="example" class="display table" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        	@foreach ($team as $member)
        <tr>
            <td>{{ $member->name }}</td>
            <td>{{ $member->role }}</td>
            <td>
                <a href="#" class="btn btn-primary fa fa-edit"></a>
               <a href="#" class="btn btn-danger fa fa-trash"></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
