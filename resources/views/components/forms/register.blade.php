
<div class="uk-card uk-card-default register_form">

    <form class="uk-form-stacked  uk-padding" method="POST" action="{{ route('register') }}">
        <legend class="uk-legend">Sign up</legend>
        @csrf
        <div class="uk-margin">

            @error('name')
            <span class="invalid-feedback color-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            @error('password')
            <span class="invalid-feedback color-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label class="uk-form-label" for="form-stacked-text">{{ __('Name') }}</label>
            <div class="uk-form-controls uk-inline">
                <span class="uk-form-icon" uk-icon="icon: user"></span>
                <input id="name"
                       type="text"
                       class="uk-input @error('name') is-invalid @enderror" name="name"
                       value="{{ old('name') }}"
                       required
                       autocomplete="name"
                       autofocus>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">{{ __('E-Mail Address') }}</label>
            <div class="uk-form-controls uk-inline">
                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                <input id="email"
                       type="email"
                       class="uk-input @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}"
                       required
                       autocomplete="email"
                       autofocus>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">{{ __('Password') }}</label>
            <div class="uk-form-controls uk-inline">
                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                <input id="password"
                       type="password"
                       class="uk-input @error('password') is-invalid @enderror" name="password"
                       value="{{ old('password') }}"
                       required
                       autocomplete="password"
                       autofocus>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">{{ __('Confirm Password') }}</label>
            <div class="uk-form-controls uk-inline">
                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                <input id="password"
                       type="password"
                       class="uk-input @error('password') is-invalid @enderror"
                       name="password_confirmation"
                       value="{{ old('password') }}"
                       required
                       autocomplete="new-password"
                       autofocus>
            </div>
        </div>

        <div class="uk-margin">
            <button class="uk-button uk-button-default uk-width-1-1">Submit</button>
        </div>
    </form>
</div>
