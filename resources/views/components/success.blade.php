<div class="success py-3">
    <div class="container">
        <h2>@lang('success.title')</h2>

        <p><strong>@lang('success.explanations')</strong></p>
        <p>@lang('success.please_share')</p>
        <div class="success-socials">
            <a href="{{ env('LINK_POST_FB') }}" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="{{ env('LINK_POST_TW') }}" target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="{{ env('LINK_POST_LIN') }}" target="_blank">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
        <h2>@lang('success.second_title')</h2>
        <p><strong>@lang('success.actions')</strong></p>
        <p>@lang('success.slogan')</p>
        <div class="success-button">
            <a href="{{ env('LINK_JOIN_US') }}" target="_blank"> @lang('success.join_us')</a>
        </div>
    </div>
</div>
