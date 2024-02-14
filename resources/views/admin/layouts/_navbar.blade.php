<nav class="navbar navbar-expand-lg navbar-light bg-light  mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/admin') }}">
            <b>{{ config('app.name', 'Laravel') }} | Admin</b>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('admin.dashboard')) active @endif"
                        href="{{ route('admin.dashboard') }}">
                        {{ __('label.dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('admin.media.*')) active @endif"
                        href="{{ route('admin.media.index') }}">
                        {{ __('label.media') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('admin.terms.*') and request()->term_type == 'kitchen') active @endif"
                        href="{{ route('admin.terms.index', ['term_type' => 'kitchen']) }}">
                        {{ __('label.kitchen') }}
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('admin.terms.*') and request()->term_type == 'service') active @endif"
                        href="{{ route('admin.terms.index', ['term_type' => 'service']) }}">
                        {{ __('label.service') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('admin.users.*')) active @endif"
                        href="{{ route('admin.users.index') }}">
                        {{ __('label.users') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('admin.shops.*')) active @endif"
                        href="{{ route('admin.shops.index', ['post_type' => 'restaurant']) }}">{{ __('label.restaurant') }}</a>
                </li>
            </ul>


            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('label.logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
