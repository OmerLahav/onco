@extends ('layouts.portal')

@section ('content')
<h1>Patients</h1>
<a href="{{ route('patients.create') }}" class="btn btn-info pull-right bg-info">Create</a>

    <table id="example" class="display table" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Gender</th>
            <th>Cancer Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        	@foreach ($patients as $patient)
        <tr>
            <td>{{ $patient->patient_data->user_id }}</td>
            <td><a href="{{ route('patients.show', [$patient]) }}">{{ $patient->name }}</a></td>
            <td>{{ $patient->patient_data->gender }}</td>
            <td>{{ $patient->patient_data->type }}</td>
            <td>
                <a href="#" class="btn btn-primary fa fa-edit"></a>
               <a href="#" class="btn btn-danger fa fa-trash"></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
