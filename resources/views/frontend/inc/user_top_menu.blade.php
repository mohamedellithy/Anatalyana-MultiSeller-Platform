<div class="top_menu_icons">
    <div class="content-menu-icons d-flex">
        <ul>
            <li class="list-menu-topbar {{ areActiveRoutes(['seller.orders.index','seller.orders.show']) }}">
                <a class="icon-menu-topbar mb-2" data-color="#878787" href="{{ route('seller.orders.index') }}">
                    <div class="mb-1" style="background-color: #878787;border-color:rgba(255, 255, 255, 0.5">
                        <svg  viewBox="0 0 27 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.1417 2.02917C21.1417 4.34792 19.2459 6.24375 16.9271 6.24375H10.073C7.75422 6.24375 5.85839 4.34792 5.85839 2.02917C5.85839 1.2125 4.98339 0.702084 4.25422 1.08125C2.19797 2.175 0.797974 4.34792 0.797974 6.84167V20.5646C0.797974 24.1521 3.72922 27.0833 7.31672 27.0833H19.6834C23.2709 27.0833 26.2021 24.1521 26.2021 20.5646V6.84167C26.2021 4.34792 24.8021 2.175 22.7459 1.08125C22.0167 0.702084 21.1417 1.2125 21.1417 2.02917ZM18.3709 13.5646L12.5376 19.3979C12.3188 19.6167 12.0417 19.7188 11.7646 19.7188C11.4876 19.7188 11.2105 19.6167 10.9917 19.3979L8.80422 17.2104C8.38131 16.7875 8.38131 16.0875 8.80422 15.6646C9.22714 15.2417 9.92714 15.2417 10.3501 15.6646L11.7646 17.0792L16.8251 12.0188C17.248 11.5958 17.948 11.5958 18.3709 12.0188C18.7938 12.4417 18.7938 13.1417 18.3709 13.5646Z" fill="white" fill-opacity="0.8"/>
                        </svg>
                    </div>
                    <label class="fs-14 text-dark fw-400" style="border-color: {{  StyleActiveMenu(['seller.orders.index'],'#878787') }}">
                        {{ translate('Order') }}
                    </label>
                </a>
            </li>
            @if (get_setting('conversation_system') == 1)
                @auth
                    @php
                            $conversation = \App\Models\Conversation::where('sender_id', Auth::user()->id)
                                ->where('sender_viewed', 0)
                                ->get();
                    @endphp
                @endauth
                <li class="list-menu-topbar {{ areActiveRoutes(['seller.conversations.index']) }}">
                    <a class="icon-menu-topbar mb-2" href="{{ route('seller.conversations.index') }}" data-color="#FFC700">
                        <div class="mb-1" style="background-color:#FFC700;border-color:rgba(255, 255, 255, 0.5">
                            <svg  viewBox="0 0 31 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.7033 0.375C24.6589 0.375 26.5402 1.14792 27.9241 2.53479C29.3095 3.91875 30.0839 5.78542 30.0839 7.73958V19.2604C30.0839 23.3292 26.7735 26.625 22.7033 26.625H8.2964C4.22619 26.625 0.917236 23.3292 0.917236 19.2604V7.73958C0.917236 3.67083 4.21161 0.375 8.2964 0.375H22.7033ZM25.0235 9.9125L25.1402 9.79583C25.4887 9.37292 25.4887 8.76042 25.1241 8.3375C24.9214 8.12021 24.6429 7.9875 24.3527 7.95833C24.0464 7.94229 23.7547 8.04583 23.5345 8.25L16.9589 13.5C16.1131 14.2015 14.9012 14.2015 14.0422 13.5L7.47974 8.25C7.0262 7.91458 6.39911 7.95833 6.0214 8.35208C5.62765 8.74583 5.5839 9.37292 5.91786 9.81042L6.1089 10L12.7443 15.1771C13.561 15.8187 14.5512 16.1687 15.5881 16.1687C16.622 16.1687 17.6297 15.8187 18.4449 15.1771L25.0235 9.9125Z" fill="white" fill-opacity="0.8"/>
                            </svg>
                        </div>
                        <label class="fs-14 text-dark fw-400" style="border-color: {{  StyleActiveMenu(['seller.conversations.index'],'#FFC700') }}">
                            {{ translate('Messages') }}
                        </label>
                    </a>
                </li>
            @endif
            <li class="list-menu-topbar {{ areActiveRoutes(['seller.money_withdraw_requests.index','seller.payments.index']) }}">
                <a class="icon-menu-topbar mb-2" href="{{ route('seller.money_withdraw_requests.index') }}" data-color="#2C4067">
                    <div class="mb-1" style="background-color:#2C4067;border-color:rgba(255, 255, 255, 0.5">
                        <svg viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M25.9129 12.2235H32.0833C32.0833 7.2692 29.1148 4.375 24.0851 4.375H10.9148C5.88514 4.375 2.91663 7.2692 2.91663 12.1603V22.8397C2.91663 27.7308 5.88514 30.625 10.9148 30.625H24.0851C29.1148 30.625 32.0833 27.7308 32.0833 22.8397V22.3848H25.9129C23.0492 22.3848 20.7277 20.1214 20.7277 17.3294C20.7277 14.5374 23.0492 12.274 25.9129 12.274V12.2235ZM25.9129 14.3973H30.9944C31.5958 14.3973 32.0833 14.8726 32.0833 15.4589V19.1493C32.0763 19.7328 31.5929 20.2041 30.9944 20.2109H26.0296C24.5798 20.23 23.3121 19.2622 22.9833 17.8855C22.8186 17.0308 23.0498 16.1489 23.6149 15.4761C24.1799 14.8033 25.0211 14.4084 25.9129 14.3973ZM26.1333 18.2773H26.6129C27.2286 18.2773 27.7277 17.7906 27.7277 17.1904C27.7277 16.5901 27.2286 16.1035 26.6129 16.1035H26.1333C25.8388 16.1001 25.5552 16.2118 25.3458 16.4136C25.1363 16.6154 25.0185 16.8906 25.0185 17.1777C25.0184 17.7801 25.5155 18.2703 26.1333 18.2773ZM9.82589 12.2235H18.0574C18.6731 12.2235 19.1722 11.7368 19.1722 11.1366C19.1722 10.5363 18.6731 10.0497 18.0574 10.0497H9.82589C9.21522 10.0496 8.71817 10.5286 8.71107 11.1239C8.71103 11.7263 9.2081 12.2165 9.82589 12.2235Z" fill="white" fill-opacity="0.8"/>
                        </svg>
                    </div>
                    <label class="fs-14 text-dark fw-400"  style="border-color: {{  StyleActiveMenu(['seller.payments.index'],'#2C4067') }}">
                        {{ translate('Wallet') }}
                    </label>
                </a>
            </li>
            @if(Module::isModuleEnabled('Agencies'))
                <li class="list-menu-topbar {{ areActiveRoutes(['seller.agencies','seller.create-agency-country','seller.agency-info','seller.agents-show','seller.edit-agency-country','seller.agent-details']) }} ">
                    <a class="icon-menu-topbar mb-2" href="{{ route('seller.agencies') }}" data-color="#732459">
                        <div class="mb-1" style="background-color:#732459;border-color:rgba(255, 255, 255, 0.5">
                            <svg viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M32.0833 30.9896H30.2604V16.0417C30.2604 12.5125 28.3208 10.5729 24.7916 10.5729H18.5937V8.77918C19.4395 8.98334 20.2854 9.10001 21.1458 9.10001C22.5166 9.10001 23.8875 8.83751 25.2 8.31251C25.6083 8.15209 25.8854 7.74376 25.8854 7.29168V2.91668C25.8854 2.55209 25.7104 2.21668 25.4041 2.01251C25.0979 1.80834 24.7187 1.76459 24.3833 1.89584C22.2979 2.72709 19.9937 2.72709 17.9083 1.89584C17.5729 1.76459 17.1937 1.80834 16.8875 2.01251C16.5812 2.21668 16.4062 2.55209 16.4062 2.91668V7.29168V10.5729H10.2083C6.67913 10.5729 4.73954 12.5125 4.73954 16.0417V30.9896H2.91663C2.31871 30.9896 1.82288 31.4854 1.82288 32.0833C1.82288 32.6813 2.31871 33.1771 2.91663 33.1771H5.83329H29.1666H32.0833C32.6812 33.1771 33.177 32.6813 33.177 32.0833C33.177 31.4854 32.6812 30.9896 32.0833 30.9896ZM10.5583 30.9896H6.92704V18.5938H10.5583V30.9896ZM16.3916 30.9896H12.7458V18.5938H16.3916V30.9896ZM22.225 30.9896H18.5791V18.5938H22.225V30.9896ZM28.0729 30.9896H24.4125V18.5938H28.0729V30.9896Z" fill="white" fill-opacity="0.8"/>
                            </svg>
                        </div>
                        <label class="fs-14 text-dark fw-400" style="border-color: {{  StyleActiveMenu(['seller.agencies'],'#732459') }}">
                            {{ translate('Agencies') }}
                        </label>
                    </a>
                </li>
            @endif
            <li class="list-menu-topbar {{ areActiveRoutes(['seller.products','seller.products.create','seller.digitalproducts.create','seller.reviews','seller.product_bulk_upload.index','seller.products.edit']) }}">
                <a class="icon-menu-topbar mb-2" href="{{ route('seller.products') }}" data-color="#475CC7">
                    <div class="mb-1" style="background-color:#475CC7;border-color:rgba(255, 255, 255, 0.5">
                        <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M25.7051 20.1166H31.4714C32.3457 20.1166 33.0327 19.3938 33.0327 18.5221C33.0327 17.6291 32.3457 16.9275 31.4714 16.9275H25.7051C24.8308 16.9275 24.1438 17.6291 24.1438 18.5221C24.1438 19.3938 24.8308 20.1166 25.7051 20.1166ZM38.3203 9.06323C39.5901 9.06323 40.4228 9.5097 41.2555 10.4877C42.0882 11.4657 42.2339 12.8689 42.0465 14.1424L40.0689 28.0893C39.6942 30.7703 37.4459 32.7454 34.8022 32.7454H12.0907C9.32203 32.7454 7.03214 30.579 6.80316 27.7726L4.88798 4.59637L1.7446 4.0436C0.911914 3.89477 0.329035 3.06561 0.474755 2.21519C0.620474 1.34563 1.43234 0.769466 2.28584 0.899156L7.25072 1.66241C7.95851 1.7921 8.47893 2.38527 8.54138 3.10813L8.93691 7.87051C8.99936 8.55297 9.54061 9.06323 10.2068 9.06323H38.3203ZM11.7572 36.1057C10.0086 36.1057 8.59301 37.5514 8.59301 39.3373C8.59301 41.1019 10.0086 42.5476 11.7572 42.5476C13.485 42.5476 14.9006 41.1019 14.9006 39.3373C14.9006 37.5514 13.485 36.1057 11.7572 36.1057ZM35.1765 36.1057C33.4278 36.1057 32.0123 37.5514 32.0123 39.3373C32.0123 41.1019 33.4278 42.5476 35.1765 42.5476C36.9043 42.5476 38.3198 41.1019 38.3198 39.3373C38.3198 37.5514 36.9043 36.1057 35.1765 36.1057Z" fill="white" fill-opacity="0.8"/>
                        </svg>
                    </div>
                    <label class="fs-14 text-dark fw-400" style="border-color: {{  StyleActiveMenu(['seller.products'],'#475CC7') }}">
                        {{ translate('Products') }}
                    </label>
                </a>
            </li>
            <li class="list-menu-topbar {{ areActiveRoutes(['home']) }}">
                <a class="icon-menu-topbar mb-2" href="{{ route('home') }}"  data-color="#F97600">
                    <div class="mb-1 " style="background-color:#F97600;border-color:rgba(255, 255, 255, 0.5">
                        <svg class="" viewBox="0 0 38 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d_139_713)">
                            <path d="M30.725 10.4459L22.325 4.56877C20.0354 2.9646 16.5209 3.0521 14.3188 4.75835L7.01252 10.4604C5.55418 11.5979 4.4021 13.9313 4.4021 15.7688V25.8313C4.4021 29.55 7.42085 32.5834 11.1396 32.5834H26.8604C30.5792 32.5834 33.5979 29.5646 33.5979 25.8459V15.9584C33.5979 13.9896 32.3292 11.5688 30.725 10.4459ZM20.0938 26.75C20.0938 27.3479 19.5979 27.8438 19 27.8438C18.4021 27.8438 17.9063 27.3479 17.9063 26.75V22.375C17.9063 21.7771 18.4021 21.2813 19 21.2813C19.5979 21.2813 20.0938 21.7771 20.0938 22.375V26.75Z" fill="white" fill-opacity="0.8" shape-rendering="crispEdges"/>
                            </g>
                            <defs>
                            <filter id="filter0_d_139_713" x="0.4021" y="3.41998" width="37.1958" height="37.1634" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset dy="4"/>
                            <feGaussianBlur stdDeviation="2"/>
                            <feComposite in2="hardAlpha" operator="out"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.5 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_139_713"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_139_713" result="shape"/>
                            </filter>
                            </defs>
                        </svg>
                    </div>
                    <label class="fs-14 text-dark fw-400" style="border-color: {{  StyleActiveMenu(['home'],'#F97600') }}">
                        {{ translate('Home') }}
                    </label>
                </a>
            </li>
            <li class="list-menu-topbar {{ areActiveRoutes(['seller.dashboard','seller.analytics-orders','seller.analytics-sales','seller.analytics-products']) }}">
                <a class="icon-menu-topbar mb-2" href="{{ route('seller.dashboard',['analytics_type' => 'reviews']) }}" data-color="#5D47B4">
                    <div class="mb-1" style="background-color:#5D47B4;border-color:rgba(255, 255, 255, 0.5">
                        <svg viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32.0834 32.0833H2.91675C2.31883 32.0833 1.823 31.5875 1.823 30.9896C1.823 30.3917 2.31883 29.8958 2.91675 29.8958H32.0834C32.6813 29.8958 33.1772 30.3917 33.1772 30.9896C33.1772 31.5875 32.6813 32.0833 32.0834 32.0833Z" fill="white" fill-opacity="0.8"/>
                            <path d="M14.2188 5.83332V32.0833H20.7812V5.83332C20.7812 4.22916 20.125 2.91666 18.1562 2.91666H16.8438C14.875 2.91666 14.2188 4.22916 14.2188 5.83332Z" fill="white" fill-opacity="0.8"/>
                            <path d="M4.375 14.5833V32.0833H10.2083V14.5833C10.2083 12.9792 9.625 11.6667 7.875 11.6667H6.70833C4.95833 11.6667 4.375 12.9792 4.375 14.5833Z" fill="white" fill-opacity="0.8"/>
                            <path d="M24.7917 21.875V32.0833H30.6251V21.875C30.6251 20.2708 30.0417 18.9583 28.2917 18.9583H27.1251C25.3751 18.9583 24.7917 20.2708 24.7917 21.875Z" fill="white" fill-opacity="0.8"/>
                        </svg>
                    </div>
                    <label class="fs-14 text-dark fw-400" style="border-color: {{  StyleActiveMenu(['seller.dashboard'],'#5D47B4') }}">
                        {{ translate('Analytics') }}
                    </label>
                </a>
            </li>
            <li class="list-menu-topbar {{ areActiveRoutes(['dashboard','seller.landing-shipping','seller.air-shipping','seller.sea-shipping','seller.working-on-shipping','seller.all-shippings','seller.shippings-to-your-place','pay-on-delivery']) }}">
                <a class="icon-menu-topbar mb-2" href="{{ route('dashboard') }}" data-color="#1E5864">
                    <div class="mb-1" style="background-color:#1E5864;border-color:rgba(255, 255, 255, 0.5">
                        <svg class="" viewBox="0 0 38 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d_139_713)">
                            <path d="M30.725 10.4459L22.325 4.56877C20.0354 2.9646 16.5209 3.0521 14.3188 4.75835L7.01252 10.4604C5.55418 11.5979 4.4021 13.9313 4.4021 15.7688V25.8313C4.4021 29.55 7.42085 32.5834 11.1396 32.5834H26.8604C30.5792 32.5834 33.5979 29.5646 33.5979 25.8459V15.9584C33.5979 13.9896 32.3292 11.5688 30.725 10.4459ZM20.0938 26.75C20.0938 27.3479 19.5979 27.8438 19 27.8438C18.4021 27.8438 17.9063 27.3479 17.9063 26.75V22.375C17.9063 21.7771 18.4021 21.2813 19 21.2813C19.5979 21.2813 20.0938 21.7771 20.0938 22.375V26.75Z" fill="white" fill-opacity="0.8" shape-rendering="crispEdges"/>
                            </g>
                            <defs>
                            <filter id="filter0_d_139_713" x="0.4021" y="3.41998" width="37.1958" height="37.1634" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset dy="4"/>
                            <feGaussianBlur stdDeviation="2"/>
                            <feComposite in2="hardAlpha" operator="out"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.5 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_139_713"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_139_713" result="shape"/>
                            </filter>
                            </defs>
                        </svg>
                    </div>
                    <label class="fs-14 text-dark fw-400" style="border-color: {{  StyleActiveMenu(['seller.index'],'#1E5864') }}">
                        {{ translate('Dashboard') }}
                    </label>
                </a>
            </li>
            @if (get_setting('coupon_system') == 1)
                <li class="list-menu-topbar {{ areActiveRoutes(['seller.coupon.index','seller.products-discounts']) }}">
                    <a class="icon-menu-topbar mb-2" href="{{ route('seller.products-discounts') }}" data-color="#FF0000">
                        <div class="mb-1" style="background-color:#FF0000;border-color:rgba(255, 255, 255, 0.5">
                            <svg viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.2563 4.19999L13.4167 3.12082C7.71465 2.23124 5.07507 4.15624 4.1709 9.85833L3.09174 16.6979C2.5084 20.4312 3.1209 22.8521 5.23549 24.325C6.34382 25.1125 7.86049 25.6375 9.82923 25.9437L16.6688 27.0229C22.3709 27.9125 25.0105 25.9875 25.9147 20.2854L26.9792 13.4458C27.1542 12.3229 27.2272 11.3167 27.1688 10.4271C26.9792 6.78124 24.8355 4.91457 20.2563 4.19999ZM12.0167 13.6354C10.3105 13.6354 8.92507 12.25 8.92507 10.5583C8.92507 8.85207 10.3105 7.46666 12.0167 7.46666C13.7084 7.46666 15.0938 8.85207 15.0938 10.5583C15.0938 12.25 13.7084 13.6354 12.0167 13.6354Z" fill="white" fill-opacity="0.8"/>
                                <path d="M29.8959 19.6438L27.7084 26.2208C25.8854 31.7042 22.9688 33.1625 17.4854 31.3396L10.9083 29.1521C8.8521 28.4667 7.3646 27.6208 6.4021 26.5563C7.32085 26.9208 8.38543 27.1979 9.59585 27.3875L16.45 28.4667C17.3833 28.6125 18.2584 28.6854 19.075 28.6854C23.8875 28.6854 26.4688 26.0896 27.3584 20.5042L28.4229 13.6646C28.5688 12.8188 28.6271 12.075 28.6271 11.3896C30.8438 13.2125 31.1646 15.8083 29.8959 19.6438Z" fill="white" fill-opacity="0.8"/>
                            </svg>
                        </div>
                        <label class="fs-14 text-dark fw-400" style="border-color: {{  StyleActiveMenu(['seller.coupon.index','seller.products-discounts'],'#FF0000') }}">
                            {{ translate('Discounts') }}
                        </label>
                    </a>
                </li>
            @endif
            @if(Module::isModuleEnabled('Meetings'))
                <li class="list-menu-topbar {{ areActiveRoutes(['meetings.appointments.index','meetings.appointments.create','meetings.appointments.edit','meetings.appointments.shop','meetings.appointments.booked','meetings.appointments.ended_booked']) }}">
                    <a class="icon-menu-topbar mb-2" href="{{ route('meetings.appointments.index') }}" data-color="#2A5E98">
                        <div class="mb-1" style="background-color:#2A5E98;border-color:rgba(255, 255, 255, 0.5">
                            <svg  viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M30.8437 8.99793C30.2458 8.67709 28.9916 8.34168 27.2853 9.53751L25.1416 11.0542C24.9812 6.51876 23.0124 4.73959 18.2291 4.73959H9.47909C4.49159 4.73959 2.552 6.67918 2.552 11.6667V23.3333C2.552 26.6875 4.37492 30.2604 9.47909 30.2604H18.2291C23.0124 30.2604 24.9812 28.4813 25.1416 23.9458L27.2853 25.4625C28.1895 26.1042 28.977 26.3083 29.6041 26.3083C30.1437 26.3083 30.5666 26.1479 30.8437 26.0021C31.4416 25.6958 32.4478 24.8646 32.4478 22.7792V12.2208C32.4478 10.1354 31.4416 9.30418 30.8437 8.99793ZM16.0416 16.5958C14.5395 16.5958 13.2999 15.3708 13.2999 13.8542C13.2999 12.3375 14.5395 11.1125 16.0416 11.1125C17.5437 11.1125 18.7833 12.3375 18.7833 13.8542C18.7833 15.3708 17.5437 16.5958 16.0416 16.5958Z" fill="white" fill-opacity="0.8"/>
                            </svg>
                        </div>
                        <label class="fs-14 text-dark fw-400" style="border-color: {{  StyleActiveMenu(['seller.index'],'#2A5E98') }}">
                            {{ translate('Meeting') }}
                        </label>
                    </a>
                </li>
            @endif
            <li class="list-menu-topbar">
                <a class="icon-menu-topbar mb-2" href="#" data-color="#9F2878">
                    <div class="mb-1 " style="background-color:#9F2878;border-color:rgba(255, 255, 255, 0.5">
                        <svg class="" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.7709 2.91666C9.12925 2.91666 2.91675 9.12916 2.91675 16.7708C2.91675 24.4125 9.12925 30.625 16.7709 30.625C24.4126 30.625 30.6251 24.4125 30.6251 16.7708C30.6251 9.12916 24.4126 2.91666 16.7709 2.91666ZM16.7709 20.0521H12.3959C11.798 20.0521 11.3022 19.5562 11.3022 18.9583C11.3022 18.3604 11.798 17.8646 12.3959 17.8646H16.7709C17.3688 17.8646 17.8647 18.3604 17.8647 18.9583C17.8647 19.5562 17.3688 20.0521 16.7709 20.0521ZM21.1459 15.6771H12.3959C11.798 15.6771 11.3022 15.1812 11.3022 14.5833C11.3022 13.9854 11.798 13.4896 12.3959 13.4896H21.1459C21.7438 13.4896 22.2397 13.9854 22.2397 14.5833C22.2397 15.1812 21.7438 15.6771 21.1459 15.6771Z" fill="white" fill-opacity="0.8"/>
                            <path d="M31.0632 32.0813C30.8007 32.0813 30.5382 31.9792 30.3486 31.7896L27.6361 29.0771C27.2424 28.6834 27.2424 28.0417 27.6361 27.6334C28.0299 27.2396 28.6715 27.2396 29.0799 27.6334L31.7924 30.3459C32.1861 30.7396 32.1861 31.3813 31.7924 31.7896C31.5882 31.9792 31.3257 32.0813 31.0632 32.0813Z" fill="white" fill-opacity="0.8"/>
                        </svg>
                    </div>
                    <label class="fs-14 text-dark fw-400" style="border-color: {{  StyleActiveMenu(['seller.index'],'#9F2878') }}">
                        {{ translate('Consulting') }}
                    </label>
                </a>
            </li>
        </ul>
    </div>
</div><!-- .aiz-topbar -->

