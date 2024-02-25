@extends('admin.layouts.app')

@section('content')
    @include('admin.users._top')


    <form action="{{ route('admin.users.edit', ['id' => $user->id]) }}" method="post">
        @csrf
        @method('put')

        @include('admin.users._form')

        <button type="submit" class="btn btn-primary">
            {{ __('label.update') }}
        </button>
    </form>
@endsection
