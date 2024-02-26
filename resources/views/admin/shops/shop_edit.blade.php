@extends('admin.layouts.app')

@section('content')
    @include('admin.shops._nav')
    <h1>
        <u>{{ $shop->title }}</u>
    </h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.shops.edit', ['shop' => $shop->id]) }}" method="post">
                @csrf
                @method('put')

                @include('admin.shops._form')

            </form>
            <!-- /form -->

            {{-- delete  --}}
            <form action="{{ route('admin.shops.edit', ['shop' => $shop->id]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-link text-danger p-0 m-0"
                    onclick="return confirm('Are you sure you want to delete this shop?')">
                    {{ __('label.delete') }}
                </button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
