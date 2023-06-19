@extends('seller.layouts.app')

@section('panel_content')
    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">{{ translate('Agenct Inforamtion') }}</h1>
            </div>
        </div>
    </div>

    <!-- Error Meassages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="row gutters-5">
            <div class="col-12">
                <form method="post" action="{{ route('seller.update-agent-status',$agent->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="mar-all text-right mb-2">
                        <div class="col-md-3 ml-auto status-selected">
                            <select class="form-control aiz-selectpicker" data-placeholder="{{ translate('Filter by Payment Status')}}" name="status" required>
                                <option value="">{{ translate('Request Status')}}</option>
                                <option value="pending" @isset($agent->status) @if($agent->status == 'pending') selected @endif @endisset>{{ translate('Pending')}}</option>
                                <option value="approved" @isset($agent->status) @if($agent->status == 'approved') selected @endif @endisset>{{ translate('Approved')}}</option>
                                <option value="refused" @isset($agent->status) @if($agent->status == 'refused') selected @endif @endisset>{{ translate('Refused')}}</option>
                            </select>
                        </div>
                        <button type="submit" name="button" value="publish"
                            class="btn btn-success ">{{ translate('Update Status') }}</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-8">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{ translate('Customer Information') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <strong class="col-md-3 col-from-label">{{ translate('First Name') }}</strong>
                                <div class="col-md-8">
                                    <p> {{ $agent->first_name ?: '-' }} </p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <strong class="col-md-3 col-from-label">{{ translate('Last Name') }}</strong>
                                <div class="col-md-8">
                                    <p> {{ $agent->first_name ?: '-' }} </p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <strong class="col-md-3 col-from-label">{{ translate('Phone') }}</strong>
                                <div class="col-md-8">
                                    <p> {{ $agent->phone ?: '-' }} </p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <strong class="col-md-3 col-from-label">{{ translate('Postal Code') }}</strong>
                                <div class="col-md-8">
                                    <p> {{ $agent->postal_code ?: '-' }} </p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <strong class="col-md-3 col-from-label">{{ translate('Country') }}</strong>
                                <div class="col-md-8">
                                    <p> {{ $agent->customer->country ?: '-' }} </p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <strong class="col-md-3 col-from-label">{{ translate('Country') }}</strong>
                                <div class="col-md-8">
                                    <p> {{ $agent->customer->email ?: '-' }} </p>
                                </div>
                            </div>
                            <div class="form-group col-md-7">
                                <strong class="col-md-3 col-from-label">{{ translate('address') }}</strong>
                                <div class="col-md-8">
                                    <p> {{ $agent->address ?: '-' }} </p>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <strong class="col-md-3 col-from-label">{{ translate('Status') }}</strong>
                                <div class="col-md-8">
                                    <p> {{ $agent->status ?: '-' }} </p>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <strong class="col-md-3 col-from-label">{{ translate('Payment Status') }}</strong>
                                <div class="col-md-8">
                                    <p>
                                        @if ($agent->payment_status == 'paid')
                                            <span class="badge badge-inline badge-success">{{ translate('Paid')}}</span>
                                        @else
                                            <span class="badge badge-inline badge-danger">{{ translate('Unpaid')}}</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{ translate('Terms Information') }}</h5>
                    </div>
                    <div class="card-body">
                        @foreach($agent->agency_join_terms as $term)
                            <div class="form-group row">
                                <strong class="col-md-12 col-from-label term-question fs-14">{{ $term->term_name }}</strong>
                                <div class="col-md-12 answer-term fs-14">
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
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{ translate('Branch Information') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12 country-code">
                                <img class='img-country' src="{{ static_asset('assets/img/flags/'.strtolower($agent->agency_country->country->code).'.png') }}" height="11" class="mr-1">
                                {{ $agent->agency_country->country->name }}
                            </div>
                            <div class="col-md-12 country-price">
                                {{ single_price($agent->agency_country->price) }}
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="#" class="btn btn-primary btn-sm">
                                    {{ translate('Details Branch') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{ translate('Payment Information') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12 country-code">
                                {{ translate('Payment Un-paid') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
@endsection

@section('script')
<style>
    .term-question{
        background-color: #eee;
        padding: 13px;
        margin-top: 16px;
    }
    .answer-term{
        padding: 10px;
        border: 2px dashed lightgray;
        border-top:0px;
    }
    .country-code{
        text-align: center;
        font-size: 20px;
        padding: 10px;
        border-bottom: 1px solid #eee;
    }
    .country-price{
        font-size: 25px;
        text-align: center;
        font-weight: bold;
        padding: 15px;
    }
    .status-selected{
        display: inline-block;
    }
</style>
    <script type="text/javascript">

    </script>
@endsection
