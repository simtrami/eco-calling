<div {{ $attributes->merge(['class'=> 'flex m-auto mr-1 justify-center text-center']) }}>
    <a class="btn btn-outline-success px-4 text-xs h-8 md:text-base md:h-auto"
       href="{{ Route::is('home') ? '' : route('home') }}#form">
        @lang('form.submit')
    </a>
</div>
