@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>All medications</h1>
            <a href="{{ route('medications.create') }}"  class="btn btn-info add-btn bg-info"><i class="fas fa-plus"></i>Add</a>
        <!--<table>
		@foreach ($medications as $medication)
            <tr>
                <td>{{ $medication->id }}</td>
				<td>{{ $medication->name }}</td>
				<td>{{ $medication->strength }}</td>
			</tr>
		@endforeach
                </table>-->

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Sr #</th>
                    <th>Medication Name</th>
                    <th>Strength</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($medications as $medication)
                    <tr>
                        <td>{{ $medication->id }}</td>
                        <td>{{ $medication->name }}</td>
                        <td>{{ $medication->strength }}</td>
                        <td>
                            <a href="{{action('MedicationsController@edit',$medication->id)}}"  class="btn btn-primary opt-btn fa fa-edit"><span class="edit "> Edit </span></a>
                            <a href="/Symp_delete/{{$medication->id}}"  onclick="return confirm('Are you sure you want to delete this medication?');" class="btn btn-danger opt-btn far fa-trash-alt"><span class="edit del">Delete</span></a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index.css') }} ">
@stop
