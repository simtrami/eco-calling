@extends('layout')

@section('title'){{ __('signatures.page_title', ['app_name' => env('APP_NAME')]) }}@endsection

@section('content')
    <main role="main">
        <!-- Title -->
        <x-page-title>
            <x-slot name="title">{{ __('signatures.title.we') }} <span
                    class="bg-theme text-white p-1"
                >{!! __('signatures.title.count', ['count' => $count]) !!}</span><br>
                {{ __('signatures.title.who') }}</x-slot>

            <x-slot name="scrollButtonText">{{ __('signatures.go_to_table') }}</x-slot>
            <x-slot name="scrollButtonAction">scrollToTargetAdjusted('signatures')</x-slot>
        </x-page-title>

        <x-motivation/>

        <!-- Signatures -->
        <section
            class="w-full flex items-center min-h-[calc(100vh-56px)] py-8 px-4 md:min-h-[calc(100vh-64px)] md:px-20 lg:min-h-[calc(100vh-72px)] lg:px-0"
            id="signatures"
        >
            <article class="flex-grow mx-auto max-w-4xl">
                <h2 class="section-title mb-6">{{ __('signatures.table.title') }}</h2>

                <x-table :columns="[__('signatures.table.columns.names') => 'full_name']"
                         :elements="$signatures"
                >{{ __('signatures.table.empty') }}</x-table>

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
                        href="{{ route('home') }}#form"
                    >{{ __('form.submit') }}</a>
                </div>
            </div>
        </section>

        <x-sponsors/>
    </main>
@endsection
