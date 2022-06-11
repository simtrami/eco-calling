<section class="w-full mt-6 mb-12 px-4 md:px-20 lg:px-0">
    <div class="mx-auto max-w-4xl">
        <h2 class="section-title mb-4 md:mb-7">{{ __('sponsors.title') }}</h2>
        <div>
            <div class="grid gap-2 grid-cols-3 sm:grid-cols-4">
                <div>
                    <img src="{{ asset('images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
            </div>
        </div>
        <div class="mt-4">
            <p class="text-center">
                {!! __('sponsors.join_us') !!}
                <a class="text-theme transition hover:text-theme-dark dark:hover:text-theme-light focus:outline-none focus:underline"
                   href="mailto:{{ config('app.mail-info.reply-to.address') }}"
                >{{ config('app.mail-info.reply-to.address') }}</a>
            </p>
        </div>
    </div>
</section>
