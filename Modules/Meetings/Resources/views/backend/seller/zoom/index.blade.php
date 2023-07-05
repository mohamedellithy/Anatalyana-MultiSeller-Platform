@extends('seller.layouts.app')

@section('sub_menu')
   @include('meetings::sub_menus.seller_meetings')
@endsection

@section('panel_content')

    {{-- <div class="aiz-titlebar mt-2 mb-4">
      <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{ translate('Install Zoom App') }}</h1>
        </div>
      </div>
    </div> --}}
    <div class="card-body">
        <div class="row">
            @if(isset($app_zoom_link))
                <div class="col-md-12 text-center">
                    <div class="container-zoom-app">
                        <img  src="{{ static_asset('assets/img/zoom.png') }}" class="app-config-log">
                    </div>
                    <br/>
                    <p class="text-center">
                        {{ translate('Install App to Start Create meeting to your clients and customers') }}
                    </p>
                    <a href="{{ $app_zoom_link }}" target="_blank" class="btn btn-primary btn-sm">
                        Install Application
                    </a>
                </div>
            @elseif(isset($zoom_credential))
                <div class="col-md-12 text-center">
                    <div class="container-zoom-app">
                        <img  src="{{ static_asset('assets/img/zoom.png') }}" class="app-config-log">
                    </div>
                    <p class="text-center app-installed">
                        <i class="las la-check-circle icon-app-installed"></i>
                        {{ translate('Zoom App Activated') }}
                    </p>
                </div>
            @endif
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
        border-radius: 10px;
    }
    .aiz-switch input:empty~span:before {
        background-color: #333435;
    }
    .container-zoom-app{
        width:150px;
        height:150px;
        text-align: center;
        margin: auto;
    }
    .app-config-log{
        width: 100%;
    }
    .app-installed{
        font-size: 20px;
        font-weight: bold;
    }
    .icon-app-installed
    {
        font-size: 25px;
        color: green;
        display: block;
        margin: 15px;
    }
</style>
@endsection
