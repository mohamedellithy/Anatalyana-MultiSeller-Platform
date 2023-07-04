@if ($shop->user != null)
    <div class="col text-center border-right border-bottom has-transition hov-shadow-out z-1">
        <div class="position-relative px-3" style="padding-top: 2rem; padding-bottom:2rem;">
            <!-- Shop logo & Verification Status -->
            <div class="position-relative mx-auto size-100px size-md-120px">
                <a href="{{ route('shop.visit', $shop->slug) }}" class="d-flex mx-auto justify-content-center align-item-center size-100px size-md-120px border overflow-hidden hov-scale-img" tabindex="0" style="border: 1px solid #e5e5e5; border-radius: 50%; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.06);">
                    <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                        data-src="{{ uploaded_asset($shop->logo) }}"
                        alt="{{ $shop->name }}"
                        class="img-fit lazyload has-transition"
                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                </a>
                <div class="absolute-top-right z-1 mr-md-2 mt-1 rounded-content bg-white">
                    @if ($shop->verification_status == 1)
                        <svg xmlns="http://www.w3.org/2000/svg" width="24.001" height="24" viewBox="0 0 24.001 24">
                            <g id="Group_25929" data-name="Group 25929" transform="translate(-480 -345)">
                                <circle id="Ellipse_637" data-name="Ellipse 637" cx="12" cy="12" r="12" transform="translate(480 345)" fill="#fff"/>
                                <g id="Group_25927" data-name="Group 25927" transform="translate(480 345)">
                                <path id="Union_5" data-name="Union 5" d="M0,12A12,12,0,1,1,12,24,12,12,0,0,1,0,12Zm1.2,0A10.8,10.8,0,1,0,12,1.2,10.812,10.812,0,0,0,1.2,12Zm1.2,0A9.6,9.6,0,1,1,12,21.6,9.611,9.611,0,0,1,2.4,12Zm5.115-1.244a1.083,1.083,0,0,0,0,1.529l3.059,3.059a1.081,1.081,0,0,0,1.529,0l5.1-5.1a1.084,1.084,0,0,0,0-1.53,1.081,1.081,0,0,0-1.529,0L11.339,13.05,9.045,10.756a1.082,1.082,0,0,0-1.53,0Z" transform="translate(0 0)" fill="#3490f3"/>
                                </g>
                            </g>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="24.001" height="24" viewBox="0 0 24.001 24">
                            <g id="Group_25929" data-name="Group 25929" transform="translate(-480 -345)">
                                <circle id="Ellipse_637" data-name="Ellipse 637" cx="12" cy="12" r="12" transform="translate(480 345)" fill="#fff"/>
                                <g id="Group_25927" data-name="Group 25927" transform="translate(480 345)">
                                <path id="Union_5" data-name="Union 5" d="M0,12A12,12,0,1,1,12,24,12,12,0,0,1,0,12Zm1.2,0A10.8,10.8,0,1,0,12,1.2,10.812,10.812,0,0,0,1.2,12Zm1.2,0A9.6,9.6,0,1,1,12,21.6,9.611,9.611,0,0,1,2.4,12Zm5.115-1.244a1.083,1.083,0,0,0,0,1.529l3.059,3.059a1.081,1.081,0,0,0,1.529,0l5.1-5.1a1.084,1.084,0,0,0,0-1.53,1.081,1.081,0,0,0-1.529,0L11.339,13.05,9.045,10.756a1.082,1.082,0,0,0-1.53,0Z" transform="translate(0 0)" fill="red"/>
                                </g>
                            </g>
                        </svg>
                    @endif
                </div>
            </div>
            <!-- Shop name -->
            <h2 class="fs-14 fw-700 text-dark text-truncate-2 h-40px mt-4 mb-3">
                <a href="{{ route('shop.visit', $shop->slug) }}" class="text-reset hov-text-primary" tabindex="0">{{ $shop->name }}</a>
            </h2>
            <!-- Shop Rating -->
            <div class="rating rating-mr-1 text-dark mb-3">
                {{ renderStarRating($shop->rating) }}
                <span class="opacity-60 fs-14">({{ $shop->num_of_reviews }}
                    {{ translate('Reviews') }})</span>
            </div>
            <!-- Visit Button -->
            <a href="{{ route('shop.visit', $shop->slug) }}" class="btn-visit">
                <span class="circle" aria-hidden="true">
                    <span class="icon arrow"></span>
                </span>
                <span class="button-text">{{ translate('Visit Store') }}</span>
            </a>
            <br/>
            <!-- Meetings  -->
            <a href="{{ route('meetings.appointments.shop', $shop->slug) }}" class="btn-meetings btn btn-primary" style="margin-top:10px">
                <i class="las la-video"></i>
                <span class="button-text">{{ translate('Booking Meeting') }}</span>
            </a>
        </div>
    </div>
@endif