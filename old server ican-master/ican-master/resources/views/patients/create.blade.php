@extends ('layouts.portal')

@section ('content')
    <h1>Add patient</h1>

    <div class="container">
        <form  name="myform" class="form-style" method="POST" action="{{ route('patients.store') }}" name="register-patient">
            @csrf
            <div class="form-group">
                <label for="identification_number">Identification Number:</label>
                <input type="text" class="form-control" id="identification_number" placeholder="Enter identification number" name="identification_number">
            </div>

            <div class="form-group">
                <label for="first_name">First name:</label>
                <input type="text" class="form-control" id="first_name" placeholder="Enter First name" name="first_name">
            </div>

            <div class="form-group">
                <label for="last_name">Last name:</label>
                <input type="text" class="form-control" id="last_name" placeholder="Enter Last name" name="last_name">
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender">
                    <option>Female</option>
                    <option>Male</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>

            <div class="form-group">

                    <label for="last_name">Password:</label>

                    <input id="pass" name="row_password" type="text" size="40">&nbsp;
                    <input type="button" class="button" value="Generate" onClick="generate();" tabindex="2">

                {{-- <input type="buttonbtn btn-success" class="generate d-inline btn btn-success" value="Generate" onClick="generate();" tabindex="2"> --}}
            </div>

            <div class="form-group">
                <label for="phone">Phone number:</label>
                <input type="tel" class="form-control"  id="phone" name="phone"  placeholder="Enter Phone number" size="20" minlength="9" maxlength="14">
            </div>

            <div class="form-group">
                <label for="num">Cancer type:</label>
                <select name="type" class="form-control" id="type">
                    <option>Brain</option>
                    <option>Breast</option>
                    <option>Liver</option>
                </select>
                {{-- <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">HTML</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">JavaScript</a></li>
                    </ul>
                </div> --}}
            </div>

            <div class="form-group">
                <label for="is_active">Status:</label>
                <select name="is_active" class="form-control" id="is_active">
                    <option value="1">Sick</option>
                    <option value="0">Cured</option>
                </select>
            </div>

            <h4>Contact person</h4>

            <div class="form-group">
                <label for="contact_relation">Contact relation:</label>
                <select name="contact_relation" class="form-control" id="contact_relation">
                    <option>Spouse</option>
                    <option>Child</option>
                    <option>Sibling</option>
                    <option>Parent</option>
                    <option>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="contact_name">Contact name:</label>
                <input type="text" class="form-control" id="contact_name" placeholder="Enter First name" name="contact_name">
            </div>

            <div class="form-group">
                <label for="contact_phone">Phone number:</label>
                <input type="tel" class="form-control"  id="contact_phone" name="contact_phone"  placeholder="Enter Phone number" size="20" minlength="9" maxlength="14">
            </div>

            <div class="form-group">
                <label for="contact_email">Email:</label>
                <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Enter email" >
            </div>

            <button type="submit" class="btn btn-primary bg-info">Submit</button>
        </form>
    </div>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-form-big.css') }} ">
<script>

    function randomPassword(length) {
        var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
        var pass = "";
        for (var x = 0; x < length; x++) {
            var i = Math.floor(Math.random() * chars.length);
            pass += chars.charAt(i);

        }

        return pass;
    }

    function generate() {
        myform.row_password.value = randomPassword(8);

    }
</script>
@stop
