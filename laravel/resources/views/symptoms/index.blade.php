@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>All symptoms</h1>
            <a href="{{ route('symptoms.create') }}" class="btn btn-info add-btn bg-info"><i class="fas fa-plus"></i>Add</a>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                            <a href="#" class="btn btn-primary opt-btn fa fa-edit"><span class="edit "> Edit </span></a>
                            <a href="/Symp_delete/{{$symptom->id}}"  onclick="return confirm('Are you sure you want to delete this symptom?');" class="btn btn-danger opt-btn far fa-trash-alt"><span class="edit del">Delete</span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index.css') }} ">
@stop
