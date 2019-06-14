@extends('layouts.admin')

@section('content')
<div class="container">
    <form method="post" action="{{ url('addUserToGroup') }}"> 
        <div class="row">
            <div class="col-10 border uper">
                <div class="card">
                    <h5 class="card-header">Group Details</h5>
                    @if(session()->get('success'))
                    <br>
                    <div class="alert alert-success alert-dismissible upper fade show" role="alert">
                        <strong>Success!</strong>
                        {{ session()->get('success') }}  
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col">
            <img src="{{asset('img/group_icon_2-1.png')}}" width="150px" height="150px" />
        </div>
        <div class="col company-details">
            <h2 class="name">

                {{$group->name}} 
            </h2>

            <div> Group Name :{{$group->name}} </div>
            <div> Total User :{{$group->users->count()}} </div>
        </div>
    </div>

    <div class="row">

        <div class="col-10 border uper">
            <h4 class="text-center"><strong>Users List</strong></h4>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>First Name</th>
                            <th>Last Name</th>

                            <th class="right">Gender</th>
                            <th class="center">City</th>
                            <th class="center">Remove from Group</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($group->users as $user)
                        <tr>
                            <td class="center">1</td>
                            <td class="left strong">{{$user->first_name}}</td>
                            <td class="left strong">{{$user->last_name}}</td>
                            <td class="left strong">{{$user->gender}}</td>
                            <td class="left strong">{{$user->city}}</td>
                            <td class="center">
                                <a href="{{ url('groups/remove_user', [$user->id,$group->id]) }}">(X) Remove</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>



</div>
@endsection

