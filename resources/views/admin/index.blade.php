@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="jumbotron mt-3">
        <h1>This is your Dashboard</h1>
        <p class="lead">This example is a quick exercise to illustrate how the bottom navbar works.</p>
        <a class="btn btn-lg btn-primary" href="#" role="button">Sample Button»</a>
    </div>
</div>



<div class="container">
    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Groups</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">{{$total_groups}} <small class="text-muted">Groups</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Create More</li>
                    <li>Add Users to Groups</li>
                </ul>
            </div>
        </div>
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Users</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">{{$total_users}} <small class="text-muted">Users</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Create More</li>
                    <li>Attach Users with Groups</li>
                </ul>

            </div>
        </div>

    </div>

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
            <div class="col-12 col-md">
                <img class="mb-2" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
                <small class="d-block mb-3 text-muted">© 2017-2019</small>
            </div>
            <div class="col-6 col-md">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Cool stuff</a></li>
                    <li><a class="text-muted" href="#">Random feature</a></li>
                    <li><a class="text-muted" href="#">Team feature</a></li>
                    <li><a class="text-muted" href="#">Stuff for developers</a></li>
                    <li><a class="text-muted" href="#">Another one</a></li>
                    <li><a class="text-muted" href="#">Last time</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Resource</a></li>
                    <li><a class="text-muted" href="#">Resource name</a></li>
                    <li><a class="text-muted" href="#">Another resource</a></li>
                    <li><a class="text-muted" href="#">Final resource</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Team</a></li>
                    <li><a class="text-muted" href="#">Locations</a></li>
                    <li><a class="text-muted" href="#">Privacy</a></li>
                    <li><a class="text-muted" href="#">Terms</a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>

@endsection


