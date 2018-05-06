
@extends ('layouts.portal')

@section ('content')
	<h1>All symptoms</h1>
	<a href="{{ route('symptoms.create') }}" class="btn btn-info pull-right bg-info">Create</a>

    <table id="example" class="display table" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Sr #</th>
            <th>Symptom Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        	@foreach ($symptoms as $symptom)
        <tr>
            <td>{{ $symptom->id }}</td>
            <td>{{ $symptom->name }}</td>
            <td>
                <a href="#" class="btn btn-primary fa fa-edit"></a>
               <a href="#" class="btn btn-danger fa fa-trash"></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
