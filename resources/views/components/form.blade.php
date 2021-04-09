<form method="POST" action="{{ route('sign') }}">
    @csrf
    <div class="form-register">
        <div class="d-flex flex-wrap">
            <div class="col-sm-12 col-md-6 input-form">
                <label for="firstName">@lang('form.first_name')</label>
                <input type="text" name="first_name" id="firstName" placeholder="Jane"
                       class="form-control @error('first_name')is-invalid @enderror">
                @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-12 col-md-6 input-form">
                <label for="lastName">@lang('form.last_name')</label>
                <input type="text" name="last_name" id="lastName" placeholder="Doe"
                       class="form-control @error('last_name')is-invalid @enderror">
                @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-12 input-form mt-5">
                <label for="email">@lang('form.email')</label>
                <input type="email" name="email" id="email" placeholder="jeanne.doe@ecolo.gy"
                       class="form-control @error('email')is-invalid @enderror">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-12 form-group">
                <div class="register-checkbox form-check">
                    <input type="checkbox" id="register-checkbox" name="register"
                           class="form-check-input @error('register')is-invalid @enderror">
                    <label class="form-check-label" for="register-checkbox">@lang('form.accept')</label>
                    @error('register')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="button-register">
            <button class="btn btn-sign my-2 my-sm-0 nav-link" type="submit">@lang('form.submit')</button>
        </div>
    </div>
</form>
