<footer class="w-full bg-theme-dark text-white text-sm py-10 px-4 md:px-20 lg:px-0">
    <div class="mx-auto max-w-4xl">
        <div
            class="flex flex-col-reverse items-center space-y-4 space-y-reverse sm:flex-row sm:justify-between sm:space-y-0"
        >
            <div>
                <p>{{ date('Y') }} - {{ config('app.copyright') }}</p>
            </div>
            <nav class="space-x-2 text-xl sm:text-2xl" aria-label="{{ __('footer.select_languages') }}">
                <a
                    class="inline-block transition motion-safe:hover:scale-125 focus:outline-none motion-safe:focus:scale-125"
                    @if(LaravelLocalization::getCurrentLocale() === 'en')
                        href="{{ LaravelLocalization::getLocalizedURL('fr') }}"
                    title="Passer en {{ LaravelLocalization::getSupportedLocales()['fr']['native'] }}"
                    @else
                        href="{{ LaravelLocalization::getLocalizedURL('en') }}"
                    title="Switch to {{ LaravelLocalization::getSupportedLocales()['en']['native'] }}"
                    @endif
                >
                    <x-icons.translation class="h-6 w-6"></x-icons.translation>
                </a>
            </nav>
        </div>
        <div class="my-8">
            <div class="flex flex-col space-y-6 md:flex-row md:justify-between md:space-y-0">
                <div class="flex flex-row justify-center space-x-8">
                    <a class="transition motion-safe:hover:scale-125 focus:outline-none motion-safe:focus:scale-125"
                       href="{{ config('app.socials.facebook.account-url') }}"
                       target="_blank" title="Facebook"
                    >
                        <x-icons.facebook class="h-6 w-6"></x-icons.facebook>
                    </a> <a
                        class="transition motion-safe:hover:scale-125 focus:outline-none motion-safe:focus:scale-125"
                        href="{{ config('app.socials.twitter.account-url') }}" target="_blank" title="Twitter"
                    >
                        <x-icons.twitter class="h-6 w-6"></x-icons.twitter>
                    </a> <a
                        class="transition motion-safe:hover:scale-125 focus:outline-none motion-safe:focus:scale-125"
                        href="{{ config('app.socials.instagram.account-url') }}" target="_blank" title="Instagram"
                    >
                        <x-icons.instagram class="h-6 w-6"></x-icons.instagram>
                    </a> <a
                        class="transition motion-safe:hover:scale-125 focus:outline-none motion-safe:focus:scale-125"
                        href="{{ config('app.socials.linkedin.account-url') }}" target="_blank" title="LinkedIn"
                    >
                        <x-icons.linkedin class="h-6 w-6"></x-icons.linkedin>
                    </a>
                </div>
                <div class="md:text-right">
                    <p><a class="font-semibold hover:text-zinc-200 focus:outline-none focus:underline"
                          href="{{ config('app.links.about-us') }}" target="_blank"
                        >{{ __('footer.about') }}</a></p>
                </div>
            </div>
            <div class="flex flex-col mt-4 space-y-4 md:flex-row md:justify-between md:space-y-0">
                <address>
                    <a class="font-semibold not-italic hover:text-zinc-200 focus:outline-none focus:underline"
                       href="mailto:{{ config('app.mail-info.reply-to.address') }}"
                    >{{ config('app.mail-info.reply-to.address') }}</a>
                </address>
                <div class="md:text-right">
                    <a class="font-semibold hover:text-zinc-200 focus:outline-none focus:underline"
                       href="{{ config('app.links.privacy') }}" target="_blank"
                    >{{ __('footer.privacy') }}</a>
                </div>
            </div>
        </div>
        <div class="flex flex-col space-y-4 mt-6 md:flex-row-reverse md:justify-between md:items-center md:space-y-0">
            <nav class="mx-auto md:mx-0">
                <a class="btn text-sm uppercase bg-theme hover:bg-theme-dark text-theme-dark hover:text-theme hover:border-theme focus:ring-theme focus:ring-offset-theme-dark flex items-center space-x-2"
                   onclick="toggleDarkMode()" href="javascript:void(0)"
                   aria-label="{{ __('footer.switch_mode.title') }}"
                >
                    <p>{{ __('footer.switch_mode.text') }}</p>
                    <x-icons.moon id="dark" class="h-5 w-5"></x-icons.moon>
                    <x-icons.sun id="light" class="hidden h-5 w-5"></x-icons.sun>
                </a>
            </nav>
            <div class="flex justify-center space-x-2 uppercase text-theme text-sm">
                <p>
                    {{ __('footer.signature.who') }}
                    <a class="font-semibold hover:animate-pulse focus:outline-none focus:underline" target="_blank"
                       href="{{ config('app.author.url') }}"
                    >{{ config('app.author.name') }}</a>
                    {{ __('footer.signature.what') }}
                </p>
                <a class="transition hover:animate-pulse focus:outline-none motion-safe:focus:scale-125"
                   href="https://tailwindcss.com" target="_blank" title="TailwindCSS"
                >
                    <x-icons.tailwind class="h-5 w-5"></x-icons.tailwind>
                </a>
            </div>
        </div>
    </div>
</footer>
