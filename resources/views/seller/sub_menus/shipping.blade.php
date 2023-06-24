<div class="top_sub_menu_icons">
    <div class="content-sub-menu d-flex">
        <ul class="">
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.air-shipping']) }}" href="{{ route('seller.air-shipping') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Air Shipping') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.sea-shipping']) }}" href="{{ route('seller.sea-shipping') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Sea Shipping') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.landing-shipping']) }}" href="{{ route('seller.landing-shipping') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Landing Shipping') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.shippings-to-your-place']) }}" href="{{ route('seller.shippings-to-your-place') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Shipping to your Home') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.pay-on-delivery']) }}" href="{{ route('seller.pay-on-delivery') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Pay on delivery') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.working-on-shipping']) }}" href="{{ route('seller.working-on-shipping') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('working on Shipping') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.all-shippings']) }}" href="{{ route('seller.all-shippings') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('All Shipping') }}
                    </label>
                </a>
            </li>
        </ul>
    </div>
</div>
