@extends('admin.layouts.app')

@section('content')
    {{-- @include('admin.shops._nav') --}}
    <h1>
        Create New Shop
    </h1>

    <form action="{{ route('admin.shops.create') }}" method="post">
        @csrf

        <div class="row">
            <div class="col-lg-8">
                <div class="mb-3">
                    <label for="title" class="form-label">
                        {{ __('label.title') }}
                    </label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>
                <!-- /.mb-3 -->
                {{-- description --}}
                <div class="mb-3">
                    <label for="description" class="form-label">
                        {{ __('label.description') }}
                    </label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                </div>
                {{-- excerpt --}}
                <div class="mb-3">
                    <label for="excerpt" class="form-label">
                        {{ __('label.excerpt') }}
                    </label>
                    <textarea class="form-control" id="excerpt" name="excerpt" rows="3">{{ old('excerpt') }}</textarea>
                </div>
                {{-- status select --}}
                <div class="mb-3">
                    <label for="status" class="form-label">
                        {{ __('label.status') }}
                    </label>
                    <select class="form-select" id="status" name="status">
                        <option value="draft" selected>
                            {{ __('label.draft') }}
                        </option>
                        <option value="published">
                            {{ __('label.published') }}
                        </option>
                    </select>
                </div>
                <!-- /.mb-3 -->
                {{-- comment_status --}}
                <div class="mb-3">
                    <label for="comment_status" class="form-label">
                        {{ __('label.comment_status') }}
                    </label>
                    <select class="form-select" id="comment_status" name="comment_status">
                        <option value="open" selected>
                            {{ __('label.open') }}
                        </option>
                        <option value="closed">
                            {{ __('label.closed') }}
                        </option>
                    </select>
                </div>
                {{-- ping_status --}}
                <div class="mb-3">
                    <label for="ping_status" class="form-label">
                        {{ __('label.ping_status') }}
                    </label>
                    <select class="form-select" id="ping_status" name="ping_status">
                        <option value="open">
                            {{ __('label.open') }}
                        </option>
                        <option value="closed" selected>
                            {{ __('label.closed') }}
                        </option>
                    </select>
                </div>

            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="owner_id" class="form-label">
                        {{ __('label.owner') }}
                    </label>
                    <select class="form-select" id="owner_id" name="owner_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->id }} | {{ $user->name }} | {{ $user->email }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- /.mb-3 -->
                @include('admin.shops._terms')
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">
                {{ __('label.create') }}
            </button>
        </div>

    </form>
    <!-- /form -->
@endsection
