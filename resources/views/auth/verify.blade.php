@extends('layouts.autn')

@section('content')
    <h1 class="h4">{{ __('label.verify_your_email_address') }}</h1>
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('label.a_fresh_verification_link_has_been_sent_to_your_email_address') }}
        </div>
    @endif

    {{ __('label.before_proceeding_please_check_your_email_for_a_verification_link') }}
    {{ __('label.if_you_did_not_receive_the_email') }},

    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit"
            class="btn btn-link p-0 m-0 align-baseline">{{ __('label.click_here_to_request_another') }}</button>.
    </form>
@endsection
