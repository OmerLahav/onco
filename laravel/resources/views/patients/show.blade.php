@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>{{ $patient->name }}</h1>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Treatment ID</th>
                    <th>Patient Name</th>
                    <th>Description</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tbody>
                @foreach ( $patient->treatments as $patient_treatment)
                    <tr>
                        <td>{{ $patient_treatment->id}}</td>
                        <td>{{ $patient_treatment->name}}</td>
                        <td>{{ $patient_treatment->description}}</td>
                        <td>{{ $patient_treatment->created_at}}</td>
                        <td>?</td>
                        <td>
                            <a href="#" class="btn btn-primary opt-btn fa fa-edit"><span class="edit "> Edit </span></a>
                            <a href="#" class="btn btn-danger opt-btn far fa-trash-alt"><span class="edit del">Delete</span></a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>


            <div>
                <button type="button" id="1" class="btn btn-info add-btn bg-info"><i class="fas fa-plus"></i>Add treatment </button>
                <button type="button" id="2" class="btn btn-info add-btn bg-info"><i class="fas fa-plus" ></i> hide</button>
                <form id="3" name="myform" method="POST" action="{{ route('patients.add_treatment', [$patient]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="treatment_id">Treatment:</label>
                        <select class="form-control" id="treatment_id" name="treatment_id">
                            @foreach ($treatments as $treatment)
                                <option value="{{ $treatment->id }}">{{ $treatment->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ends_at">Ends at:</label>
                        <input type="date" class="form-control" value="ends_at" placeholder="Enter identification number"
                               name="ends_at">
                    </div>
                    <button type="submit" class="btn btn-info add-btn bg-info"><i class="fas fa-plus"></i>Add </button>

                </form>
            </div>
            <hr>

            {{--<div>{{ $patient }}</div>--}}
        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index.css') }} ">
<style>
#2{display:none;}
</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $("#1").click(function () {
            $("#3").show();

        });
        $("#2").click(function () {
            $("#3").hide();
            $("#1").show();
        });
    });
</script>
@stop
