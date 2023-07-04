@extends('seller.layouts.app')

@section('sub_menu')
   @include('meetings::sub_menus.seller_meetings')
@endsection

@section('panel_content')

    <div class="row gutters-10">
        <div class=" ml-auto mb-3" >
            <a href="{{ route('seller.meetings.appointments.create') }}">
            <div class="p-3 rounded d-flex c-pointer text-center shadow-sm hov-shadow-lg has-transition btn-create-new-appointments">
                <span class="size-30px rounded-circle mx-auto bg-secondary d-flex align-items-center justify-content-center">
                    <i class="las la-plus la-1x text-dark"></i>
                </span>
                <label class="fs-15 text-white ml-10" style="margin-left:10px">{{ translate('Add New Appointment') }}</label>
            </div>
            </a>
        </div>
    </div>
    <div class="card-body">
        @php 
            $sort_date          = request()->query('date') ?: null;
            $sort_booked_status = request()->query('booked_status') ?: null;
            $sort_status        = request()->query('status') ?: null;
            $sort_search        = request()->query('search') ?: null;
        @endphp
        <form class="" id="sort_sellers" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col">
                    <h5 class="mb-md-0 h6">
                        count appointments are
                        <span class="badge badge-dark" style="width:auto">
                            {{ $appointments ? count($appointments) : 0 }}
                        </span>
                    </h5>
                </div>
                <div class="col-md-2">
                    <div class="form-group mb-0">
                        <input type="date" class="form-control" id="search" name="date" @isset($sort_date) value="{{ $sort_date }}" @endisset placeholder="{{ translate('Title Appointment or Host Name') }}">
                    </div>
                </div>
                <div class="col-md-2 ml-auto">
                    <select class="form-control aiz-selectpicker" name="booked_status" id="approved_status" onchange="sort_sellers()">
                        <option value="">{{translate('Filter by status Booked')}}</option>
                        <option value="booked"  @isset($sort_booked_status) @if($sort_booked_status == 'booked') selected @endif @endisset>{{translate('Booked')}}</option>
                        <option value="un-booked"  @isset($sort_booked_status) @if($sort_booked_status == 'un-booked') selected @endif @endisset>{{translate('un-booked')}}</option>
                    </select>
                </div>
                <div class="col-md-2 ml-auto">
                    <select class="form-control aiz-selectpicker" name="status" id="approved_status" onchange="sort_sellers()">
                        <option value="">{{translate('Filter by Status')}}</option>
                        <option value="1"  @isset($sort_status) @if($sort_status == '1') selected @endif @endisset>{{translate('Active')}}</option>
                        <option value="0"  @isset($sort_status) @if($sort_status == '0') selected @endif @endisset>{{translate('Not Active')}}</option>
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
                    <th data-breakpoints="lg">Title</th>
                    <th>{{translate('Date')}}</th>
                    <th data-breakpoints="lg">{{translate('Start At')}}</th>
                    <th data-breakpoints="lg">{{translate('End At')}}</th>
                    <th data-breakpoints="lg">{{translate('Host by')}}</th>
                    <th data-breakpoints="lg">{{translate('Time Zone')}}</th>
                    <th data-breakpoints="lg">{{translate('Booked')}}</th>
                    <th data-breakpoints="lg">{{translate('status') }}</th>
                    <th data-breakpoints="lg">{{translate('created_at') }}</th>
                    <th data-breakpoints="lg" >{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @isset($appointments)
                    @foreach($appointments as $key => $appointment)
                        <tr>
                            <td>{{ $appointment->id }}</td>
                            <td>{{ $appointment->title }}</td>
                            <td>{{ date('Y-m-d',strtotime($appointment->date)) }}</td>
                            <td>{{ $appointment->start_at }}</td>
                            <td>{{ $appointment->end_at }}</td>
                            <td>{{ $appointment->host_name }}</td>
                            <td>{{ $appointment->timezone }}</td>
                            <td>
                                @if($appointment->appointment_booked)
                                    {{ translate('Booked') }}
                                @else
                                    {{ translate('Not Booked') }}
                                @endif
                            </td>
                            <td>
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input onchange="update_published(this)" value="{{ $appointment->id }}" type="checkbox" {{ ($appointment->status == 1) ? 'checked' : '' }} >
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td>{{ $appointment->created_at }}</td>
                            <td>
                                <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="{{route('seller.meetings.appointments.edit', $appointment->id)}}" title="{{ translate('Edit') }}">
                                    <i class="las la-edit"></i>
                                </a>
                                {{-- <a href="{{route('seller.products.duplicate', $appointment->id)}}" class="btn btn-soft-success btn-icon btn-circle btn-sm"  title="{{ translate('Duplicate') }}">
                                     <i class="las la-copy"></i>
                                </a> --}}
                                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('seller.meetings.appointments.destroy', $appointment->id)}}" title="{{ translate('Delete') }}">
                                    <i class="las la-trash"></i>
                                </a>
                                @if($appointment->appointment_booked)
                                    @if(!in_array($appointment->appointment_booked->status,['completed']))
                                        <a class="btn btn-info btn-icon btn-circle btn-sm" href="{{route('seller.meetings.appointments.booking.edit', $appointment->appointment_booked->id)}}" title="{{ translate('show Booking') }}">
                                            <i class="las la-eye"></i>
                                        </a>
                                    @endif
                                @endif
                            </td>
                            {{-- <td>
                                <img src="{{ static_asset('assets/img/flags/'.strtolower($agency->country->code).'.png') }}" height="11" class="mr-1">
                                {{ $agency->country->name }}
                            </td>
                            <td>{{ single_price($agency->price) }}</td>
                            <td>
                                @if($agency->status == 1)
                                {{ translate('active') }}
                                @else
                                    {{ translate('not active') }}
                                @endif
                            </td>
                            <td>{{ $agency->created_at }}</td>
                            <td class="text-right">

                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('seller.edit-agency-country', ['agency_country_id'=>$agency->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                    <i class="las la-edit"></i>
                                </a>

                                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('seller.delete-agency-country',['agency_country_id' => $agency->id])}}" title="{{ translate('Delete') }}">
                                    <i class="las la-trash"></i>
                                </a>
                            </td> --}}
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
        <div class="aiz-pagination">
        @isset($appointments)
            {{ $appointments->appends(request()->input())->links() }}
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
