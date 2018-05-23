@extends ('layouts.portal') @section ('content')
<div class="page-wrapper">
    <div class="page-wrapper-container">
        
  <main class="p-4">
            <h1>Symptoms Report </h1>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#regular">Regular</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#treatment1">Treatment1</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!--Regular-->
                <div class="tab-pane active container" id="regular">
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

                    <!---page 1----->
                    <div class="list-group" id="page-one">
                        <button type="button" class="list-group-item list-group-item-action symp-one">
                            <div class="image">
                            <h5>Nausea</h5>
                            <img  class="symp-img"src="images/symptoms/nausea.png" alt="Nausea">
                            </div>
                            <p class="image-info">Nausea is a sensation of unease and discomfortin the upper stomach with an involuntary urge to vomit.</p>
                            <img  id="checked-symp-one" class="check-img" src="images/symptoms/check.png" alt="check">
                        </button>

                        <button type="button" class="list-group-item list-group-item-action symp-two">
                            <div class="image">
                            <h5>Diarrhea</h5>
                            <img  class="symp-img"src="images/symptoms/diarrhea.png" alt="Diarrhea">
                            </div>
                            <p class="image-info">Diarrhea, also spelled diarrhoea, is the condition of having at least three loose or liquid bowel movements each day.</p>
                          <img  id="checked-symp-two" class="check-img"src="images/symptoms/check.png" alt="check">
                        </button>

                        <button type="button" class="list-group-item list-group-item-action symp-three">
                            <div class="image">
                            <h5>Sleep disorder</h5>
                            <img  class="symp-img"src="images/symptoms/bed.png" alt="Sleep disorder">
                            </div>
                            <p class="image-info">A sleep disorder, or somnipathy, is a medical disorder of the sleep patterns of a person .</p>
                           <img  id="checked-symp-three" class="check-img"src="images/symptoms/check.png" alts="check">
                        </button>
                    </div>

                    
                    <div class="buttons">
                        <button type="button" class="btn btn-default float-right  t-20" id="next">Next</button>
                        <button type="button" class="btn btn-default float-right t-20" id="back">Back</button>
                    </div>
                </div>
                <!--Treatment------------------------------------------------->
            
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
            

        </main>
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
             // $(".symp_level").hide();
            //Here not come In js code
            if ($(window).width() < 481) 
            {
                $(".tab-content").css({
                    "width": "100%"
                });

                // $(".symp-one").click(function() {
                //     $(".section-symp-2,.section-symp-3,.tab-content").hide();
                //     $(".section-symp-1").show();
                //     $(".report-levels").css({
                //         "width": "100%"
                //     });

                // });

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

    @stop