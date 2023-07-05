<div class="top_sub_menu_icons">
    <div class="content-sub-menu d-flex">
        <ul class="">
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.meetings.appointments.setting_zoom_app']) }}" href="{{  route('seller.meetings.appointments.setting_zoom_app') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Setting Zoom Application') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.meetings.appointments.index','seller.meetings.appointments.create','seller.meetings.appointments.edit']) }}" href="{{  route('seller.meetings.appointments.index') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Appointments') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.meetings.appointments.booking_requests','seller.meetings.appointments.booking.edit']) }}" href="{{ route('seller.meetings.appointments.booking_requests') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Booking requests') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.meetings.appointments.lists_booked']) }}" href="{{ route('seller.meetings.appointments.lists_booked') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('Today Meetings') }}
                    </label>
                </a>
            </li>
            <li class="sub_menu_titles">
                <a class="icon-menu-topbar mb-0 {{ areActiveRoutes(['seller.meetings.appointments.lists_expired_booked']) }}" href="{{ route('seller.meetings.appointments.lists_expired_booked') }}">
                    <label class="fs-14  fw-400 mb-0">
                        {{ translate('End Meetings') }}
                    </label>
                </a>
            </li>
        </ul>
    </div>
</div>
