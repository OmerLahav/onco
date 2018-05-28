@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Edit patient</h1>
            <div class="steps">
                <ol class="direction">
                    <li>
                        Please enter the new patient details.
                    </li>
                </ol>
            </div>
            <div class="container">
                <form name="myform" class="form-style" method="POST" action="{{ route('patient.update',['id'=>$users->id]) }}"
                      name="register-patient">
                    @csrf
                    <div class="form-group">
                        <label for="identification_number">Identification Number:</label>
                        <input type="text" readonly value="{{$users->identification_number}}" class="form-control" id="identification_number" required="required"
                               placeholder="Enter identification number" name="identification_number">
                    </div>

                    <div class="form-group">
                        <label for="first_name">First name:</label>
                        <input type="text" class="form-control" value="{{$users->first_name}}" id="first_name" placeholder="Enter First name" 
                               required="required" name="first_name">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last name:</label>
                        <input type="text" class="form-control" value="{{$users->last_name}}" id="last_name" placeholder="Enter Last name"
                               name="last_name" required="required">
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender" required="required">
                            <option <?php if($users->patient_data->gender == 'Female'){ ?> selected <?php } ?>>Female</option>
                            <option <?php if($users->patient_data->gender == 'Male'){ ?> selected <?php } ?>>Male</option>
                        </select>
                    </div>
					
					<div class="form-group">
                        <label for="birth_date">Birth Date:</label>
                        <input type="date" readonly class="form-control" value="{{$users->birth_date}}" id="birth_date" name="birth_date" required="required">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" readonly value="{{$users->email}}" id="email" placeholder="Enter email" name="email" required="required">
                    </div>


                    <div class="form-group">
                        <label for="phone">Phone number:</label>
                        <input type="tel" class="form-control" value="{{$users->phone}}" id="phone" name="phone" placeholder="Enter Phone number" required="required"
                               size="20" minlength="9" maxlength="14">
                    </div>

                    <div class="form-group">
                        <label for="num">Cancer type:</label>
                        <select name="type" class="form-control" id="type" required="required">
                            <option  <?php if($users->patient_data->type == 'Brain'){ ?> selected <?php } ?>>Brain</option>
                            <option  <?php if($users->patient_data->type == 'Breast'){ ?> selected <?php } ?>>Breast</option>
                            <option  <?php if($users->patient_data->type == 'Liver'){ ?> selected <?php } ?>>Liver</option>
                        </select>
                        

                    </div>
                    <div class="form-group">
                        <label for="is_active">Status:</label>
                        <select name="is_active" class="form-control" id="is_active">
                            <option <?php if($users->patient_data->is_active == '1'){ ?> selected <?php } ?> value="1">Sick</option>
                            <option <?php if($users->patient_data->is_active == '0'){ ?> selected <?php } ?> value="0">Cured</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input id="pass" name="password" type="text" size="40">
                        <input type="button" class="button" value="Generate" onClick="generate();" tabindex="2">
                        {{-- <input type="buttonbtn btn-success" class="generate d-inline btn btn-success" value="Generate" onClick="generate();" tabindex="2"> --}}
                    </div>

                    <div class="form-group">
                        <label for="num">Patient Status:</label>
                        <select name="patient_status" class="form-control" id="patient_status" required="required">
                            <option value="Regular"  <?php if($users->patient_data->patient_status == 'Regular'){ ?> selected <?php } ?>>Regular</option>
                            <option value='Critical'  <?php if($users->patient_data->patient_status == 'Critical'){ ?> selected <?php } ?>>Critical</option>
                        </select>
                    </div>

                    <h4>Contact person</h4>

                    <div class="form-group">
                        <label for="contact_relation">Contact relation:</label>
                        <select name="contact_relation" class="form-control" id="contact_relation" required="required">
                            <option <?php if($users->patient_data->contact_relation == 'Spouse'){ ?> selected <?php } ?>>Spouse</option>
                            <option <?php if($users->patient_data->contact_relation == 'Child'){ ?> selected <?php } ?>>Child</option>
                            <option <?php if($users->patient_data->contact_relation == 'Sibling'){ ?> selected <?php } ?>>Sibling</option>
                            <option <?php if($users->patient_data->contact_relation == 'Parent'){ ?> selected <?php } ?>>Parent</option>
                            <option <?php if($users->patient_data->contact_relation == 'Other'){ ?> selected <?php } ?>>Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="contact_name">Contact name:</label>
                        <input type="text" class="form-control" value="{{$users->patient_data->contact_name}}" id="contact_name" placeholder="Enter First name" required="required"
                               name="contact_name">
                    </div>

                    <div class="form-group">
                        <label for="contact_phone">Phone number:</label>
                        <input type="tel" class="form-control" id="contact_phone" name="contact_phone" required="required"
                               placeholder="Enter Phone number" value="{{$users->patient_data->contact_phone}}" size="20" minlength="9" maxlength="14">
                    </div>

                    <div class="form-group">
                        <label for="contact_email">Email:</label>
                        <input type="email" class="form-control" value="{{$users->patient_data->contact_email}}" id="contact_email" name="contact_email" required="required"
                               placeholder="Enter email">
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
