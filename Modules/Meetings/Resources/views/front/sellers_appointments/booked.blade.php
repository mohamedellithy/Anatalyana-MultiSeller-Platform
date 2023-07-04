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
                    <div class="col-lg-12">
                        <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                            <li class="breadcrumb-item has-transition opacity-60 hov-opacity-100">
                                <a class="text-reset" href="{{ route('home') }}">{{ translate('Home')}}</a>
                            </li>
                            <li class="text-dark fw-600 breadcrumb-item">
                                "{{ translate('All Booked Meetings') }}"
                            </li>
                        </ul>
                    </div>
                    <!-- Top Filters -->
                    @php 
                        $sort_status = request()->query('status');
                        $sort_date   = request()->query('date');
                    @endphp
                    <div class="col-md-12 text-left">
                        <form method="get" action="" id="search-form">
                            <div class="row gutters-5 flex-wrap align-items-right">
                                <div class="col-lg col-10">
                                    <h1 class="fs-20 fs-md-24 fw-700 text-dark">
                                        "{{ translate('Booked Meetings') }}"
                                    </h1>
                                </div>
                                <div class="col-2 col-lg-auto d-xl-none mb-lg-3 text-right">
                                    <button type="button" class="btn btn-icon p-0" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                                        <i class="la la-filter la-2x"></i>
                                    </button>
                                </div>
                                <div class="col-6 col-lg-auto mb-3 w-lg-200px mr-xl-4 mr-lg-3">
                                    <select class="form-control aiz-selectpicker" name="status" onchange="filter()" id="language_id" data-live-search="true">
                                        <option value="">{{ translate('Appointment Status') }}</option>
                                        <option value="pending"   @isset($sort_status) {{ $sort_status == 'pending'   ? 'selected' : '' }} @endisset  >{{ translate('Pending') }}</option>
                                        <option value="accepted"  @isset($sort_status) {{ $sort_status == 'accepted'  ? 'selected' : '' }} @endisset  >{{ translate('Accepted') }}</option>
                                        <option value="cancelled" @isset($sort_status) {{ $sort_status == 'cancelled' ? 'selected' : '' }} @endisset  >{{ translate('Cancelled') }}</option>
                                        <option value="completed" @isset($sort_status) {{ $sort_status == 'completed' ? 'selected' : '' }} @endisset  >{{ translate('Completed') }}</option>
                                        <option value="refused"   @isset($sort_status) {{ $sort_status == 'refused'   ? 'selected' : '' }} @endisset  >{{ translate('Refused') }}</option>
                                    </select>
                                </div>
                                <div class="col-6 col-lg-auto mb-3 w-lg-200px mr-xl-4 mr-lg-3">
                                    <input type="date" min="{{ date('Y-m-d') }}" name="date" @isset($sort_date) value="{{ $sort_date }}" @endisset value onchange="filter()" oninput="filter()" placeholder="Date of Booking" class="form-control"/>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </section>
            <!-- All Sellers -->
            <section class="mb-3 pb-3">
                <div class="bg-white px-3">
                    <div class="row row-cols-xl-5 row-cols-md-3 row-cols-sm-2 row-cols-1 gutters-16 border-top border-left">
                        @foreach ($all_booked_appointment as $key => $booked_appointment)
                            @include('meetings::front.partials.user_appointment_meetings_box_1')
                        @endforeach
                    </div>
                    <!-- Pagination -->
                    <div class="aiz-pagination aiz-pagination-center mt-4">
                        {{ $all_booked_appointment->links() }}
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
            $('#search-form').submit();
        }
    </script>
@endsection

@section('custom_style')
<style>
    .info-appointments .icon-video i{
        font-weight: bold;
        padding: 10px;
        background-color: #2a5e98;
        border-radius: 45px;
        color:white;
    }
</style>
@endsection
