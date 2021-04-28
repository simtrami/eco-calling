<div {{ $attributes->merge(['class'=> 'flex m-auto mr-1 justify-center text-center']) }}>
    @if(Route::is('home'))
        <button
            class="btn text-xs rounded-full border-theme bg-theme text-white px-4 hover:bg-white hover:text-theme focus:ring-theme md:text-base md:h-auto"
            onclick="scrollToForm()">{{ __('form.submit') }}</button>
    @else
        <a
            class="btn text-xs rounded-full border-theme bg-theme text-white px-4 hover:bg-white hover:text-theme focus:ring-theme md:text-base md:h-auto"
            href="{{ route('home') }}#form">{{ __('form.submit') }}</a>
    @endif
</div>
