<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('images/favicon.png') }}"/>

    <title>@yield('title', config('app.name'))</title>

    <link rel="canonical" href="{{ config('app.url') }}">

    <!-- SEO -->
    <meta property="description" content="{{ config('app.seo.description') }}"/>
    <meta name="author" content="{{ config('app.author.name') }}">
    <meta name="title" content="{{ config('app.seo.title') }}">
    <meta property="og:url" content={{ config('app.url') }}/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{ config('app.seo.title') }}"/>
    <meta property="og:image" content="{{ config('app.seo.image.url') }}">
    <meta property="og:image:type" content="{{ config('app.seo.image.type') }}">
    <meta property="og:image:width" content="{{ config('app.seo.image.width') }}">
    <meta property="og:image:height" content="{{ config('app.seo.image.height') }}">
    <meta property="og:description" content="{{ config('app.seo.description') }}"/>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ config('app.socials.twitter.account-name') }}">
    <meta name="twitter:title" content="{{ config('app.seo.title') }}">
    <meta property="twitter:image" content="{{ config('app.seo.image.url') }}"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('stylesheets')
</head>

<body class="bg-white text-zinc-800 selection:bg-theme-light dark:bg-darker dark:text-white font-body">

@if(config('app.announcement'))
    <x-announcement>{!! config('app.announcement') !!}</x-announcement>
@endif

<x-nav></x-nav>

@if (session('success'))
    <x-success></x-success>
@endif

@yield('content')

<x-footer></x-footer>

@yield('scripts')

</body>
</html>
