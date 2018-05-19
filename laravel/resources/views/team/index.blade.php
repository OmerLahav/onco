@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>All Staff</h1>
            <a href="{{ route('team.create') }}" class="btn btn-info add-btn bg-info"><i class="fas fa-plus"></i>Add</a>

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

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($team as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->phone }}</td>
                        
                        <td>
                            <a href="{{action('TeamController@Team_edit',$member->id)}}"  class="btn btn-primary opt-btn fa fa-edit"><span class="edit "> Edit </span></a>
                            <a href="/Team_delete/{{$member->id}}"  onclick="return confirm('Are you sure you want to delete this staff member?');" class="btn btn-danger opt-btn far fa-trash-alt"><span class="edit del">Delete</span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index.css') }} ">
@stop
