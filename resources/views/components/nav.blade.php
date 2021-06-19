<nav
    class="bg-white dark:bg-dark
    text-theme dark:text-white
    z-50 shadow-md
    fixed top-0 right-0 left-0
    flex flex-wrap items-center justify-between md:flex-row md:flex-nowrap md:justify-start
    min-h-[56px] md:min-h-[64px] lg:min-h-[72px]
    py-0 px-2 md:px-4 md:py-1 lg:py-2"
    id="nav"
>
    <a class="dark:text-theme-light transition filter hover:drop-shadow transform focus:outline-none motion-safe:focus:scale-110"
       href="{{ route('home') }}"
    >
        <x-icons.logo class="h-7 sm:h-9 lg:h-11"/>
    </a>

    <div class="font-medium flex items-center space-x-4 ml-auto sm:space-x-6 md:space-x-9">
        {{--Manifesto--}}
        <a class="{{ Route::is('home') ? 'text-theme-dark dark:text-theme-light md:text-theme md:dark:text-white md:font-bold' : '' }}
            flex space-x-1 transition hover:text-theme-dark dark:hover:text-gray-300 focus:outline-none focus:underline"
           href="{{ route('home') }}"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-2 h-5 w-5" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                />
            </svg>
            <p class="hidden md:block">{{ __('header.manifesto') }}</p>
        </a>
        {{--Signatures--}}
        <a class="{{ Route::is('signatures') ? 'text-theme-dark dark:text-theme-light md:text-theme md:dark:text-white md:font-bold' : '' }}
            flex space-x-1 transition hover:text-theme-dark dark:hover:text-gray-300 focus:outline-none focus:underline"
           href="{{ route('signatures') }}"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-2 h-5 w-5" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                />
            </svg>
            <p class="hidden md:block">{{ __('header.signatures') }}</p>
        </a>
        {{--External--}}
        <a class="flex space-x-1 transition hover:text-theme-dark dark:hover:text-gray-300 focus:outline-none focus:underline"
           href="{{ env('LINK_OFFICIAL_WEBSITE') }}"
           target="_blank"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M12 2C6.477 2 2 6.463 2 11.97c0 4.404 2.865 8.14 6.839 9.458.5.092.682-.216.682-.48 0-.236-.008-.864-.013-1.695-2.782.602-3.369-1.337-3.369-1.337-.454-1.151-1.11-1.458-1.11-1.458-.908-.618.069-.606.069-.606 1.003.07 1.531 1.027 1.531 1.027.892 1.524 2.341 1.084 2.91.828.092-.643.35-1.083.636-1.332-2.22-.251-4.555-1.107-4.555-4.927 0-1.088.39-1.979 1.029-2.675-.103-.252-.446-1.266.098-2.638 0 0 .84-.268 2.75 1.022A9.606 9.606 0 0112 6.82c.85.004 1.705.114 2.504.336 1.909-1.29 2.747-1.022 2.747-1.022.546 1.372.202 2.386.1 2.638.64.696 1.028 1.587 1.028 2.675 0 3.83-2.339 4.673-4.566 4.92.359.307.678.915.678 1.846 0 1.332-.012 2.407-.012 2.734 0 .267.18.577.688.48C19.137 20.107 22 16.373 22 11.969 22 6.463 17.522 2 12 2z"
                ></path>
            </svg>
            <p class="hidden md:block">{{ __('header.website') }}</p>
        </a>
        {{--Sign--}}
        <a
            class="flex space-x-1 btn text-sm rounded-full border-theme dark:border-white bg-theme dark:bg-white text-white dark:text-gray-800 hover:bg-white dark:hover:bg-dark hover:text-theme dark:hover:text-white focus:ring-theme dark:focus:ring-white focus:ring-offset-white dark:focus:ring-offset-dark md:h-auto md:px-4 lg:text-base"
            @if(Route::is('home'))
            onclick="scrollToForm()" href="javascript:void(0)"
            @else
            href="{{ route('home') }}#form"
            @endif
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                <path fill-rule="evenodd"
                      d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                      clip-rule="evenodd"
                />
            </svg>
            <p class="hidden sm:block">{{ __('form.submit') }}</p>
        </a>
    </div>
</nav>
