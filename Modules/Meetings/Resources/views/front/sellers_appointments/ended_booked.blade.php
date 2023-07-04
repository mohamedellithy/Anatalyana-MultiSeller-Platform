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
                    <div class="col-lg-6 text-center text-lg-left">
                        <h1 class="fw-700 fs-20 fs-md-24 text-dark">{{ translate('All Booked Appointments') }}</h1>
                    </div>
                    <div class="col-lg-6">
                        <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
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
            <!-- All Sellers -->
            <section class="mb-3 pb-3">
                <div class="bg-white px-3">
                    <div class="row row-cols-xl-5 row-cols-md-3 row-cols-sm-2 row-cols-1 gutters-16 border-top border-left">
                        @foreach ($all_ended_booked_appointments as $key => $booked_appointment)
                            @include('meetings::front.partials.user_appointment_meetings_box_1')
                        @endforeach
                    </div>
                    <!-- Pagination -->
                    <div class="aiz-pagination aiz-pagination-center mt-4">
                        {{ $all_ended_booked_appointments->links() }}
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('script')
    <script>
        AIZ.plugins.particles();
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
