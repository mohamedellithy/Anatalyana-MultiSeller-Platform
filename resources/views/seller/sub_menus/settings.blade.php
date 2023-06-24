<div class="top_sub_menu_icons">
    <div class="content-sub-menu d-flex">
        <ul class="">
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.shop.index']) }}" href="{{ route('seller.shop.index') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Shop Settings') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.setting_payment']) }}" href="{{ route('seller.setting_payment') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Payments Settings') }}
                    </label>
                </a>
            </li>
        </ul>
    </div>
</div>
