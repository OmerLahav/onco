<!doctype html>
<html lang="en">
<head>
    <title>Ican</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!---bootstrap ---->
    <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/fontawesome/css/fontawesome-all.min.css') }}">

    <!---css ---->
    <link rel="stylesheet" href="{{ asset('styles/bootstrap4.4.3.css') }}">
    <!--<link rel="stylesheet" href="{{ asset('styles/pages/frame.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/pages/dashboard.css') }}">-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/frame.css') }} ">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }} ">

    <!---google fonts ---->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>

<body>
    <!---navbar ---->
    <nav class="navbar navbar-expand navbar-dark bg-info">
        <a class="sidebar-toggle text-light mr-3"><i class="fa fa-bars" ></i></a>
        <a class="navbar-brand" href="dashboard.html"><img class="logo" src="{{ asset('images/logo.png') }}" alt="ican logo" ></a>
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                  <i class="fa fa-user" alt="username"></i> {{Auth::user()->name}} </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!---sidebar---->
    <div class="d-flex align-items-stretch">
        <div class="sidebar bg-dark">
            @if (Auth::user()->isDoctor())
                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt fa-2x " alt="dashboard"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('symptoms.index') }}">
                            <i class="fas fa-heartbeat fa-2x" alt="symptom"></i> Symptoms
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('treatments.index') }}">
                            <i class="fas fa-stethoscope fa-2x" alt="symptom"></i> Treatments
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('medications.index') }}">
                            <i class="fas fa-pills fa-2x" alt="medications"></i> Medications
                        </a>
                    </li>
                    <li>
                            <a href="{{ route('patients.index') }}">
                            <i class="fas fa-user  fa-2x" alt="patients"></i> Patients
                        </a>
                    </li>
                    <li>
                        <a href="new-appointment.html">
                            <i class="fas fa-calendar-check fa-2x" alt="appointment"></i> Appointment
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('team.index') }}">
                            <i class="fas fa-user-md fa-2x" alt="team"></i> Medical stuff
                        </a>
                    </li>
                    <li>
                        <a href="settings.html">
                            <i class="fas fa-cog fa-2x" alt="settings"></i> Settings
                        </a>
                    </li>
                </ul>
            @else
                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt fa-2x " alt="dashboard"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('medications.index') }}">
                            <i class="fas fa-heartbeat fa-2x" alt="medications"></i> Self Report
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('medications.index') }}">
                            <i class="fas fa-pills fa-2x" alt="medications"></i> Medications
                        </a>
                    </li>
                    <li>
                        <a href="new-appointment.html">
                            <i class="fas fa-calendar-check fa-2x" alt="appointment"></i> Appointment
                        </a>
                    </li>
                    <li>
                        <a href="settings.html">
                            <i class="fas fa-cog fa-2x" alt="settings"></i> Settings
                        </a>
                    </li>
                </ul>
            @endif
        </div>

        <!---content---->
        <main class="p-4">
            @yield ('content')
        </main>
    </div>
    <!---sidebar ---->
    <footer>
        <div class="footer-content">© 2018 Ican</div>
    </footer>

    <!---scripts---->
    <script src="{{ asset('js2/jquery.min.js') }}"></script>
    <script src="{{ asset('js2/popper.min.js') }}"></script>
    <script src="{{ asset('js2/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js2/jsframe.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.sidebar-toggle').on('click', function() {
                if ($(window).width() > 479 && $(window).width() < 769) {
                    if ($(".toggled").is(":visible")) {
                        $(".servive-block").css({
                            "height": "280px",
                            "margin-bottom": "12px"
                        });
                    } else {
                        $(".servive-block").css({
                            "height": "250px",
                            "margin-bottom": "250px",
                        });
                    }
                }
            });
        });
    </script>

</body>
</html>
