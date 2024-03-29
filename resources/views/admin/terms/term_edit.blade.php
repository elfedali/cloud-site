@extends('admin.layouts.app')

@section('content')
    <h1>
        {{ __('label.edit_term') }}
        <u>{{ $term->name }}</u>
    </h1>

    <form action="{{ route('admin.terms.edit', [
        'id' => $term->id,
    ]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">
                {{ __('label.name') }}
            </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $term->name }}">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">
                {{ __('label.update') }}
            </button>
        </div>
    </form>
    {{-- delete  with message --}}
    <form action="{{ route('admin.terms.edit', [
        'id' => $term->id,
    ]) }}" method="post">
        @csrf
        @method('DELETE')
        <div class="mb-3">
            <button type="submit" class="btn btn-link text-danger p-0 m-0"
                style="padding: 0; margin: 0;
                onclick="return confirm('Are you sure you want to delete this
                term?')">{{ __('label.delete') }}</button>
        </div>
    </form>
@endsection
