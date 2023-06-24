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
                <form class="" action="{{ route('seller.update-agency-country',['agency_country_id' => $agency_country->id]) }}" method="POST" enctype="multipart/form-data"
                    id="choice_form">
                    @method('PUT')
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
                                        <option value="{{ $country->id }}" {{ $agency_country->country->id == $country->id  ? 'selected' : ''}}>
                                            {{ $country->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Price')}} <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="number" lang="en" min="0" value="{{ $agency_country->price ?: 0 }}" step="0.01" placeholder="{{ translate('price') }}" name="price" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mar-all text-right mb-2">
                            <button type="submit" name="button" value="publish"
                                class="btn btn-primary">{{ translate('Update Country') }}</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-12">
                <h5>
                    {{ translate('Terms') }}
                </h5>
                <div class="text-right">
                     <a class="btn btn-danger btn-sm" href="{{ route('seller.create-agency-terms',$agency_country->id) }}">
                        {{ translate('Add New Term') }}
                     </a>
                </div>
                <div class="card-body">
                    <table class="table aiz-table mb-0">
                        <thead>
                            <tr>
                                <th data-breakpoints="lg">#</th>
                                <th>{{translate('term')}}</th>
                                <th data-breakpoints="lg">{{ translate('File Type') }}</th>
                                <th data-breakpoints="lg">{{translate('is must')}}</th>
                                <th data-breakpoints="lg">{{translate('options')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agency_country->agency_terms as $key => $agency_term)
                                <tr>
                                    <td>{{ $agency_term->id }}</td>
                                    <td>{{ $agency_term->name }}</td>
                                    <td>{{ $agency_term->type_field }}</td>
                                    <td>
                                        @if($agency_term->is_must == 1)
                                            {{ translate('must') }}
                                        @else
                                            {{ translate('not must') }}
                                        @endif
                                    </td>
                                    <td >

                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('seller.edit-agency-term', ['agency_country_id'=>$agency_term->agency_country_id,'term_id'=>$agency_term->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                            <i class="las la-edit"></i>
                                        </a>

                                        <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{ route('seller.delete-agency-term',['term_id' => $agency_term->id]) }}" title="{{ translate('Delete') }}">
                                            <i class="las la-trash"></i>

                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="aiz-pagination">
                        {{-- {{ $agencies->appends(request()->input())->links() }} --}}
                    </div>
                </div>
            </div>

        </div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('style')
<style>
    .card .row-section{
        background-color: #eeeeee57;
        padding: 20px;
    }
</style>
@endsection
