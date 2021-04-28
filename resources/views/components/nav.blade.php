<div class="fixed top-0 right-0 left-0 z-50 bg-white shadow-md">
    <nav
        class="p-0 flex flex-wrap items-center justify-between md:flex-row md:flex-nowrap md:justify-start md:py-2 md:px-4"
        id="nav">
        <a class="inline-block py-1.5 mr-4 text-xl whitespace-nowrap" href="{{ route('home') }}">
            <img class="h-11" src="{{ asset('src/images/logo.png') }}" alt="Logo"/>
        </a>

        <x-inputs.sign-button class="md:hidden"/>

        <button class="mx-3 md:hidden" id="nav-toggler" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-theme" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <div
            class="collapsible bg-theme text-white text-center flex-100 md:flex md:flex-auto md:items-center md:text-left md:bg-transparent md:text-theme"
            id="nav-collapse">
            <ul class="font-medium flex flex-col list-none space-y-5 pl-0 py-6 mx-auto md:justify-end md:w-full md:flex-row md:-space-y-px md:space-x-9 md:mr-9 md:ml-0 md:my-0 md:py-0">
                <li class="{{ Route::is('home') ? 'font-semibold' : '' }}">
                    <a class="hover:text-gray-200 focus:outline-none focus:underline md:hover:text-theme-dark"
                       href="{{ route('home') }}">{{ __('header.home') }}</a>
                </li>
                <li class="{{ Route::is('signatures') ? 'font-semibold' : '' }}">
                    <a class="hover:text-gray-200 focus:outline-none focus:underline md:hover:text-theme-dark"
                       href="{{ route('signatures') }}">{{ __('header.signatures') }}</a>
                </li>
                <li>
                    <a class="hover:text-gray-200 focus:outline-none focus:underline md:hover:text-theme-dark"
                       href="{{ env('LINK_OFFICIAL_WEBSITE') }}"
                       target="_blank">{{ __('header.website') }}</a>
                </li>
            </ul>
            <x-inputs.sign-button class="hidden md:block"/>
        </div>
    </nav>
</div>
