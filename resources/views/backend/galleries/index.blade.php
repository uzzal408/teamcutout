@extends('backend.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        <p>{{ $pageSubTitle }}</p>
    </div>
</div>
@include('backend.partials.flash')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="tile">
            <h3 class="tile-title">{{ $pageSubTitle }}</h3>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($images as $image)
            <div class="col-md-2"><img src="{{ asset('storage/'.$image['image']) }}" alt="..." class="img-thumbnail"></div>
            @endforeach
        </div>
    </div>
</div>
@endsection
