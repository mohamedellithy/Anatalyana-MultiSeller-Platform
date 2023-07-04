<div class="aiz-topbar px-15px px-lg-25px d-flex align-items-stretch justify-content-between">
    <div class="d-flex justify-content-between align-items-stretch flex-grow-xl-1">
        <div class="d-flex justify-content-around align-items-center align-items-stretch">
            <div class="d-flex justify-content-around align-items-center align-items-stretch">
                <div class="aiz-topbar-item">
                    <div class="d-flex align-items-center">
                        <a class="logo-anatalyana" href="{{ route('home')}}" target="_blank" title="{{ translate('Browse Website') }}">
                            <img style="width:100%" src="{{ static_asset('assets/img/anatalyana.png') }}"/>
                        </a>
                    </div>
                </div>
            </div>
            @if (addon_is_activated('pos_system'))
                <div class="d-flex justify-content-around align-items-center align-items-stretch ml-3">
                    <div class="aiz-topbar-item">
                        <div class="d-flex align-items-center">
                            <a class="btn btn-icon btn-circle btn-light" href="{{ route('poin-of-sales.seller_index') }}" target="_blank" title="{{ translate('POS') }}">
                                <i class="las la-print"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-around align-items-center align-items-stretch">
            <div class="d-flex justify-content-around align-items-center align-items-stretch">
                <div class="aiz-topbar-item">
                    <div class="d-flex align-items-center">
                        <div class="aiz-search-form position-relative">
                            <input class="form-control" placeholder="search"/>
                            <span class="position-absolute aiz-search-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="11.7666" cy="11.7666" r="8.98856" stroke="#929292" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M18.0183 18.4851L21.5423 22" stroke="#929292" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-around align-items-center align-items-stretch container-notifications-topbar">
            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex">
                    <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="btn btn-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_196_2300)">
                                <path d="M12 7.71428V5.14285M12 7.71428C10.5771 7.71428 9.42853 7.71428 9.42853 9.42857C9.42853 12 14.5714 12 14.5714 14.5714C14.5714 16.2857 13.4228 16.2857 12 16.2857M12 7.71428C13.4228 7.71428 14.5714 8.36571 14.5714 9.42857M9.42853 14.5714C9.42853 15.8571 10.5771 16.2857 12 16.2857M12 16.2857V18.8571" stroke="#878787" stroke-width="1.71429" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 23.1429C18.154 23.1429 23.1428 18.154 23.1428 12C23.1428 5.84597 18.154 0.857147 12 0.857147C5.84594 0.857147 0.857117 5.84597 0.857117 12C0.857117 18.154 5.84594 23.1429 12 23.1429Z" stroke="#878787" stroke-width="1.71429" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_196_2300">
                                <rect width="24" height="24" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex">
                    <a href="{{ route('seller.shop.index') }}" class="dropdown-toggle no-arrow">
                        <span class="btn btn-icon">
                            @if(areActiveRoutes(['seller.shop.index','seller.setting_payment']) == 'active main')
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.4023 13.5801C20.76 13.7701 21.036 14.0701 21.2301 14.3701C21.6083 14.9901 21.5776 15.7501 21.2097 16.4201L20.4943 17.6201C20.1162 18.2601 19.411 18.6601 18.6855 18.6601C18.3278 18.6601 17.9292 18.5601 17.6022 18.3601C17.3365 18.1901 17.0299 18.1301 16.7029 18.1301C15.6911 18.1301 14.8429 18.9601 14.8122 19.9501C14.8122 21.1001 13.872 22.0001 12.6968 22.0001H11.3069C10.1215 22.0001 9.18125 21.1001 9.18125 19.9501C9.16081 18.9601 8.31259 18.1301 7.30085 18.1301C6.96361 18.1301 6.65702 18.1901 6.40153 18.3601C6.0745 18.5601 5.66572 18.6601 5.31825 18.6601C4.58245 18.6601 3.87729 18.2601 3.49917 17.6201L2.79402 16.4201C2.4159 15.7701 2.39546 14.9901 2.77358 14.3701C2.93709 14.0701 3.24368 13.7701 3.59115 13.5801C3.87729 13.4401 4.06125 13.2101 4.23498 12.9401C4.74596 12.0801 4.43937 10.9501 3.57071 10.4401C2.55897 9.87009 2.23194 8.60009 2.81446 7.61009L3.49917 6.43009C4.09191 5.44009 5.35913 5.09009 6.38109 5.67009C7.27019 6.15009 8.425 5.83009 8.9462 4.98009C9.10972 4.70009 9.20169 4.40009 9.18125 4.10009C9.16081 3.71009 9.27323 3.34009 9.4674 3.04009C9.84553 2.42009 10.5302 2.02009 11.2763 2.00009H12.7172C13.4735 2.00009 14.1582 2.42009 14.5363 3.04009C14.7203 3.34009 14.8429 3.71009 14.8122 4.10009C14.7918 4.40009 14.8838 4.70009 15.0473 4.98009C15.5685 5.83009 16.7233 6.15009 17.6226 5.67009C18.6344 5.09009 19.9118 5.44009 20.4943 6.43009L21.179 7.61009C21.7718 8.60009 21.4447 9.87009 20.4228 10.4401C19.5541 10.9501 19.2475 12.0801 19.7687 12.9401C19.9322 13.2101 20.1162 13.4401 20.4023 13.5801ZM9.10972 12.0101C9.10972 13.5801 10.4076 14.8301 12.0121 14.8301C13.6165 14.8301 14.8838 13.5801 14.8838 12.0101C14.8838 10.4401 13.6165 9.18009 12.0121 9.18009C10.4076 9.18009 9.10972 10.4401 9.10972 12.0101Z" fill="#F97600"/>
                                </svg>
                            @else
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8067 7.62358L20.1842 6.54349C19.6577 5.62957 18.4907 5.31429 17.5755 5.83869V5.83869C17.1399 6.09531 16.6201 6.16812 16.1307 6.04106C15.6413 5.91399 15.2226 5.59749 14.9668 5.16134C14.8023 4.88412 14.7139 4.56836 14.7105 4.24601V4.24601C14.7254 3.72919 14.5304 3.22837 14.17 2.85764C13.8096 2.48691 13.3145 2.27783 12.7975 2.27805H11.5435C11.037 2.27804 10.5513 2.47988 10.194 2.83891C9.83669 3.19795 9.63717 3.68456 9.63961 4.19109V4.19109C9.6246 5.23689 8.77248 6.07678 7.72657 6.07667C7.40421 6.07332 7.08846 5.98491 6.81123 5.82038V5.82038C5.89606 5.29598 4.72911 5.61126 4.20254 6.52519L3.53435 7.62358C3.00841 8.53636 3.3194 9.70258 4.23 10.2323V10.2323C4.8219 10.574 5.18653 11.2056 5.18653 11.889C5.18653 12.5725 4.8219 13.204 4.23 13.5458V13.5458C3.32056 14.0719 3.00923 15.2353 3.53435 16.1453V16.1453L4.16593 17.2346C4.41265 17.6798 4.8266 18.0083 5.31619 18.1474C5.80578 18.2866 6.33064 18.2249 6.77462 17.976V17.976C7.21108 17.7213 7.73119 17.6515 8.21934 17.7822C8.70749 17.9128 9.12324 18.233 9.37416 18.6716C9.5387 18.9489 9.62711 19.2646 9.63046 19.587V19.587C9.63046 20.6435 10.487 21.5 11.5435 21.5H12.7975C13.8505 21.5 14.7055 20.6491 14.7105 19.5961V19.5961C14.7081 19.088 14.9089 18.6 15.2682 18.2407C15.6275 17.8814 16.1155 17.6806 16.6236 17.6831C16.9452 17.6917 17.2596 17.7797 17.5389 17.9394V17.9394C18.4517 18.4653 19.6179 18.1543 20.1476 17.2437V17.2437L20.8067 16.1453C21.0618 15.7075 21.1318 15.186 21.0012 14.6963C20.8706 14.2067 20.5502 13.7893 20.111 13.5366V13.5366C19.6718 13.2839 19.3514 12.8665 19.2208 12.3769C19.0902 11.8873 19.1603 11.3658 19.4154 10.9279C19.5812 10.6383 19.8214 10.3982 20.111 10.2323V10.2323C21.0161 9.70286 21.3264 8.54346 20.8067 7.63274V7.63274V7.62358Z" stroke="#878787" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="12.1751" cy="11.889" r="2.63616" stroke="#878787" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            @endif
                        </span>
                    </a>
                </div>
            </div>
            {{-- language --}}
            @php
                if(Session::has('locale')){
                    $locale = Session::get('locale', Config::get('app.locale'));
                }
                else{
                    $locale = env('DEFAULT_LANGUAGE');
                }
            @endphp
            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown " id="lang-change">
                    <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="btn btn-icon position-relative">
                            <span class="position-relative circle-languages">
                                {{ strtoUpper(substr($locale,0,1)) }}
                            </span>
                            {{-- <img src="{{ static_asset('assets/img/flags/'.$locale.'.png') }}" height="11"> --}}
                            <svg class="position-absolute svg-circle-languages" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.8334 7.08334L10 12.9167L4.16669 7.08334" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-xs">

                        @foreach (\App\Models\Language::where('status', 1)->get() as $key => $language)
                            <li>
                                <a href="javascript:void(0)" data-flag="{{ $language->code }}" class="dropdown-item @if($locale == $language->code) active @endif">
                                    <img src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}" class="mr-2">
                                    <span class="language">{{ $language->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="aiz-topbar-item aiz-pull-notify ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="btn btn-icon p-0 d-flex justify-content-center align-items-center">
                            <span class="d-flex align-items-center position-relative">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.50083 13.7871V13.5681C3.53295 12.9202 3.7406 12.2925 4.10236 11.7496C4.7045 11.0975 5.1167 10.2983 5.29571 9.43598C5.29571 8.7695 5.29571 8.0935 5.35393 7.42703C5.65469 4.21842 8.82728 2 11.9611 2H12.0387C15.1725 2 18.345 4.21842 18.6555 7.42703C18.7137 8.0935 18.6555 8.7695 18.704 9.43598C18.8854 10.3003 19.2972 11.1019 19.8974 11.7591C20.2618 12.2972 20.4698 12.9227 20.4989 13.5681V13.7776C20.5206 14.648 20.2208 15.4968 19.6548 16.1674C18.907 16.9515 17.8921 17.4393 16.8024 17.5384C13.607 17.8812 10.383 17.8812 7.18762 17.5384C6.09914 17.435 5.08576 16.9479 4.33521 16.1674C3.778 15.4963 3.48224 14.6526 3.50083 13.7871Z" stroke="#878787" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.55493 20.8518C10.0542 21.4784 10.7874 21.884 11.5922 21.9787C12.3971 22.0734 13.2072 21.8495 13.8433 21.3564C14.0389 21.2106 14.2149 21.041 14.3672 20.8518" stroke="#878787" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                @auth
                                    @if(Auth::user()->unreadNotifications->count() > 0)
                                        <span class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right"></span>
                                    @endif
                                @endauth
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg py-0">
                        <div class="p-3 bg-light border-bottom">
                            <h6 class="mb-0">{{ translate('Notifications') }}</h6>
                        </div>
                        <div class="px-3 c-scrollbar-light overflow-auto " style="max-height:300px;">
                            <ul class="list-group list-group-flush">
                                @auth
                                    @forelse(Auth::user()->unreadNotifications->take(20) as $notification)
                                        <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                            <div class="media text-inherit">
                                                <div class="media-body">
                                                    @if($notification->type == 'App\Notifications\OrderNotification')
                                                        <p class="mb-1 text-truncate-2">
                                                            <a href="{{ route('seller.orders.show', encrypt($notification->data['order_id'])) }}">
                                                                {{translate('Order code: ')}} {{$notification->data['order_code']}} {{ translate('has been '. ucfirst(str_replace('_', ' ', $notification->data['status'])))}}
                                                            </a>
                                                        </p>
                                                        <small class="text-muted">
                                                            {{ date("F j Y, g:i a", strtotime($notification->created_at)) }}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <li class="list-group-item">
                                            <div class="py-4 text-center fs-16">
                                                {{ translate('No notification found') }}
                                            </div>
                                        </li>
                                    @endforelse
                                @endauth
                            </ul>
                        </div>
                        <div class="text-center border-top">
                            <a href="{{ route('seller.all-notification') }}" class="text-reset d-block py-2">
                                {{translate('View All Notifications')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- .aiz-topbar-item -->
        </div>
        <div class="d-flex justify-content-around align-items-center align-items-stretch">
            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    @auth
                        <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <span class="d-none d-md-block user-info-topbar">
                                    <span class="d-block fw-500">{{Auth::user()->name}}</span>
                                    <span class="d-block small opacity-60">{{Auth::user()->user_type}}</span>
                                </span>
                                <span class="avatar avatar-sm mr-md-2">
                                    <img
                                        src="{{ uploaded_asset(Auth::user()->avatar_original) }}"
                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';"
                                    >
                                </span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-md">
                            <a href="{{ route('seller.profile.index') }}" class="dropdown-item">
                                <i class="las la-user-circle"></i>
                                <span>{{translate('Profile')}}</span>
                            </a>

                            <a href="{{ route('logout')}}" class="dropdown-item">
                                <i class="las la-sign-out-alt"></i>
                                <span>{{translate('Logout')}}</span>
                            </a>
                        </div>
                    @else
                        <a class="dropdown-toggle no-arrow text-dark"  href="{{ route('user.login') }}">
                            <span class="d-flex align-items-center">
                                <span class="d-none d-md-block user-info-topbar">
                                    <span class="d-block fw-500">{{ translate('Login') }}</span>
                                </span>
                                <span class="avatar avatar-sm mr-md-2">
                                    <span class="size-40px rounded-circle overflow-hidden border d-flex align-items-center justify-content-center nav-user-img">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19.902" height="20.012" viewBox="0 0 19.902 20.012">
                                            <path id="fe2df171891038b33e9624c27e96e367" d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1.006,1.006,0,1,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1,10,10,0,0,0-6.25-8.19ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z" transform="translate(-2.064 -1.995)" fill="#91919b"/>
                                        </svg>
                                    </span>
                                </span>
                            </span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div><!-- .aiz-topbar -->
