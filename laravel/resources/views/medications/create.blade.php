@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Create medication</h1>
            <div class="steps">
                <ol class="direction">
                    <li>
                        Please add medication.
                    </li>
                </ol>
            </div>
            <form class="form-style" method="POST" action="{{ route('medications.store') }}">
                @csrf
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required="required">
                    <label for="name">Strength:</label>
                    <input type="text" id="strength" name="strength" required="required">

                </div>

                <div>
                    <button type="submit" class="btn btn-primary bg-info">Add</button>

                </div>
            </form>

        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-form.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" type="text/css"
          href="{{url('https://clinicaltables.nlm.nih.gov/autocomplete-lhc-versions/15.1.1/autocomplete-lhc_jQueryUI.min.css')}}"/>

    <script src="{{ URL :: asset('js2/bootstrap.min.js')}}"></script>
    <script src="{{ URL :: asset('js2/jquery-3.3.1.min.js')}}"></script>
    <!-- <drugs api> -->
    <script src="{{url('https://clinicaltables.nlm.nih.gov/autocomplete-lhc-versions/15.1.1/autocomplete-lhc_jQuery.min.js')}}"></script>
    <script>
        new Def.Autocompleter.Prefetch('strength', []);
        new Def.Autocompleter.Search('name',
            'https://clinicaltables.nlm.nih.gov/api/rxterms/v3/search?ef=STRENGTHS_AND_FORMS');
        Def.Autocompleter.Event.observeListSelections('name', function () {
            var drugField = $('#name')[0];
            var autocomp = drugField.autocomp;
            var strengths =
                autocomp.getSelectedItemData()[0].data['STRENGTHS_AND_FORMS'];
            if (strengths)
                $('#strength')[0].autocomp.setListAndField(strengths, '');
        })
    </script>
@stop