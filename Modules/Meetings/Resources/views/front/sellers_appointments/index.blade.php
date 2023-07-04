@extends('frontend.layouts.app')

@section('sub_menu')
    @include('meetings::sub_menus.front_meetings')
@endsection

@section('content')
    <div class="position-relative">
        <div class="position-absolute" id="particles-js"></div>
        <div class="position-relative container">
            <!-- Breadcrumb -->
            <section class="pt-4 mb-3">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <ul class="breadcrumb bg-transparent p-0 justify-content-right justify-content-lg-end text-right">
                            <li class="breadcrumb-item has-transition opacity-60 hov-opacity-100">
                                <a class="text-reset" href="{{ route('home') }}">{{ translate('Home')}}</a>
                            </li>
                            <li class="text-dark fw-600 breadcrumb-item">
                                "{{ translate('All Sellers Appointments') }}"
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Top Filters -->
            <div class="text-left">
                <form method="get" action="" id="filters">
                    <div class="row gutters-5 flex-wrap align-items-center">
                        <div class="col-lg col-10">
                            <h1 class="fs-20 fs-md-24 fw-700 text-dark">
                                "{{ translate('All Sellers Appointments') }}"
                            </h1>
                        </div>
                        <div class="col-2 col-lg-auto d-xl-none mb-lg-3 text-right">
                            <button type="button" class="btn btn-icon p-0" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                                <i class="la la-filter la-2x"></i>
                            </button>
                        </div>
                        <div class="col-6 col-lg-auto mb-3 w-lg-200px mr-xl-4 mr-lg-3">
                            @if (Route::currentRouteName() != 'products.brand')
                                <select class="form-control form-control-sm aiz-selectpicker rounded-0" data-live-search="true" name="shop" onchange="filter()">
                                    <option value="">{{ translate('Shops')}}</option>
                                    @foreach (\App\Models\shop::all() as $shop)
                                        <option value="{{ $shop->slug }}" @isset($brand_id) @if ($brand_id == $shop->id) selected @endif @endisset>{{ $shop->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <!-- All Sellers -->
            <section class="mb-3 pb-3">
                <div class="bg-white px-3">
                    <div class="row row-cols-xl-5 row-cols-md-3 row-cols-sm-2 row-cols-1 gutters-16 border-top border-left">
                        @foreach ($shop_have_appointments as $key => $shop)
                            @include('meetings::front.partials.shop_meetings_box_1')
                        @endforeach
                    </div>
                    <!-- Pagination -->
                    <div class="aiz-pagination aiz-pagination-center mt-4">
                        {{ $shop_have_appointments->links() }}
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('script')
    <script>
        AIZ.plugins.particles();
        function filter(el){
            $('#filters').submit();
        }
    </script>
    
@endsection

@section('custom_style')
<style>
    .btn-meetings{
        margin-top: 10px;
        border-radius: 44px;
    }
</style>
@endsection