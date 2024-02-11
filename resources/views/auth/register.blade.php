@extends('layouts.auth')

@section('content')
    <h1 class="h4">{{ __('label.register') }}</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="name">{{ __('label.fullName') }}</label>
            <div>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="email">{{ __('label.email_address') }}</label>

            <div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="password">{{ __('label.password') }}</label>

            <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="password-confirm">{{ __('label.confirm_password') }}</label>

            <div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="mb-0">
            <div>
                <button type="submit" class="btn btn-primary">
                    {{ __('label.register') }}
                </button>
            </div>
        </div>
    </form>
@endsection
