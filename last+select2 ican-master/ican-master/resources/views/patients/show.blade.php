@extends ('layouts.portal')

@section ('content')
	<h1>{{ $patient->name }}</h1>
	<hr>
	<div>
		{{ $patient->treatments }}
		<form method="POST" action="{{ route('patients.add_treatment', [$patient]) }}">
			@csrf
            <div class="form-group">
                <label for="treatment_id">Treatment:</label>
                <select class="form-control" id="treatment_id" name="treatment_id">
                	@foreach ($treatments as $treatment)
                		<option value="{{ $treatment->id }}">{{ $treatment->name }}</option>
                	@endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="ends_at">Ends at:</label>
                <input type="date" class="form-control" id="ends_at" placeholder="Enter identification number" name="ends_at">
            </div>

            <button type="submit" class="btn btn-primary">Add Treatment</button>
		</form>
	</div>
	<hr>
	<div>{{ $patient }}</div>
@stop
