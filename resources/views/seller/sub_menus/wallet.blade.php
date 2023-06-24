<div class="top_sub_menu_icons">
    <div class="content-sub-menu d-flex">
        <ul class="">
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.money_withdraw_requests.index']) }}" href="{{ route('seller.money_withdraw_requests.index') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Total Balance') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.payments.index']) }}" href="{{ route('seller.payments.index') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Payments History') }}
                    </label>
                </a>
            </li>
        </ul>
    </div>
</div>
