@extends('layouts.mainlayout')

@section('content')

      <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-12">

        <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
        </h1>

        @if($article)
        <!-- Blog Post -->
        <div class="card mb-4">
            <img class="card-img-top" src="{{$article->image_url}}" alt="Card image cap">

            <div class="card-body">
                <h2 class="card-title">{{$article->title}}</h2>
                <p class="card-text">{{$article->description}}</p>
            </div>

            <a href="{{ url()->previous() }}"class="btn btn-primary btn-lg active" role="button" aria-pressed="true">  &larr; Back</a>
        </div>
        @endif

    </div>
    @endsection






    <b></b>