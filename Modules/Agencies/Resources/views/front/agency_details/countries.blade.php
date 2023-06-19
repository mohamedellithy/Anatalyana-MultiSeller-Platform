<div class="container-cards-countries">
    <div class="row">
        @forelse($agency->agency_country as $agency_country)
            <div class="col-md-4 card">
                <div class="contain-card">
                    <h4 class="country-name">
                        <img class='img-country' src="{{ static_asset('assets/img/flags/'.strtolower($agency_country->country->code).'.png') }}" height="11" class="mr-1">
                        {{ $agency_country->country->name  }} ( {{ $agency_country->country->code }} ) 
                        <strong style="color: #e06a00;">
                          {{ single_price($agency_country->price) }}
                        </strong>
                    </h4>
                    <div class="country-terms">
                        <div class="summary-terms">
                            <h6 class="title-terms fs-16"> {{ translate('Terms To Join As an Agent') }}</h6>
                            <ul>
                                @forelse($agency_country->agency_terms as $term)
                                    @php $term_trnaslation  = get_from_translations($term->agency_term_translation) @endphp
                                    <li> {{  $term_trnaslation->name }}
                                        @if($term_trnaslation->is_must == 1):
                                            <strong class="fs-10"> ( {{ translate('Required') }} ) </strong>
                                        @endif
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
</div>

<style>
    .container-cards-countries .card{
        padding: 20px;
        border: 0px;
        box-shadow: 0px 0px 0px 0px;
    }
    .contain-card{
        background-color: #edf0f1;
        padding: 18px;
        border-radius: 12px;
    }
    .img-country{
        width: 25px;
        height: 17px;
    }
    .title-terms{
        padding-top: 13px;
        padding-bottom: 10px;
        color: #4b4949;
    }
    .summary-terms{
        padding-left: 17px;
    }
    .summary-terms ul
    {
        padding-left:20px;
    }
    .summary-terms ul li
    {
        padding-bottom: 10px;
    }
</style>