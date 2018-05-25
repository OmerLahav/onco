@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Edit Symptoms</h1>

            <form class="form-style" method="post" action="{{action('SymptomsController@Symp_update',$symptom[0]['id'])}}">
                {{csrf_field()}}
                <inpute type="hidden" name=_method" value="PATCH"/>

                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="{{$symptom[0]['name']}}" placeholder="Name">
                </div>
                <div>
                    <label for="description">Description:</label>
                    <textarea  name="description" id="description">{{$symptom[0]['description']}}</textarea>
                </div>

                <div>
                    <label for="importance_level">Importance level:</label>
                    <input type="text" name="importance_level" value="{{$symptom[0]['importance_level']}}"
                           id="importance_level" placeholder="importance_level">
                </div>
                <div>

                    <label for="importance_level">level 0 description:</label>
                    <input type="text" name="description_0" value="{{$symptom[0]['symptom_desc'][0]['description']}}" id="importance_level" placeholder="description 0">
                    <input type="hidden" name="color_0" value="#12222">
                    <input type="hidden" name="id_0" value="{{$symptom[0]['symptom_desc'][0]['id']}}">

                    <label for="importance_level">level 1 description:</label>
                    <input type="text" name="description_1" value="{{$symptom[0]['symptom_desc'][1]['description']}}" id="importance_level" placeholder="description 1 ">
                       <input type="hidden" name="color_1" value="#12223">
                        <input type="hidden" name="id_1" value="{{$symptom[0]['symptom_desc'][1]['id']}}">
                   

                  
                    <label for="importance_level">level 2 description:</label>
                    <input type="text" name="description_2" value="{{$symptom[0]['symptom_desc'][2]['description']}}" id="importance_level" placeholder="description 2">
                       <input type="hidden" name="color_2" value="#12224">
                    <input type="hidden" name="id_2" value="{{$symptom[0]['symptom_desc'][2]['id']}}">
                  
                    <label for="importance_level">level 3 description:</label>
                    <input type="text" name="description_3" value="{{$symptom[0]['symptom_desc'][3]['description']}}" id="importance_level" placeholder="description 3">
                       <input type="hidden" name="color_3" value="#122225">
                     <input type="hidden" name="id_3" value="{{$symptom[0]['symptom_desc'][3]['id']}}">
                  
                    <label for="importance_level">level 4 description:</label>
                    <input type="text" name="description_4" value="{{$symptom[0]['symptom_desc'][4]['description']}}" id="importance_level" placeholder="importance_level">
                       <input type="hidden" name="color_4" value="#12262">
                       <input type="hidden" name="id_4" value="{{$symptom[0]['symptom_desc'][4]['id']}}">
                   
                </div>

                <div>
                    <label for="image">Upload Image:</label>
                    <input type="file" name="image" id="image" placeholder="image URL">
                </div>


                <div>
                    <button type="submit" value="Update" class="btn btn-primary bg-info">Update</button>
                </div>
            </form>
        </div>
    </div>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-form.css') }} ">
@stop
