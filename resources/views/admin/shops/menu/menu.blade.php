@extends('admin.layouts.app')

@section('content')
    @include('admin.shops._nav')
    <h1>
        Edit shop <u>{{ $shop->title }}</u> menu
    </h1>

    <form method="POST" action="{{ route('admin.shops.menu', $shop) }}">
        @csrf

        <div class="mb-3">
            <label for="title" class="col-form-label">
                {{ __('label.menu_name') }} <span class="text-danger">*</span>
            </label>
            <input id="title" class="form-control" name="title" required>
            {{-- help --}}
            <div id="titleHelp" class="form-text">
                {{ __('label.menu_help') }}
            </div>
        </div>

        {{-- submit --}}
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">
                {{ __('button.save') }}
            </button>
        </div>
    </form>


    {{-- all menus --}}
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>
                    {{ __('label.title') }}
                </th>
                <th>
                    {{ __('label.actions') }}
                </th>
            </tr>
        </thead>
        <tbody>



            @foreach ($menus as $menu)
                <tr>
                    <td style="width: 300px;">

                        <form
                            action="{{ route('admin.shops.menu.update', [
                                'shop' => $shop,
                                'menu' => $menu,
                            ]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="col-form-label">
                                    {{ __('label.title') }} <span class="text-danger">*</span>
                                </label>
                                <input id="title" class="form-control" name="title" value="{{ $menu->title }}"
                                    required>
                            </div>
                            {{-- position --}}
                            <div class="mb-3">
                                <label for="status" class="col-form-label">
                                    {{ __('label.position') }}
                                </label>
                                <input type="number" id="position" class="form-control" name="position"
                                    value="{{ $menu->position }}" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-success">
                                    {{ __('button.update') }}
                                </button>
                            </div>
                        </form>

                        <form method="POST"
                            action="{{ route('admin.shops.menu.destroy', [
                                'shop' => $shop,
                                'menu' => $menu,
                            ]) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-link text-danger"
                                onclick="return confirm('Are you sure?')">
                                {{ __('button.delete') }}
                            </button>
                        </form>
                    </td>
                    <td>


                        @include('admin.shops.menu._modal')

                        <hr>

                        @foreach ($menu->getItems() as $item)
                            <section class="card mb-4">

                                <div class="card-body">
                                    <form method="POST"
                                        action="{{ route('admin.shops.menu.item.update', [
                                            'shop' => $shop,
                                            'menu' => $menu,
                                            'item' => $item->uuid,
                                        ]) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md mb-3">
                                                <label for="title" class="col-form-label">
                                                    {{ __('label.title') }} <span class="text-danger">*</span>
                                                </label>
                                                <input id="title" class="form-control" name="title"
                                                    value="{{ $item->title }}" required>
                                            </div>
                                            <div class="col-md mb-3">
                                                <label for="price" class="col-form-label">
                                                    {{ __('label.price') }} <span class="text-danger">*</span>
                                                </label>
                                                <input type="number" id="price" class="form-control" name="price"
                                                    value="{{ $item->price }}" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="col-form-label">
                                                {{ __('label.description') }} <span class="text-danger">*</span>
                                            </label>
                                            <textarea id="description" class="form-control" name="description" required>{{ $item->description }}</textarea>
                                        </div>
                                        {{-- position --}}
                                        <div class="mb-3">
                                            <label for="position" class="col-form-label">
                                                {{ __('label.position') }}
                                            </label>
                                            <input type="number" id="position" class="form-control" name="position"
                                                value="{{ $item->position }}">
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success">
                                            {{ __('button.update') }}
                                        </button>

                                    </form>

                                    <form method="POST"
                                        action="{{ route('admin.shops.menu.item.destroy', [
                                            'shop' => $shop,
                                            'menu' => $menu,
                                            'item' => $item->uuid,
                                        ]) }}">
                                        @csrf
                                        @method('DELETE')

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-link text-danger"
                                                onclick="return confirm('Are you sure?')">
                                                {{ __('button.delete') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </section>
                        @endforeach


                    </td>
                </tr>
            @endforeach
        </tbody>
    @endsection
