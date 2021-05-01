<footer class="w-full bg-theme-dark text-white text-sm py-10 px-4 md:px-20 lg:px-0">
    <div class="mx-auto max-w-4xl">
        <div
            class="flex flex-col-reverse items-center space-y-4 space-y-reverse sm:flex-row sm:justify-between sm:space-y-0">
            <div>
                <p>{{ env('OUR_NAME') }}</p>
            </div>
            <nav class="space-x-2 text-xl sm:text-2xl" aria-label="{{ __('footer.select_languages') }}">
                <a
                    class="inline-block transition transform motion-safe:hover:scale-125 focus:outline-none motion-safe:focus:scale-125"
                    @if(LaravelLocalization::getCurrentLocale() === 'en')
                    href="{{ LaravelLocalization::getLocalizedURL('fr') }}"
                    title="Passer en {{ LaravelLocalization::getSupportedLocales()['fr']['native'] }}"
                    @else
                    href="{{ LaravelLocalization::getLocalizedURL('en') }}"
                    title="Switch to {{ LaravelLocalization::getSupportedLocales()['en']['native'] }}"
                    @endif
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                    </svg>
                </a>
            </nav>
        </div>
        <div class="my-8">
            <div class="flex flex-col space-y-6 md:flex-row md:justify-between md:space-y-0">
                <div class="flex flex-row justify-center space-x-8">
                    <a class="transition transform motion-safe:hover:scale-125 focus:outline-none motion-safe:focus:scale-125"
                       href="{{ env('LINK_FACEBOOK') }}"
                       target="_blank" title="Facebook">
                        <x-icons.facebook class="h-6 w-6"/>
                    </a>
                    <a class="transition transform motion-safe:hover:scale-125 focus:outline-none motion-safe:focus:scale-125"
                       href="{{ env('LINK_TWITTER') }}" target="_blank" title="Twitter">
                        <x-icons.twitter class="h-6 w-6"/>
                    </a>
                    <a class="transition transform motion-safe:hover:scale-125 focus:outline-none motion-safe:focus:scale-125"
                       href="{{ env('LINK_LINKEDIN') }}" target="_blank" title="LinkedIn">
                        <x-icons.linkedin class="h-6 w-6"/>
                    </a>
                </div>
                <div class="md:text-right">
                    <p><a class="font-semibold hover:text-gray-200 focus:outline-none focus:underline"
                          href="{{ env('LINK_ABOUT_US') }}" target="_blank">{{ __('footer.about') }}</a></p>
                </div>
            </div>
            <div class="flex flex-col mt-4 space-y-4 md:flex-row md:justify-between md:space-y-0">
                <address>
                    <a class="font-semibold not-italic hover:text-gray-200 focus:outline-none focus:underline"
                       href="mailto:{{ env('MAIL_REPLY_TO_ADDRESS') }}">{{ env('MAIL_REPLY_TO_ADDRESS') }}</a>
                </address>
                <div class="md:text-right">
                    <a class="font-semibold hover:text-gray-200 focus:outline-none focus:underline"
                       href="{{ env('LINK_PRIVACY') }}" target="_blank">{{ __('footer.privacy') }}</a>
                </div>
            </div>
        </div>
        <div class="flex flex-row justify-center space-x-2 uppercase text-theme text-sm mt-6">
            <p>
                {{ __('footer.signature.who') }}
                <a class="font-semibold hover:animate-pulse focus:outline-none focus:underline" target="_blank"
                   href="{{ env('APP_AUTHOR_URL') }}">{{ env('APP_AUTHOR') }}</a>
                {{ __('footer.signature.what') }}
            </p>
            <a class="transition transform hover:animate-pulse focus:outline-none motion-safe:focus:scale-125"
               href="https://tailwindcss.com" target="_blank" title="TailwindCSS">
                <svg class="h-5 w-5" viewBox="0 0 30 18" fill="currentColor">
                    <path
                        d="M15 0c-4 0-6.5 2-7.5 6 1.5-2 3.25-2.75 5.25-2.25 1.141.285 1.957 1.113 2.86 2.03C17.08 7.271 18.782 9 22.5 9c4 0 6.5-2 7.5-6-1.5 2-3.25 2.75-5.25 2.25-1.141-.285-1.957-1.113-2.86-2.03C20.42 1.728 18.718 0 15 0zM7.5 9C3.5 9 1 11 0 15c1.5-2 3.25-2.75 5.25-2.25 1.141.285 1.957 1.113 2.86 2.03C9.58 16.271 11.282 18 15 18c4 0 6.5-2 7.5-6-1.5 2-3.25 2.75-5.25 2.25-1.141-.285-1.957-1.113-2.86-2.03C12.92 10.729 11.218 9 7.5 9z"></path>
                </svg>
            </a>
        </div>
    </div>
</footer>
