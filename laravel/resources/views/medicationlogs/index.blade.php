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
        <table id="medicationLog" class="table table-striped table-bordered col-sm-12" style="width:100%">
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
                    @if ($value >= date('Y-m-d',strtotime($treatment->created_at)) && $value <= date('Y-m-d',strtotime($treatment->ends_at)))
                        @if(!isset($treatment->medications) && empty($treatment->medications))
                            @php
                            $treatment->medications = App\TreatmentMedication::where('treatment_id',$treatment->id)->get();
                            @endphp
                        @endif
                          @foreach ($treatment->medications as $treatment_medication)
                        @if(date('Y-m-d H:i:s',strtotime($treatment->ends_at)) >= date('Y-m-d H:i:s'))
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
                            @php

                                $is_taken = App\MedicationLog::whereIn('patient_id', $treatments->pluck('patient_id')->unique()->toArray())
                                        ->where(DB::raw("DATE(medication_logs.created_at)"),"=",$value)
                                        ->where('treatment_medication_id', $treatment_medication->id)
                                        ->count()
                                       
                            @endphp
                           <td>{{ $treatment->name }}</td>
                            <td>{{ $treatment_medication->medication->name }}</td>
                            <td>{{ Carbon\Carbon::parse($value)->format('d/m/Y') }}</td>
                            <td>{{ App\TreatmentMedication::DAY_PARTS[$treatment_medication->day_part] }}</td>
                            <td>{{ $is_taken > 0 ? 'Taken' : 'Not taken' }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    @endif
                @endforeach
            @endforeach

            </tbody>
        </table>

    </div>
</div>

<link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index.css') }} ">
{{--js--}}
<script src="{{ asset('js2/jquery.min.js') }}"></script>
<script src="{{ asset('js2/phone-alert.js') }}"></script>


@stop


