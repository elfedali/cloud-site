@extends('admin.layouts.app')

@section('content')
    @include('admin.shops._nav')
    <h1>
        <u>{{ $shop->title }}</u>
    </h1>


    <form method="post" action="{{ route('admin.shops.images', ['shop' => $shop]) }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="image">
                {{ __('label.image') }}
            </label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                required>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <button type="submit" class="btn btn-primary">
                {{ __('button.upload') }}
            </button>
        </div>
    </form>

    <div class="row">
        @foreach ($shop->getMedia('images') as $image)
            <div class="col-lg-3 col-6 mb-4">
                <img src="{{ $image->getUrl() }}" class="img-thumbnail">
                <form method="post"
                    action="{{ route('admin.shops.images.destroy', ['shop' => $shop, 'image' => $image]) }}">
                    @csrf
                    @method('DELETE')
                    <div class="text-center">
                        <button type="submit" class="btn btn-link text-danger p-0 m-0"
                            onclick="return confirm('{{ __('label.are_you_sure') }}')">
                            {{ __('button.delete') }}
                        </button>
                    </div>
                </form>
            </div>
        @endforeach
    @endsection
