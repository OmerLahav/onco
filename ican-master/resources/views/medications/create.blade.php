
@extends ('layouts.portal')

@section ('content')
	<h1>Create medication</h1>
	<form method="POST" action="{{ route('medications.store') }}">
		@csrf
		<div>
			<label for="name">Name:</label>
			<input type="text" id="name" name="name">
			<label for="name">Strength list:</label>
			<input type="text" id="drug_strengths">

		</div>

		<div>
			<button>Add</button>
		</div>
	</form>

<link rel="stylesheet" type="text/css" href="{{url('https://clinicaltables.nlm.nih.gov/autocomplete-lhc-versions/15.1.1/autocomplete-lhc_jQueryUI.min.css')}}"/>
<script src="{{ URL :: asset('js2/bootstrap.min.js')}}"></script>
<script src="{{ URL :: asset('js2/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('https://clinicaltables.nlm.nih.gov/autocomplete-lhc-versions/15.1.1/autocomplete-lhc_jQuery.min.js')}}"></script>
<script>
    new Def.Autocompleter.Prefetch('drug_strengths', []);
    new Def.Autocompleter.Search('name',
        'https://clinicaltables.nlm.nih.gov/api/rxterms/v3/search?ef=STRENGTHS_AND_FORMS');
    Def.Autocompleter.Event.observeListSelections('name', function() {
        var drugField = $('#name')[0];
        var autocomp = drugField.autocomp;
        var strengths =
            autocomp.getSelectedItemData()[0].data['STRENGTHS_AND_FORMS'];
        if (strengths)
            $('#drug_strengths')[0].autocomp.setListAndField(strengths, '');
    })

</script>


@stop