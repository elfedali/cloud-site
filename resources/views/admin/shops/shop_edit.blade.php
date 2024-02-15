@extends('admin.layouts.app')

@section('content')
    @include('admin.shops._nav')
    <h1>
        Edit Shop <u>{{ $shop->title }}</u>
    </h1>


    <form action="{{ route('admin.shops.edit', ['shop' => $shop->id]) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="title" class="form-label">
                {{ __('label.title') }}
            </label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $shop->title }}">
        </div>
        <!-- /.mb-3 -->
        {{-- description --}}
        <div class="mb-3">
            <label for="description" class="form-label">
                {{ __('label.description') }}
            </label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $shop->description }}</textarea>
        </div>
        {{-- excerpt --}}
        <div class="mb-3">
            <label for="excerpt" class="form-label">
                {{ __('label.excerpt') }}
            </label>
            <textarea class="form-control" id="excerpt" name="excerpt" rows="3">{{ $shop->excerpt }}</textarea>
        </div>
        {{-- status select --}}
        <div class="mb-3">
            <label for="status" class="form-label">
                {{ __('label.status') }}
            </label>
            <select class="form-select" id="status" name="status">
                <option value="draft" @if ($shop->status == 'draft') selected @endif>
                    {{ __('label.draft') }}
                </option>
                <option value="published" @if ($shop->status == 'published') selected @endif>
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
                <option value="open" @if ($shop->comment_status == 'open') selected @endif>
                    {{ __('label.open') }}
                </option>
                <option value="closed" @if ($shop->comment_status == 'closed') selected @endif>
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
                <option value="open" @if ($shop->ping_status == 'open') selected @endif>
                    {{ __('label.open') }}
                </option>
                <option value="closed" @if ($shop->ping_status == 'closed') selected @endif>
                    {{ __('label.closed') }}
                </option>
            </select>
        </div>


        <div class="mb-3">
            <label for="owner_id" class="form-label">
                {{ __('label.owner') }}
            </label>
            <select class="form-select" id="owner_id" name="owner_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @if ($user->id == $shop->owner_id) selected @endif>
                        {{ $user->id }} | {{ $user->name }} | {{ $user->email }}
                    </option>
                @endforeach
            </select>
        </div>
        <!-- /.mb-3 -->

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">
                {{ __('label.update') }}
            </button>
        </div>

    </form>
    <!-- /form -->
    {{-- delete  --}}
    <form action="{{ route('admin.shops.edit', ['shop' => $shop->id]) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure you want to delete this shop?')">
            {{ __('label.delete') }}
        </button>
    </form>
@endsection
