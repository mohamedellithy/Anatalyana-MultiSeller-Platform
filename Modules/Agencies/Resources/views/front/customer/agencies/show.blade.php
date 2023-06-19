@extends('frontend.layouts.user_panel')

@section('panel_content')
<div class="row gutters-16">
    <div class="col-xl-8 col-md-6 mb-4">
        <div class="h-100 ">
            <h5 class="form-title">
                {{  translate('Details Applied For Join As Agent') }}
            </h5>
            <div class="row body-frame">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>
                                {{ translate('Status') }}
                            </strong>
                            <p>
                                {{ $agency_request_info->status }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <strong>
                                {{ translate('Status Payment') }}
                            </strong>
                            <p>
                                {{ $agency_request_info->payment_status }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row body-frame">
                <div class="col-md-12">
                    <p class="section-heading">{{ translate('Personal Information') }}</p>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>
                                {{ translate('First Name') }}
                            </strong>
                            <p>
                                {{ $agency_request_info->first_name }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <strong>
                                {{ translate('Last Name') }}
                            </strong>
                            <p>
                                {{ $agency_request_info->last_name }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>
                                {{ translate('Phone') }}
                            </strong>
                            <p>
                                {{ $agency_request_info->phone }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <strong>
                                {{ translate('Postal Code') }}
                            </strong>
                            <p>
                                {{ $agency_request_info->postal_code }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>
                                {{ translate('Country') }}
                            </strong>
                            <p>
                                {{ $agency_request_info->agency_country->country->name }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <strong>
                                {{ translate('Address') }}
                            </strong>
                            <p>
                                {{ $agency_request_info->address }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <p class="section-heading">{{ translate('Terms Information') }}</p>
                    <div class="row">
                        @foreach($agency_request_info->agency_join_terms as $term)
                            <div class="col-md-12">
                                <strong>
                                     {{ $term->term_name }}
                                </strong>
                                <p>
                                    @if($term->agency_term->type_field == 'file' || $term->agency_term->type_field == 'image')
                                        <div class="input-group" data-toggle="aizuploader" data-type="{{ $term->type_field == 'image' ? 'image' : 'document' }}">
                                            <input type="hidden" name="term_{{ $term->id }}" value="{{ $term->term_value }}" class="selected-files">
                                        </div>
                                        <div class="file-preview box sm"></div>
                                        <br/>
                                        <a class="btn btn-primary btn-sm"  href="{{ uploaded_asset($term->term_value) }}" download>{{ translate('Download Attachment') }}</a>
                                    @else
                                        {{ $term->term_value }}
                                    @endif

                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col mb-4">
        <div class="h-100 container-right-side">
            <div class="container-company-image">
               <img class="img-responsive" src="{{ uploaded_asset($agency_request_info->agency_country->agency->campany_image) }}"/>
            </div>
            <div class="body-campany-side">
                <p class="alert">{{ $agency_request_info->agency_country->agency->name }}</p>
                <p class="country-info">
                    <img class='img-country' src="{{ static_asset('assets/img/flags/'.strtolower($agency_request_info->agency_country->country->code).'.png') }}" height="11" class="mr-1">
                    {{ $agency_request_info->agency_country->country->name }}
                </p>
                <a href="{{ route('agency-show',$agency_request_info->id) }}" class="btn btn-warning btn-sm">
                    {{ translate('Campany Profile') }}
                </a>
            </div>
            <div class="row bio-campany">
                {{ strip_tags($agency_request_info->agency_country->agency->bio) }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
    <!-- Delete modal -->
    @include('modals.delete_modal')

    <!-- Order details modal -->
    <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div id="order-details-modal-body">

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <style>
        .container-right-side{
            background-color: #f5f7f8;
            padding: 24px;
            border-radius: 12px;
        }
        .container-company-image{
            width: 100px;
            margin: auto;
            background-color: white;
            border-radius: 62%;
        }
        .container-company-image img{
            width: 100%;
            height: 100%;
        }
        .container-right-side .body-campany-side{
            font-size: 14px;
            font-weight: bold;
            text-align: center;
        }
        .bio-campany{
            padding:10px;
        }
        .body-frame{
            padding: 10px;
        }
        .section-heading{
            background-color: whitesmoke;
            padding: 10px 8px;
            font-size: 15px;
        }
    </style>
    <script type="text/javascript">
        $('#order_details').on('hidden.bs.modal', function () {
            location.reload();
        })
    </script>
@endsection
