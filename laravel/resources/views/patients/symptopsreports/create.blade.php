@extends ('layouts.portal') @section ('content')
<div class="page-wrapper">
    <div class="page-wrapper-container">

        <h1>Symptoms Report </h1>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
        	@if(count($treatments))
        		@foreach($treatments as $key => $treatment)
        		<li class="nav-item">
	                <a class="nav-link active" data-toggle="tab" href="#treatment{{$treatment->id}}">{{$treatment->name}}</a>
	            </li>
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
	            <!--Regular-->
	            <div class="tab-pane {{$class}} container" id="treatment{{$treatment->id}}">
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

	              
	                    <div class="list-group" id="page-one">
	                    	@if(count($treatment->symptoms))
        						@foreach($treatment->symptoms as $sym_key => $symptom)
        	
			                        <button type="button" class="list-group-item list-group-item-action symp-one">
			                            <div class="image">
			                            <h5>{{$symptom->name}}</h5>
			                            <img  class="symp-img" src="/images/symptoms/{{$symptom->image}}" alt="Nausea">
			                            </div>
			                            
			                            <img  id="checked-symp-one" class="check-img" src="/images/symptoms/check.png" alt="check">
			                        </button>  
			                    @endforeach
			                @endif     
	                    </div>

	                   

	                <div class="list-group" id="page-two">
	                    <button type="button" class="list-group-item list-group-item-action symp-four">
	                        <div class="image">
	                            <h5>neuropathy</h5>
	                            <img class="symp-img" src="images/symptoms/neuropathy.png" alt="Multifocal motor neuropathy">
	                        </div>
	                        <p class="image-info">Multifocal motor neuropathy is a progressively worsening condition where muscles in the extremities gradually weaken.</p>
	                        <img id="checked-symp-four" class="check-img" src="images/symptoms/check.png" alt="check">
	                    </button>

	                    <button type="button" class="list-group-item list-group-item-action symp-five">
	                        <div class="image">
	                            <h5>neuropathy</h5>
	                            <img class="symp-img" src="images/symptoms/diarrhea.png" alt="Sensory neuropathy">
	                        </div>
	                        <p class="image-info">Peripheral neuropathy (PN) is damage to or disease affecting nerves.</p>
	                        <img id="checked-symp-five" class="check-img" src="images/symptoms/check.png" alt="check">
	                    </button>

	                    <button type="button" class="list-group-item list-group-item-action symp-six">
	                        <div class="image">
	                            <h5>Dry eyes</h5>
	                            <img class="symp-img" src="images/symptoms/Dryeye.png" alt="Dry eyes">
	                        </div>
	                        <p class="image-info">Dry eye syndrome (DES), also known as keratoconjunctivitis sicca (KCS), is the condition of having dry eyes.</p>
	                        <img id="checked-symp-six" class="check-img" src="images/symptoms/check.png" alt="check">
	                    </button>

	                </div>

	           

	                <div class="list-group" id="page-three">
	                    <button type="button" class="list-group-item list-group-item-action symp-seven">
	                        <div class="image">
	                            <h5>Tears</h5>
	                            <img class="symp-img" src="images/symptoms/tears.png" alt="Tears">
	                        </div>
	                        <p class="image-info">Tearing is the secretion of tears, which often serves to clean and lubricate the eyes in response to an irritation of the eyes.</p>
	                        <img id="checked-symp-seven" class="check-img" src="images/symptoms/check.png" alt="check">
	                    </button>

	                    <button type="button" class="list-group-item list-group-item-action symp-eight">
	                        <div class="image">
	                            <h5>Exhaustion</h5>
	                            <img class="symp-img" src="images/symptoms/exhausted.png" alt="Exhaustion ">
	                        </div>
	                        <p class="image-info">Symptoms of physical and mental exhaustion include feeling constantly tired and worn out.</p>
	                        <img id="checked-symp-eight" class="check-img" src="images/symptoms/check.png" alt="check">
	                    </button>

	                    <button type="button" class="list-group-item list-group-item-action symp-nine">
	                        <div class="image">
	                            <h5>Constipation</h5>
	                            <img class="symp-img" src="images/symptoms/Constipation.png" alt="Constipation">
	                        </div>
	                        <p class="image-info">Constipation refers to bowel movements that are infrequent or hard to pass.</p>
	                        <img id="checked-symp-nine" class="check-img" src="images/symptoms/check.png" alt="check">
	                    </button>

	                </div>

	                <div class="buttons">
	                    <button type="button" class="btn btn-default float-right  t-20" id="next">Next</button>
	                    <button type="button" class="btn btn-default float-right t-20" id="back">Back</button>
	                </div>
	            </div>
	      	    @endforeach
            @endif
	            
        </div>
        <!----right  part reporting--------->
        <!------------report symptom one---------------------->
        <section class="report-levels section-symp-1">
            <!------------form symptom one---------------------->
            <form id="form-symp-one" action="" method="post">
                <h5>Select the level of pain</h5>
                <div class="level-select">
                    <label class="container-levels radio-zero" id="radio-zero-symp-1">
                        <input type="radio" name="symptom-1" value="0">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-levels radio-one" id="radio-one-symp-1">
                        <input type="radio" name="symptom-1" value="1">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-levels radio-two" id="radio-two-symp-1">
                        <input type="radio" name="symptom-1" value="2">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-levels radio-three" id="radio-three-symp-1">
                        <input type="radio" name="symptom-1" value="3">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-levels radio-four" id="radio-four-symp-1">
                        <input type="radio" name="symptom-1" value="4">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </form>
            <div class="numbers">
                <p class="one-five num-symp-0">0 </p>
                <p class="one-five num-symp-1">1 </p>
                <p class="one-five num-symp-2">2</p>
                <p class="one-five num-symp-3">3 </p>
                <p class="one-five num-symp-4">4 </p>
            </div>

            <div class="card card-info-levels">
                <div class="card-header">
                    Levels descriptions
                </div>
                <div class="card-body levle-info" id="info-symp-one">
                    <ol start="0">
                        <li id="il-info-symp-one-0">None</li>
                        <li id="il-info-symp-one-1">More than 1 time</li>
                        <li id="il-info-symp-one-2">Between 2-4</li>
                        <li id="il-info-symp-one-3">Between 4-6</li>
                        <li id="il-info-symp-one-4">More than 7</li>
                    </ol>
                </div>
            </div>

            <button class="save-btn btn btn-default float-right " id="save-symp-one">Submit </button>
        </section>
        <!------------report symptom two---------------------->
        <section class="report-levels section-symp-2">
            <!------------form symptom two---------------------->
            <form id="form-symp-two" action="" method="post">
                <h5>Select the level of pain</h5>
                <div class="level-select">
                    <label class="container-levels radio-zero" id="radio-zero-symp-2">
                        <input type="radio" name="symptom-2" value="0">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-levels radio-one" id="radio-one-symp-2">
                        <input type="radio" name="symptom-2" value="1">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-levels radio-two" id="radio-two-symp-2">
                        <input type="radio" name="symptom-2" value="2">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-levels radio-three" id="radio-three-symp-2">
                        <input type="radio" name="symptom-2" value="3">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-levels radio-four" id="radio-four-symp-2">
                        <input type="radio" name="symptom-2" value="4">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </form>
            <div class="numbers">
                <p class="one-five num-symp-0">0 </p>
                <p class="one-five num-symp-1">1 </p>
                <p class="one-five num-symp-2">2</p>
                <p class="one-five num-symp-3">3 </p>
                <p class="one-five num-symp-4">4 </p>
            </div>

            <div class="card card-info-levels">
                <div class="card-header">
                    Levels descriptions
                </div>
                <div class="card-body levle-info" id="info-symp-one">
                    <ol start="0">
                        <li id="il-info-symp-two-0">None</li>
                        <li id="il-info-symp-two-1">More than 1 time</li>
                        <li id="il-info-symp-two-2">Between 2-4</li>
                        <li id="il-info-symp-two-3">Between 4-6</li>
                        <li id="il-info-symp-two-4">More than 7</li>
                    </ol>
                </div>
            </div>

            <button class="save-btn btn btn-default float-right " id="save-symp-two">Submit </button>
        </section>
        <!------------report symptom three---------------------->
        <section class="report-levels section-symp-3">
            <!------------form symptom three---------------------->
            <form id="form-symp-three" action="" method="post">
                <h5>Select the level of pain</h5>
                <div class="level-select">
                    <label class="container-levels radio-zero" id="radio-zero-symp-3">
                        <input type="radio" name="symptom-3" value="0">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-levels radio-one" id="radio-one-symp-2">
                        <input type="radio" name="symptom-3" value="1">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-levels radio-two" id="radio-two-symp-3">
                        <input type="radio" name="symptom-3" value="2">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-levels radio-three" id="radio-three-symp-3">
                        <input type="radio" name="symptom-3" value="3">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-levels radio-four" id="radio-four-symp-3">
                        <input type="radio" name="symptom-2" value="4">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </form>
            <div class="numbers">
                <p class="one-five num-symp-0">0 </p>
                <p class="one-five num-symp-1">1 </p>
                <p class="one-five num-symp-2">2</p>
                <p class="one-five num-symp-3">3 </p>
                <p class="one-five num-symp-4">4 </p>
            </div>

            <div class="card card-info-levels">
                <div class="card-header">
                    Levels descriptions
                </div>
                <div class="card-body levle-info" id="info-symp-one">
                    <ol start="0">
                        <li id="il-info-symp-three-0">None</li>
                        <li id="il-info-symp-three-1">More than 1 time</li>
                        <li id="il-info-symp-three-2">Between 2-4</li>
                        <li id="il-info-symp-three-3">Between 4-6</li>
                        <li id="il-info-symp-three-4">More than 7</li>
                    </ol>
                </div>
            </div>

            <button class="save-btn btn btn-default float-right " id="save-symp-three" type="submit">Submit </button>
        </section>

        </main>
    </div>
    <!---sidebar ---->

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('/css/patients-style/pages/symptom.css') }}"> {{-- JS --}}
    <script src="{{ asset('/js2/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('/js2/symptom.js') }}"></script>
    <script src="{{ asset('/js2/custom.js') }}"></script>

    <script>
        $(document).ready(function() {
            if ($(window).width() < 481) {
                $(".tab-content").css({
                    "width": "100%"
                });

                $(".symp-one").click(function() {
                    $(".section-symp-2,.section-symp-3,.tab-content").hide();
                    $(".section-symp-1").show();
                    $(".report-levels").css({
                        "width": "100%"
                    });

                });

                $('#save-symp-one').click(function() {
                    if (!$("input[name='symptom-1']:checked").val()) {} else {
                        $(".symp-three").css("background", "#d6f5d6");
                        $(".section-symp-1").hide();
                        $(".tab-content").show();
                        $(".tab-content").css({
                            "width": "100%"
                        });
                    }
                });

            }

        });
    </script>

    </body>

    @stop