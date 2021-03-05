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

<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('src/images/logo.png') }}" alt="Logo"/>
    </a>
    <div class="show-mobile hide-desktop">
        <a href="{{ Route::is('home') ? '' : route('home') }}#form"
           class="btn btn-outline-success my-2 my-sm-0 nav-link" type="submit">@lang('form.submit')</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <img class="bars" src="{{ asset('src/images/bars.svg') }}" alt="nav">
        <img class="close" src="{{ asset('src/images/close.svg') }}" alt="close">
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <div class="navbar-nav mr-auto">
            <div class="d-flex">
                <ul>
                    <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">@lang('header.home')
                        </a>
                    </li>
                    <li class="nav-item {{ Route::is('signatures') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('signatures') }}">@lang('header.signatures')
                        </a>
                    </li>
                    <li class="nav-item not-active tst">
                        <a class="nav-link" href="{{ env('LINK_OFFICIAL_WEBSITE') }}"
                           target="_blank">@lang('header.website')</a>
                    </li>
                </ul>
                <div class="share-socials hide-desktop">
                    <p>@lang('header.share')</p>
                    <div>
                        <div>
                            <a href="{{ env('LINK_POST_TW') }}" target="_blank">
                                <img src="{{ asset('src/images/twitter_light.svg') }}" alt="Twitter">
                            </a>
                        </div>
                        <div>
                            <a href="{{ env('LINK_POST_FB') }}" target="_blank">
                                <img src="{{ asset('src/images/fb_light.svg') }}" alt="Facebook">
                            </a>
                        </div>
                        <div>
                            <a href="{{ env('LINK_POST_LIN') }}" target="_blank">
                                <img src="{{ asset('src/images/linkedin_light.svg') }}" alt="LinkedIn">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-2 mr-1 my-lg-0 button-register">
            <a href="{{ Route::is('home') ? '' : route('home') }}#form">
                <div class="btn btn-outline-success my-2 my-sm-0 nav-link px-4">@lang('form.submit')</div>
            </a>
        </div>
    </div>
</nav>

<!-- Spacer -->
<div class="mt-4"></div>

@yield('content')

<footer>
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
</footer>

<script src="{{ mix('/js/app.js') }}"></script>
@yield('scripts')

</body>
</html>
