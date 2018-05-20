@extends ('layouts.portal')

@section ('content')


    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Generate reports</h1>

            <form name="myform" class="form-style" method="POST" action="#"
                      name="register-patient">
                    @csrf
                   <div class="form-group">
                        <label for="gender">Select report type:</label>
                        <select class="form-control" id="gender" name="gender" required="required">
                            <option>Female</option>
                            <option>Male</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="gender">Select report type:</label>
                        <select class="form-control" id="gender" name="gender" required="required">
                            <option>Female</option>
                            <option>Male</option>
                        </select>
                    </div>
                     <button type="submit" class="btn btn-primary bg-info">Submit</button>
            </form>

        </div>
    </div>
@stop
