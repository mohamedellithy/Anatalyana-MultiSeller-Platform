<div class="top_sub_menu_icons">
    <div class="content-sub-menu d-flex">
        <ul class="">
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.products-discounts']) }}" href="{{ route('seller.products-discounts') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Discount Products') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.coupon.index']) }}" href="{{ route('seller.coupon.index') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Coupon') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0" href="#">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Discounts orders') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0" href="#">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Discounts Planns') }}
                    </label>
                </a>
            </li>
        </ul>
    </div>
</div>
