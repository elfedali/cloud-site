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
        <a class="nav-link @if (request()->routeIs('admin.shops.images')) active @endif"
            href="{{ route('admin.shops.images', [
                'shop' => $shop,
            ]) }}">
            {{ __('label.images') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.shops.seo')) active @endif"
            href="{{ route('admin.shops.seo', [
                'shop' => $shop,
            ]) }}">
            {{ __('label.seo') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.shops.opening-hours')) active @endif""
            href="{{ route('admin.shops.opening-hours', [
                'shop' => $shop,
            ]) }}">
            {{ __('label.opening_hours') }}

        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.shops.phone')) active @endif""
            href="{{ route('admin.shops.phone', [
                'shop' => $shop,
            ]) }}">
            {{ __('label.phone') }}

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
