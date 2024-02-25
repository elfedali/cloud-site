@extends('layouts.auth')
@section('auth_header')
    {{-- app name --}}
    <div class="mb-5">
        <div>
            <a href="{{ url('/') }}" class="text-dark">
                <u>{{ config('app.name') }}</u>
            </a>
        </div>
        <h1 class="h4">{{ __('label.welcome') }}</h1>
        <div>
            <h2 class="h6">{{ __('label.fill_in_your_details') }}</h2>
        </div>
    </div>
@endsection
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email">{{ __('label.email_address') }}</label>

            <div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <label class="mb-0" for="password">{{ __('label.password') }}</label>
                @if (Route::has('password.request'))
                    <a class="btn btn-link text-danger m-0 p-0" href="{{ route('password.request') }}">
                        {{ __('label.forgot_password') }}
                    </a>
                @endif
            </div>
            <!-- /.d-flex -->

            <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('label.remember_me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <div>
                <button type="submit" class="btn btn-primary">
                    {{ __('label.login') }}
                </button>
            </div>
        </div>
        {{-- dont-have-account --}}
        <div class="mb-0">
            <div>
                <a href="{{ route('register') }}">
                    {{ __('label.dont_have_account') }}
                </a>
            </div>
        </div>

    </form>
@endsection
