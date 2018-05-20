<div class="card">
    <div class="card-header">Join our team</div>

    <div class="card-body">
        @if (Session::has('status'))
            <div class="alert alert-success">{{ Session::get('status') }}</div>
        @endif
        
        <p>Tell us about yourself</p>

        <form method="POST" action="{{ route('submission') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('submissions.name') }}*</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" {{ $errors->has('name') ? 'autofocus' : '' }}>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('submissions.email') }}*</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="short_description" class="col-md-4 col-form-label text-md-right">{{ __('submissions.short_description') }}*<br><small class="text-muted">(Describe about your powers)</small></label>

                <div class="col-md-6">
                    <textarea class="form-control{{ $errors->has('short_description') ? ' is-invalid' : '' }}" name="short_description" value="{{ old('short_description') }}" rows="4" max="200"></textarea>

                    @if ($errors->has('short_description'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('short_description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="short_description" class="col-md-4 col-form-label text-md-right">{{ __('submissions.picture') }}</label>
                <div class="col-md-6">
                    <input type="file" name="picture" accept="image/*">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-dark">
                        {{ __('submissions.send_button') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>