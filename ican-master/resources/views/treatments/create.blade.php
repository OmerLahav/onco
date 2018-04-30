@extends ('layouts.portal')

@section ('content')
	<h1>Create a treatment</h1>
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

				<label class="radio-style">
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
			<button>Add</button>
		</div>
	</form>

	<link href="{!! asset('css/radio.css') !!}" media="all" rel="stylesheet" type="text/css" />







	<!-- (Optional) Latest compiled and minified JavaScript translation files -->



@stop
