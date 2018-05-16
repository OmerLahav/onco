@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Edit Symptoms</h1>

            <form class="form-style" method="post" action="{{action('SymptomsController@Symp_update',$symptom->id)}}">
                {{csrf_field()}}
                <inpute type="hidden" name=_method" value="PATCH"/>

                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="{{$symptom->name}}" placeholder="Name">
                </div>
                <div>
                    <label for="importance_level">Importance level:</label>
                    <input type="text" name="importance_level" value="{{$symptom->importance_level}}"
                           id="importance_level" placeholder="importance_level">
                </div>

                <div>
                    <button type="submit" value="Update" class="btn btn-primary bg-info">Update</button>
                </div>
            </form>
        </div>
    </div>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-form.css') }} ">
@stop
