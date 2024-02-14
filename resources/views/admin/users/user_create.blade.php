@extends('admin.layouts.app')

@section('content')
    @include('admin.users._top')

    <form action="{{ route('admin.users.create') }}" method="post" autocomplete="off" role="form">
        @csrf
        {{--  --}}
        <div id="message"></div>
        {{--  --}}
        <div class="mb-3">
            <label for="name" class="form-label">
                {{ __('label.name') }} <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <!-- /.mb-3 -->

        <div class="mb-3">
            <label for="email" class="form-label">
                {{ __('label.email') }} <span class="text-danger">*</span>
            </label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <!-- /.mb-3 -->

        <div class="mb-3">
            <label for="password" class="form-label">
                {{ __('label.password') }} <span class="text-danger">*</span>
            </label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <!-- /.mb-3 -->

        <div class="mb-3">
            <label for="confirm_password" class="form-label">
                {{ __('label.confirm_password') }} <span class="text-danger">*</span>
            </label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ __('label.create') }}
        </button>
    </form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#password, #confirm_password').on('keyup', function() {
                if ($('#password').val() == $('#confirm_password').val()) {
                    $('#message').html('Matching').css('color', 'green');
                } else
                    $('#message').html('Not Matching').css('color', 'red');
            });
        });
    </script>
@endsection
