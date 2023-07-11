@extends('seller.layouts.app')

@section('sub_menu')
   @include('meetings::sub_menus.seller_meetings')
@endsection

@section('panel_content')

    <div class="aiz-titlebar mt-2 mb-4">
      <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{ translate('Meetings') }}</h1>
        </div>
      </div>
    </div>
    <div class="card-body">
        @php
            $sort_date           = request()->query('date') ?: null;
            $sort_payment_status = request()->query('payment_status') ?: null;
            $sort_status         = request()->query('status') ?: null;
            $sort_search         = request()->query('search') ?: null;
            $sort_date_status    = request()->query('date_status') ?: null;
            $sort_language       = request()->query('language') ?: null;
        @endphp
        <form class="" id="sort_sellers" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col">
                    <h5 class="mb-md-0 h6" style="padding:10px 0px">
                        count Bookings  are
                        <span class="badge badge-dark" style="width:auto">
                            {{ $booking_requests ? count($booking_requests) : 0 }}
                        </span>
                    </h5>
                </div>
                <div class="col-md-1">
                    <div class="form-group mb-0">
                        <input type="date" class="form-control" id="search" name="date" @isset($sort_date) value="{{ $sort_date }}" @endisset placeholder="{{ translate('Title Appointment or Host Name') }}">
                    </div>
                </div>
                <div class="col-md-2 ml-auto">
                    <select class="form-control aiz-selectpicker" name="status" id="approved_status" onchange="sort_sellers()">
                        <option value="">{{translate('Filter by status')}}</option>
                        <option value="pending"  @isset($sort_status) @if($sort_status == 'pending') selected @endif @endisset>{{translate('Pending')}}</option>
                        <option value="cancelled"  @isset($sort_status) @if($sort_status == 'cancelled') selected @endif @endisset>{{translate('Cancelled')}}</option>
                        <option value="accepted"  @isset($sort_status) @if($sort_status == 'accepted') selected @endif @endisset>{{translate('Accepted')}}</option>
                        <option value="completed"  @isset($sort_status) @if($sort_status == 'completed') selected @endif @endisset>{{translate('Completed')}}</option>
                        <option value="refused"  @isset($sort_status) @if($sort_status == 'refused') selected @endif @endisset>{{translate('Refused')}}</option>
                    </select>
                </div>
                <div class="col-md-2 ml-auto">
                    <select class="form-control aiz-selectpicker" name="payment_status" id="approved_status" onchange="sort_sellers()">
                        <option value="">{{translate('Filter by status Payment')}}</option>
                        <option value="pending"  @isset($sort_payment_status) @if($sort_payment_status == 'pending') selected @endif @endisset>{{translate('Pending')}}</option>
                        <option value="cancelled"  @isset($sort_payment_status) @if($sort_payment_status == 'cancelled') selected @endif @endisset>{{translate('Cancelled')}}</option>
                        <option value="accepted"  @isset($sort_payment_status) @if($sort_payment_status == 'accepted') selected @endif @endisset>{{translate('Accepted')}}</option>
                        <option value="completed"  @isset($sort_payment_status) @if($sort_payment_status == 'completed') selected @endif @endisset>{{translate('Completed')}}</option>
                        <option value="refused"  @isset($sort_payment_status) @if($sort_payment_status == 'refused') selected @endif @endisset>{{translate('Refused')}}</option>
                    </select>
                </div>
                <div class="col-md-2 ml-auto">
                    <select class="form-control aiz-selectpicker" name="language" id="language_id" onchange="sort_sellers()" data-live-search="true">
                        <option value="">{{ translate('Select Language') }}</option>
                        @foreach (languages_list() as $code => $language)
                        <option value="{{ $code }}" @isset($sort_language) @if($sort_language == $code) selected @endif @endisset>
                            {{ $language }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control" onchange="sort_sellers()" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Title Appointment or Host Name') }}">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group mb-0">
                        <button class="btn btn-primary btn-sm">Search</button>
                    </div>
                </div>
            </div>
        </form>
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th data-breakpoints="lg">User Name</th>
                    <th data-breakpoints="lg">{{translate('Language') }}</th>
                    <th data-breakpoints="lg">{{translate('Date') }}</th>
                    <th data-breakpoints="lg">{{translate('Start At')}}</th>
                    <th data-breakpoints="lg">{{translate('Time Zone')}}</th>
                    <th data-breakpoints="lg">{{translate('status') }}</th>
                    <th data-breakpoints="lg">{{translate('Payment status') }}</th>
                    <th data-breakpoints="lg">{{translate('created_at') }}</th>
                    <th data-breakpoints="lg">{{translate('Password meeting') }}</th>
                    <th data-breakpoints="lg" >{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @isset($booking_requests)
                    @foreach($booking_requests as $key => $booking_request)
                        <tr>
                            <td>{{ $booking_request->id }}</td>
                            <td>{{ $booking_request->user->name }}</td>
                            <td>{{ languages_list()[$booking_request->language] }}</td>
                            <td>{{ date('Y-m-d',strtotime($booking_request->appointment->date)) }}</td>
                            <td>{{ $booking_request->appointment->start_at }}</td>
                            <td>{{ timezones()[$booking_request->appointment->timezone] }}</td>
                            <td>
                                <span class="badge badge-warning" style="width:auto">
                                    <strong class="fs-14">{{ $booking_request->status }}</strong>
                                </span>
                            </td>
                            <td>
                                <span class="badge badge-warning" style="width:auto">
                                    <strong class="fs-14">{{ $booking_request->status }}</strong>
                                </span>
                            </td>
                            <td>{{ $booking_request->created_at }}</td>
                            <td>
                                @if($booking_request->status == 'accepted')
                                    {{ $booking_request->zoom_meeting_info ? $booking_request->zoom_meeting_info->password : translate('not available') }}
                                @else
                                    {{ translate('not available') }}
                                @endif
                            </td>
                            <td>
                                @if($booking_request->status == 'accepted')
                                    @if($booking_request->zoom_meeting_info)
                                        <a class="btn btn-success btn-icon btn-circle btn-sm" target="_blank" href="{{ $booking_request->zoom_meeting_info->start_url }}" title="{{ translate('Go to Meeting') }}">
                                            <i class="las la-video"></i>
                                        </a>
                                    @endif
                                @endif

                                @if(!in_array($booking_request->status,['completed']))
                                    <a class="btn btn-info btn-icon btn-circle btn-sm" href="{{route('seller.meetings.appointments.booking.edit', $booking_request->id)}}" title="{{ translate('Edit') }}">
                                        <i class="las la-edit"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
        <div class="aiz-pagination">
        @isset($booking_requests)
            {{ $booking_requests->appends(request()->input())->links() }}
        @endisset
        </div>
    </div>
@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
<script>
    function update_published(el){
        if(el.checked){
            var status = 1;
        }
        else{
            var status = 0;
        }
        $.post('{{ route('seller.meetings.appointments.update_status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function({data}){
            if(data == 1){
                AIZ.plugins.notify('success', '{{ translate('Featured products updated successfully') }}');
            }
            else{
                AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                location.reload();
            }
        });
    }
    function sort_sellers(el){
        $('#sort_sellers').submit();
    }
</script>
@endsection
@section('custom_style')
<style>
    .btn-create-new-appointments{
        background-color: #2A5E98;
        padding: 5px 20px !important;
    }
    .btn-create-new-appointments span{
        background-color: #ecd4e4 !important;
        height: 20px;
        width: 20px;
        margin-top: 4px
    }
    .aiz-table thead tr.footable-header{
        background-color: #17385c;
        color: white;
        font-size: 14px;
    }
    .aiz-table tbody tr
    {
        font-size: 15px;
    }
    .aiz-main-content .card-body{
        background-color: #2a5e9824;
        border-radius: 10px;
    }
    .aiz-switch input:empty~span:before {
        background-color: #333435;
    }
</style>
@endsection
