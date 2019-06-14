@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-10 border uper">
            <form method="post" action="{{ route('users.store') }}">  <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputFname">First Name</label>
                        <input type="text" required class="form-control" id="first_name" name="first_name"  placeholder="First Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputLname">Last Name</label>
                        <input type="text" required class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" required class="form-control" id="city" name="city">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Gender</label>
                        <select id="inputState"  required name="gender" class="form-control">
                            <option value="">--Select Here--</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>

            </form>
            <br>
        </div>

        <div class="col-2">
            <br>
            <a href="{{ url('/users') }}" class="btn btn-info  btn-md" role="button">Back</a>
            <br>

        </div>
    </div>

</div>



@endsection

