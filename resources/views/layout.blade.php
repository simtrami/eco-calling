<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('src/images/favicon.png') }}"/>
    <title>{{ env('APP_TITLE') }}</title>

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

<body class="font-body">
<div class="fixed top-0 right-0 left-0 z-50 bg-white shadow-md">
    <x-nav></x-nav>
</div>

@yield('content')

{{--<footer>
    <div class="container">
        <p>{{ env('OUR_NAME') }}</p>
        <div class="content-footer">
            <div class="content-footer__row">
                <div class="footer-socials">
                    <a href="{{ env('LINK_FACEBOOK') }}" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{ env('LINK_TWITTER') }}" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="{{ env('LINK_LINKEDIN') }}" target="_blank">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <a href="{{ env('LINK_ABOUT_US') }}" target="_blank">@lang('footer.about')</a>
            </div>
            <div class="content-footer__row">
                <a href="mailto:{{ env('MAIL_REPLY_TO_ADDRESS') }}">{{ env('MAIL_REPLY_TO_ADDRESS') }}</a>
                <a href="{{ env('LINK_PRIVACY') }}" target="_blank">@lang('footer.privacy')</a>
            </div>
        </div>
    </div>
</footer>--}}

<script src="{{ mix('js/app.js') }}"></script>
@yield('scripts')

</body>
</html>
