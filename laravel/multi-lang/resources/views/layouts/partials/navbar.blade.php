<ul>
    <li><a href="{{ route('index') }}"
            class="{{ request()->is('home') ? 'active' : null }}">{{ __('navbar.home') }}</a></li>
    <li><a href="{{ route('aboutus') }}"
            class="{{ request()->is('aboutus') ? 'active' : null }}">{{ Lang::get('navbar.aboutus') }}</a></li>
    <li><a href="{{ route('contact') }}"
            class="{{ request()->is('contact') ? 'active' : null }}">{{ Lang::get('navbar.contact') }}</a></li>
    <li><a href="{{ url('lang/en') }}">English</a> | <a href="{{ url('lang/tr') }}">Turkish</a></li>
    <li>
        {{-- @if (session('lang-msg'))
            <p>{{ session('lang-msg') }}</p>
        @endif --}}
    </li>
    <li>{{ Lang::getLocale() }}</li>
</ul>
