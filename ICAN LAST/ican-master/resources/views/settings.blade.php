<!doctype html>
<html lang="en">
<head>
    <title>Settings on ICan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!---bootstrap ---->

    <!---google fonts ---->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<body>
<!---navbar ---->
<nav class="navbar navbar-expand navbar-dark bg-info">
    <a class="sidebar-toggle text-light mr-3"><i class="fa fa-bars"></i></a>
    <a  class="navbar-brand" href="dashboard.html"><img class="logo" src="images/logo.png" alt="ican logo"></a>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    <i class="fa fa-user" alt="username"></i> Username
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">settings</a>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="d-flex align-items-stretch">
    <!---sidebar ---->
    <div class="sidebar bg-dark">

        <ul class="list-unstyled">
            <li><a href="dashboard.html"><i class="fas fa-tachometer-alt fa-2x " alt="dashboard"></i> Dashboard</a></li>

            <li><a href="symptom.html"><i class="fas fa-heartbeat fa-2x" alt="symptom"></i> Self report</a></li>

            <li><a href="medication.html"><i class="fas fa-pills fa-2x" alt="medications"></i> Medications</a></li>

            <li><a href="new-appointment.html"><i class="fas fa-calendar-check fa-2x" alt="appointment"></i> Appointment</a></li>


            <li><a href="settings.html"><i class="fas fa-cog fa-2x" alt="settings"></i> Settings</a></li>
        </ul>
    </div>
    <main class="p-4">
        <h1>Settings </h1>
        <!-- Tabs -->
        <section id="tabs">
            <div class="container">
                <div class="row">
                    <div >
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link show active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Profile</a>
                                <a class="nav-item nav-link" id="nav-notifications-tab" data-toggle="tab" href="#nav-notifications" role="tab" aria-controls="nav-notifications" aria-selected="false">Notifications</a>
                                <a class="nav-item nav-link" id="nav-legal-tab" data-toggle="tab" href="#nav-legal" role="tab" aria-controls="nav-legal" aria-selected="false">Legal</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"   >
                                <div class=" col-md-9 col-lg-9 ">
                                    <table class="table table-user-information">
                                        <tbody>
                                        <tr>
                                            <td>First Name:</td>
                                            <td>Programming</td>
                                        </tr>
                                        <tr>
                                            <td>Last Name:</td>
                                            <td>06/23/2013</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>01/24/1988</td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>Female</td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td><button href="ChangePassword.html" type="button" class="btn btn-primary">Change password</button></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><a href="mailto:info@support.com">info@support.com</a></td>
                                        </tr>
                                        <td>Phone Number</td>
                                        <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                                        </td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-notifications" role="tabpanel" aria-labelledby="nav-notifications-tab"  >
                                <div class=" col-md-9 col-lg-9 ">
                                    <table class="table table-user-information">
                                        <tbody>
                                        <tr>
                                            <td>Email:</td>
                                            <td>
                                                <form>
                                                    <i class="fas fa-envelope fa-2x"></i><br>
                                                    <input type="radio" name="gender" value="male"> Get an email each time there is an update from the system.
                                                    <br>
                                                    <input type="radio" name="gender" value="female">Off<br>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>SMS:</td>
                                            <td>
                                                <form>
                                                    <i class="fas fa-mobile-alt fa-2x"></i><br>
                                                    <input type="radio" name="gender" value="male"> Get a SMS each time there is an update from the system.
                                                    <br>
                                                    <input type="radio" name="gender" value="female">Off<br>
                                                </form>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-legal" role="tabpanel" aria-labelledby="nav-legal-tab"  >
                                <div class=" col-md-9 col-lg-9 ">
                                    <table class="table table-user-information">
                                        <tbody>
                                        <tr>
                                            <td>Terms of Use:</td>
                                            <td><a href="#">link2</a></td>
                                        </tr>
                                        <tr>
                                            <td>Privacy desclaimer:</td>
                                            <td><a href="#">link2</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- ./Tabs -->
    </main>
</div>
<footer>
    <div class="footer-content">
        © 2018 Ican
    </div>
</footer>
<!---scripts---->

</body>
</html>