@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Add staff member</h1>
            <div class="steps">
                <ol class="direction">
                    <li>
                        Please add a staff member.
                    </li>
                    <li>
                        Select the right role.
                    </li>
                </ol>
            </div>
            <div class="container">
                <form name="myform" class="form-style" method="POST" action="{{ route('team.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="role">Role:</label>
                        @if(Auth::user()->isDoctor())
                            <select class="form-control" id="role" name="role">
                                <option value="1">Doctor</option>
                                <option value="2">Nurse</option>
                                <option value="5">Admin</option>
                            </select>
                        @elseif(Auth::user()->isAdmin())
                            <select class="form-control" id="role" name="role">
                                <option value="1">Doctor</option>
                                <option value="2">Nurse</option>
                            </select>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="identification_number">Identification Number:</label>
                        <input type="text" class="form-control" id="identification_number"
                               placeholder="Enter identification number" name="identification_number" required="required">
                    </div>

                    <div class="form-group">
                        <label for="first_name">First name:</label>
                        <input type="text" class="form-control" id="first_name" placeholder="Enter First name"
                               name="first_name" required="required">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last name:</label>
                        <input type="text" class="form-control" id="last_name" placeholder="Enter Last name"
                               name="last_name" required="required">
                    </div>
                    
                    <div class="form-group">
                        <label for="birth_date">Birth Date:</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" required="required">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="required">
                    </div>

                   <div class="form-group">
                        <label for="password">Password:</label>
                        <input id="pass" name="password" type="text" size="40" minlength="4" required="required">
                        <input type="button" class="button" value="Generate" onClick="generate();" tabindex="2">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone number:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone number" required="required"
                               size="20" minlength="9" maxlength="14">
                    </div>

                    <button type="submit" class="btn btn-primary bg-info">Submit</button>
                </form>
            </div>
        </div>
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
            myform.password.value = randomPassword(8);

        }
    </script>
@stop
