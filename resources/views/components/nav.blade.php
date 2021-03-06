<nav id="nav" class="navbar navbar-expand-md navbar-light">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('src/images/logo.png') }}" alt="Logo"/>
    </a>


    <x-register-button class="d-md-none"></x-register-button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon"><i class="fas fa-bars"></i></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto mt-2 mt-md-0">
            <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">@lang('header.home')</a>
            </li>
            <li class="nav-item {{ Route::is('signatures') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('signatures') }}">@lang('header.signatures')</a>
            </li>
            <li class="nav-item not-active tst">
                <a class="nav-link" href="{{ env('LINK_OFFICIAL_WEBSITE') }}"
                   target="_blank">@lang('header.website')</a>
            </li>
        </ul>
        <x-register-button class="d-none d-md-block"></x-register-button>
    </div>
</nav>
