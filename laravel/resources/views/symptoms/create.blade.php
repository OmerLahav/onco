@extends ('layouts.portal')

@section ('content')
   
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Create a symptom</h1>
            <div class="steps">
                <ol class="direction">
                    <li>
                        Please create new symptom.
                    </li>
                </ol>
            </div>
            <form class="form-style" method="POST" enctype="multipart/form-data" action="{{ route('symptoms.store') }}">
                @csrf
                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Name">
                </div>
                <div>
                    <label for="description">Description:</label>
                    <textarea cols="50" rows="6"  name="description" id="description"></textarea>
                </div>
                
                <div>
                    <label for="importance_level">Importance level:</label>
                    <input type="text" name="importance_level" id="importance_level" placeholder="importance_level">
                </div>
                 <div>
                    <label for="importance_level">level 0 description:</label>
                    <input type="text" name="description_0" id="importance_level" placeholder="description 0">
                    <input type="hidden" name="color_0" value="#12222">

                    <label for="importance_level">level 1 description:</label>
                    <input type="text" name="description_1" id="importance_level" placeholder="description 1 ">
                       <input type="hidden" name="color_1" value="#12223">

                  
                    <label for="importance_level">level 2 description:</label>
                    <input type="text" name="description_2" id="importance_level" placeholder="description 2">
                       <input type="hidden" name="color_2" value="#12224">

                  
                    <label for="importance_level">level 3 description:</label>
                    <input type="text" name="description_3" id="importance_level" placeholder="description 3">
                       <input type="hidden" name="color_3" value="#122225">

                  
                    <label for="importance_level">level 4 description:</label>
                    <input type="text" name="description_4" id="importance_level" placeholder="importance_level">
                       <input type="hidden" name="color_4" value="#12262">

                

                <div>
                    {{--<label for="image">Image URL:</label>--}}
                    {{--<input type="text" name="image" id="image" placeholder="image URL">--}}


                    <label for="image">Upload Image:</label>
                    <input type="file" name="image" id="image" placeholder="image URL">

                </div>

                      <!-- <div>
                            <table>
                            <tr>
                                <td>
                                    <label for="level">Level:</label>
                                    <select class="form-control" id="level" name="level[]" required="required">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </td>

                                <td>
                                    <label for="description">Description:</label>
                            
                                    <input type="text" id="description" class="form-control" name="description[]">
                                </td>
                                <td>
                                    <label for="color">Color:</label>
                                   
                                    <div id="cp2" class="input-group colorpicker-component colorpicker"> 
                                      <input type="text" name="color[]" value="#00AABB"  maxlength="7" size="7"  class="form-control" /> 
                                      <span class="input-group-addon"><i></i></span>
                                    </div>
                                </td>
                                <td>
                                     <button type="button" class="btn btn-sm btn-primary add_more_button">Add More Fields</button>
                                </td>
                            </tr>
                            </table>

                           
                      </div>
                
                <div> -->
                    
                <button type="submit" class="btn btn-primary bg-info">Add</button>

                </div>
            </form>
        </div>
    </div>

    {{--<-- css->--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-form.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/css/bootstrap-colorpicker.css" rel="stylesheet">
    

    {{--<-- js->--}}
    <script src="{{ asset('/js2/jquery-3.3.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.2/js/bootstrap-colorpicker.min.js"></script>
     <script src="{{ asset('/js2/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            //Symptoms Section Jquery Code Start
                    //$('.colorpicker').colorpicker();
                    var max_fields_limit      = 5; //set limit for maximum input fields
                    var x = 1; //initialize counter for text box
                    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
                        e.preventDefault();
                        if(x < max_fields_limit){ //check conditions
                            x++; //counter increment
                            $('.input_fields_container').append('<div><input type="text" name="product_name[]"/><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>'); //add input field
                        } else
                        {
                            alert("Symtopms Level limit is 5");
                        }
                    });  

                    $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
                        e.preventDefault(); $(this).parent('div').remove(); x--;
                    })


                //End Symptoms Section Code End
        });
    </script>


@stop
