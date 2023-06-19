 <!-- Address -->
 <div class="row">
    <p class="alert col-md-12" style="width: 100%;background-color: #fafafa;">
         - {{ translate('Terms') }} -
    </p>
 </div>
 @foreach($agency_terms as $term)
    <div class="row">
        @if($term->type_field == 'alert')
            <div class="col-md-12">
                <p class="alert alert-info">
                    <i class="las la-info-circle"></i>
                    {{ $term->name }}
                </p>
            </div>
        @elseif($term->type_field == 'checkbox')
            <div class="col-md-12">
                <label>
                    <input class="mb-3 rounded-0"  type="checkbox" name="term_{{ $term->id }}" {{ $term->is_must == 1 ? 'required' : '' }}/>
                    {{ $term->name }}
                </label>
            </div>
        @else
            <div class="col-md-6">
                <label>
                    {{ $term->name }}
                </label>
            </div>
        @endif

        @if($term->type_field != 'alert' || $term->type_field != 'checkbox')
            <div class="col-md-6">
                @if($term->type_field == 'image' || $term->type_field == 'file')
                    <div class="input-group" data-toggle="aizuploader" data-type="{{ $term->type_field == 'image' ? 'image' : 'document' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium rounded-0">{{ translate('Browse')}}</div>
                        </div>
                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                        <input type="hidden" name="term_{{ $term->id }}" value="" class="selected-files">
                    </div>
                    <div class="file-preview box sm"></div>
                    <br/>
                @elseif($term->type_field == 'date')
                    <input class="form-control mb-3 rounded-0"  type="date" name="term_{{ $term->id }}" {{ $term->is_must == 1 ? 'required' : '' }}/>
                @elseif($term->type_field == 'text')
                    <textarea class="form-control mb-3 rounded-0" placeholder="{{ translate('Your Address')}}" rows="2" name="term_{{ $term->id }}" {{ $term->is_must == 1 ? 'required' : '' }}></textarea>
                @endif
            </div>
        @endif
    </div>
@endforeach
