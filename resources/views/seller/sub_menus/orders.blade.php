<div class="top_sub_menu_icons">
    <div class="content-sub-menu d-flex">
        <ul class="">
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ request()->query('delivery_status') =='pending' ? 'active main' : '' }} " href="{{ route('seller.orders.index',['delivery_status' => 'pending']) }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('New Orders') }}
                    </label>
                </a>
            </li>

            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ request()->query('delivery_status') =='cancelled' ? 'active main' : '' }} " href="{{ route('seller.orders.index',['delivery_status' => 'cancelled']) }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Cancelled Orders') }}
                    </label>
                </a>
            </li>

            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ request()->query('delivery_status') =='confirmed' ? 'active main' : '' }}" href="{{ route('seller.orders.index',['delivery_status' => 'confirmed']) }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Confirmed Orders') }}
                    </label>
                </a>
            </li>

            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ request()->query('delivery_status') =='on_delivery' ? 'active main' : '' }}" href="{{ route('seller.orders.index',['delivery_status' => 'on_delivery']) }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('On Delivery Orders') }}
                    </label>
                </a>
            </li>

            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ request()->query('delivery_status') =='delivered' ? 'active main' : '' }}" href="{{ route('seller.orders.index',['delivery_status' => 'delivered']) }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Deliveried Orders') }}
                    </label>
                </a>
            </li>

        </ul>
    </div>
</div>
