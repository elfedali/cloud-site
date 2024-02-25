@extends('admin.layouts.app')

@section('content')
    @include('admin.users._top')

    <form action="{{ route('admin.users.create') }}" method="post" autocomplete="off" role="form">
        @csrf
        @include('admin.users._form')

        <button type="submit" class="btn btn-primary">
            {{ __('label.create') }}
        </button>
    </form>
@endsection
