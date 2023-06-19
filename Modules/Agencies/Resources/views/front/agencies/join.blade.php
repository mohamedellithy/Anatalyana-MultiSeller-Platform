@extends('frontend.layouts.app')

@php $agency_translation = get_from_translations($agency->agency_translation) @endphp

@section('meta_title'){{ $agency_translation->meta_title }}@stop

@section('meta_description'){{ $agency_translation->meta_description }}@stop


@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $agency_translation->meta_title }}">
    <meta itemprop="description" content="{{ $agency_translation->meta_description }}">
    <meta itemprop="image" content="{{ uploaded_asset($agency_translation->campany_image) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="{{ $agency_translation->name }}">
    <meta name="twitter:title" content="{{ $agency_translation->meta_title }}">
    <meta name="twitter:description" content="{{ $agency_translation->meta_description }}">
    <meta name="twitter:creator" content="{{ $agency_translation->name }}">
    <meta name="twitter:image" content="{{ uploaded_asset($agency_translation->campany_image) }}">
    <meta name="twitter:data1" content="{{ $agency_translation->bio }}">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $agency_translation->meta_title }}" />
    <meta property="og:type" content="og:product" />
    <meta property="og:url" content="{{ route('agency-show', $agency_translation->id) }}" />
    <meta property="og:image" content="{{ uploaded_asset($agency_translation->campany_image) }}" />
    <meta property="og:description" content="{{ $agency_translation->meta_description }}" />
    <meta property="og:site_name" content="{{ get_setting('meta_title') }}" />
    <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
@endsection

@section('content')
<div class="container">

    <div class="row">
        @if($agency)
            @if($agency->status == 1)
                <div class="col-md-8 form-card">
                    <form class="form-default" role="form" action="{{ route('store-agency-join') }}" method="POST">
                        @csrf
                        <div class="header-form-application">
                            <h3>{{ $agency_translation->name  }}</h3>
                            <h6>{{ translate('Application Form To Join as Agent on Your Country') }}</h6>
                        </div>
                        <div class="p-3">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- countries -->
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Country')}}</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="mb-3">
                                        <select id="agency_country_id" class="form-control aiz-selectpicker rounded-0" data-live-search="true" data-placeholder="{{ translate('Select your country')}}" name="agency_country_id" id="edit_country" required>
                                            <option value="">{{ translate('Select your country') }}</option>
                                            @foreach($agency->agency_country as $key => $agency_country)
                                            <option value="{{ $agency_country->id }}">
                                                {{ $agency_country->country->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Address -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>{{ translate('First Name')}}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control mb-3 rounded-0" placeholder="{{ translate('First Name')}}" value="{{ auth()->user()->name }}" name="first_name" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>{{ translate('First Name')}}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control mb-3 rounded-0" placeholder="{{ translate('First Name')}}"  name="last_name" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Phone')}}</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3 rounded-0" placeholder="{{ translate('+880')}}" value="{{ auth()->user()->phone }}" name="phone" value="" required>
                                </div>
                            </div>

                            <!-- Postal code -->
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Postal code')}}</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3 rounded-0" placeholder="{{ translate('Your Postal Code')}}" value="{{ auth()->user()->postal_code }}" name="postal_code" value="" required>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Address')}}</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea class="form-control mb-3 rounded-0" placeholder="{{ translate('Your Address')}}" rows="2" name="address" required>{{ auth()->user()->address . ' '.auth()->user()->state.' '.auth()->user()->country }}</textarea>
                                </div>
                            </div>



                            <div id="terms-render">
                                <!-- here put custom terms   -->
                            </div>

                            <!-- Save button -->
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary rounded-0 w-150px">{{translate('Save')}}</button>
                            </div>

                            {{-- @forelse($agency_translation as  )
                            @empty
                            @endforelse --}}
                        </div>
                    </form>
                </div>
            @else
            <div class="col-md-8 form-card">
                <div class="header-form-application">
                    <h3>{{ $agency_translation->name  }}</h3>
                    <h6>{{ translate('Application Form To Join as Agent on Your Country') }}</h6>
                </div>
                <div class="p-3">
                    <div class="alert alert-info text-center">
                        {{ translate('Agency Not Active Application Form ') }}
                    </div>
                </div>
            </div>
            @endif
        @endif
    </div>
</div>

@endsection

@section('script')
<style>
    .form-card{
        margin: 20px auto;
        background-color: white;
        box-shadow: 10px 10px 10px 10px #eee;
    }
    .header-form-application{
        text-align: center;
        padding: 35px;
    }
    .header-form-application h3{
        line-height: 2em;
    }
</style>

<script>
    jQuery(document).ready(function(){
        jQuery('#agency_country_id').change(function(){
            let agency_country_id = jQuery(this).val();
            console.log(agency_country_id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('terms-agency-country')}}",
                type: 'GET',
                data:{
                    agency_country_id:agency_country_id
                },
                success: function (response) {
                    console.log(response);
                    jQuery('#terms-render').html(response.html);
                }
            });
        });
    });
</script>
@endsection
