<nav id="nav"
     class="p-0 flex flex-wrap items-center justify-between md:flex-row md:flex-nowrap md:justify-start md:py-2 md:px-4">
    <a class="inline-block py-1.5 mr-4 text-xl whitespace-nowrap" href="{{ route('home') }}">
        <img class="h-11" src="{{ asset('src/images/logo.png') }}" alt="Logo"/>
    </a>

    <x-sign-button class="md:hidden"></x-sign-button>

    <button id="nav-toggler" class="mx-3 md:hidden" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-theme" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <div id="nav-collapse" class="collapsible bg-theme text-white text-center flex-100 md:flex md:flex-auto
    md:items-center md:text-left md:bg-transparent md:text-theme">
        <ul class="font-medium flex flex-col list-none space-y-5 pl-0 py-6 mx-auto
        md:justify-end md:w-full md:flex-row md:-space-y-px md:space-x-9 md:mr-9 md:ml-0 md:my-0 md:py-0">
            <li class="{{ Route::is('home') ? 'active' : 'inactive' }}">
                <a href="{{ route('home') }}">@lang('header.home')</a>
            </li>
            <li class="{{ Route::is('signatures') ? 'active' : 'inactive' }}">
                <a href="{{ route('signatures') }}">@lang('header.signatures')</a>
            </li>
            <li class="inactive">
                <a href="{{ env('LINK_OFFICIAL_WEBSITE') }}" target="_blank">@lang('header.website')</a>
            </li>
        </ul>
        <x-sign-button class="hidden md:block"></x-sign-button>
    </div>
</nav>
