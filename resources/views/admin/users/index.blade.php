@extends('admin.layouts.app')

@section('content')
    @include('admin.users._top')

    <table class="table">
        <thead>
            <tr>
                <th>
                    {{ __('label.id') }}
                </th>
                <th>
                    {{ __('label.name') }}
                </th>
                <th>
                    {{ __('label.username') }}
                </th>
                <th>
                    {{ __('label.email') }}
                </th>

                <th>
                    {{ __('label.role') }}
                </th>
                <th>
                    {{ __('label.city') }}
                </th>
                <th>
                    {{ __('label.created_at') }}
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        {{ $user->id }}
                    </td>
                    <td>
                        <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}">
                            {{ $user->name }}
                        </a>
                    </td>
                    <td>
                        {{ $user->username }}
                    </td>

                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        @if ($user->role == \App\Models\User::ROLE_ADMIN)
                            * {{ $user->role }}
                        @else
                            {{ $user->role }}
                        @endif
                    </td>
                    <td>
                        {{ $user->city }}
                    </td>
                    <td>
                        {{ $user->updated_at }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
