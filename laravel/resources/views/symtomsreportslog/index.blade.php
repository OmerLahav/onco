@extends ('layouts.portal')

@section ('content')

<div class="page-wrapper">
    <div class="page-wrapper-container">
        <h1>Symptoms log</h1>
        <div class="steps">
            <ol class="direction">
                <li>
                    Here you can review symptoms' reports of your patients.
                </li>

            </ol>
        </div>
        <table id="symp-report" class="table table-striped table-bordered col-sm-12" style="width:100%" >
            <thead>
            <tr>
                <th>Patient Name</th>
                <th>Treatment</th>
                <th>Symptom Name</th>
                <th>Level</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($dates as $date => $value)
                @foreach ($treatments as $treatment)
                    @if ($value >= date('Y-m-d',strtotime($treatment->created_at)) && $value <= date('Y-m-d',strtotime($treatment->ends_at)))
                        @if(!isset($treatment->symptoms) && empty($treatment->symptoms))
                            @php
                            $treatment->symptoms = App\TreatmentSymtoms::where('treatment_id',$treatment->id)->get();
                            @endphp
                        @endif

                        @foreach ($treatment->symptoms as $treatment_symtoms)
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
                                $symtoms_reports = [];
                                $symtoms_reports = App\SymptomReport::whereIn('patient_id', $treatments->pluck('patient_id')->unique()->toArray())
                                        ->where(DB::raw("DATE(symptom_reports.created_at)"),"=",$value)
                                        ->where('symptoms_id', $treatment_symtoms->id)
                                        ->where('treatment_id', $treatment->id)
                                        ->first();
                                       
                            @endphp
                            
                           <td>{{ $treatment->name }}</td>
                            <td>{{ $treatment_symtoms->name }}</td>
                            <td>
                                 @if(!empty($symtoms_reports))
                                    {{$symtoms_reports->patient_level}}
                                 @else
                                    --
                                 @endif
                            </td>
                            
                            <td>{{ Carbon\Carbon::parse($value)->format('d/m/Y') }}</td>
                            <td>
                               @if(!empty($symtoms_reports))
                                    Submited
                                 @else
                                    
                                    Not Submited
                                 @endif

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



    <script src="{{ asset('js2/jquery.min.js') }}"></script>

</script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index.css') }} ">
{{--js--}}
<script src="{{ asset('js2/jquery.min.js') }}"></script>
<script src="{{ asset('js2/phone-alert.js') }}"></script>
 
@stop


