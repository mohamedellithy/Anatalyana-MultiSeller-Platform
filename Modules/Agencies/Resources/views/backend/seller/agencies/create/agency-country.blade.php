@extends('seller.layouts.app')

@section('sub_menu')
   @include('agencies::sub_menus.agencies')
@endsection

@section('panel_content')
    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">{{ translate('Add Country\'s Agency') }}</h1>
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
            <div class="col-lg-12">
                <form class="" action="{{ route('seller.store-agency-country') }}" method="POST" enctype="multipart/form-data"
                    id="choice_form">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('Country\'s Agency Information') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row" id="country">
                                <label class="col-md-3 col-from-label">{{translate('Country')}}</label>
                                <div class="col-md-8">
                                    <select class="form-control aiz-selectpicker" name="country_id" id="country_id" data-live-search="true" required>
                                        <option value="">{{ translate('Select Country') }}</option>
                                        @foreach (\App\Models\Country::all() as $country)
                                        <option value="{{ $country->id }}">
                                            {{ $country->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Price')}} <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="number" lang="en" min="0" value="0" step="0.01" placeholder="{{ translate('price') }}" name="price" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mar-all text-right mb-2">
                            <button type="submit" name="button" value="publish"
                                class="btn btn-primary">{{ translate('Add Country and Next') }}</button>
                        </div>
                    </div>
                </form>

                {{-- <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{ translate('SEO Meta Tags') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{ translate('Meta Title') }}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="meta_title"
                                    placeholder="{{ translate('Meta Title') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{ translate('Description') }}</label>
                            <div class="col-md-8">
                                <textarea name="meta_description" rows="8" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"
                                for="signinSrEmail">{{ translate('Meta Image') }}</label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ translate('Browse') }}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="meta_img" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection

@section('style')
<style>
    .card .row-section{
        background-color: #eeeeee57;
        padding: 20px;
    }
</style>
@endsection
