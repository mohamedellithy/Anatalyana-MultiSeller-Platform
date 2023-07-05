@extends('seller.layouts.app')

@section('sub_menu')
   @include('meetings::sub_menus.seller_meetings')
@endsection

@php $selected_languages = "" @endphp
@section('panel_content')
    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">{{ translate('Booking Appointment no # '.$booking_request->id) }}</h1>
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
                <form class="" action="{{ route('seller.meetings.appointments.booking.update',$booking_request->id) }}" method="POST" enctype="multipart/form-data"
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
                                        <label class="col-md-3 col-from-label">{{translate('Appointment Status')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <select class="form-control aiz-selectpicker" name="status" id="language_id" data-live-search="true">
                                                <option value="">{{ translate('Appointment Status') }}</option>
                                                <option value="pending"   {{ $booking_request->status == 'pending' ? 'selected' : ''}} >{{ translate('Pending') }}</option>
                                                <option value="accepted"  {{ $booking_request->status == 'accepted' ? 'selected' : ''}} >{{ translate('Accepted') }}</option>
                                                <option value="cancelled" {{ $booking_request->status == 'cancelled' ? 'selected' : ''}} >{{ translate('Cancelled') }}</option>
                                                <option value="completed" {{ $booking_request->status == 'cancelled' ? 'selected' : ''}} >{{ translate('Completed') }}</option>
                                                <option value="refused"   {{ $booking_request->status == 'refused' ? 'selected' : ''}} >{{ translate('Refused') }}</option>
                                            </select>
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
                                            <p class="">{{ $booking_request->appointment->title }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('Title Of Appointment')}}</label>
                                        <div class="col-md-8">
                                            <p class="">{{ $booking_request->appointment->description }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('Host Name')}}</label>
                                        <div class="col-md-8">
                                            <p class="">{{ $booking_request->appointment->host_name}}</p>
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
                                        <strong class="col-md-3 col-from-label">{{translate('TimeZone')}}</strong>
                                        <div class="col-md-8">
                                            <p class="">{{ timezones()[$booking_request->appointment->timezone] }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="country">
                                        <strong class="col-md-3 col-from-label">{{translate('Date')}}</strong>
                                        <div class="col-md-8">
                                            <p class="">{{ $booking_request->appointment->date }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <strong class="col-md-3 col-from-label">{{translate('Start At')}} <span class="text-danger">*</span></strong>
                                        <div class="col-md-6">
                                            <p class="">{{ $booking_request->appointment->start_at }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <strong class="col-md-3 col-from-label">{{translate('End At')}} <span class="text-danger">*</span></strong>
                                        <div class="col-md-6">
                                            <p class="">{{  $booking_request->appointment->end_at}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <strong class="col-md-3 col-from-label">{{translate('Language')}} <span class="text-danger">*</span></strong>
                                        <div class="col-md-6">
                                            <p class="">{{  languages_list()[$booking_request->language] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card" id="AddLanguagesForm">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{ translate('Payment Status') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('Payment Status')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <select class="form-control aiz-selectpicker" name="payment_status" id="language_id" data-live-search="true">
                                                <option value="">{{ translate('Payment Status') }}</option>
                                                <option value="pending"   {{ $booking_request->status == 'pending' ? 'selected' : ''}} >{{ translate('Pending') }}</option>
                                                <option value="accepted"  {{ $booking_request->status == 'accepted' ? 'selected' : ''}} >{{ translate('Accepted') }}</option>
                                                <option value="cancelled" {{ $booking_request->status == 'cancelled' ? 'selected' : ''}} >{{ translate('Cancelled') }}</option>
                                                <option value="completed" {{ $booking_request->status == 'cancelled' ? 'selected' : ''}} >{{ translate('Completed') }}</option>
                                                <option value="refused"   {{ $booking_request->status == 'refused' ? 'selected' : ''}} >{{ translate('Refused') }}</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{ translate('Meeting Info') }}</h5>
                                </div>
                                <div class="card-body">
                                    
                                    @if($booking_request->status != 'accepted')
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <p class="alert alert-info text-center">
                                                    {{ translate('Meeting not allowed till') }}
                                                </p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group row">
                                            <strong class="col-md-3 col-from-label">{{translate('Meeting Start Link')}}</strong>
                                            <div class="col-md-6">
                                                @if($booking_request->zoom_meeting_info)
                                                    <p class="">{{ $booking_request->zoom_meeting_info->start_url ?: '-' }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <strong class="col-md-3 col-from-label">{{translate('Meeting Join Link')}}</strong>
                                            <div class="col-md-6">
                                                @if($booking_request->zoom_meeting_info)
                                                    <p class="">{{ $booking_request->zoom_meeting_info->join_url ?: '-' }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <strong class="col-md-3 col-from-label">{{translate('Application Name')}}</strong>
                                            <div class="col-md-6">
                                                <p class="">{{ translate("Zoom App") }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <strong class="col-md-3 col-from-label">{{translate('Password Meeting')}}</strong>
                                            <div class="col-md-6">
                                                @if($booking_request->zoom_meeting_info)
                                                    <p class="">
                                                        {{ $booking_request->zoom_meeting_info->password ?: '-' }}
                                                    </p>
                                                @else
                                                    <p>
                                                        {{ translate('not available') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                @if($booking_request->zoom_meeting_info)
                                                    <a target="_blank" href="{{ $booking_request->zoom_meeting_info->start_url }}" class="btn btn-success btn-sm">
                                                        <i class="las la-video"></i>
                                                        {{ translate('Join to Meeting') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <br/>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{ translate('User Info') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <strong class="col-md-3 col-from-label">{{translate('Name')}}</strong>
                                        <div class="col-md-6">
                                            <p class="">{{ $booking_request->user->name ?: '-' }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <strong class="col-md-3 col-from-label">{{translate('Email')}}</strong>
                                        <div class="col-md-6">
                                            <p class="">{{ $booking_request->user->email ?: '-' }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <strong class="col-md-3 col-from-label">{{translate('Phone')}}</strong>
                                        <div class="col-md-6">
                                            <p class="">{{ $booking_request->user->phone ?: '-' }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <strong class="col-md-3 col-from-label">{{translate('Country')}}</strong>
                                        <div class="col-md-6">
                                            <p class="">{{ $booking_request->user->country ?: '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{ translate('Payment Info') }}</h5>
                                </div>
                                <div class="card-body">
                                     <p class="alert alert-info text-center">
                                        {{ translate('No Payment Infos') }}
                                     </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <br/><br/>
                            <div class="mar-all text-right mb-2">
                                <button type="submit" name="button" value="publish"
                                    class="btn btn-primary">{{ translate('Update Booking') }}</button>
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