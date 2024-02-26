@extends('admin.layouts.app')

@section('content')
    @include('admin.shops._nav')
    <h1>
        <u>{{ $shop->title }}</u>
    </h1>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.shops.seo.update', ['shop' => $shop]) }}">
                @csrf
                @method('PUT')
                @php
                    $seo = $shop->getSeo();
                @endphp
                <div class="mb-4">
                    <label for="meta_title" class="form-label">
                        {{ __('label.meta_title') }}
                    </label>
                    <input id="meta_title" type="text" class="form-control @error('meta_title') is-invalid @enderror"
                        name="meta_title" value="{{ old('meta_title', $seo->title) }}">
                    @error('meta_title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="meta_description" class="form-label">
                        {{ __('label.meta_description') }}
                    </label>
                    <textarea id="meta_description" class="form-control @error('meta_description') is-invalid @enderror"
                        name="meta_description">{{ old('meta_description', $seo->description) }}</textarea>
                    @error('meta_description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="meta_keywords" class="form-label">
                        {{ __('label.meta_keywords') }}
                    </label>
                    <input id="meta_keywords" type="text"
                        class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords"
                        value="{{ old('meta_keywords', $seo->keywords) }}">
                    @error('meta_keywords')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('button.save') }}
                    </button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
