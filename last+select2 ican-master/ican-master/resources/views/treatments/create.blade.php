@extends ('layouts.portal')

@section ('content')
	<h1>Create a treatment</h1>

	<div class="steps">
		<ol class="direction">
			<li>
				Please select your health care provider.
			</li>
			<li>
				In this stage you will make a request for an appointment.
			</li>
		</ol>
	</div>
	<form    method="POST" action="{{ route('treatments.store') }}">
		@csrf
		<div  class="form-style">
		<div>
			<label for="name" >Name:</label>
			<input type="text" name="name" id="name" placeholder="Name">


		</div>
		<div>
			<label for="description">Description:</label>
			<textarea name="description" id="description" cols="30" rows="2"></textarea>
		</div>
		<div>

			<label for="medications">Symptoms:</label>
            <select id="symptoms" multiple="" name="symptoms[]">
                @foreach ($symptoms as $symptom)
                    <option value="{{ $symptom->id }}" @if(!empty($editData)) @endif> {{ $symptom->name }}</option>
                @endforeach    
            </select>
		</div>
		<div>

			<label for="medications">Medications:</label>

			<select id="medications" multiple="" name="medications[]">
			@foreach ($medications as $medication)
                    <option value="{{ $medication->id }}"> {{ $medication->name }}</option>
				<!--<label class="radio-style">
					<input type="checkbox" name="medications[]" value="{{ $medication->id }}"> {{ $medication->name }}
					<span class="checkmark"></span>
				</label>
				<br>
                -->
			@endforeach
            </select>

		</div>
		<div>
			<button type="submit" class="btn btn-primary bg-info">Add</button>

		</div>
		</div>
	</form>

	<link href="{!! asset('css/admin-styles/radio.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<link href="{!! asset('css/admin-styles/steps.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-form-treatment.css') }} ">


	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script src="http://koreclothingpoint.com/kore_clothing_point/js/chosenplugin/chosen.jquery.js" type="text/javascript"></script>
<link href="http://koreclothingpoint.com/kore_clothing_point/assets/css/chosen.css" rel="stylesheet" type="text/css"/>
<script>
$('#symptoms').chosen({no_results_text: "Oops, groups not found!",width: "30%"});
$('#medications').chosen({no_results_text: "Oops, groups not found!",width: "30%"});
</script>


@stop
