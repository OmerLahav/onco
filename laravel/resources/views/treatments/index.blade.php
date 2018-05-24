@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            
            <h1>All treatments</h1>
            @if(Auth::user()->isDoctor() || Auth::user()->isAdmin())
             <a href="{{ route('treatments.create') }}" class="btn btn-info add-btn bg-info"><i class="fas fa-plus"></i>Add</a>
            @endif
			 <div class="steps">
                <ol class="direction">
                    <li>
                        On this page you can add a new treatments.
                    </li>
                    <li>
                        In addition you can edit, delete and view treatments information.
                    </li>
					<li>
                        In order to add medications, click on the green button "View/Add.
                    </li>
                </ol>
            </div>
             <table id="example" class="table table-striped table-bordered col-sm-12" style="width:100%">
                <thead>
                <?php
                $srNo = 1; ?>
                <tr>
                    <th>ID</th>
                    <th>Treatment Name</th>
                    <th>Description</th>
                    @if(Auth::user()->isDoctor() || Auth::user()->isAdmin())
                    <th>Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach ($treatments as $treatment)
                    <tr>
                        <td>{{$srNo++}}</td>
                        <td><a href="{{ route('treatments.show', [$treatment]) }}">{{ $treatment->name }}</a></td>
                        <td>{{$treatment->description}}</td>
                         @if(Auth::user()->isDoctor() || Auth::user()->isAdmin())
                        <td>
                                <a href="{{action('TreatmentsController@Treatment_edit',$treatment->id)}}"  class="btn btn-primary opt-btn fa fa-edit"><span class="edit "> Edit </span></a>
    							<a href="/Treatment_delete/{{$treatment->id}}"  onclick="return confirm('Are you sure you want to delete this treatment?');" class="btn btn-danger opt-btn far fa-trash-alt"><span class="edit del">Delete</span></a>
    							<a href="{{ route('treatments.show', [$treatment]) }}" class="btn btn-success opt-btn "><span class="edit del">View/Add</span></a>
                        </td>
                          @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

{{--css--}}
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index.css') }} ">
@stop