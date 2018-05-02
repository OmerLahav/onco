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
	<form  method="POST" action="{{ route('treatments.store') }}">
		@csrf
		<div>
			<label for="name" >Name:</label>
			<input type="text" name="name" id="name" placeholder="Name">


		</div>
		<div>
			<label for="description">Description:</label>
			<textarea name="description" id="description" cols="30" rows="2"></textarea>
		</div>
		<div>
			<h3>Symptoms</h3>

			@foreach ($symptoms as $symptom)

				<label class="radio-style" class="form-group">
					<input type="checkbox" name="symptoms[]" value="{{ $symptom->id }}"> {{ $symptom->name }}
					<span class="checkmark"></span>
				</label>
				<br>
			@endforeach

		</div>
		<div>
			<h3>Medications</h3>

			@foreach ($medications as $medication)

				<label class="radio-style">
					<input type="checkbox" name="medications[]" value="{{ $medication->id }}"> {{ $medication->name }}
					<span class="checkmark"></span>
				</label>
				<br>
			@endforeach


		</div>
		<div>
			<button type="submit" class="btn btn-primary">Add</button>

		</div>
	</form>

	<link href="{!! asset('css/radio.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<link href="{!! asset('css/steps.css') !!}" media="all" rel="stylesheet" type="text/css" />


	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>


@stop
