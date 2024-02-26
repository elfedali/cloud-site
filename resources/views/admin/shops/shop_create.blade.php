@extends('admin.layouts.app')

@section('content')
    {{-- @include('admin.shops._nav') --}}
    <h1>
        {{ __('label.add_new_restaurant') }}
    </h1>

    <form action="{{ route('admin.shops.create') }}" method="post">
        @csrf

        @include('admin.shops._form')

    </form>
    <!-- /form -->
@endsection
