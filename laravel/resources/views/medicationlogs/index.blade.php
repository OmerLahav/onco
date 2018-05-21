@extends ('layouts.portal')

@section ('content')

<div class="page-wrapper">
    <div class="page-wrapper-container">
        <h1>Medications log</h1>
        <div class="steps">
            <ol class="direction">
                <li>
                    Here you will review medications reports of your patients.
                </li>

            </ol>
        </div>
        <table id="example" class="table table-striped table-bordered col-sm-12" style="width:100%">
            <thead>
            <tr>
                <th>Patient Name</th>
                <th>Treatment</th>
                <th>Medication</th>
                <th>Date</th>
                <th>Day Part</th>
                <th>Status</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($dates as $date => $value)
            @foreach ($treatments as $treatment)
            @foreach ($treatment->medications as $treatment_medication)
            
            <tr>
				@if(!empty($treatment->patient))
					<td>{{ $treatment->patient->name }}</td>
				@else
                    
					@if(isset($treatment->patient_id) && $treatment->patient_id > 0)
					
                    	@php
							$patients = App\User::where('id','=',$treatment->patient_id)->first();
						@endphp
						
                        @if(!empty($patients))
						 <td>{{ $patients->first_name }} {{ $patients->last_name }}</td>
						@else
							 <td>--N/A--</td>
						@endif
					@else
					   <td>--N/A--</td>
					@endif
				@endif
				
			   <td>{{ $treatment->name }}</td>
                <td>{{ $treatment_medication->medication->name }}</td>
                <td>{{ Carbon\Carbon::parse($date)->format('d/m/Y') }}</td>
                <td>{{ App\TreatmentMedication::DAY_PARTS[$treatment_medication->day_part] }}</td>
                <td>{{ $took->whereIn('treatment_medication_id', $treatment_medication->id)->count() ? 'Yes' : 'No' }}
                </td>
            </tr>
            @endforeach
            @endforeach
            @endforeach

            </tbody>
        </table>

    </div>
</div>
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index.css') }} ">
@stop
