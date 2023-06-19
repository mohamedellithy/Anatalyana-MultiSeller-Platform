<div class="row sections-infos">
    <div class="col-md-6 bio-section">
        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold;color: #b65e10;font-size: 17px;">{{ translate('Bio') }} :</h6>
            </div>
            <div class="col-md-10">
                {!! $agency_translation->bio !!}
            </div>
        </div>
    </div>
    <div class="col-md-6 bio-section">
        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold;color: #b65e10;font-size: 17px;">{{ translate('Services') }} :</h6>
            </div>
            <div class="col-md-10">
                {!! $agency_translation->services !!}
            </div>
        </div>
    </div>
    
</div>

<style>
    .pdfobject-container { height: 40rem; border: 1rem solid rgba(0,0,0,.1); }
</style>