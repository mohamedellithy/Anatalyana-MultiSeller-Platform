<div class="top_sub_menu_icons">
    <div class="content-sub-menu d-flex">
        <ul class="">
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.agencies','seller.agency-info','seller.edit-agency-country']) }}" href="{{  route('seller.agencies') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('all Agencies') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.create-agency-country']) }}" href="{{ route('seller.create-agency-country') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('add new Agency Offer') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.agents-show','seller.agent-details']) }}" href="{{ route('seller.agents-show') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Agent Offers') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 " href="#">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Preview Agency') }}
                    </label>
                </a>
            </li>
        </ul>
    </div>
</div>
