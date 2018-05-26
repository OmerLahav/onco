@extends ('layouts.portal') @section ('content')
<div class="page-wrapper">
    <div class="page-wrapper-container">
        
        <h1>Symptoms Report </h1>
                    <div class="steps">
                        <ol class="direction">
                            <li>
                                Please choose a symptom for the report.
                            </li>
                            <li>
                                After selecting the symptom, please select its level of pain.
                            </li>
                        </ol>
                    </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-fill">
            @if(count($treatments))
                @foreach($treatments as $key => $treatment)
                    @if(count($treatment->symptoms))
                        @php ($firstsymptomid = '')
                        @foreach($treatment->symptoms as $sym_key => $symptom)
                             @if($sym_key == 0)
                                 @php ($firstsymptomid = $symptom->id)
                             @endif
                        @endforeach
                        @php ($class = '')
                        @php ($treatmentsymtomsid = '')
                        @if($key == 0)
                            @php ($class = 'active')
                        @endif

                        @php ($treatmentsymtomsid = 'T_'.$treatment->id.'S_'.$firstsymptomid)
                        <li class="nav-item" treatmentid="{{$treatment->id}}" treatmentsymtomsid="{{$treatmentsymtomsid}}" >
                            <a class="nav-link {{$class}}" data-toggle="tab" href="#treatment{{$treatment->id}}">{{$treatment->name}}</a>
                        </li>
                    @endif
                @endforeach
            @endif
           
        </ul>
        <div class="container-fluid">
            <div class="row">
        <!-- Tab panes -->
        <div class="tab-content col-md-6">
            @if(count($treatments))
                @foreach($treatments as $key => $treatment)
                @if(count($treatment->symptoms))
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
                            @php ($styles = '')
                            @php ($navbar = $treatment->id.'_first_list')
                            @php ($listclass = $treatment->id.'_'.$page_ary[$i-1])
                            @if($i > 1)
                                @php ($styles = 'display:none')
                                @php ($navbar = '')
                            @endif
                            <div class="list-group page {{$navbar}} {{$listclass}} "  style="{{$styles}}"  id="{{$page_ary[$i-1]}}">
                                @if(count($treatment->symptoms))
                                    @php ($j = 1)
                                    @foreach($treatment->symptoms as $sym_key => $symptom)
                                    
                                    <?php
                                    $symtomsreports = '';
                                    $symtomsreports = App\SymptomReport::where('treatment_id',$treatment->id)
                                        ->where('symptoms_id',$symptom->id)
                                        ->where('patient_id',Auth::user()->id)
                                        ->where(DB::raw("DATE(symptom_reports.created_at)"),"=",date('Y-m-d'))
                                        ->first();


                                    ?>
                                    @php ($checked = '')
                                    @php ($stylecss = '')
                                    @if(isset($symtomsreports) && !empty($symtomsreports))
                                        @php ($checked = 'display:block')
                                        @php ($stylecss = 'background:#d6f5d6')    
                                    @endif
                                    <?php
                                      $classts = 'T_'.$treatment->id.'S_'.$symptom->id;
                                    ?>
                                        @if($page_start_ary[$i] <= $sym_key)
                                            @if($j <= 3)

                                                <button type="button" style="{{$stylecss}}" symp_treatid="{{$classts}}" class="list-group-item list-group-item-action symps {{$symp_ary[$key]}} ">
                                                    <div class="image">
                                                    <h5>{{$symptom->name}}</h5>
                                                    <img  class="symp-img" src="/images/symptoms/{{$symptom->image}}" alt="Nausea">
                                                    </div>
                                                    <div class="symp-desc">
                                                    {{$symptom->description}}
                                                    </div>
                                                    <img style="{{$checked}}"  id="checked-{{$symp_ary[$key]}}" class="check-img" src="/images/symptoms/check.png" alt="check">
                                                </button> 
                                            @endif
                                            @php ($j++) 
                                        @endif
                                    @endforeach
                                @endif     
                            <div class="buttons">
                                @php ($next_page = '')
                                @if(isset($page_ary[$i]) && $page_count != $i)
                                    @php ($next_page = $page_ary[$i])
                                     <button type="button" page="{{ $treatment->id}}_{{$next_page}}"  treatmentid="{{$key}}" class="btn btn-default   t-20" id="next">Next</button>
                                @endif

                                @php ($back_page = '')
                                @if(isset($page_ary[$i-2]))
                                    @php ($back_page = $page_ary[$i-2])
                                    
                                    <button type="button" page="{{ $treatment->id}}_{{$back_page}}"  treatmentid="{{$key}}" class="btn btn-default  t-20" id="back">Back</button>
                                @endif

                               
                            </div>
                            </div>
                        @endfor
                    </div>
                    @endif
                @endforeach
            @endif
                
        </div>
        <div class=" col-md-6" >
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
                            
                            <section style="display:none" class="report-levels symp_level {{$classts}}">
                                <?php
                                    $symtomsreports = '';
                                    $symtomsreports = App\SymptomReport::where('treatment_id',$treatment->id)
                                        ->where('symptoms_id',$symptom->id)
                                        ->where('patient_id',Auth::user()->id)
                                        ->where(DB::raw("DATE(symptom_reports.created_at)"),"=",date('Y-m-d'))
                                        ->first();


                                ?>
                                @if(isset($symptom->symptom_desc))
                                    @foreach($symptom->symptom_desc as $sym_desc_key => $symptom_desc)
                                        <label  color_attr="{{$symptom_desc->color}}" description_attr="{{$symptom_desc->description}}" class="container-levels radio-zero level_radio_{{$sym_desc_key}}" lblatt="{{$classts}}">
                                            @if(isset($symtomsreports) && !empty($symtomsreports))
                                                @php ($ischecked = '')
                                                @php ($stylecss = '')
                                                @if($symtomsreports->patient_level == $symptom_desc->level )
                                                    @php ($ischecked = 'checked')
                                                    @php ($stylecss = 'background-color:'.$symptom_desc->color.' !important')
                                                    
                                                @endif
                                                <input type="radio"  {{$ischecked}} class="symptom_level" name="patient_level" value="{{$symptom_desc->level}}">
                                                <span style="{{$stylecss}}" id="checkmark_{{$classts}}_{{$sym_desc_key}}" class="checkmark"></span>
                                            @else
                                                <input type="radio"  class="symptom_level" name="patient_level" value="{{$symptom_desc->level}}">
                                                <span  id="checkmark_{{$classts}}_{{$sym_desc_key}}" class="checkmark"></span>
                                            @endif
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
                                                        @php ($stylecss = '')
                                                        @if(isset($symtomsreports) && !empty($symtomsreports))
                                                        @if($symtomsreports->patient_level == $symptom_desc->level )
                                                            @php ($stylecss = 'color:'.$symptom_desc->color.' !important')
                                                            
                                                            @endif
                                                        @endif

                                                        <li style="{{$stylecss}}" id="il-info-{{$classts}}-{{$sym_desc_key}}">{{$symptom_desc->description}}</li>
                                                    @endforeach
                                                @endif
                                            </ol>
                                        </div>
                                    </div>
                                    <a href class=" btn  show_symptoms float-left"  >Back </a>

                                    <button frm_id="frm_{{$classts}}"  class="save-btn btn btn-default save_level_symtoms"  id="save-symp-one">Submit </button>
                                    
                            </section>
                        </form>
                    @endforeach
                @endif
            @endforeach
        @endif
    </div>
</div>
</div>

  </div>
</div>
    <!---sidebar ---->

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('/css/patients-style/pages/symptom.css') }}"> 
	{{-- JS --}}
    <script src="{{ asset('/js2/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('/js2/symptom.js') }}"></script>
    <script src="{{ asset('/js2/custom.js') }}"></script>



<script>
       
        $(document).ready(function() {
                if ($(window).width() <481) {
                 $(".symps").click(function () {
                $(".tab-content  ").hide();
                 });

                    $(".show_symptoms ").click(function () {
                $(".symptoms_reports  ").hide();
                  $(".tab-content  ").show();               
    
                 });
                  
              
                }
     
 
                                         

  
    });
</script>   

 





    @stop