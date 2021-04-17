<div {{ $attributes->merge(['class'=> 'flex m-auto mr-1 justify-center text-center']) }}>
    <button onclick="scrollToForm()" class="btn text-xs rounded-full border-theme bg-theme text-white px-4
    hover:bg-white hover:text-theme focus:ring-theme md:text-base md:h-auto">
        @lang('form.submit')
    </button>
</div>
