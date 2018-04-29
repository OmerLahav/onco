@extends ('layouts.portal')

@section ('content')
    <h1>Add staff member</h1>

    <div class="container">
        <form method="POST" action="{{ route('team.store') }}">
            @csrf
            <div class="form-group">
                <label for="role">Role:</label>
                <select class="form-control" id="role" name="role">
                    <option value="1">Doctor</option>
                    <option value="2">Nurse</option>
                </select>
            </div>

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
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password:</label><br>
                <input type="password" class="form-control d-inline" id="password" placeholder="Enter password" name="password" >
                {{-- <input type="buttonbtn btn-success" class="generate d-inline btn btn-success" value="Generate" onClick="generate();" tabindex="2"> --}}
            </div>

            <div class="form-group">
                <label for="phone">Phone number:</label>
                <input type="tel" class="form-control"  id="phone" name="phone"  placeholder="Enter Phone number" size="20" minlength="9" maxlength="14">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@stop