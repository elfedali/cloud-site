@extends('admin.layouts.app')

@section('content')
    @include('admin.terms._top')

    <table class="table">
        <thead>

            <tr>
                <th> {{ __('label.id') }}</th>

                <th>
                    {{ __('label.name') }}
                </th>

                <th>
                    {{ __('label.slug') }}
                </th>
            </tr>

        </thead>

        @foreach ($terms as $term)
            <tr>
                <td>
                    {{ $term->id }}
                </td>

                <td>
                    <a href="{{ url('/admin/terms/' . $term->id . '/edit') }}">
                        {{ $term->name }}
                    </a>
                </td>
                <td>
                    {{ $term->slug }}
                </td>

            </tr>
        @endforeach
    </table>
@endsection
