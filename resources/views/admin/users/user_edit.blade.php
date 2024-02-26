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

    <form action="{{ route('admin.users.edit', ['id' => $user->id]) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-link text-danger p-0 m-0"
            onclick="return confirm('Are you sure you want to delete this user?')">
            {{ __('label.delete') }}
        </button>
    </form>
@endsection
