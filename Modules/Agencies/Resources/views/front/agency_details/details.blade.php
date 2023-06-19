<div class="text-left">
    <!-- Product Name -->
    <h1 class="mb-4 fs-20 fw-700 text-dark">
        {{ $agency_translation->name }}
    </h1>
    <div class="bio-comapny">
        <h4 class="fs-19 fw-700 text-dark" style="color: #8d5d05 !important;">{{ translate('Bio') }}</h4>

        <p class="fs-16 summary-bio-comapny">
            {{ strip_tags($agency_translation->bio)  }}
        </p>
    </div>
    <div class="">
        <p class="info-agent" style="color: #e06a00;">
            {{ translate('Be an Agent on your country') }}
        </p>
        @if($agency_translation->agency)
            @if($agency_translation->agency->status == 1)
                <a class="btn btn-warning btn-sm" href="{{ route('agency-join',$agency_translation->agency_id) }}">
                    {{ translate('Join Now') }}
                </a>
            @endif
        @endif
    </div>
    <!-- Share -->
    <div class="row no-gutters mt-4">
        <div class="col-sm-2">
            <div class="text-secondary fs-14 fw-400 mt-2">{{ translate('Share') }}</div>
        </div>
        <div class="col-sm-10">
            <div class="aiz-share"></div>
        </div>
    </div>
</div>
