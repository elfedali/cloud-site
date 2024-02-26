@extends('admin.layouts.app')

@section('content')
    @include('admin.shops._nav')
    <h1>

        <u>{{ $shop->title }}</u>

    </h1>

    @php

    @endphp
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.shops.phone', $shop) }}">
                @csrf
                @method('POST')

                <div class="form-group">
                    @foreach ($phones as $index => $phone)
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-md">
                                    <label for="phone{{ $index + 1 }}">Phone ({{ $index + 1 }})</label>
                                    <input type="text" class="form-control" id="phone{{ $index + 1 }}"
                                        name="phones[{{ $index }}][number]" value="{{ $phone['number'] ?? '' }}"
                                        placeholder="+212xxxxxxxxxx">
                                </div>
                                <div class="col-md">
                                    <label for="position{{ $index + 1 }}">Position ({{ $index + 1 }})</label>
                                    <input type="number" class="form-control" id="position{{ $index + 1 }}"
                                        name="phones[{{ $index }}][position]"
                                        value="{{ $phone['position'] ? $phone['position'] : $index + 1 }}">
                                </div>
                            </div>
                        </div>
                        <!-- /.mb -->
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">{{ __('label.save') }}</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
