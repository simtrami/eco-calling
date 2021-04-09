<footer class="w-full bg-theme-dark text-white py-10 px-4 md:px-20 lg:px-0">
    <div class="mx-auto max-w-4xl">
        <p>{{ env('OUR_NAME') }}</p>
        <div class="my-8">
            <div class="flex flex-col space-y-6 md:flex-row md:justify-between md:space-y-0">
                <div class="flex flex-row justify-center space-x-4">
                    <a class="hover:text-gray-200" href="{{ env('LINK_FACEBOOK') }}" target="_blank" title="Facebook">
                        <x-icons.facebook></x-icons.facebook>
                    </a>
                    <a class="hover:text-gray-200" href="{{ env('LINK_TWITTER') }}" target="_blank" title="Twitter">
                        <x-icons.twitter></x-icons.twitter>
                    </a>
                    <a class="hover:text-gray-200" href="{{ env('LINK_LINKEDIN') }}" target="_blank" title="LinkedIn">
                        <x-icons.linkedin></x-icons.linkedin>
                    </a>
                </div>
                <div class="md:text-right">
                    <p><a class="font-semibold hover:text-gray-200" href="{{ env('LINK_ABOUT_US') }}"
                          target="_blank">@lang('footer.about')</a></p>
                </div>
            </div>
            <div class="flex flex-col mt-4 space-y-4 md:flex-row md:justify-between md:space-y-0">
                <div>
                    <p><a class="font-semibold hover:text-gray-200"
                          href="mailto:{{ env('MAIL_REPLY_TO_ADDRESS') }}">{{ env('MAIL_REPLY_TO_ADDRESS') }}</a>
                    </p>
                </div>
                <div class="md:text-right">
                    <p><a class="font-semibold hover:text-gray-200" href="{{ env('LINK_PRIVACY') }}"
                          target="_blank">@lang('footer.privacy')</a></p>
                </div>
            </div>
        </div>
        <div class="flex flex-row justify-center space-x-2 uppercase text-theme text-sm mt-6">
            <p>Made by <a class="font-semibold hover:animate-pulse"
                          href="{{ env('APP_AUTHOR_URL') }}">{{ env('APP_AUTHOR') }}</a> with</p>
            <a class="hover:animate-pulse" href="https://tailwindcss.com" target="_blank" title="TailwindCSS">
                <svg class="h-5 w-5" viewBox="0 0 30 18" fill="currentColor">
                    <path
                        d="M15 0c-4 0-6.5 2-7.5 6 1.5-2 3.25-2.75 5.25-2.25 1.141.285 1.957 1.113 2.86 2.03C17.08 7.271 18.782 9 22.5 9c4 0 6.5-2 7.5-6-1.5 2-3.25 2.75-5.25 2.25-1.141-.285-1.957-1.113-2.86-2.03C20.42 1.728 18.718 0 15 0zM7.5 9C3.5 9 1 11 0 15c1.5-2 3.25-2.75 5.25-2.25 1.141.285 1.957 1.113 2.86 2.03C9.58 16.271 11.282 18 15 18c4 0 6.5-2 7.5-6-1.5 2-3.25 2.75-5.25 2.25-1.141-.285-1.957-1.113-2.86-2.03C12.92 10.729 11.218 9 7.5 9z"></path>
                </svg>
            </a>
        </div>
    </div>
</footer>
