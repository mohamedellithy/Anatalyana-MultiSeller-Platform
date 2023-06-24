<div class="top_sub_menu_icons">
    <div class="content-sub-menu d-flex">
        <ul class="">
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0" href="#">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Messages') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.conversations.index']) }}" href="{{ route('seller.conversations.index') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Product Conversations') }}
                    </label>
                </a>
            </li>

        </ul>
    </div>
</div>
