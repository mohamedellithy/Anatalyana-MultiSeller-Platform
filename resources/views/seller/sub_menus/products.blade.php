<div class="top_sub_menu_icons">
    <div class="content-sub-menu d-flex">
        <ul class="">
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.products','seller.products.edit']) }}" href="{{ route('seller.products') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('all Products') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.products.create']) }}" href="{{ route('seller.products.create') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('add real Products') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.digitalproducts.create']) }}" href="{{ route('seller.digitalproducts.create')}}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('add digital Products') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.product_bulk_upload.index']) }}" href="{{ route('seller.product_bulk_upload.index') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Import Products') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.reviews']) }}" href="{{ route('seller.reviews') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Products Reviews') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0" href="#">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Products comments') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0" href="#">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('add Catalog') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0" href="#">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('add Service') }}
                    </label>
                </a>
            </li>
        </ul>
    </div>
</div>
