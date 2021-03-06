<div {{ $attributes->merge(['class'=> 'mr-1 button-register']) }}>
    <a class="btn btn-outline-success px-3" href="{{ Route::is('home') ? '' : route('home') }}#form">
        @lang('form.submit')
    </a>
</div>
