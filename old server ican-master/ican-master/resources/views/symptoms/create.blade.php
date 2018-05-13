@extends ('layouts.portal')

@section ('content')
	<h1>Create a symptom</h1>
	<form class="form-style" method="POST" action="{{ route('symptoms.store') }}">
		@csrf
		<div >
			<label for="name">Name:</label>
			<input type="text" name="name" id="name" placeholder="Name">
		</div>
		<div>
			<label for="importance_level">Importance level:</label>
			<input type="text" name="importance_level" id="importance_level" placeholder="importance_level">
		</div>
		<div>
			<label for="image">Image URL:</label>
			<input type="text" name="image" id="image" placeholder="image URL">
		</div>
		<div>
			<button type="submit" class="btn btn-primary bg-info">Add</button>

		</div>
	</form>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-form.css') }} ">

@stop
