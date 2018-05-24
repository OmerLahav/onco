@extends ('layouts.portal') @section ('content')
<div class="page-wrapper">
    <div class="page-wrapper-container">
        
        <h1>Symptoms Report </h1>
                        <div class="steps">
                        <ol class="direction">
                            <li>
                                Please choose a symptom for report.
                            </li>
                            <li>
                                After selecting sympton plese select level of pain.
                            </li>
                        </ol>
                    </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            @if(count($treatments))
                @foreach($treatments as $key => $treatment)
                    @if(count($treatment->symptoms))
                        @php ($class = '')

                        @if($key == 0)
                            @php ($class = 'active')
                        @endif
                        <li class="nav-item">
                            <a class="nav-link {{$class}}" data-toggle="tab" href="#treatment{{$treatment->id}}">{{$treatment->name}}</a>
                        </li>
                    @endif
                @endforeach
            @endif
           
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            @if(count($treatments))
                @foreach($treatments as $key => $treatment)
                @php ($class = '')

                @if($key == 0)
                    @php ($class = 'active')
                @endif
                <!--treatments-->
                <div class="tab-pane {{$class}} container" id="treatment{{$treatment->id}}">
                    

                    @if(count($treatment->symptoms))
                        @php ($page_count = ceil(count($treatment->symptoms) / 3))
                        @php ($page_ary = ['page-one','page-two','page-three','page-four','page-five','page-six'] )
                        @php ($symp_ary = ['symp-one','symp-two','symp-three','symp-four','symp-five','symp-six','symp-seven','symp-eight','symp-nine','symp-ten'] )
                        
                        @php ($page_start_ary = ['1'=>'0','2'=>'3','3'=>'6','4'=>'9','5'=>'12','6'=>'15','7'=>'18','8'=>'21'] )
                    @endif
                    @for ($i = 1; $i <= $page_count;$i++)
                        <div class="list-group"  id="{{$page_ary[$i-1]}}">
                            @if(count($treatment->symptoms))
                                @php ($j = 1)
                                @foreach($treatment->symptoms as $sym_key => $symptom)
                                <?php
                                  $classts = 'T_'.$treatment->id.'S_'.$symptom->id;
                                ?>
                                    @if($page_start_ary[$i] <= $sym_key)
                                        @if($j <= 3)
                                            <button type="button" symp_treatid="{{$classts}}" class="list-group-item list-group-item-action symps {{$symp_ary[$key]}} ">
                                                <div class="image">
                                                <h5>{{$symptom->name}}</h5>
                                                <img  class="symp-img" src="/images/symptoms/{{$symptom->image}}" alt="Nausea">
                                                </div>
                                                
                                                <img  id="checked-{{$symp_ary[$key]}}" class="check-img" src="/images/symptoms/check.png" alt="check">
                                            </button> 
                                        @endif
                                        @php ($j++) 
                                    @endif
                                @endforeach
                            @endif     
                        </div>
                    @endfor
                    <div class="buttons">
                        <button type="button" class="btn btn-default float-right  t-20" id="next">Next</button>
                        <button type="button" class="btn btn-default float-right t-20" id="back">Back</button>
                    </div>
                </div>
                @endforeach
            @endif
                
        </div>
        @if(count($treatments))
            @php ($j = 1)
            @foreach($treatments as $key => $treatment)
                @if(count($treatment->symptoms))
                    @foreach($treatment->symptoms as $sym_key => $symptom)
                        <?php
                          $classts = 'T_'.$treatment->id.'S_'.$symptom->id;
                        ?>
                        @php ($styles = '')
                        @if($j > 1)
                            @php ($styles = 'display:none')
                        @endif
                        @php ($j++)
                        <form  id="frm_{{$classts}}" action="{!! route('patient.symptomsreports') !!}" method="post" class="symptoms_reports">
                            @csrf
                            <input type="hidden" name="treatment_id" value="{{$treatment->id}}">
                            <input type="hidden" name="symptoms_id" value="{{$symptom->id}}">
                            <input type="hidden" name="level_text" value="" id="level_text_{{$classts}}">
                            
                            <section style="{{$styles}}" class="report-levels symp_level {{$classts}}">

                                @if(isset($symptom->symptom_desc))
                                    @foreach($symptom->symptom_desc as $sym_desc_key => $symptom_desc)
                                        <label color_attr="{{$symptom_desc->color}}" description_attr="{{$symptom_desc->description}}" class="container-levels radio-zero level_radio_{{$sym_desc_key}}" lblatt="{{$classts}}">
                                            <input type="radio" class="symptom_level" name="symptom_desc_id" value="{{$symptom_desc->id}}">
                                            <span id="checkmark_{{$classts}}_{{$sym_desc_key}}" class="checkmark"></span>
                                        </label>
                                    @endforeach
                                @endif
                                
                                <div class="numbers">
                                    @if(isset($symptom->symptom_desc))
                                        @foreach($symptom->symptom_desc as $sym_desc_key => $symptom_desc)
                                            <p class="one-five num-symp-{{$sym_desc_key}}">{{$sym_desc_key}}</p>
                                        @endforeach
                                    @endif
                                </div>
                                    <div class="card-info-levels">
                                        <div class="card-header">
                                            Levels descriptions
                                        </div>
                                        <div class="card-body levle-info">
                                            <ol start="0">
                                                @if(isset($symptom->symptom_desc))
                                                    @foreach($symptom->symptom_desc as $sym_desc_key => $symptom_desc)
                                                        <li id="il-info-{{$classts}}-{{$sym_desc_key}}">{{$symptom_desc->description}}</li>
                                                    @endforeach
                                                @endif
                                            </ol>
                                        </div>
                                    </div>
                                    <button frm_id="frm_{{$classts}}"  class="save-btn btn btn-default float-right save_level_symtoms"  id="save-symp-one">Submit </button>
                            </section>
                        </form>
                    @endforeach
                @endif
            @endforeach
        @endif
  </div>
</div>
    <!---sidebar ---->

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('/css/patients-style/pages/symptom.css') }}"> {{-- JS --}}
    <script src="{{ asset('/js2/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('/js2/symptom.js') }}"></script>
    <script src="{{ asset('/js2/custom.js') }}"></script>

    <script>
        $(document).ready(function() {
            //Here not come In js code
            if ($(window).width() < 481) 
            {
                $(".tab-content").css({
                    "width": "100%"
                });
            }
        });
    </script>

    @stop