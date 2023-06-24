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
                <form action="{{ route('seller.update-agency-term',['term_id' => $term->agency_term_id,'lang' => $lang]) }}"
                    method="POST" enctype="multipart/form-data" id="add_terms">
                    <input type="hidden" name="lang" value="{{ $lang }}" />
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <ul class="nav nav-tabs nav-fill border-light">
                            @foreach (\App\Models\Language::all() as $key => $language)
                            <li class="nav-item">
                                <a class="nav-link text-reset @if ($language->code == $lang) active @else bg-soft-dark border-light border-left-0 @endif py-3" href="{{ route('seller.edit-agency-term', ['lang'=> $language->code ,'agency_country_id'=>$term->agency_country_id,'term_id'=>$term->agency_term_id]) }}">
                                    <img src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}" height="11" class="mr-1">
                                    <span>{{$language->name}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('Country\'s Agency Terms') }}</h5>
                        </div>
                        <div class="card-body ">
                            <div class="row-section row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{ translate('Term Title') }} *</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control"  name="name" placeholder="term name" required>{{ $term->name }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{ translate('Required Fill') }}</label>
                                        <div class="col-md-8">
                                            <label class="aiz-switch aiz-switch-success mb-0">
                                                <input type="checkbox" name="is_must" value="1" {{ $term->is_must == 1 ? "checked" : '' }}>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{ translate('Field Type') }} *</label>
                                        <div class="col-md-8">
                                            <select class="form-control aiz-selectpicker" name="type_field" id="flash_discount_type">
                                                <option value="file"  {{ $term->type_field == 'file'  ? 'selected' : '' }}>{{translate('Upload File Field')}}</option>
                                                <option value="image" {{ $term->type_field == 'image' ? 'selected' : '' }}>{{translate('Upload Image Field')}}</option>
                                                <option value="text"  {{ $term->type_field == 'text'  ? 'selected' : '' }}>{{ translate('Fill Text Field') }}</option>
                                                <option value="date"  {{ $term->type_field == 'date'  ? 'selected' : '' }}>{{translate('Fill Date Field')}}</option>
                                                <option value="alert" {{ $term->type_field == 'alert' ? 'selected' : '' }}>{{translate('Just Alert')}}</option>
                                                <option value="checkbox" {{ $term->type_field == 'checkbox' ? 'selected' : '' }}>{{translate('CheckBox')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Attachment File')}}</label>
                                        <div class="col-md-8">
                                            <div class="input-group" data-toggle="aizuploader" data-type="document,image">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                                </div>
                                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                                <input type="hidden" name="attachment_id" value="{{ $term->attachment_id }}" class="selected-files">
                                            </div>
                                            <div class="file-preview box sm">
                                            </div>
                                            <small class="text-muted">{{translate('This Attachment is visible to descripe terms or more infos.')}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mar-all text-right mb-2">
                            <button type="submit" name="button" value="publish"
                                class="btn btn-primary">{{ translate('Update Term') }}
                            </button>
                            <a class="btn btn-danger" href="{{ route('seller.agencies') }}">{{ translate('Next') }}</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
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
                            @foreach($agency_terms as $key => $agency_term)
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
                                    <td>

                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('seller.edit-agency-term', ['agency_country_id'=>$agency_term->agency_country_id,'term_id'=>$agency_term->agency_term_id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                            <i class="las la-edit"></i>
                                        </a>

                                        <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('seller.delete-agency-term', $agency_term->agency_term_id)}}" title="{{ translate('Delete') }}">
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
