@extends('layouts.main')

@section('content')
<div class="container">
    @include('partials.header')

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">Submission Details</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if(!$submission->picture)
                            <form method="POST" action="{{ route('submission.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $submission->id }}" />

                                <div class="form-group row">
                                    <label for="short_description" class="col-md-4 col-form-label text-md-right">{{ __('submissions.picture') }}</label>
                                    <div class="col-md-6">
                                        <input type="file" name="picture" accept="image/*" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-dark">
                                            {{ __('submissions.upload_picture') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @else
                                <img class="img-fluid rounded" src="{{ asset($submission->picture) }}" />
                            @endif
                        </div>

                        <div class="col-md-7 offset-md-1">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">
                                    Mutant
                                </label>

                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="name" value="{{ $submission->name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">
                                    E-mail
                                </label>
                                
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="email" value="{{ $submission->email }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="short_description" class="col-sm-3 col-form-label">
                                    Short Description
                                </label>
                                
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="short_description" value="{{ $submission->short_description }}">
                                </div>
                            </div>

                            <a href="/" class="btn btn-secondary float-right">
                                {{ __('submissions.go_back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
