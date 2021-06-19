<section
    class="flex flex-col content-center max-w-full min-h-screen py-4 px-4 pt-[56px] md:px-20 md:pt-[64px] lg:px-0 lg:pt-[72px]"
    id="title"
>
    <header
        class="font-title font-bold w-full md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl m-auto"
    >
        <h1 class="w-full text-theme-dark dark:text-white text-5xl leading-snug md:text-6xl lg:text-7xl">{{ $title }}</h1>
        @if (isset($subtitle))
            <p class="text-2xl mt-4">
                {!! $subtitle !!}
            </p>
        @endif
    </header>
    <div class="text-center text-accent">
        <button
            class="transition focus:outline-none motion-safe:focus:scale-125"
            onclick="{!! $scrollButtonAction !!}"
        >
            <span class="font-semibold lg:text-lg">{!! $scrollButtonText !!}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce h-6 w-6 mx-auto mt-4 lg:h-8 lg:w-8"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
    </div>
</section>
