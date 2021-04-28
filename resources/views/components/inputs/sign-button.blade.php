<div {{ $attributes->merge(['class'=> 'flex m-auto mr-1 justify-center text-center']) }}>
    @if(Route::is('home'))
        <button
            class="btn text-sm rounded-full border-theme bg-theme text-white px-4 hover:bg-white hover:text-theme focus:ring-theme focus:ring-offset-white md:h-auto lg:text-base"
            onclick="scrollToForm()">{{ __('form.submit') }}</button>
    @else
        <a
            class="btn text-sm rounded-full border-theme bg-theme text-white px-4 hover:bg-white hover:text-theme focus:ring-theme focus:ring-offset-white md:h-auto lg:text-base"
            href="{{ route('home') }}#form">{{ __('form.submit') }}</a>
    @endif
</div>
