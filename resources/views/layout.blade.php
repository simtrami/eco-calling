<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('images/favicon.png') }}"/>

    <title>@yield('title', env('APP_TITLE'))</title>

    <link rel="canonical" href="{{ env('APP_URL') }}">

    <!-- SEO -->
    <meta property="description" content="{{ env('SEO_DESCRIPTION') }}"/>
    <meta name="author" content="{{ env('APP_AUTHOR') }}">
    <meta name="title" content="{{ env('SEO_TITLE') }}">
    <meta property="og:url" content={{ env('APP_URL') }}/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{ env('SEO_TITLE') }}"/>
    <meta property="og:image" content="{{ env('SEO_IMAGE') }}">
    <meta property="og:image:type" content="{{ env('SEO_IMAGE_TYPE') }}">
    <meta property="og:image:width" content="{{ env('SEO_IMAGE_WIDTH') }}">
    <meta property="og:image:height" content="{{ env('SEO_IMAGE_HEIGHT') }}">
    <meta property="og:description" content="{{ env('SEO_DESCRIPTION') }}"/>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ env('TWITTER_USER') }}">
    <meta name="twitter:title" content="{{ env('SEO_TITLE') }}">
    <meta property="twitter:image" content="{{ env('SEO_IMAGE') }}"/>

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @yield('stylesheets')
</head>

<body class="bg-white text-gray-800 selection:bg-theme-light dark:bg-darker dark:text-white font-body">

<x-nav/>

@if (session('success'))
    <x-success/>
@endif

@yield('content')

<x-footer/>

<script src="{{ mix('js/app.js') }}"></script>
@yield('scripts')

</body>
</html>
