@extends('seller.layouts.app')

@section('sub_menu')
   @include('meetings::sub_menus.seller_meetings')
@endsection

@php $selected_languages = "" @endphp
@section('panel_content')
    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">{{ translate('Add New Appointment') }}</h1>
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
                <form class="" action="{{ route('seller.meetings.appointments.update',$appointment->id) }}" method="POST" enctype="multipart/form-data"
                    id="choice_form">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{ translate('Appointment Status') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('Status of Appointment')}}</label>
                                        <div class="col-md-8">
                                            <label class="aiz-switch aiz-switch-success mb-0">
                                                <input value="1" name="status" type="checkbox" {{ ($appointment->status == 1) ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{ translate('Appointment Information') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('Title Of Appointment')}}</label>
                                        <div class="col-md-8">
                                            <input class="form-control" value="{{ $appointment->title }}" name="title" id="title_of_appointment" data-live-search="true" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('Title Of Appointment')}}</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="description" id="title_of_appointment" data-live-search="true">{{ $appointment->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('Host Name')}}</label>
                                        <div class="col-md-8">
                                            <input class="form-control" value="{{ $appointment->host_name }}" name="host_name" data-live-search="true" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{ translate('Appointment Dates') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row" id="country">
                                        <label class="col-md-3 col-from-label">{{translate('TimeZone')}}</label>
                                        <div class="col-md-8">
                                            <select class="form-control aiz-selectpicker" name="timezone" data-live-search="true">
                                                <option value="">{{ translate('Select TimeZones') }}</option>
                                                @foreach (timezones() as $code => $timezone)
                                                <option value="{{ $code }}" @if($appointment->timezone == $code) selected @endif>
                                                    {{ $timezone }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="country">
                                        <label class="col-md-3 col-from-label">{{translate('Date')}}</label>
                                        <div class="col-md-8">
                                            <input type="date" value="{{ $appointment->date }}" placeholder="{{ translate('Date') }}" name="date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('Start At')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="time" value="{{ $appointment->start_at }}" placeholder="{{ translate('Start At') }}" name="start_at" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('End At')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="time" value="{{ $appointment->end_at }}" placeholder="{{ translate('End At') }}" name="end_at" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card" id="AddLanguagesForm">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{ translate('Add Languages') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('Languages')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <select class="form-control aiz-selectpicker" name="languages" id="language_id" data-live-search="true">
                                                <option value="">{{ translate('Select Language') }}</option>
                                                @foreach (languages_list() as $code => $language)
                                                <option value="{{ $code }}">
                                                    {{ $language }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <button id="add_new_language" type="button" class="btn btn-success btn-sm">{{ translate('Add Language') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{ translate('Appointment Languages') }}</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Language Code</th>
                                                <th>Languages</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="LanguagesAdded">
                                            @foreach($appointment->appointment_languages as $lang)
                                                @php $selected_languages .= $lang->language."|" @endphp
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $lang->language }}</td>
                                                    <td>{{ languages_list()[$lang->language] }}</td>
                                                    <td>
                                                        <i class="las la-times-circle" data-code="{{  $lang->language }}"></i>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <br/><br/>
                            <div class="mar-all text-right mb-2">
                                <button type="submit" name="button" value="publish"
                                    class="btn btn-primary">{{ translate('Update Appointment') }}</button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="selected_languages" value="{{ $selected_languages  }}" id="selected_languages" />
                </form>
            </div>

        </div>
@endsection

@section('script')
    <script>
        jQuery('document').ready(function(){
            let languages = <?php echo  json_encode(languages_list()) ?>;
            jQuery('#add_new_language').click(function(){
                let language  = jQuery('#language_id').val();
                let counter   = jQuery('#LanguagesAdded tr').length + 1;
                jQuery('#language_id').selectpicker('val',"");
                console.log(languages);
                jQuery('#LanguagesAdded').append(`<tr>
                    <td>${counter}</td>
                    <td>${language}</td>
                    <td>${languages[language]}</td>
                    <td>
                        <i class="las la-times-circle" data-code="${language}"></i>
                    </td>
                </tr>`);

                let selectedLanguage = jQuery('#selected_languages').val() || '';
                jQuery('#selected_languages').val(selectedLanguage+language+'|');
            });

            jQuery("#LanguagesAdded").on('click','.la-times-circle',function(e){
                let language = jQuery(this).attr('data-code');
                let selectedLanguage = jQuery('#selected_languages').val();
                selectedLanguage = selectedLanguage.replace(language+'|','');
                console.log(selectedLanguage);
                jQuery('#selected_languages').val(selectedLanguage);
                jQuery(this).parents('tr').remove();
            });
        }); 
    </script>
@endsection

@section('custom_style')
<style>
    .aiz-main-content > div{
        padding: 30px;
        background-color: #2a5e9824;
        border-radius: 12px;
    }
    .card{
        margin: 0px;
        border-radius: 0px !important;
    }
    .la-times-circle{
        color: red;
        font-size: 20px;
        border-radius: 30px;
        padding: 5px;
        font-weight: bold;
        cursor: pointer;
    }
</style>
@endsection