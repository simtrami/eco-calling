<div class="w-full my-6 px-4 md:px-20 lg:px-0">
    <div class="mx-auto max-w-4xl">
        <h2 class="font-title text-3xl text-theme-dark font-bold mb-4 md:text-4xl md:mb-7">Our sponsors</h2>
        <div>
            <div class="grid gap-2 grid-cols-3 sm:grid-cols-4">
                <div>
                    <img src="{{ asset('src/images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('src/images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('src/images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('src/images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('src/images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('src/images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('src/images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('src/images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('src/images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('src/images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('src/images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
                <div>
                    <img src="{{ asset('src/images/sponsors/sponsor.png') }}" alt="sponsor">
                </div>
            </div>
        </div>
        <div class="mt-4">
            <p class="text-center">
                @lang('sponsors.join_us')
                <a class="text-theme hover:text-theme-dark"
                   href="mailto:{{ env('MAIL_REPLY_TO_ADDRESS') }}">{{ env('MAIL_REPLY_TO_ADDRESS') }}</a>
            </p>
        </div>
    </div>
</div>
