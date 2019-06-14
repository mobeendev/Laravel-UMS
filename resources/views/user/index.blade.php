@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-10 border">



            @if(session()->get('success'))
            <br>
            <div class="alert alert-success alert-dismissible upper fade show" role="alert">
                <strong>Boom!</strong>
                {{ session()->get('success') }}  
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="my-3 p-3 bg-white rounded box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-0">Users List</h6>

                @foreach ($users as $user)
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_169d4446c5a%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_169d4446c5a%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.546875%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
                    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <strong class="text-gray-dark">{{ $user->first_name }} {{ $user->last_name }} - {{ $user->city }}</strong>





                            {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['users.destroy', $user->id]
                            ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                            {!! Form::close() !!}

                        </div>
                        
                         @foreach ($user->groups as $group) 
                            
                        <?php $groups[] = $group->name; ?>
                         
                         
                         @endforeach
                        
                        <span class="d-block"> {{ $user->gender }} |  Groups 
                            (
                                {{  !empty($groups) ?  implode(',',$groups) : 'No group assigned!' }}
                            )
                            <span class="text-right">
                                <a href="{{ url('addUserToGroup', $user->id) }}">Add to Group</a>
                            </span>

                            <?php $groups = []; ?>


                        </span>                  
                    </div>
                </div>
                @endforeach
                <ul class="pagination justify-content-center mb-4">
                    {{$users->links('vendor.pagination.bootstrap-4')}}
                </ul>

            </div>

        </div>
        <div class="col-2">

            <br>
            <a href="{{ url('users/create') }}" class="btn btn-info  btn-md" role="button">Add User</a>
            <br>
            
        </div>
    </div>

</div>



@endsection

