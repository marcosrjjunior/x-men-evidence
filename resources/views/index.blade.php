@extends('layouts.main')

@section('content')
<div class="container">
    @include('partials.header')

    <div class="row">
        <div class="col-md-7">
            @include('submission_form')
        </div>

        <div class="col-md-5">
            @include('submission_status_form')
        </div>
    </div>
</div>
@endsection
