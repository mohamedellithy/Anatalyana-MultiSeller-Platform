@extends('seller.layouts.app')

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
                <form action="{{ route('seller.store-agency-terms',['agency_country_id' => $agency_country_id]) }}"
                    method="POST" enctype="multipart/form-data" id="add_terms">
                    <input type="hidden" name="agency_country" />
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">
                                {{ translate('Country\'s Agency Terms') }} 
                                @if($agency_country)
                                    (
                                    <img src="{{ static_asset('assets/img/flags/'.strtolower($agency_country->country->code).'.png') }}" height="11" class="mr-1">
                                    {{ $agency_country->country->name }}
                                    )
                                @endif
                            </h5>
                        </div>
                        <div class="card-body ">
                            <div class="row-section row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{ translate('Term Title') }} *</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control"  name="name" placeholder="term name" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{ translate('Required Fill') }}</label>
                                        <div class="col-md-8">
                                            <label class="aiz-switch aiz-switch-success mb-0">
                                                <input type="checkbox" name="is_must" value="1" checked="">
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
                                                <option value="file">{{translate('Upload File Field')}}</option>
                                                <option value="image">{{translate('Upload Image Field')}}</option>
                                                <option value="text">{{ translate('Fill Text Field') }}</option>
                                                <option value="date">{{translate('Fill Date Field')}}</option>
                                                <option value="alert">{{translate('Just Alert')}}</option>
                                                <option value="checkbox">{{translate('CheckBox')}}</option>
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
                                                <input type="hidden" name="attachment_id" class="selected-files">
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
                                class="btn btn-primary">{{ translate('Add Terms') }}
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
                                    <td >
                                        <a class="btn btn-soft-success btn-icon btn-circle btn-sm" href="{{route('seller.edit-agency-term', ['agency_country_id'=>$agency_term->agency_country_id,'term_id'=>$agency_term->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}"  target="_blank" title="{{ translate('View') }}">
                                            <i class="las la-eye"></i>
                                        </a>
                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('seller.edit-agency-term', ['agency_country_id'=>$agency_term->agency_country_id,'term_id'=>$agency_term->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}"  title="{{ translate('Edit') }}">
                                            <i class="las la-edit"></i>
                                        </a>
            
                                        <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('seller.create-agency-country', $agency_term->id)}}" title="{{ translate('Delete') }}">
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
        // jQuery(document).ready(function(){
        //     jQuery('form#add_terms').submit(function(e){
        //         e.preventDefault();
        //         let data = {};
        //         data.term_name     = jQuery('#term_name').val();
        //         data.is_must       = jQuery('#is_must').val();
        //         data.type_field    = jQuery('#type_field').val();
        //         data.attachment_id = jQuery('#attachment_id').val();
        //         $.ajax({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             type:"POST",
        //             url:'',
        //             data:data,
        //             success: function(data) {
        //                 console.log(data);
        //             },
        //             error:function(xhr, textStatus, errorThrown){
        //                 console.log(JSON.parse(xhr.responseText));
        //             }
        //         });
        //     });
        // });
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
