<div class="top_sub_menu_icons">
    <div class="content-sub-menu d-flex">
        <ul class="">
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.dashboard']) }}" href="{{ route('seller.dashboard') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Reviews') }}
                    </label>
                </a>
            </li>

            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.analytics-products']) }} " href="{{ route('seller.analytics-products') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Products') }}
                    </label>
                </a>
            </li>

            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.analytics-orders']) }}" href="{{ route('seller.analytics-orders') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Orders') }}
                    </label>
                </a>
            </li>

            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.analytics-sales']) }}" href="{{ route('seller.analytics-sales') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Sales') }}
                    </label>
                </a>
            </li>
        </ul>
    </div>
</div>
