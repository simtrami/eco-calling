<div class="bg-theme text-white mt-[56px] py-10 px-4 md:mt-[72px] md:px-20 lg:px-0">
    <div class="mx-auto max-w-4xl">
        <h2 class="font-title text-3xl font-bold md:text-4xl">{{ __('success.title') }}</h2>
        <p class="font-medium">{{ __('success.explanations') }}</p>
        <p class="my-6">{{ __('success.please_share') }}</p>
        <div class="flex flex-row justify-center space-x-8">
            <a class="transition motion-safe:hover:scale-125" href="{{ env('LINK_POST_FB') }}" target="_blank"
               title="{{ __('socials.facebook') }}"
            >
                <x-icons.facebook class="h-7 w-7"/>
            </a> <a class="transition motion-safe:hover:scale-125" href="{{ env('LINK_POST_TW') }}"
                    target="_blank"
                    title="{{ __('socials.twitter') }}"
            >
                <x-icons.twitter class="h-7 w-7"/>
            </a> <a class="transition motion-safe:hover:scale-125" href="{{ env('LINK_POST_LIN') }}"
                    target="_blank" title="{{ __('socials.linkedin') }}"
            >
                <x-icons.linkedin class="h-7 w-7"/>
            </a>
        </div>
        <h2 class="font-title text-3xl font-bold mt-6 md:text-4xl">{{ __('success.second_title') }}</h2>
        <p class="font-medium">{{ __('success.actions') }}</p>
        <p class="my-6">{{ __('success.slogan') }}</p>
        <div class="flex w-full justify-center">
            <a class="btn shadow-md rounded-full bg-white text-theme font-medium motion-safe:hover:scale-110 focus:ring-white px-6"
               href="{{ env('LINK_JOIN_US') }}" target="_blank"
            >{{ __('success.join_us') }}</a>
        </div>
    </div>
</div>
