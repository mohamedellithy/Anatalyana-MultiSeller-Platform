
    <div class="appointments-lists">
        <div class="row list-section">
            <div class="col-md-12"> 
                <svg style="height: 40px;width: 10%;" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M30.8437 8.99793C30.2458 8.67709 28.9916 8.34168 27.2853 9.53751L25.1416 11.0542C24.9812 6.51876 23.0124 4.73959 18.2291 4.73959H9.47909C4.49159 4.73959 2.552 6.67918 2.552 11.6667V23.3333C2.552 26.6875 4.37492 30.2604 9.47909 30.2604H18.2291C23.0124 30.2604 24.9812 28.4813 25.1416 23.9458L27.2853 25.4625C28.1895 26.1042 28.977 26.3083 29.6041 26.3083C30.1437 26.3083 30.5666 26.1479 30.8437 26.0021C31.4416 25.6958 32.4478 24.8646 32.4478 22.7792V12.2208C32.4478 10.1354 31.4416 9.30418 30.8437 8.99793ZM16.0416 16.5958C14.5395 16.5958 13.2999 15.3708 13.2999 13.8542C13.2999 12.3375 14.5395 11.1125 16.0416 11.1125C17.5437 11.1125 18.7833 12.3375 18.7833 13.8542C18.7833 15.3708 17.5437 16.5958 16.0416 16.5958Z" fill="#2A5E98" fill-opacity="0.8"></path>
                </svg>
            </div>
        </div>
        <div class="row list-section">
            <div class="col-md-4"> 
                <strong>
                    {{ $appointment->title }}
                </strong>  
            </div>
            <div class="col-md-4"> 
                <strong>HOST : </strong> {{ $appointment->host_name }}
            </div>
            <div class="col-md-4">
                <span>
                    <strong> <i class="las la-video" style="font-weight: bold"></i> </strong>
                    {{ translate('Zoom Meetings') }}
                </span>
                @auth
                    @if($appointment->appointment_booked)
                        <span class="badge badge-primary" style="width: auto;">
                            {{ $appointment->appointment_booked->status}}
                        </span>
                    @endif
                @endauth
            </div>
        </div>
        <div class="row list-section">
            <div class="col-md-4">
                <strong>Start at : </strong> {{ $appointment->start_at }}
            </div>
            <div class="col-md-4"> 
                <strong>End at : </strong> {{ $appointment->end_at }}  
            </div>
            <div class="col-md-4">
                <strong>Date : </strong> {{ $appointment->date }}   
            </div>
            <div class="col-md-4"> 
                <strong>TimeZone : </strong> {{ timezones()[$appointment->timezone] }}
            </div>
            <div class="col-md-4"> 
                <strong>Languages : </strong> {{ count($appointment->appointment_languages) }}
            </div>
            <div class="col-md-4"> 
                <strong>Default Language: </strong> Arabic 
            </div>
        </div>
        <div class="row list-section">
            <div class="list-sections-description">
                {{ substr($appointment->description,0,120) }}
            </div>
        </div>
        <div class="row list-section" style="border-bottom: 0px">
            <div class="col-md-12 text-right"> 
                    @if($appointment->appointment_booked)
                        <button class="btn btn-success btn-sm slide-language" style="">
                            <i class="las la-tag"></i>
                            Booked
                        </button>
                    @else
                        <button class="btn btn-danger btn-sm slide-language" style="">
                            <i class="las la-plus"></i>
                            Booking Appointment
                        </button>
                    @endif
                {{-- @else
                    <button class="btn btn-danger btn-sm slide-language" style="">
                        <i class="las la-plus"></i>
                        Booking Appointment
                    </button>
                @endauth --}}
            </div>
        </div>
        <div class="row list-section list-section-langs">
            <table class="table">
                <tr>
                    <td colspan="2">
                        <h6>
                            <strong>
                                {{ translate('Availables Languages') }}
                            </strong>
                        </h6>
                    </td>
                </tr>
                @foreach($appointment->appointment_languages as $appointment_language)
                    <tr>
                        <td>
                            <i class="las la-language"></i>
                            <strong>
                                {{ languages_list()[$appointment_language->language] }}
                            </strong>
                        </td>
                        <td>
                            @auth
                                @if($appointment->appointment_booked)
                                    @if($appointment->appointment_booked->language == $appointment_language->language)
                                        <p class="" style="font-size: 15px;font-weight:bold;color:red">
                                            <i class="las la-check-circle"></i>
                                            {{ translate('Language Selected') }}
                                        </p>
                                    @endif
                                @else
                                    <button onclick="booking_appointment(this)" 
                                    data-lang="{{ $appointment_language->language }}" 
                                    data-appointment-id="{{ $appointment->id }}"
                                    class="btn btn-success btn-sm" style="border-radius: 30px !important;padding: 3px 12px;">
                                        <i class="las la-video"></i>
                                        {{ translate('Booking with the Language') }}
                                    </button>
                                @endif
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('user.login') }}">
                                    <i class="las la-video"></i>
                                    {{ translate('Booking with the Language') }}
                                </a>
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        @auth
            @if($appointment->appointment_booked)
                @if($appointment->appointment_booked->status == 'pending')
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <form action="{{ route('meetings.appointments.cancel',['id' => $appointment->appointment_booked->id , 'status' => 'cancelled']) }}"  method="post">
                                @csrf()
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="las la-minus-circle"></i>
                                    {{ translate('Cancele ') }}
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            @endif
        @endauth
    </div>
