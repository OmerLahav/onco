@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>{{ $treatment->name }}</h1>
			<h4>Patient Name:&nbsp; <a href="{{ route('patients.show', [$treatment->patient_id]) }}">{{ $treatment->patient->name }}</a></h4>
            <h4>Treatment description:&nbsp;{{ $treatment->description }}</h4>
          
			
			<div class="steps">
                <ol class="direction">
                    <li>
                        Here you can find inforamtion about the patient treatment.
                    </li>
					<li>
                        At the end of the page you can add medications to the treatment <a href="#add-medication">Click here.</a>
                    </li>
					
                </ol>
            </div>
			
			{{--Tables--}}
			<h5>Symptoms</h5>
            <table id="example" class="table table-striped table-bordered col-sm-12" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Importance_level</th>
                    <th>Image</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($treatment->symptoms as $symptom)
                    <tr>
                        <td>{{ $symptom->id }}</td>
                        <td>{{ $symptom->name }}</td>
                        <td>{{ $symptom->importance_level }}</td>
                        <td>{{ $symptom->image }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
          
			
			<h5>Medications</h5>
            <table id="example2" class="table table-striped table-bordered col-sm-12" style="width:100%">
            
                <thead>
                <tr>
                    <th>Medication</th>
                    <th>Medication Strength</th>
                    <th>Day Part</th>
                    <th>Ends</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($treatment->medications as $medication)
                        <tr>
                            <td>{{ $medication->medication->name }}</td>
                            <td>{{ $medication->medication->strength }}</td>
                            <td>{{ App\TreatmentMedication::DAY_PARTS[$medication->day_part] }}</td>
                            <td>{{ $medication->ends_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div>
			
			<h5>Add new Medications</h5>
                <form id="add-medication"class="form-style" method="POST" action="{{ route('treatmentmedications.store') }}">
                    <input type="hidden" name="treatment_id" value="{{ $treatment->id }}">
                    @csrf

                    <div>
                        <label style=" width: 20%" for="medication_id">Medications:</label>
                        <select id="medication_id" name="medication_id">
                            @foreach (App\Medication::all() as $medication)
                                <option value="{{ $medication->id }}">{{ $medication->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label style=" width: 20%" for="day_part">Part of Day:</label>
                        <select id="day_part" name="day_part">
                            @foreach (App\TreatmentMedication::DAY_PARTS as $key => $part)
                                <option value="{{ $key }}">{{ $part }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label  style=" width: 20%" for="ends_at">Ends:</label>
                        <input type="date" name="ends_at" id="ends_at" value="{{ $treatment->ends_at->format('Y-m-d') }}">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary bg-info">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--css--}}

   
	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/selected-style.css') }} ">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index-show.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    {{--script--}}
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <script src="http://koreclothingpoint.com/kore_clothing_point/js/chosenplugin/chosen.jquery.js"
            type="text/javascript"></script>

    <script>
        $('#day_part').chosen({no_results_text: "Oops, groups not found!", width: "50%"});
        $('#medication_id').chosen({no_results_text: "Oops, groups not found!", width: "50%"});
    </script>

@stop
