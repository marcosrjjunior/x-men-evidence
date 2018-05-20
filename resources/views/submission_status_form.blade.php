<div class="card">
    <div class="card-header">Check your submission</div>

    <div class="card-body">
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif

        <p>Tell us about yourself</p>

        <form method="GET" action="{{ route('submission.check') }}" enctype="multipart/form-data">

            <div class="form-group row">
                <label for="email_check" class="col-md-4 col-form-label text-md-right">{{ __('submissions.email') }}*</label>

                <div class="col-md-6">
                    <input id="email_check" type="email" class="form-control{{ $errors->has('email_check') ? ' is-invalid' : '' }}" name="email_check" value="{{ old('email_check') }}" {{ $errors->has('email_check') ? 'autofocus' : '' }}>

                    @if ($errors->has('email_check'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email_check') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-dark">
                        {{ __('submissions.check_button') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>