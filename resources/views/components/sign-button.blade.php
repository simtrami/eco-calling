<div {{ $attributes->merge(['class'=> 'flex m-auto mr-1 justify-center text-center']) }}>
    <a class="btn text-xs rounded-full border-theme bg-theme text-white px-4 h-8 hover:bg-white hover:text-theme
    focus:ring-theme md:text-base md:h-auto"
       href="{{ Route::is('home') ? '' : route('home') }}#form">
        @lang('form.submit')
    </a>
</div>
