<div class="uk-card uk-card-default login_form">
    <form class="uk-form-stacked uk-padding" method="POST" action="{{ route('login') }}">
        <legend class="uk-legend">Sign in</legend>
        @csrf
        <div class="uk-margin">
            @error('email')
            <div class="invalid-feedback uk-margin color-danger" role="alert">
                <span>{{ $message }}</span>
            </div>
            @enderror
            <label class="uk-form-label" for="form-stacked-text">{{ __('E-Mail Address') }}</label>
            <div class="uk-form-controls uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: user"></span>
                <input id="email"
                       type="email"
                       class="uk-input @error('email') is-invalid @enderror uk-width-1-1" name="email"
                       value="{{ old('email') }}"
                       required
                       autocomplete="email"
                       autofocus>
            </div>
        </div>

        <div class="uk-margin uk-margin-bottom">
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label class="uk-form-label" for="form-stacked-text">{{ __('Password') }}</label>
            <div class="uk-form-controls uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                <input
                    id="password" type="password"
                    class="uk-input @error('password') is-invalid @enderror uk-width-1-1"
                    name="password"
                    required
                    autocomplete="current-password"
                >
            </div>
        </div>

        <div class="uk-margin">
            <button class="uk-button uk-button-default uk-width-1-1">Submit</button>
        </div>

    </form>
</div>
