@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Create a treatment</h1>

            <div class="steps">
                <ol class="direction">
                    <li>
                        Here you can create a new treatment.
                    </li>
                    <li>
                        Please select the right symptoms for this treatment.
                    </li>
                </ol>
            </div>
            <form class="form-style" method="POST" action="{{ route('treatments.store') }}">
                @csrf

                <div>
                    <label for="patient_id">Patient:</label>
                    <select id="patient_id" name="patient_id">
                        @foreach (App\Patient::allPatients() as $patient)
                        @if(Auth::user()->id ==  $patient->patient_data->doctor_id) 
                            <option value="{{ $patient->id }}"> {{ $patient->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Name">
                </div>

                <div>
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" cols="30" rows="2"></textarea>
                </div>

                <div>
                    <label for="ends_at">Ending date:</label>
                    <input type="date" name="ends_at" id="ends_at">
                </div>

                <div>
                    <label for="medications">Symptoms:</label>
                    <select id="symptoms" multiple="" name="symptoms[]">
                        @foreach ($symptoms as $symptom)
                            <option value="{{ $symptom->id }}" @if(!empty($editData)) @endif> {{ $symptom->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- <div>
                    <label for="medications">Medications:</label>
                    <select id="medications" multiple="" name="medications[]">
                        @foreach ($medications as $medication)
                            <option value="{{ $medication->id }}"> {{ $medication->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div>
                    <button type="submit" class="btn btn-primary bg-info">Add</button>
                </div>
            </form>
        </div>
    </div>
{{--css--}}

  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/selected-style.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-form-treatment.css') }} ">

    {{--script--}}
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <script src="http://koreclothingpoint.com/kore_clothing_point/js/chosenplugin/chosen.jquery.js"
            type="text/javascript"></script>

    <script>
        $('#patient_id').chosen({no_results_text: "Oops, groups not found!", width: "50%"});
        $('#symptoms').chosen({no_results_text: "Oops, groups not found!", width: "50%"});
        //$('#medications').chosen({no_results_text: "Oops, groups not found!", width: "100%"});
    </script>


@stop
