@extends('seller.layouts.app')

@section('panel_content')

    <div class="aiz-titlebar mt-2 mb-4">
      <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{ translate('Agency') }}</h1>
        </div>
      </div>
    </div>

    <div class="row gutters-10 justify-content-center">
        @if($agency)
            <div class="col-md-4 mx-auto mb-3">
                <h4>{{ $agency->name }}</h4>
                <div class="alert">
                    @if($agency->status == 1)
                         <strong class="badge badge-inline badge-success">
                           {{ translate('Agency is Actived') }}
                        </strong>
                    @elseif($agency->status == 0)
                        <strong class="badge badge-inline badge-danger">
                            {{ translate('Agency is Not Actived') }}
                        </strong>
                    @endif
                </div>
                <p>
                    {!! substr(strip_tags($agency->bio),0,300) !!} ...
                </p>
                <a href="{{ route('seller.agency-info')}}" class="btn btn-info btn-sm">{{ translate("Edit Information") }} <i class="las la-edit"></i></a>
            </div>
        @else
            <div class="col-md-4 mx-auto mb-3" >
                <a href="{{ route('seller.agency-info')}}">
                <div class="p-3 rounded mb-3 c-pointer text-center bg-white shadow-sm hov-shadow-lg has-transition">
                    <span class="size-60px rounded-circle mx-auto bg-secondary d-flex align-items-center justify-content-center mb-3">
                        <i class="las la-landmark la-3x text-white"></i>
                    </span>
                    <div class="fs-18 text-primary">{{ translate('Add Company Information') }}</div>
                </div>
                </a>
            </div>
        @endif
        <div class="col-md-4 mx-auto mb-3" >
            <a href="{{ route('seller.create-agency-country')}}">
              <div class="p-3 rounded mb-3 c-pointer text-center bg-white shadow-sm hov-shadow-lg has-transition">
                  <span class="size-60px rounded-circle mx-auto bg-secondary d-flex align-items-center justify-content-center mb-3">
                      <i class="las la-plus la-3x text-white"></i>
                  </span>
                  <div class="fs-18 text-primary">{{ translate('Add New Agency') }}</div>
              </div>
            </a>
        </div>
    </div>

    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th>{{translate('Country')}}</th>
                    <th data-breakpoints="lg">{{ translate('Price') }}</th>
                    <th data-breakpoints="lg">{{translate('status')}}</th>
                    <th data-breakpoints="lg">{{ translate('created_at') }}</th>
                    <th data-breakpoints="lg" class="text-right">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @isset($agency_countries)
                    @foreach($agency_countries as $key => $agency)
                        <tr>
                            <td>{{ $agency->id }}</td>
                            <td>
                                <img src="{{ static_asset('assets/img/flags/'.strtolower($agency->country->code).'.png') }}" height="11" class="mr-1">
                                {{ $agency->country->name }}
                            </td>
                            <td>{{ single_price($agency->price) }}</td>
                            <td>
                                @if($agency->status == 1)
                                {{ translate('active') }}
                                @else
                                    {{ translate('not active') }}
                                @endif
                            </td>
                            <td>{{ $agency->created_at }}</td>
                            <td class="text-right">

                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('seller.edit-agency-country', ['agency_country_id'=>$agency->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                    <i class="las la-edit"></i>
                                </a>

                                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('seller.delete-agency-country',['agency_country_id' => $agency->id])}}" title="{{ translate('Delete') }}">
                                    <i class="las la-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
        <div class="aiz-pagination">
        @isset($agency_countries)
            {{ $agency_countries->appends(request()->input())->links() }}
        @endisset
        </div>
    </div>
@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

