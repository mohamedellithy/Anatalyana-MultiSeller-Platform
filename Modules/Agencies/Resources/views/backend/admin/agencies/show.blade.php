@extends('backend.layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 h6 text-center">{{translate('Agency Information')}}</h4>
                </div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-md-3">
                            <img style="margin-bottom: 17px;" class="img-thumbnail" src="{{ uploaded_asset($agency->campany_image) }}" />
                            <br/>
                            <a href="{{ route('admin.agency-agents',encrypt($agency->id)) }}" class="btn btn-dark btn-sm">{{ translate('Show Joins') }}</a>
                        </div>
                        <div class="col-md-9">
                            <div class="">
                                <h5 class="title-agency text-left">
                                    {{ $agency->name }}
                                </h5>
                                <div class="section-inner">
                                    <h6 class="text-left">{{ translate('Bio :') }}</h6>
                                    <div class="text-left">{!! $agency->bio !!}</div>
                                </div>
                                <div class="section-inner">
                                    <h6 class="text-left">{{ translate('Service :') }}</h6>
                                    <div class="text-left">{!! $agency->services !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 h6 text-center">{{translate('Agency Status')}}</h4>
                </div>
                <div class="card-body text-center">
                    <label class="aiz-switch aiz-switch-success mb-0">
                        <input
                            @can('approve_seller') onchange="update_approved(this)" @endcan
                            value="{{ $agency->id }}" type="checkbox"
                            <?php if($agency->status == 1) echo "checked";?>
                            @cannot('approve_seller') disabled @endcan
                        >
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 h6 text-center">{{translate('Seller Information')}}</h4>
                </div>
                <div class="card-body text-left">
                    <img class="img-thumbnail shop-image" src="{{ uploaded_asset($agency->seller->shop->logo) }}" />
                    <div class="text-left">
                        <strong class="">{{ translate('Shop Name :') }}</strong>
                        <p>
                            {{ $agency->seller->shop->name }}
                        </p>
                    </div>
                    <div class="text-left">
                        <strong class="">{{ translate('Seller Email :') }}</strong>
                        <p>
                            {{ $agency->seller->email }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
              <div class="card-header">
                  <h5 class="mb-0 h6">{{translate('Attachments Files')}}</h5>
              </div>
              <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-6">
                        <h6>{{ translate('Catolog File') }}</h6>
                        <div class="text-center">
                            <div class="input-group" data-toggle="aizuploader" data-type="document">
                                <input type="hidden" value="{{ $agency->identity_file }}" class="selected-files">
                            </div>
                            <div class="file-preview box sm text-center"></div>
                            <br/>
                            <a class="btn btn-primary btn-sm"  href="{{ uploaded_asset($agency->identity_file) }}" download>{{ translate('Download Catalog File') }}</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>{{ translate('Products File') }}</h6>
                        <div class="text-center">
                            <div class="input-group" data-toggle="aizuploader" data-type="document">
                                <input type="hidden" value="{{ $agency->products_file }}" class="selected-files">
                            </div>
                            <div class="file-preview box sm text-center"></div>
                            <br/>
                            <a class="btn btn-primary btn-sm"  href="{{ uploaded_asset($agency->products_file) }}" download>{{ translate('Download Products File') }}</a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{translate('Agency\'s Countries')}}</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        @forelse($agency->agency_country as $country_item)
                            <tr>
                                <td>
                                    <img class='img-country' src="{{ static_asset('assets/img/flags/'.strtolower($country_item->country->code).'.png') }}" height="11" class="mr-1">
                                    {{ $country_item->country->name }}
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('script')
    <style>
        .shop-image{
            width: 70px;
            margin: 0px 0px 20px 0px;
        }
        .file-preview.box.sm .file-preview-item{
            margin: auto;
            float: initial;
        }
        .remove-attachment{
            display: none;
        }
    </style>
    <script type="text/javascript">
       function update_approved(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('admin.agency-agent-approve') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data.data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Approved sellers updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }
    </script>
@endsection
