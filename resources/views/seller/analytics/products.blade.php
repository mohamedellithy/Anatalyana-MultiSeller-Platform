@extends('seller.layouts.app')

@section('sub_menu')
   @include('seller.sub_menus.analytics')
@endsection

@section('panel_content')
    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3 text-primary">{{ translate('Dashboard') }}</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-6 col-xxl-3">
            <div class="card shadow-none mb-4 bg-primary py-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="small text-muted mb-0">
                                <span class="fe fe-arrow-down fe-12"></span>
                                <span class="fs-14 text-light">{{ translate('Products') }}</span>
                            </p>
                            <h3 class="mb-0 text-white fs-30">
                                {{ \App\Models\Product::where('user_id', Auth::user()->id)->count() }}
                            </h3>
                        </div>
                        <div class="col-auto text-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64.001" height="64" viewBox="0 0 64.001 64">
                                <path id="Path_66" data-name="Path 66"
                                    d="M146.431,117.56l-26.514-10.606a8.014,8.014,0,0,0-5.944,0L87.458,117.56a4,4,0,0,0-2.514,3.714v34.217a4,4,0,0,0,2.514,3.714l26.514,10.606a8.013,8.013,0,0,0,5.944,0L146.431,159.2a4,4,0,0,0,2.514-3.714V121.274a4,4,0,0,0-2.514-3.714m-31.714-8.748a5.981,5.981,0,0,1,4.456,0l26.1,10.44a1,1,0,0,1,0,1.858l-12.332,4.932-30.654-12.26Zm1.228,59.633L88.2,157.347a2,2,0,0,1-1.258-1.856V122.6l29,11.6Zm1-36L88.612,121.11a1,1,0,0,1,0-1.858L99.6,114.858l30.654,12.262Zm30,23.048a2,2,0,0,1-1.258,1.856l-27.742,11.1V134.2l13-5.2V146.61a1.035,1.035,0,0,0,2-.466V128.2l14-5.6Z"
                                    transform="translate(-84.944 -106.382)" fill="#FFFFFF" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-xxl-3">
            <div class="card shadow-none mb-4 bg-primary py-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="small text-muted mb-0">
                                <span class="fe fe-arrow-down fe-12"></span>
                                <span class="fs-14 text-light">{{ translate('Digital Products') }}</span>
                            </p>
                            <h3 class="mb-0 text-white fs-30">
                                {{ \App\Models\Product::where('user_id', Auth::user()->id)->where('digital',1)->count() }}
                            </h3>

                        </div>
                        <div class="col-auto text-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64.001" height="64" viewBox="0 0 64.001 64">
                                <path id="Path_66" data-name="Path 66"
                                    d="M146.431,117.56l-26.514-10.606a8.014,8.014,0,0,0-5.944,0L87.458,117.56a4,4,0,0,0-2.514,3.714v34.217a4,4,0,0,0,2.514,3.714l26.514,10.606a8.013,8.013,0,0,0,5.944,0L146.431,159.2a4,4,0,0,0,2.514-3.714V121.274a4,4,0,0,0-2.514-3.714m-31.714-8.748a5.981,5.981,0,0,1,4.456,0l26.1,10.44a1,1,0,0,1,0,1.858l-12.332,4.932-30.654-12.26Zm1.228,59.633L88.2,157.347a2,2,0,0,1-1.258-1.856V122.6l29,11.6Zm1-36L88.612,121.11a1,1,0,0,1,0-1.858L99.6,114.858l30.654,12.262Zm30,23.048a2,2,0,0,1-1.258,1.856l-27.742,11.1V134.2l13-5.2V146.61a1.035,1.035,0,0,0,2-.466V128.2l14-5.6Z"
                                    transform="translate(-84.944 -106.382)" fill="#FFFFFF" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-xxl-3">
            <div class="card shadow-none mb-4 bg-primary py-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="small text-muted mb-0">
                                <span class="fe fe-arrow-down fe-12"></span>
                                <span class="fs-14 text-light">{{ translate('Publish Products') }}</span>
                            </p>
                            <h3 class="mb-0 text-white fs-30">
                                {{ \App\Models\Product::where('user_id', Auth::user()->id)->where('published',1)->count() }}
                            </h3>

                        </div>
                        <div class="col-auto text-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64.001" height="64" viewBox="0 0 64.001 64">
                                <path id="Path_66" data-name="Path 66"
                                    d="M146.431,117.56l-26.514-10.606a8.014,8.014,0,0,0-5.944,0L87.458,117.56a4,4,0,0,0-2.514,3.714v34.217a4,4,0,0,0,2.514,3.714l26.514,10.606a8.013,8.013,0,0,0,5.944,0L146.431,159.2a4,4,0,0,0,2.514-3.714V121.274a4,4,0,0,0-2.514-3.714m-31.714-8.748a5.981,5.981,0,0,1,4.456,0l26.1,10.44a1,1,0,0,1,0,1.858l-12.332,4.932-30.654-12.26Zm1.228,59.633L88.2,157.347a2,2,0,0,1-1.258-1.856V122.6l29,11.6Zm1-36L88.612,121.11a1,1,0,0,1,0-1.858L99.6,114.858l30.654,12.262Zm30,23.048a2,2,0,0,1-1.258,1.856l-27.742,11.1V134.2l13-5.2V146.61a1.035,1.035,0,0,0,2-.466V128.2l14-5.6Z"
                                    transform="translate(-84.944 -106.382)" fill="#FFFFFF" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-xxl-3">
            <div class="card shadow-none mb-4 bg-primary py-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="small text-muted mb-0">
                                <span class="fe fe-arrow-down fe-12"></span>
                                <span class="fs-14 text-light">{{ translate('Approval Products') }}</span>
                            </p>
                            <h3 class="mb-0 text-white fs-30">
                                {{ \App\Models\Product::where('user_id', Auth::user()->id)->where('approved',1)->count() }}
                            </h3>

                        </div>
                        <div class="col-auto text-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64.001" height="64" viewBox="0 0 64.001 64">
                                <path id="Path_66" data-name="Path 66"
                                    d="M146.431,117.56l-26.514-10.606a8.014,8.014,0,0,0-5.944,0L87.458,117.56a4,4,0,0,0-2.514,3.714v34.217a4,4,0,0,0,2.514,3.714l26.514,10.606a8.013,8.013,0,0,0,5.944,0L146.431,159.2a4,4,0,0,0,2.514-3.714V121.274a4,4,0,0,0-2.514-3.714m-31.714-8.748a5.981,5.981,0,0,1,4.456,0l26.1,10.44a1,1,0,0,1,0,1.858l-12.332,4.932-30.654-12.26Zm1.228,59.633L88.2,157.347a2,2,0,0,1-1.258-1.856V122.6l29,11.6Zm1-36L88.612,121.11a1,1,0,0,1,0-1.858L99.6,114.858l30.654,12.262Zm30,23.048a2,2,0,0,1-1.258,1.856l-27.742,11.1V134.2l13-5.2V146.61a1.035,1.035,0,0,0,2-.466V128.2l14-5.6Z"
                                    transform="translate(-84.944 -106.382)" fill="#FFFFFF" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-6 mb-4">
            <div class="card shadow-none bg-soft-primary">
                <div class="card-body">
                    <div class="card-title text-primary fs-16 fw-600">
                        {{ translate('Sales Stat') }}
                    </div>
                    <canvas id="graph-1" class="w-100" height="150"></canvas>
                </div>
            </div>
            <div class="card shadow-none bg-soft-primary mb-0">

                @php
                    $date = date('Y-m-d');
                    $days_ago_30 = date('Y-m-d', strtotime('-30 days', strtotime($date)));
                    $days_ago_60 = date('Y-m-d', strtotime('-60 days', strtotime($date)));

                    $orderTotal = \App\Models\Order::where('seller_id', Auth::user()->id)
                        ->where('payment_status', 'paid')
                        ->where('created_at', '>=', $days_ago_30)
                        ->sum('grand_total');
                @endphp
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="card shadow-none h-450px mb-0 h-100">
                <div class="card-body">
                    <div class="card-title text-primary fs-16 fw-600">
                        {{ translate('Category wise product count') }}
                    </div>
                    <hr>
                    <ul class="list-group">
                        @foreach (\App\Models\Category::all() as $key => $category)
                            @if (count($category->products->where('user_id', Auth::user()->id)) > 0)
                                <li class="d-flex justify-content-between align-items-center my-2 text-primary fs-13">
                                    {{ $category->getTranslation('name') }}
                                    <span class="">
                                        {{ count($category->products->where('user_id', Auth::user()->id)) }}
                                    </span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3 mb-4">
            @if (addon_is_activated('seller_subscription'))
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h6 class="mb-0">{{ translate('Purchased Package') }}</h6>
                        </div>
                        @if (Auth::user()->shop->seller_package)
                            <div class="d-flex">
                                <div class="col-3">
                                    <img src="{{ uploaded_asset(Auth::user()->shop->seller_package->logo) }}"
                                        class="img-fluid mb-4 w-64px">
                                </div>
                                <div class="col-9">
                                    <a class="fw-600 mb-3 text-primary">{{ translate('Current Package') }}:</a>
                                    <h6 class="text-primary">
                                        {{ Auth::user()->shop->seller_package->name }}
                                        </h3>
                                        <p class="mb-1 text-muted">{{ translate('Product Upload Limit') }}:
                                            {{ Auth::user()->shop->product_upload_limit }} {{ translate('Times') }}
                                        </p>
                                        <p class="text-muted mb-4">{{ translate('Package Expires at') }}:
                                            {{ Auth::user()->shop->package_invalid_at }}
                                        </p>
                                        <div class="">
                                            <a href="{{ route('seller.seller_packages_list') }}"
                                                class="btn btn-soft-primary">{{ translate('Upgrade Package') }}</a>
                                        </div>
                                </div>
                            </div>
                        @else
                            <h6 class="fw-600 mb-3 text-primary">{{ translate('Package Not Found') }}</h6>
                        @endif

                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="card-title text-primary">
                <h6 class="mb-0">{{ translate('Top 12 Products') }}</h6>
            </div>
            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"
                data-md-items="3" data-sm-items="2" data-arrows='true'>
                @foreach ($products as $key => $product)
                    <div class="carousel-box">
                        <div
                            class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                            <div class="position-relative">
                                <a href="{{ route('product', $product->slug) }}" class="d-block">
                                    <img class="img-fit lazyload mx-auto h-210px"
                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                        data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                        alt="{{ $product->getTranslation('name') }}"
                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                </a>
                            </div>
                            <div class="p-md-3 p-2 text-left">
                                <div class="fs-15">
                                    @if (home_base_price($product) != home_discounted_base_price($product))
                                        <del class="fw-600 opacity-50 mr-1">{{ home_base_price($product) }}</del>
                                    @endif
                                    <span class="fw-700 text-primary">{{ home_discounted_base_price($product) }}</span>
                                </div>
                                <div class="rating rating-sm mt-1">
                                    {{ renderStarRating($product->rating) }}
                                </div>
                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                    <a href="{{ route('product', $product->slug) }}"
                                        class="d-block text-reset">{{ $product->getTranslation('name') }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        AIZ.plugins.chart('#graph-1', {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($last_7_days_sales as $key => $last_7_days_sale)
                        '{{ $key }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Sales ($)',
                    data: [
                        @foreach ($last_7_days_sales as $key => $last_7_days_sale)
                            '{{ $last_7_days_sale }}',
                        @endforeach
                    ],

                    backgroundColor: ['#2E294E', '#2E294E', '#2E294E', '#2E294E', '#2E294E', '#2E294E',
                        '#2E294E'
                    ],
                    borderColor: ['#2E294E', '#2E294E', '#2E294E', '#2E294E', '#2E294E', '#2E294E',
                        '#2E294E'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        gridLines: {
                            color: '#E0E0E0',
                            zeroLineColor: '#E0E0E0'
                        },
                        ticks: {
                            fontColor: "#AFAFAF",
                            fontFamily: 'Roboto',
                            fontSize: 10,
                            beginAtZero: true
                        },
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            fontColor: "#AFAFAF",
                            fontFamily: 'Roboto',
                            fontSize: 10
                        },
                        barThickness: 7,
                        barPercentage: .5,
                        categoryPercentage: .5,
                    }],
                },
                legend: {
                    display: false
                }
            }
        });
    </script>
@endsection
