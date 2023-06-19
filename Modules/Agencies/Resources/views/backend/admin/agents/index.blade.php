@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0 h6 text-center">{{translate('Agency Information')}}</h4>
        </div>
        <div class="card-body text-center">
            <div class="row">
                <div class="col-md-2">
                    <img style="margin-bottom: 17px;" class="img-thumbnail" src="{{ uploaded_asset($agency->campany_image) }}" />
                </div>
                <div class="col-md-10">
                    <div class="">
                        <h5 class="title-agency text-left">
                            {{ $agency->name }}
                        </h5>
                        <div class="section-inner text-left">
                            <div class="text-left">{{ substr(strip_tags($agency->bio),0.100) }}</div>
                            <br/>
                            <a class="btn btn-dark btn-sm" href="{{route('admin.agencies-show', ['id'=>$agency->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                <i class="las la-eye"></i>
                                {{ translate('Details Agency') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <form id="sort_orders" action="" method="GET">
          <div class="card-header row gutters-5">
            <div class="col text-center text-md-left">
              <h5 class="mb-md-0 h6">{{ translate('Agents') }}</h5>
            </div>
              <div class="col-md-2 ml-auto">
                  <select class="form-control aiz-selectpicker" data-placeholder="{{ translate('Filter by Payment Status')}}" name="payment_status" onchange="sort_orders()">
                      <option value="">{{ translate('Filter by Payment Status')}}</option>
                      <option value="paid" @isset($payment_status) @if($payment_status == 'paid') selected @endif @endisset>{{ translate('Paid')}}</option>
                      <option value="unpaid" @isset($payment_status) @if($payment_status == 'unpaid') selected @endif @endisset>{{ translate('Un-Paid')}}</option>
                  </select>
              </div>

              <div class="col-md-2 ml-auto">
                <select class="form-control aiz-selectpicker" data-placeholder="{{ translate('Filter by Status')}}" name="status" onchange="sort_orders()">
                    <option value="">{{ translate('Filter by Status')}}</option>
                    <option value="pending" @isset($status) @if($status == 'pending') selected @endif @endisset>{{ translate('Pending')}}</option>
                    <option value="approved" @isset($status) @if($status == 'approved') selected @endif @endisset>{{ translate('Approved')}}</option>
                    <option value="refused" @isset($status) @if($status == 'refused') selected @endif @endisset>{{ translate('Refused')}}</option>
                </select>
              </div>
              <div class="col-md-2">
                <div class="from-group mb-0">
                    <input type="text" class="form-control" id="search" name="search" @isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type Email Customer & hit Enter') }}">
                </div>
              </div>
          </div>
        </form>

        @if (count($agents) > 0)
            <div class="card-body p-3">
                <table class="table aiz-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ translate('Customer Email')}}</th>
                            <th>{{ translate('Customer')}}</th>
                            <th data-breakpoints="lg">{{ translate('country')}}</th>
                            <th data-breakpoints="lg">{{ translate('Price')}}</th>
                            <th data-breakpoints="md">{{ translate('Date')}}</th>
                            <th data-breakpoints="lg">{{ translate('Status')}}</th>
                            <th>{{ translate('Payment Status')}}</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agents as $key => $agent)
                           <tr>
                              <td>{{ $agent->id }}</td>
                              <td>{{ $agent->customer->email }}</td>
                              <td>{{ $agent->first_name . ' '.$agent->last_name ?: $agent->customer->name }}</td>
                              <td class="pl-0">
                                <img class='img-country' src="{{ static_asset('assets/img/flags/'.strtolower($agent->agency_country->country->code).'.png') }}" height="11" class="mr-1">
                                {{ $agent->agency_country->country->name }}
                              </td>
                              <td class="pl-0">
                                {{ single_price($agent->agency_country->price) }}
                             </td>
                             <td class="pl-0">
                                {{ $agent->created_at }}
                             </td>
                             <td>
                                {{ $agent->status }}
                             </td>
                             <td>
                                @if ($agent->payment_status == 'paid')
                                    <span class="badge badge-inline badge-success">{{ translate('Paid')}}</span>
                                @else
                                    <span class="badge badge-inline badge-danger">{{ translate('Unpaid')}}</span>
                                @endif
                            </td>
                            
                           </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="aiz-pagination">
                    {{ $agents->links() }}
              	</div>
            </div>
        @endif
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        function sort_orders(el){
            $('#sort_orders').submit();
        }
    </script>
@endsection
