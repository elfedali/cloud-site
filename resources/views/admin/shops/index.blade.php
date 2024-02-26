@extends('admin.layouts.app')

@section('content')
    <h1>
        Shops List
        <a href="{{ route('admin.shops.create') }}" class="btn btn-outline-primary">
            {{ __('label.create') }}
        </a>
    </h1>
    <div class="card">
        <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th>
                            {{ __('label.id') }}
                        </th>
                        <th>
                            {{ __('label.title') }}
                        </th>
                        <th>
                            {{ __('label.owner') }}
                        </th>
                        <th>
                            {{ __('label.created_at') }}
                        </th>
                        <th>
                            {{ __('label.updated_at') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shops as $shop)
                        <tr>
                            <td>
                                {{ $shop->id }}
                            </td>
                            <td>
                                <a href="{{ route('admin.shops.edit', ['shop' => $shop->id]) }}">
                                    {{ $shop->title }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.users.edit', ['id' => $shop->owner->id]) }}">
                                    {{ $shop->owner->id }} |
                                    {{ $shop->owner->name }}
                                </a>
                            </td>
                            <td>
                                {{ $shop->created_at }}
                            </td>
                            <td>
                                {{ $shop->updated_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
