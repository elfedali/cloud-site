@extends('admin.layouts.app')

@section('content')
    @include('admin.users._top')


    <form action="{{ route('admin.users.edit', ['id' => $user->id]) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="name" class="form-label">
                {{ __('label.name') }}
            </label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>
        <!-- /.mb-3 -->

        <div class="mb-3">
            <label for="email" class="form-label">
                {{ __('label.email') }}
            </label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
        <!-- /.mb-3 -->

        <button type="submit" class="btn btn-primary">
            {{ __('label.update') }}
        </button>
    </form>
@endsection
