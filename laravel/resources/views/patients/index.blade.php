@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Patients</h1>
            <a href="{{ route('patients.create') }}" class="btn btn-info add-btn bg-info"><i class="fas fa-plus"></i>Add</a>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Gender</th>
                    <th>Cancer Type</th>
                    <th>Actions</th>
                    <th>Treatments</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->patient_data->user_id }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->patient_data->gender }}</td>
                        <td>{{ $patient->patient_data->type }}</td>
                        <td>
                            <a href="#" class="btn btn-primary opt-btn fa fa-edit"><span class="edit "> Edit </span></a>
                            <a href="#" class="btn btn-danger opt-btn far fa-trash-alt"><span class="edit del">Delete</span></a>
                        </td>
                        <td>
                            <a href="{{ route('patients.show', [$patient]) }}" class="btn btn-primary opt-btn fa fa-edit"><span class="edit "> View/Add </span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index.css') }} ">
@stop
