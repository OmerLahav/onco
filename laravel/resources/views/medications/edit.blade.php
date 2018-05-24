@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Edit Medications</h1>


            <form class="form-style" method="post" action="{{action('MedicationsController@update',$medication->id)}}">

            {{csrf_field()}}
                <inpute type="hidden" name=_method" value="PATCH"/>

                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="{{$medication->name}}" placeholder="Name" required="required">
                    <!-- <label for="name" >strengths:</label>
                    <input type="text" name="strengths" value="{{$medication->strengths}}" placeholder="strengths" -->

                </div>

                <div>
                     <button type="submit" value="Update" class="btn btn-primary bg-info">Update</button>
                </div>
            </form>
        </div>
    </div>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-form.css') }} ">

@stop
