@extends('layout')

@section('title'){{ __('signatures.page_title', ['app_title' => env('APP_TITLE')]) }}@endsection

@section('content')
    <main role="main">
        <!-- Jumbotron -->
        <section class="h-screen w-full min-h-[33rem] 2xl:min-h-[52rem]" id="title">
            <header
                class="font-title font-bold relative top-1/3 px-4 mx-auto md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl xl:top-1/4">
                <h1 class="text-theme-dark text-4xl leading-snug sm:text-5xl md:text-6xl lg:text-7xl">{{ __('signatures.title.we') }}
                    <span
                        class="bg-theme text-white p-1">{!! __('signatures.title.count', ['count' => $count]) !!}</span><br>
                    {{ __('signatures.title.who') }}</h1>
            </header>
            <nav class="text-center text-accent flex justify-center relative top-1/2 2xl:top-2/3">
                <button
                    class="transition transform focus:outline-none motion-safe:focus:scale-125"
                    onclick="scrollToTargetAdjusted('signatures')">
                    <span class="font-semibold lg:text-lg">{{ __('signatures.go_to_table') }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce h-6 w-6 mx-auto mt-4 lg:h-8 lg:w-8"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
            </nav>
        </section>

        <x-motivation/>

        <!-- Signatures -->
        <section
            class="w-full flex items-center min-h-[calc(100vh-56px)] py-8 px-4 md:min-h-[calc(100vh-72px)] md:px-20 lg:px-0"
            id="signatures">
            <article class="flex-grow mx-auto max-w-4xl">
                <h2 class="text-theme-dark font-title text-3xl font-bold mb-6 md:text-4xl">{{ __('signatures.table.title') }}</h2>

                <x-table :columns="[__('signatures.table.columns.names') => 'full_name']"
                         :elements="$signatures">{{ __('signatures.table.empty') }}</x-table>

                {{ $signatures->onEachSide(0)->links() }}
            </article>
        </section>

        <section class="bg-theme text-white py-10 px-4 md:px-20 lg:px-0">
            <div class="leading-relaxed mx-auto max-w-4xl">
                <p class="text-center font-medium mb-6">
                    {!! __('signatures.go_to_form') !!}
                </p>
                <div class="flex mx-auto justify-center text-center">
                    <a
                        class="btn rounded-full border-white bg-white text-theme px-4 hover:bg-theme hover:text-white focus:ring-white"
                        href="{{ route('home') }}#form">{{ __('form.submit') }}</a>
                </div>
            </div>
        </section>

        <x-sponsors/>
    </main>
@endsection
