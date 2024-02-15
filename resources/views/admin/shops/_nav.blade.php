<ul class="nav my-4">
    <li class="nav-item">
        <a class="nav-link  @if (request()->routeIs('admin.shops.edit')) active @endif"
            href="{{ route('admin.shops.edit', [
                'shop' => $shop,
            ]) }}">
            {{ __('label.general') }}

        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.shops.menu')) active @endif"
            href="{{ route('admin.shops.menu', [
                'shop' => $shop,
            ]) }}">
            {{ __('label.menu') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            {{ __('label.images') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            {{ __('label.seo') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            {{ __('label.opening_hours') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            {{ __('label.comments') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            {{ __('label.reservations') }}
        </a>
    </li>
</ul>
