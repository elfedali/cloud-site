@extends('admin.layouts.app')

@section('content')
    @include('admin.terms._top')

    <form action="{{ route('admin.terms.create') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name">
                {{ __('label.name') }}
            </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>
        {{-- hidden $term_type --}}
        <input type="hidden" name="taxonomy" value="{{ $term_type ?? 'kitchen' }}">

        <div class="mb-3">
            <button type="submit" class="btn btn-success">
                {{ __('label.create') }}
            </button>
        </div>
    </form>
@endsection
