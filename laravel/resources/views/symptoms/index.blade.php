@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>All symptoms</h1>
            <div class="steps">
                <ol class="direction">
                    <li>
                        On this page you cana add a new symptoms.
                    </li>
                    <li>
                        Please fill in all the information below.
                    </li>
                </ol>
            </div>
            <a href="{{ route('symptoms.create') }}" class="btn btn-info add-btn bg-info"><i class="fas fa-plus"></i>Add</a>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Sr #</th>
                    <th>Symptom Name</th>
                   <!--  <th>Symptom Image</th> -->
                    <th>importance level</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($symptoms as $symptom)
                    <tr>
                        <td>{{ $symptom->id }}</td>
                        <td>{{ $symptom->name }}</td>
                        <!-- <td><img src="{{public_path()}}/images/symptoms/{{$symptom->image}}" height="10" width="10" ></td> -->
                        <td>{{ $symptom->importance_level }}</td>
                        <td>
                            <a href="{{action('SymptomsController@Symp_edit',$symptom->id)}}"  class="btn btn-primary opt-btn fa fa-edit"><span class="edit "> Edit </span></a>
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
