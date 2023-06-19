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
    <section class="mb-4 pt-3">
        <div class="container">
            <div class="bg-white py-3">
                <div class="row">
                    <!-- Product Image Gallery -->
                    <div class="col-xl-5 col-lg-6 mb-4">
                       @include('agencies::front.agency_details.image_gallery',['campany_image' => $agency_translation->campany_image])
                    </div>

                    <!-- Product Details -->
                    <div class="col-xl-7 col-lg-6">
                        @include('agencies::front.agency_details.details',['agency_translation' => $agency_translation])
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-4">
        <div class="container">
            <div class="row gutters-16">
                <!-- Right side -->
                <div class="col-lg-12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <a class="nav-item fs-18 nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                            <i class="las la-globe"></i>
                            {{ translate('Countries Availiable') }}
                          </a>
                          <a class="nav-item fs-18 nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                            <i class="las la-info"></i>
                            {{ translate('Services') }}
                          </a>
                          <a class="nav-item fs-18 nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-Catalog" role="tab" aria-controls="nav-contact" aria-selected="false">
                            <i class="las la-th"></i>
                            {{ translate('Company \'s Catalog') }}
                          </a>
                          <a class="nav-item fs-18 nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-identity" role="tab" aria-controls="nav-contact" aria-selected="false">
                            <i class="las la-info"></i>
                            {{ translate('Company \'s Identity') }}
                          </a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane row fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            @include('agencies::front.agency_details.countries') 
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            @include('agencies::front.agency_details.services',['agency_translation' => $agency_translation])
                        </div>
                        <div class="tab-pane fade" id="nav-Catalog" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="show_catalog_file"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-identity" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="show_identity_file"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.11/pdfobject.min.js" integrity="sha512-Ei1WlhMCjToeHGX4Dc2GvcnQqXiLNoNJA7BCSpKNd+Epg+3zxSpllzvub5lTrIOZs+CqyFjzkOiW7JadQ8qdog==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    PDFObject.embed("{{ uploaded_asset($agency_translation->identity_file) }}", "#show_identity_file");
    PDFObject.embed("{{ uploaded_asset($agency_translation->products_file) }}", "#show_catalog_file");
</script>
<style>
    .nav-tabs .nav-item.show .nav-link, 
    .nav-tabs .nav-link.active {
        background-color: #f97600;
        border-color: #f97600 #f97600 #f97600;
        color:white;
        
    }
    .tab-pane
    {
        padding: 3% 3%;
    }
    .nav-tabs .nav-item
    {
        font-weight: bold;
        font-size: 15px !important;
        color: #454343;
    }
</style>
@endsection
