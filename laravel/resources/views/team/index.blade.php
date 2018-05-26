@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>All Staff</h1>
            @if(Auth::user()->isAdmin())
              <a href="{{ route('team.create') }}" class="btn btn-info add-btn bg-info"><i class="fas fa-plus"></i>Add</a>
            @endif
             <div class="steps">
                <ol class="direction">
                    <li>
                        On this page you can add/edit/delete team stuff.
                    </li>
             
            </div>
            <table id="team"  class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Identification Number</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    @if(Auth::user()->isAdmin())
                    <th>Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach ($team as $member)
                  @if((Auth::user()->isAdmin() && !$member->isAdmin()) || Auth::user()->isDoctor())
                    
	                    <tr>
	                        <td>{{ $member->name }}</td>
	                        <td>{{ $member->identification_number }}</td>
	                        <td>{{ $member->email }}</td>
	                        <td>{{ $member->phone }}</td>
	                        <td>{{ (new App\User)->getRoleName($member->role) }}</td>
                            @if(Auth::user()->isAdmin())
	                        <td>
	                            <a href="{{action('TeamController@Team_edit',$member->id)}}"  class="btn btn-primary opt-btn fa fa-edit"><span class="edit "> Edit </span></a>
	                            <a href="/Team_delete/{{$member->id}}"  onclick="return confirm('Are you sure you want to delete this staff member?');" class="btn btn-danger opt-btn far fa-trash-alt"><span class="edit del">Delete</span></a>
	                        </td>
                            @endif
	                    </tr>
	           
                   @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index.css') }} ">
@stop