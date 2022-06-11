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
    <a class="dark:text-theme-light transition hover:drop-shadow focus:outline-none motion-safe:focus:scale-110"
       href="{{ route('home') }}"
    >
        <x-icons.logo class="h-7 sm:h-9 lg:h-11"></x-icons.logo>
    </a>

    <div class="font-medium flex items-center space-x-4 ml-auto sm:space-x-6 md:space-x-9">
        {{--Manifesto--}}
        <a class="{{ Route::is('home') ? 'text-theme-dark dark:text-theme-light md:text-theme md:dark:text-white md:font-bold' : '' }}
            flex space-x-1 transition hover:text-theme-dark dark:hover:text-zinc-300 focus:outline-none focus:underline"
           href="{{ route('home') }}"
        >
            <x-icons.document class="stroke-2 h-5 w-5"></x-icons.document>
            <p class="hidden md:block">{{ __('header.manifesto') }}</p>
        </a>
        {{--Signatures--}}
        <a class="{{ Route::is('signatures') ? 'text-theme-dark dark:text-theme-light md:text-theme md:dark:text-white md:font-bold' : '' }}
            flex space-x-1 transition hover:text-theme-dark dark:hover:text-zinc-300 focus:outline-none focus:underline"
           href="{{ route('signatures') }}"
        >
            <x-icons.people class="stroke-2 h-5 w-5"></x-icons.people>
            <p class="hidden md:block">{{ __('header.signatures') }}</p>
        </a>
        {{--External--}}
        <a class="flex space-x-1 transition hover:text-theme-dark dark:hover:text-zinc-300 focus:outline-none focus:underline"
           href="{{ config('app.links.website') }}"
           target="_blank"
        >
            <x-icons.github class="h-5 w-5"></x-icons.github>
            <p class="hidden md:block">{{ __('header.website') }}</p>
        </a>
        {{--Sign--}}
        <a
            class="flex space-x-1 btn text-sm rounded-full border-theme dark:border-white bg-theme dark:bg-white text-white dark:text-zinc-800 hover:bg-white dark:hover:bg-dark hover:text-theme dark:hover:text-white focus:ring-theme dark:focus:ring-white focus:ring-offset-white dark:focus:ring-offset-dark md:h-auto md:px-4 lg:text-base"
            @if(Route::is('home'))
                onclick="scrollToForm()" href="javascript:void(0)"
            @else
            href="{{ route('home') }}#form"
            @endif
        >
            <x-icons.sign class="h-5 w-5"></x-icons.sign>
            <p class="hidden sm:block">{{ __('form.submit') }}</p>
        </a>
    </div>
</nav>
