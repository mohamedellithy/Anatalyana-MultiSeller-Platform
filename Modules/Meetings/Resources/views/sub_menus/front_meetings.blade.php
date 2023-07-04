<div class="top_sub_menu_icons">
    <div class="content-sub-menu d-flex">
        <ul class="">
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['meetings.appointments.index','meetings.appointments.shop']) }}" href="{{  route('meetings.appointments.index') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('All Seller Appointments') }}
                    </label>
                </a>
            </li>

            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['meetings.appointments.booked']) }}" href="{{ route('meetings.appointments.booked') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Booked Appointments') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['meetings.appointments.ended_booked']) }}" href="{{ route('meetings.appointments.ended_booked') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Ended Appointments') }}
                    </label>
                </a>
            </li>
        </ul>
    </div>
</div>
