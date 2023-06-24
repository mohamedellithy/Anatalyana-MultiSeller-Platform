@extends('frontend.layouts.app')

@section('content')
    <!-- Sliders & Today's deal -->
    <div class="home-banner-area mb-3" style="">
        <div class="container">
            <div class="d-flex flex-wrap position-relative">
                <!-- Sliders -->
                <div class="home-slider">
                    @if (get_setting('home_slider_images') != null)
                        <div class="aiz-carousel d dots-inside-bottom mobile-img-auto-height" data-arrows="true" data-dots="true" data-autoplay="true" data-infinite="true">
                            @php $slider_images = json_decode(get_setting('home_slider_images'), true);  @endphp
                            @foreach ($slider_images as $key => $value)
                                <div class="carousel-box">
                                    <div class="row inner-carousel-sections">
                                        <div class="col-md-6 section-side">
                                            <a href="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
                                                <!-- Image -->
                                                <img class="d-block mw-100 overflow-hidden "
                                                    src="{{ uploaded_asset($slider_images[$key]) }}"
                                                    alt="{{ env('APP_NAME')}} promo"
                                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                                            </a>
                                        </div>
                                        <div class="col-md-6 section-side inner-slide-right">
                                            <h4>
                                                اشتر من موردين  مميزين
                                                انضم لاكتشاف المنتجات الجديدة والرائجة
                                            </h4>
                                            <a class="btn" href="#">
                                                معرفة المزيد
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products -->
    <div id="section_featured">

    </div>


    <!-- Banner section 1 -->
    @if (get_setting('home_banner1_images') != null)
    <div class="mb-2 mb-md-3 mt-2 mt-md-3">
        <div class="container">
            @php
                $banner_1_imags = json_decode(get_setting('home_banner1_images'));
                $data_md = count($banner_1_imags) >= 2 ? 2 : 1;
            @endphp
            <div class="w-100">
                <div class="aiz-carousel gutters-16 overflow-hidden arrow-inactive-none arrow-dark arrow-x-15" data-items="{{ count($banner_1_imags) }}" data-xxl-items="{{ count($banner_1_imags) }}" data-xl-items="{{ count($banner_1_imags) }}" data-lg-items="{{ $data_md }}" data-md-items="{{ $data_md }}" data-sm-items="1" data-xs-items="1" data-arrows="true" data-dots="false">
                    @foreach ($banner_1_imags as $key => $value)
                        <div class="carousel-box overflow-hidden hov-scale-img">
                            <a href="{{ json_decode(get_setting('home_banner1_links'), true)[$key] }}" class="d-block text-reset overflow-hidden">
                                <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($value) }}"
                                alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload w-100 has-transition" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif


    <!-- Banner Section 2 -->
    @if (get_setting('home_banner2_images') != null)
    <div class="mb-2 mb-md-3 mt-2 mt-md-3">
        <div class="container">
            @php
                $banner_2_imags = json_decode(get_setting('home_banner2_images'));
                $data_md = count($banner_2_imags) >= 2 ? 2 : 1;
            @endphp
            <div class="aiz-carousel gutters-16 overflow-hidden arrow-inactive-none arrow-dark arrow-x-15" data-items="{{ count($banner_2_imags) }}" data-xxl-items="{{ count($banner_2_imags) }}" data-xl-items="{{ count($banner_2_imags) }}" data-lg-items="{{ $data_md }}" data-md-items="{{ $data_md }}" data-sm-items="1" data-xs-items="1" data-arrows="true" data-dots="false">
                @foreach ($banner_2_imags as $key => $value)
                    <div class="carousel-box overflow-hidden hov-scale-img">
                        <a href="{{ json_decode(get_setting('home_banner2_links'), true)[$key] }}" class="d-block text-reset overflow-hidden">
                            <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($value) }}"
                            alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload w-100 has-transition" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- Best Selling  -->
    <div id="section_best_selling"></div>

     <!-- Best Selling  -->
     <div id="section_best_offers"></div>

    <!-- Banner Section 3 -->
    @if (get_setting('home_banner3_images') != null)
    <div class="mb-2 mb-md-3 mt-2 mt-md-3">
        <div class="container">
            @php
                $banner_3_imags = json_decode(get_setting('home_banner3_images'));
                $data_md = count($banner_3_imags) >= 2 ? 2 : 1;
            @endphp
            <div class="aiz-carousel gutters-16 overflow-hidden arrow-inactive-none arrow-dark arrow-x-15" data-items="{{ count($banner_3_imags) }}" data-xxl-items="{{ count($banner_3_imags) }}" data-xl-items="{{ count($banner_3_imags) }}" data-lg-items="{{ $data_md }}" data-md-items="{{ $data_md }}" data-sm-items="1" data-xs-items="1" data-arrows="true" data-dots="false">
                @foreach ($banner_3_imags as $key => $value)
                    <div class="carousel-box overflow-hidden hov-scale-img">
                        <a href="{{ json_decode(get_setting('home_banner3_links'), true)[$key] }}" class="d-block text-reset overflow-hidden">
                            <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($value) }}"
                            alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload w-100 has-transition" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @php
        $flash_deal = \App\Models\FlashDeal::where('status', 1)->where('featured', 1)->first();
    @endphp
    @if($flash_deal != null && strtotime(date('Y-m-d H:i:s')) >= $flash_deal->start_date && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date)
        @php
            $flash_deals = $flash_deal->flash_deal_products->take(10);
        @endphp
        @foreach ($flash_deals as $key => $flash_deal_product)
            <section class="mb-2 mb-md-3 mt-2 mt-md-3">
                <div class="container position-relative container-flash-bg">
                    <div class="row ">
                        <div class="col-md-6 flash-image">
                            <img class="img-fit" style="object-fit: contain;" src="{{ uploaded_asset($flash_deal->banner) }}" />
                        </div>
                        <div class="col-md-6 container-flash">
                            @php
                                $product = \App\Models\Product::find($flash_deal_product->product_id);
                            @endphp
                            @if ($product != null && $product->published != 0)
                                @php
                                    $product_url = route('product', $product->slug);
                                    if($product->auction_product == 1) {
                                        $product_url = route('auction-product', $product->slug);
                                    }
                                @endphp
                                <h4 class="Heading-Flash">
                                    {{ $product->getTranslation('name')  }}
                                </h4>
                                <h6 class="short-description-Flash">
                                    {{ $flash_deal->getTranslation('title') }}
                                </h6>
                                <!-- Price -->
                                <div class="fs-10 text-center flash-deal-price">
                                    <span class="d-block text-primary after-discount-price fw-700">{{ home_discounted_base_price($product) }}</span>
                                    @if(home_base_price($product) != home_discounted_base_price($product))
                                        <del class="d-block fw-400 before-discount-price">{{ home_base_price($product) }}</del>
                                    @endif
                                </div>
                                <br/>
                                <a href="{{ $product_url }}" class="btn go-to-product-flash">
                                    اطلبها الأن
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1213 11.2331H16.8891C17.3088 11.2331 17.6386 10.8861 17.6386 10.4677C17.6386 10.0391 17.3088 9.70236 16.8891 9.70236H14.1213C13.7016 9.70236 13.3719 10.0391 13.3719 10.4677C13.3719 10.8861 13.7016 11.2331 14.1213 11.2331ZM20.1766 5.92749C20.7861 5.92749 21.1858 6.1418 21.5855 6.61123C21.9852 7.08067 22.0551 7.7542 21.9652 8.36549L21.0159 15.06C20.8361 16.3469 19.7569 17.2949 18.4879 17.2949H7.58639C6.25742 17.2949 5.15828 16.255 5.04837 14.908L4.12908 3.7834L2.62026 3.51807C2.22057 3.44664 1.94079 3.04864 2.01073 2.64043C2.08068 2.22305 2.47038 1.94649 2.88006 2.00874L5.2632 2.3751C5.60293 2.43735 5.85274 2.72207 5.88272 3.06905L6.07257 5.35499C6.10254 5.68257 6.36234 5.92749 6.68209 5.92749H20.1766ZM7.42631 18.9079C6.58697 18.9079 5.9075 19.6018 5.9075 20.459C5.9075 21.3061 6.58697 22 7.42631 22C8.25567 22 8.93514 21.3061 8.93514 20.459C8.93514 19.6018 8.25567 18.9079 7.42631 18.9079ZM18.6676 18.9079C17.8282 18.9079 17.1487 19.6018 17.1487 20.459C17.1487 21.3061 17.8282 22 18.6676 22C19.4969 22 20.1764 21.3061 20.1764 20.459C20.1764 19.6018 19.4969 18.9079 18.6676 18.9079Z" fill="black"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class=" position-absolute countdown-circles">
                        <p>
                            The Rest of Time's Offer
                        </p>
                        <div class="aiz-count-down-circle" end-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
                    </div>
                </div>
            </section>
        @endforeach
    @endif


    <section class="container section-circles">
        <div class="row">
            <div class="col-md-4">
                <div class="circle-info">
                    <div class="icon-draw text-center">
                        <svg class="icon" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.8875 23.4378H12.8894C12.8909 23.4378 12.8925 23.4375 12.894 23.4375H34.1406C34.3953 23.4374 34.643 23.3545 34.8462 23.2011C35.0495 23.0478 35.1973 22.8324 35.2673 22.5876L39.9548 6.18133C40.0047 6.00696 40.0133 5.8234 39.9802 5.64511C39.947 5.46682 39.873 5.29865 39.7638 5.15383C39.6546 5.009 39.5132 4.8915 39.3508 4.81059C39.1885 4.72967 39.0095 4.68753 38.8281 4.6875H10.1849L9.34727 0.917656C9.28938 0.657367 9.14447 0.424594 8.93646 0.25776C8.72845 0.0909262 8.46977 3.60131e-06 8.20312 0L1.17188 0C0.524609 0 0 0.524609 0 1.17188C0 1.81914 0.524609 2.34375 1.17188 2.34375H7.2632C7.41148 3.01172 11.272 20.3842 11.4941 21.3836C10.2487 21.925 9.375 23.1669 9.375 24.6094C9.375 26.5478 10.9522 28.125 12.8906 28.125H34.1406C34.7879 28.125 35.3125 27.6004 35.3125 26.9531C35.3125 26.3059 34.7879 25.7812 34.1406 25.7812H12.8906C12.2445 25.7812 11.7188 25.2555 11.7188 24.6094C11.7188 23.9642 12.2427 23.4393 12.8875 23.4378ZM37.2745 7.03125L33.2566 21.0938H13.8306L10.7056 7.03125H37.2745ZM11.7188 31.6406C11.7188 33.5791 13.2959 35.1562 15.2344 35.1562C17.1728 35.1562 18.75 33.5791 18.75 31.6406C18.75 29.7022 17.1728 28.125 15.2344 28.125C13.2959 28.125 11.7188 29.7022 11.7188 31.6406ZM15.2344 30.4688C15.8805 30.4688 16.4062 30.9945 16.4062 31.6406C16.4062 32.2867 15.8805 32.8125 15.2344 32.8125C14.5883 32.8125 14.0625 32.2867 14.0625 31.6406C14.0625 30.9945 14.5883 30.4688 15.2344 30.4688ZM28.2812 31.6406C28.2812 33.5791 29.8584 35.1562 31.7969 35.1562C33.7353 35.1562 35.3125 33.5791 35.3125 31.6406C35.3125 29.7022 33.7353 28.125 31.7969 28.125C29.8584 28.125 28.2812 29.7022 28.2812 31.6406ZM31.7969 30.4688C32.443 30.4688 32.9688 30.9945 32.9688 31.6406C32.9688 32.2867 32.443 32.8125 31.7969 32.8125C31.1508 32.8125 30.625 32.2867 30.625 31.6406C30.625 30.9945 31.1508 30.4688 31.7969 30.4688Z" fill="#F97600"/>
                        </svg>
                    </div>
                    <h4 class="text-center">
                        تسوق بثقة
                    </h4>
                    <p class="description text-center">
                        تسوق واطلب عرضك باسعار متعددة اطلب مباشر مع ارسال سريع
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="circle-info">
                    <div class="icon-draw text-center">
                        <svg class="icon" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M38.75 24.9995C38.06 24.9995 37.5 25.5595 37.5 26.2495V34.9995H2.5V19.9995H16.25C16.94 19.9995 17.5 19.4395 17.5 18.7495C17.5 18.0595 16.94 17.4995 16.25 17.4995H2.5V12.4995H16.25C16.94 12.4995 17.5 11.9395 17.5 11.2495C17.5 10.5595 16.94 9.99951 16.25 9.99951H2.5C1.12 9.99951 0 11.1195 0 12.4995V34.9995C0 36.3795 1.12 37.4995 2.5 37.4995H37.5C38.88 37.4995 40 36.3795 40 34.9995V26.2495C40 25.5595 39.44 24.9995 38.75 24.9995Z" fill="#F97600"/>
                            <path d="M11.25 24.9996H6.25C5.56 24.9996 5 25.5596 5 26.2496C5 26.9396 5.56 27.4996 6.25 27.4996H11.25C11.94 27.4996 12.5 26.9396 12.5 26.2496C12.5 25.5596 11.94 24.9996 11.25 24.9996ZM39.2425 6.34962L30.4925 2.59962C30.3361 2.53403 30.1683 2.50024 29.9988 2.50024C29.8292 2.50024 29.6614 2.53403 29.505 2.59962L20.755 6.34962C20.5307 6.44677 20.3397 6.60741 20.2056 6.81174C20.0714 7.01607 20 7.25518 20 7.49962V12.4996C20 19.3771 22.5425 23.3971 29.3775 27.3346C29.57 27.4446 29.785 27.4996 30 27.4996C30.215 27.4996 30.43 27.4446 30.6225 27.3346C37.4575 23.4071 40 19.3871 40 12.4996V7.49962C40 6.99962 39.7025 6.54712 39.2425 6.34962ZM37.5 12.4996C37.5 18.2721 35.59 21.4496 30 24.7996C24.41 21.4421 22.5 18.2646 22.5 12.4996V8.32462L30 5.10962L37.5 8.32462V12.4996Z" fill="#F97600"/>
                            <path d="M34.5325 10.2721C33.995 9.84714 33.21 9.92964 32.775 10.4671L28.845 15.3821L27.29 13.0571C26.9025 12.4821 26.125 12.3296 25.5575 12.7096C24.985 13.0921 24.8275 13.8696 25.21 14.4421L27.71 18.1921C27.9325 18.5246 28.2975 18.7296 28.6975 18.7496H28.75C29.1275 18.7496 29.4875 18.5796 29.7275 18.2796L34.7275 12.0296C35.1575 11.4896 35.0725 10.7046 34.5325 10.2721Z" fill="#F97600"/>
                        </svg>
                    </div>
                    <h4 class="text-center">
                        تسوق بثقة
                    </h4>
                    <p class="description text-center">
                        تسوق واطلب عرضك باسعار متعددة اطلب مباشر مع ارسال سريع
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="circle-info">
                    <div class="icon-draw text-center">
                        <svg class="icon" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_100_419)">
                            <path d="M39.5659 19.1357L37.1426 16.8879C36.9774 16.7347 36.8506 16.5447 36.7727 16.3332L34.8697 11.1656C34.5975 10.4374 34.1099 9.80934 33.4718 9.36525C32.8336 8.92115 32.0753 8.6821 31.2978 8.67994H28.4145V7.87104C28.4145 7.52317 28.2763 7.18955 28.0303 6.94357C27.7843 6.69759 27.4507 6.5594 27.1028 6.5594H9.67727C9.418 6.55634 9.16775 6.65453 8.97973 6.83308C8.7917 7.01163 8.68073 7.25648 8.6704 7.51557C8.66798 7.64508 8.6914 7.77377 8.73928 7.89413C8.78717 8.01449 8.85857 8.1241 8.9493 8.21654C9.04003 8.30899 9.14828 8.38243 9.26772 8.43257C9.38716 8.4827 9.51539 8.50853 9.64493 8.50854H26.4652V16.9653C26.4652 17.3132 26.6034 17.6468 26.8494 17.8928C27.0954 18.1388 27.429 18.277 27.7769 18.277H35.6981L38.0507 20.3942V28.2919H35.9179C35.7055 27.3625 35.1839 26.5328 34.4385 25.9385C33.6931 25.3442 32.768 25.0206 31.8147 25.0206C30.8614 25.0206 29.9363 25.3442 29.1909 25.9385C28.4455 26.5328 27.9239 27.3625 27.7115 28.2919H21.1484C20.9361 27.3625 20.4145 26.5328 19.6691 25.9385C18.9236 25.3442 17.9986 25.0206 17.0452 25.0206C16.0919 25.0206 15.1668 25.3442 14.4214 25.9385C13.676 26.5328 13.1544 27.3625 12.942 28.2919H9.67719C9.41789 28.2888 9.16761 28.3871 8.9796 28.5657C8.79158 28.7443 8.68065 28.9892 8.6704 29.2483C8.66798 29.3778 8.6914 29.5065 8.73929 29.6269C8.78717 29.7472 8.85857 29.8568 8.94931 29.9493C9.04004 30.0417 9.14829 30.1151 9.26773 30.1653C9.38717 30.2154 9.5154 30.2412 9.64493 30.2412H12.9584C13.1842 31.1544 13.7093 31.9657 14.45 32.5456C15.1907 33.1255 16.1043 33.4405 17.045 33.4405C17.9857 33.4405 18.8992 33.1255 19.6399 32.5456C20.3806 31.9657 20.9057 31.1544 21.1315 30.2412H27.7281C27.9538 31.1544 28.4789 31.9657 29.2196 32.5456C29.9603 33.1255 30.8739 33.4405 31.8146 33.4405C32.7553 33.4405 33.6689 33.1255 34.4095 32.5456C35.1502 31.9657 35.6754 31.1544 35.9011 30.2412H38.6884C39.0362 30.2412 39.3698 30.103 39.6158 29.857C39.8618 29.6111 40 29.2775 40 28.9296V20.1106C39.9999 19.9267 39.9612 19.745 39.8864 19.5771C39.8116 19.4092 39.7024 19.2588 39.5659 19.1357ZM28.4145 16.3281V10.629H31.2978C31.6774 10.63 32.0477 10.7468 32.3593 10.9636C32.6709 11.1804 32.9089 11.4871 33.0418 11.8427L34.7031 16.3281H28.4145ZM17.045 31.4911C16.5979 31.4911 16.1608 31.3585 15.789 31.1101C15.4172 30.8617 15.1275 30.5086 14.9564 30.0955C14.7853 29.6824 14.7405 29.2279 14.8277 28.7893C14.915 28.3508 15.1303 27.948 15.4465 27.6318C15.7626 27.3157 16.1655 27.1004 16.604 27.0131C17.0426 26.9259 17.4971 26.9707 17.9102 27.1418C18.3233 27.3129 18.6764 27.6027 18.9248 27.9745C19.1732 28.3463 19.3057 28.7834 19.3057 29.2305C19.305 29.8298 19.0666 30.4045 18.6428 30.8283C18.219 31.2521 17.6444 31.4905 17.045 31.4911ZM31.8146 31.4911C31.3675 31.4911 30.9304 31.3586 30.5586 31.1101C30.1868 30.8617 29.8971 30.5087 29.7259 30.0956C29.5548 29.6825 29.51 29.2279 29.5973 28.7894C29.6845 28.3508 29.8998 27.948 30.216 27.6319C30.5322 27.3157 30.935 27.1004 31.3735 27.0131C31.8121 26.9259 32.2666 26.9707 32.6797 27.1418C33.0928 27.3129 33.4459 27.6027 33.6943 27.9745C33.9427 28.3463 34.0753 28.7834 34.0752 29.2305C34.0746 29.8298 33.8362 30.4044 33.4124 30.8282C32.9886 31.252 32.414 31.4904 31.8146 31.4911Z" fill="#F97600"/>
                            <path d="M5.48304 13.9608H16.5357C16.7942 13.9608 17.0421 13.8582 17.2249 13.6754C17.4077 13.4926 17.5104 13.2447 17.5104 12.9862C17.5104 12.7277 17.4077 12.4797 17.2249 12.297C17.0421 12.1142 16.7942 12.0115 16.5357 12.0115H5.48304C5.22454 12.0115 4.97663 12.1142 4.79384 12.297C4.61105 12.4797 4.50836 12.7277 4.50836 12.9862C4.50836 13.2447 4.61105 13.4926 4.79384 13.6754C4.97663 13.8582 5.22454 13.9608 5.48304 13.9608ZM17.5104 18.4003C17.5104 18.1418 17.4077 17.8939 17.2249 17.7111C17.0421 17.5283 16.7942 17.4256 16.5357 17.4256H0.974686C0.845959 17.4245 0.718279 17.4488 0.599018 17.4973C0.479757 17.5457 0.371277 17.6174 0.279843 17.708C0.18841 17.7986 0.115832 17.9064 0.0663027 18.0253C0.016773 18.1441 -0.00872803 18.2715 -0.00872803 18.4003C-0.00872803 18.529 0.016773 18.6565 0.0663027 18.7753C0.115832 18.8941 0.18841 19.0019 0.279843 19.0926C0.371277 19.1832 0.479757 19.2548 0.599018 19.3032C0.718279 19.3517 0.845959 19.3761 0.974686 19.3749H16.5357C16.7942 19.3749 17.0421 19.2722 17.2249 19.0895C17.4077 18.9067 17.5104 18.6588 17.5104 18.4003ZM11.3389 23.8144C11.3389 23.6865 11.3137 23.5597 11.2647 23.4415C11.2157 23.3232 11.1439 23.2158 11.0534 23.1253C10.9629 23.0348 10.8555 22.963 10.7373 22.914C10.619 22.865 10.4923 22.8398 10.3643 22.8398H3.59C3.33302 22.8421 3.08734 22.9458 2.90644 23.1284C2.72553 23.3109 2.62404 23.5575 2.62404 23.8145C2.62404 24.0715 2.72553 24.3181 2.90644 24.5006C3.08734 24.6831 3.33302 24.7868 3.59 24.7891H10.3643C10.6228 24.7891 10.8707 24.6864 11.0535 24.5036C11.2362 24.3208 11.3389 24.0729 11.3389 23.8144Z" fill="#F97600"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_100_419">
                            <rect width="40" height="40" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <h4 class="text-center">
                        تسوق بثقة
                    </h4>
                    <p class="description text-center">
                        تسوق واطلب عرضك باسعار متعددة اطلب مباشر مع ارسال سريع
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            // $.post('{{ route('home.section.featured') }}', {_token:'{{ csrf_token() }}'}, function(data){
            //     $('#section_featured').html(data);
            //     AIZ.plugins.slickCarousel();
            // });
            $.post('{{ route('home.section.best_selling') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.best_offers') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_offers').html(data);
                AIZ.plugins.slickCarousel();
            });
            // $.post('{{ route('home.section.auction_products') }}', {_token:'{{ csrf_token() }}'}, function(data){
            //     $('#auction_products').html(data);
            //     AIZ.plugins.slickCarousel();
            // });
            // $.post('{{ route('home.section.home_categories') }}', {_token:'{{ csrf_token() }}'}, function(data){
            //     $('#section_home_categories').html(data);
            //     AIZ.plugins.slickCarousel();
            // });
            // $.post('{{ route('home.section.best_sellers') }}', {_token:'{{ csrf_token() }}'}, function(data){
            //     $('#section_best_sellers').html(data);
            //     AIZ.plugins.slickCarousel();
            // });
        });
    </script>
@endsection
