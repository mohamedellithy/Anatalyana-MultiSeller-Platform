@php
    if (auth()->user() != null) {
        $user_id = Auth::user()->id;
        $cart = \App\Models\Cart::where('user_id', $user_id)->get();
    } else {
        $temp_user_id = Session()->get('temp_user_id');
        if ($temp_user_id) {
            $cart = \App\Models\Cart::where('temp_user_id', $temp_user_id)->get();
        }
    }

    $cart_added = [];
    if (isset($cart) && count($cart) > 0) {
        $cart_added = $cart->pluck('product_id')->toArray();
    }
@endphp
<div class="aiz-card-box position-relative h-auto bg-white py-4 hov-scale-img">
    @if ($product->auction_product == 0)
        <span class="aiz-card-add-to-favorit">
            <svg onclick="addToWishList({{ $product->id }})"  width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.761 18.8538C8.5904 17.5179 6.57111 15.9456 4.73929 14.1652C3.45144 12.8829 2.47101 11.3198 1.8731 9.59539C0.797144 6.25031 2.05393 2.42083 5.57112 1.28752C7.41961 0.692435 9.43845 1.03255 10.9961 2.20148C12.5543 1.03398 14.5725 0.693978 16.4211 1.28752C19.9383 2.42083 21.2041 6.25031 20.1281 9.59539C19.5302 11.3198 18.5498 12.8829 17.2619 14.1652C15.4301 15.9456 13.4108 17.5179 11.2402 18.8538L11.0051 19L10.761 18.8538Z" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M14.7393 5.05304C15.8046 5.39334 16.5615 6.34974 16.6561 7.47502" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span>
    @endif
    @if ($product->auction_product == 0)
        <!-- wishlisht & compare icons -->
        <div class="absolute-top-right aiz-p-hov-icon">
            <a href="javascript:void(0)" class="hov-svg-white bg-black" onclick="addToCompare({{ $product->id }})"
                data-toggle="tooltip" data-title="{{ translate('Add to compare') }}" data-placement="left">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea"
                        d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z"
                        transform="translate(-2.037 -2.038)" fill="#919199" />
                </svg>
            </a>
        </div>
    @endif
    <div class="aiz-inner-card-box position-relative h-140px h-md-200px img-fit overflow-hidden">
        @php
            $product_url = route('product', $product->slug);
            if ($product->auction_product == 1) {
                $product_url = route('auction-product', $product->slug);
            }
        @endphp
        <!-- Image -->
        <a href="{{ $product_url }}" class="d-block h-100">
            <img class="lazyload mx-auto img-fit has-transition" src="{{ static_asset('assets/img/placeholder.jpg') }}"
                data-src="{{ uploaded_asset($product->thumbnail_img) }}" alt="{{ $product->getTranslation('name') }}"
                title="{{ $product->getTranslation('name') }}"
                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
        </a>
    </div>
    <div class="p-2 p-md-3 text-left">
        <div class="fs-14 d-flex  mt-3 product-info-section">
            <!-- Product name -->
            <h3 class="w-200 fw-400 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px text-left product-name-section">
                <a href="{{ $product_url }}" class="d-block text-reset hov-text-primary"
                    title="{{ $product->getTranslation('name') }}">{{ $product->getTranslation('name') }}</a>
            </h3>
            <a class="w-100 h-35px text-white fs-13 fw-700 text-right align-items-right product-rate-section">
                <label class="fs-14" style="color:black">3.9 (120)</label>
                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.9185 12.3201C15.6595 12.5711 15.5405 12.9341 15.5995 13.2901L16.4885 18.2101C16.5635 18.6271 16.3875 19.0491 16.0385 19.2901C15.6965 19.5401 15.2415 19.5701 14.8685 19.3701L10.4395 17.0601C10.2855 16.9781 10.1145 16.9341 9.93951 16.9291H9.66851C9.57451 16.9431 9.48251 16.9731 9.39851 17.0191L4.96851 19.3401C4.74951 19.4501 4.50151 19.4891 4.25851 19.4501C3.66651 19.3381 3.27151 18.7741 3.36851 18.1791L4.25851 13.2591C4.31751 12.9001 4.19851 12.5351 3.93951 12.2801L0.32851 8.78012C0.0265096 8.48712 -0.0784904 8.04712 0.0595096 7.65012C0.19351 7.25412 0.53551 6.96512 0.94851 6.90012L5.91851 6.17912C6.29651 6.14012 6.62851 5.91012 6.79851 5.57012L8.98851 1.08012C9.04051 0.980122 9.10751 0.888122 9.18851 0.810122L9.27851 0.740122C9.32551 0.688122 9.37951 0.645122 9.43951 0.610122L9.54851 0.570122L9.71851 0.500122H10.1395C10.5155 0.539122 10.8465 0.764122 11.0195 1.10012L13.2385 5.57012C13.3985 5.89712 13.7095 6.12412 14.0685 6.17912L19.0385 6.90012C19.4585 6.96012 19.8095 7.25012 19.9485 7.65012C20.0795 8.05112 19.9665 8.49112 19.6585 8.78012L15.9185 12.3201Z" fill="#FFC700"/>
                </svg>
            </a>
        </div>

        <div class="fs-14 d-flex  mt-3">
            @if ($product->auction_product == 0)
                <!-- Previous price -->
                @if (home_base_price($product) != home_discounted_base_price($product))
                    <div class="disc-amount has-transition">
                        <del class="fw-400 text-secondary mr-1">{{ home_base_price($product) }}</del>
                    </div>
                @endif
                <!-- price -->
                <div class="">
                    <span class="fw-700 text-primary">{{ home_discounted_base_price($product) }}</span>
                </div>
            @endif
            @if ($product->auction_product == 1)
                <!-- Bid Amount -->
                <div class="">
                    <span class="fw-700 text-primary">{{ single_price($product->starting_bid) }}</span>
                </div>
            @endif

            @if ($product->auction_product == 0)
                <!-- add to cart -->
                <a class="w-100 h-35px text-white fs-13 fw-700 d-flex flex-column justify-content-right text-right align-items-right @if (in_array($product->id, $cart_added)) active @endif"
                    href="javascript:void(0)"
                    @if (Auth::check()) onclick="showAddToCartModal({{ $product->id }})" @else onclick="showLoginModal()" @endif>
                    <span><i style="color: black;" class="las la-2x la-shopping-cart"></i></span>
                </a>
            @endif
            @if (
                $product->auction_product == 1 &&
                    $product->auction_start_date <= strtotime('now') &&
                    $product->auction_end_date >= strtotime('now'))
                <!-- Place Bid -->
                @php
                    $highest_bid = $product->bids->max('amount');
                    $min_bid_amount = $highest_bid != null ? $highest_bid + 1 : $product->starting_bid;
                @endphp
                <a class="w-100 h-35px aiz-p-hov-icon text-white fs-13 fw-700 d-flex justify-content-right text-right flex-column align-items-right @if (in_array($product->id, $cart_added)) active @endif"
                    href="javascript:void(0)" onclick="bid_single_modal({{ $product->id }}, {{ $min_bid_amount }})">
                    <span class="cart-btn-text">{{ translate('Place Bid') }}</span>
                    <br>
                    <span><i style="color: black;" class="las la-2x la-gavel"></i></span>
                </a>
            @endif
        </div>
    </div>
</div>
{{-- <div class="aiz-card-box h-auto bg-white py-3 hov-scale-img">
    <div class="position-relative h-140px h-md-200px img-fit overflow-hidden">
        @php
            $product_url = route('product', $product->slug);
            if ($product->auction_product == 1) {
                $product_url = route('auction-product', $product->slug);
            }
        @endphp
        <!-- Image -->
        <a href="{{ $product_url }}" class="d-block h-100">
            <img class="lazyload mx-auto img-fit has-transition" src="{{ static_asset('assets/img/placeholder.jpg') }}"
                data-src="{{ uploaded_asset($product->thumbnail_img) }}" alt="{{ $product->getTranslation('name') }}"
                title="{{ $product->getTranslation('name') }}"
                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
        </a>
        <!-- Discount percentage tag -->
        @if (discount_in_percentage($product) > 0)
            <span class="absolute-top-left bg-primary ml-1 mt-1 fs-11 fw-700 text-white w-35px text-center"
                style="padding-top:2px;padding-bottom:2px;">-{{ discount_in_percentage($product) }}%</span>
        @endif
        <!-- Wholesale tag -->
        @if ($product->wholesale_product)
            <span class="absolute-top-left fs-11 text-white fw-700 px-2 lh-1-8 ml-1 mt-1"
                style="background-color: #455a64; @if (discount_in_percentage($product) > 0) top:25px; @endif">
                {{ translate('Wholesale') }}
            </span>
        @endif
        @if ($product->auction_product == 0)
            <!-- wishlisht & compare icons -->
            <div class="absolute-top-right aiz-p-hov-icon">
                <a href="javascript:void(0)" class="hov-svg-white" onclick="addToWishList({{ $product->id }})"
                    data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.4" viewBox="0 0 16 14.4">
                        <g id="_51a3dbe0e593ba390ac13cba118295e4" data-name="51a3dbe0e593ba390ac13cba118295e4"
                            transform="translate(-3.05 -4.178)">
                            <path id="Path_32649" data-name="Path 32649"
                                d="M11.3,5.507l-.247.246L10.8,5.506A4.538,4.538,0,1,0,4.38,11.919l.247.247,6.422,6.412,6.422-6.412.247-.247A4.538,4.538,0,1,0,11.3,5.507Z"
                                transform="translate(0 0)" fill="#919199" />
                            <path id="Path_32650" data-name="Path 32650"
                                d="M11.3,5.507l-.247.246L10.8,5.506A4.538,4.538,0,1,0,4.38,11.919l.247.247,6.422,6.412,6.422-6.412.247-.247A4.538,4.538,0,1,0,11.3,5.507Z"
                                transform="translate(0 0)" fill="#919199" />
                        </g>
                    </svg>
                </a>
                <a href="javascript:void(0)" class="hov-svg-white" onclick="addToCompare({{ $product->id }})"
                    data-toggle="tooltip" data-title="{{ translate('Add to compare') }}" data-placement="left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea"
                            d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z"
                            transform="translate(-2.037 -2.038)" fill="#919199" />
                    </svg>
                </a>
            </div>
            <!-- add to cart -->
            <a class="cart-btn absolute-bottom-left w-100 h-35px aiz-p-hov-icon text-white fs-13 fw-700 d-flex flex-column justify-content-center align-items-center @if (in_array($product->id, $cart_added)) active @endif"
                href="javascript:void(0)"
                @if (Auth::check()) onclick="showAddToCartModal({{ $product->id }})" @else onclick="showLoginModal()" @endif>
                <span class="cart-btn-text">
                    {{ translate('Add to Cart') }}
                </span>
                <br>
                <span><i class="las la-2x la-shopping-cart"></i></span>
            </a>
        @endif
        @if (
            $product->auction_product == 1 &&
                $product->auction_start_date <= strtotime('now') &&
                $product->auction_end_date >= strtotime('now'))
            <!-- Place Bid -->
            @php
                $highest_bid = $product->bids->max('amount');
                $min_bid_amount = $highest_bid != null ? $highest_bid + 1 : $product->starting_bid;
            @endphp
            <a class="cart-btn absolute-bottom-left w-100 h-35px aiz-p-hov-icon text-white fs-13 fw-700 d-flex flex-column justify-content-center align-items-center @if (in_array($product->id, $cart_added)) active @endif"
                href="javascript:void(0)" onclick="bid_single_modal({{ $product->id }}, {{ $min_bid_amount }})">
                <span class="cart-btn-text">{{ translate('Place Bid') }}</span>
                <br>
                <span><i class="las la-2x la-gavel"></i></span>
            </a>
        @endif
    </div>

    <div class="p-2 p-md-3 text-left">
        <!-- Product name -->
        <h3 class="fw-400 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px text-center">
            <a href="{{ $product_url }}" class="d-block text-reset hov-text-primary"
                title="{{ $product->getTranslation('name') }}">{{ $product->getTranslation('name') }}</a>
        </h3>
        @if(Module::isModuleEnabled('Agencies'))
            @if($product->user->agency)
                @if($product->user->agency->status == 1)
                    <p class="fw-400 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px text-center" title="Become an agent for a company in your country and apply now">
                        <a href="{{ route('agency-show',$product->user->agency->id) }}" style="color:#f7a543">
                            <i class="las la-user-shield"></i>
                            {{ translate('Become an agent for a company in your country and apply now') }}
                        </a>
                    </p>
                @endif
            @endif
        @endif
        <div class="fs-14 d-flex justify-content-center mt-3">
            @if ($product->auction_product == 0)
                <!-- Previous price -->
                @if (home_base_price($product) != home_discounted_base_price($product))
                    <div class="disc-amount has-transition">
                        <del class="fw-400 text-secondary mr-1">{{ home_base_price($product) }}</del>
                    </div>
                @endif
                <!-- price -->
                <div class="">
                    <span class="fw-700 text-primary">{{ home_discounted_base_price($product) }}</span>
                </div>
            @endif
            @if ($product->auction_product == 1)
                <!-- Bid Amount -->
                <div class="">
                    <span class="fw-700 text-primary">{{ single_price($product->starting_bid) }}</span>
                </div>
            @endif
        </div>
    </div>
</div> --}}
