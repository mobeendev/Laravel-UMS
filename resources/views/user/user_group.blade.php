@extends('layouts.admin')

@section('content')
<div class="container">
    <form method="post" action="{{ url('addUserToGroup') }}"> 


        <div class="row">
            <div class="col-10 border uper">

                <div class="card">
                    <h5 class="card-header">Add User to Group</h5>

                    @if (Session::has('error'))
                    <br>
                    <div class="alert alert-danger  alert-dismissible upper fade show" role="alert">
                        <strong>Warning!</strong>
                        {{ session()->get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="row p-5">





                        <div class="col-md-6">




                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong class="text-gray-dark">
                                                First Name
                                            </strong>
                                        </td>
                                        <td>{{$user->first_name}}</td>
                                        <td>
                                            <strong class="text-gray-dark">
                                                Last Name
                                            </strong>
                                        </td>
                                        <td>{{$user->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>{{$user->city}}</td>
                                        <td>Gender</td>
                                        <td>{{$user->gender}}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group upper">

                                <label for="inputFname">Group Name</label>
                                <select id="inputState"  required name="group_id" class="form-control">
                                    <option value="">--Select Here--</option>
                                    @foreach($groups as $group)

                                    <option value="{{ $group->id }}">
                                        {{ $group->name }}
                                    </option>

                                    @endforeach
                                </select>

                            </div>
                            <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">              
                            <button type="submit" class="btn btn-primary float-right">Add</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

</div>
@endsection

