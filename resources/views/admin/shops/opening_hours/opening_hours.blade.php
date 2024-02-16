@extends('admin.layouts.app')

@section('content')
    @include('admin.shops._nav')
    <h1>
        Edit shop <u>{{ $shop->title }}</u> opening_hours
    </h1>
@endsection
