@extends ('layouts.portal')

@section ('content')
	<h1>Create medication</h1>
	<form method="POST" action="{{ route('medications.store') }}">
		@csrf
		<div>
			<label for="name">Name:</label>
			<input type="text" name="name" id="name" placeholder="Name">
		</div>
		<div>
			<button>Add</button>
		</div>
	</form>
@stop
