@extends('layouts.auth')

@section('content')
    <h1 class="h4">{{ __('Reset Password') }}</h1>


    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email">{{ __('Email Address') }}</label>

            <div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-0">

            <button type="submit" class="btn btn-primary">
                {{ __('Send Password Reset Link') }}
            </button>

        </div>
    </form>
@endsection
