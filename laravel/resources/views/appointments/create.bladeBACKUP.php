@extends ('layouts.portal')
@section ('content')
<div class="page-wrapper">
   <div class="page-wrapper-container">
      <h1 class="mobile"> Appointment </h1>
      <input type="hidden" name="ajax_slot_fetch_url" id="ajax_slot_fetch_url" value="{{ route('appointments.slots') }}">
      <form class="form cf" method="POST" action="{{ route('appointments.create') }}">
         <div class="wizard">
            <div class="wizard-inner">
               <div class="connecting-line"></div>
               <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="nav-item">
                     <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Choose care provider" class="nav-link active">
                     <span class="round-tab">
                     <i class="fa fa-user"></i>
                     </span>
                     </a>
                  </li>
                  <li role="presentation" class="nav-item">
                     <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Choose date" class="nav-link disabled">
                     <span class="round-tab">
                     <i class="fa fa-calendar"></i>
                     </span>
                     </a>
                  </li>
                  <li role="presentation" class="nav-item">
                     <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Choose time" class="nav-link disabled">
                     <span class="round-tab">
                     <i class="fa fa-clock"></i>
                     </span>
                     </a>
                  </li>
                  <li role="presentation" class="nav-item">
                     <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab" title="Complete" class="nav-link disabled">
                     <span class="round-tab">
                     <i class="fa fa-check"></i>
                     </span>
                     </a>
                  </li>
               </ul>
            </div>
            <div class="tab-content">
               <div class="tab-pane active text-center" role="tabpanel" id="step1">
                  <div class="steps">
                     <ol>
                        <li >
                           In this stage you will make a request for an appointment.
                        </li>
                        <li>
                           Please select your health care provider.
                        </li>
                     </ol>
                  </div>
                  <div class="text-md-center card box-wizard ">
                     <div class="card-head">
                        <h4> Care provider</h4>
                     </div>
                     <div class="card-body">

                        @if(isset($doctor))
                        <div class="frb frb-primary">
                           <input type="radio" id="radio-button-1" name="medical_staff_type" value="Doctor">
                           <label for="radio-button-1">
                           <span class="frb-title">{{$doctor['first_name']}} {{$doctor['last_name']}}</span>
                           <span class="frb-description"><img class="doc-icon" src="images/doctor.png" ></span>
                           </label>
                        </div>
                        <input type="hidden" name='doctor_id' value="{{$doctor['id']}}">
                        @endif                  
                        <div class="frb frb-primary">
                           <input type="radio" id="radio-button-2" name="medical_staff_type" value="Nurse">
                           <label for="radio-button-2">
                           <span class="frb-title">Nurse</span>
                           <span class="frb-description"> <img class="doc-icon" src="images/nurse.png"></span>
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="navigation-btn">
                     <button type="button" class="btn btn-default prev-step prev-button">Back</button>
                     <button type="button" class="btn btn-default next-step next-button">Next </button>
                  </div>
               </div>
               <div class="tab-pane" role="tabpanel" id="step2">
                  <div class="steps">
                     <ol>
                        <li>
                           Please sellect your appointment date.
                        </li>
                     </ol>
                  </div>
                <div id="v-cal">
            <div class="vcal-header">
                <button class="vcal-btn" data-calendar-toggle="previous">
                    <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
                    </svg>
                </button>

                <div class="vcal-header__label" data-calendar-label="month">
                    March 2017
                </div>


                <button class="vcal-btn" data-calendar-toggle="next">
                    <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                    </svg>
                </button>
            </div>
            <div class="vcal-week">
                <span>Mon</span>
                <span>Tue</span>
                <span>Wed</span>
                <span>Thu</span>
                <span>Fri</span>
                <span>Sat</span>
                <span>Sun</span>
            </div>
            <div class="vcal-body" data-calendar-area="month"></div>
        </div>

        <input type="hidden" name='appointment_date' id="appointment_date">
                  <div class="navigation-btn">
                     <button type="button" class="btn btn-default prev-step prev-button">Back</button>
                     <button type="button" class="btn btn-default next-step next-button">Next </button>
                  </div>
               </div>
               <div class="tab-pane" role="tabpanel" id="step3">
                  <div class="steps">
                     <ol>
                        <li>
                           Please select your appointment time.
                        </li>
                     </ol>
                  </div>
                  <div class="text-md-center card box-wizard ">
                     <div class="card-head">
                        <h4> Time select</h4>
                     </div>
                     <div class="card-body" id='generated_slots'>
                        <div class="time-select">
                           <a href="#" class="btn btn-primary">10:00</a>
                           <a href="#" class="btn btn-primary">11:00</a>
						   <a href="#" class="btn btn-primary">12:00</a>

                        </div>
                        <div class="time-select">
                           <a href="#" class="btn btn-primary">13:00</a>
                           <a href="#" class="btn btn-primary">14:00</a>
						   <a href="#" class="btn btn-primary">15:00</a>

                        </div>
                        <div class="time-select">
                           <a href="#" class="btn btn-primary">16:00</a>
                           <a href="#" class="btn btn-primary">17:00</a>
						   <a href="#" class="btn btn-primary">10:00</a>

                        </div>
                        
                     </div>
                  </div>
                  <div class="navigation-btn">
                     <button type="button" class="btn btn-default prev-step prev-button">Back</button>
                     <button type="button" class="btn btn-default next-step next-button">Next </button>
                  </div>
               </div>
               <div class="tab-pane" role="tabpanel" id="step4">
                  <h1 class="text-md-center">Step 4</h1>
                  <ul class="list-inline text-md-center">
                     <button type="button" class="btn btn-lg btn-common next-step next-button">Next </button>
                  </ul>
               </div>
               <div class="tab-pane" role="tabpanel" id="step5">
                  <h2 class="text-md-center">Your appointment has been scheduled</h2>
                  <p>If you have any questions regarding your upcoming appointment, please feel free to reach out. Our representatives are here to answer any of your inquiries. We are here to help and look forward to hearing from you! Thank you and have a wonderful day!</p>
                  <img class="scheduled" src="images/time.png" alt="scheduled">
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
      </form>
   </div>
</div>
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/new-appointment.css') }} ">
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/calendar.css') }} ">
<script src="{{ asset('js2/jquery.min.js') }}"></script>
<script src="{{ asset('js2/popper.min.js') }}"></script>
<script src="{{ asset('js2/bootstrap.min.js') }}"></script>
<script src=" {{ asset('js2/calendar.js') }}"></script>
<script src=" {{ asset('js2/new-appointment.js') }}"></script>
@stop