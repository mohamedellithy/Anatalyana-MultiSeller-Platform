@php $translation = get_from_translations($agency->agency_translation); @endphp
<div class="col-md-2 frame-agency">
    <div class="card-content">
        <a class="d-block h-conatiner-image">
            <img class="mx-auto img-fit" src="{{ uploaded_asset($translation->campany_image) }}"/>
        </a>
        <p class="agency-name">
            <a class="agency-name" href="#">
                {{ $translation->name  }}
            </a>
        </p>
        <p>
            @if($agency)
                @if($agency->status == 1)
                    <a href="{{ route('agency-join',['agency_id' => $agency->id]) }}" class="btn btn-warning btn-sm">
                        <i class="las la-plus-circle"></i>
                        {{ translate('Join Now') }}
                    </a>
                @endif
            @endif
            <a href="{{ route('agency-show',['agency_id' => $agency->id]) }}" class="btn btn-dark btn-sm">
                <i class="las la-eye"></i>
                {{ translate('Details') }}
            </a>
        </p>
    </div>
</div>


{{-- <div class="col-md-2 frame-agency">
    <div class="card-content">
        <a class="d-block h-conatiner-image">
            <img class="mx-auto img-fit" src="https://logos-world.net/wp-content/uploads/2020/04/Huawei-Logo.png"/>
        </a>
        <p class="agency-name">
            <a class="agency-name" href="#">
                agency from boo
            </a>
        </p>
        <p>
            <a href="#" class="btn btn-warning btn-sm">
                <i class="las la-plus-circle"></i>
                Join Now
            </a>
            <a href="#" class="btn btn-dark btn-sm">
                <i class="las la-eye"></i>
                Details
            </a>
        </p>
    </div>
</div>

<div class="col-md-2 frame-agency">
    <div class="card-content">
        <a class="d-block h-conatiner-image">
            <img class="mx-auto img-fit" src="https://www.tailorbrands.com/wp-content/uploads/2020/07/mcdonalds-logo.jpg"/>
        </a>
        <p class="agency-name">
            <a class="agency-name" href="#">
                agency from boo
            </a>
        </p>
        <p>
            <a href="#" class="btn btn-warning btn-sm">
                <i class="las la-plus-circle"></i>
                Join Now
            </a>
            <a href="#" class="btn btn-dark btn-sm">
                <i class="las la-eye"></i>
                Details
            </a>
        </p>
    </div>
</div>

<div class="col-md-2 frame-agency">
    <div class="card-content">
        <a class="d-block h-conatiner-image">
            <img class="mx-auto img-fit" src="https://logos-world.net/wp-content/uploads/2020/12/Lays-Logo.png"/>
        </a>
        <p class="agency-name">
            <a class="agency-name" href="#">
                agency from boo
            </a>
        </p>
        <p>
            <a href="#" class="btn btn-warning btn-sm">
                <i class="las la-plus-circle"></i>
                Join Now
            </a>
            <a href="#" class="btn btn-dark btn-sm">
                <i class="las la-eye"></i>
                Details
            </a>
        </p>
    </div>
</div>

<div class="col-md-2 frame-agency">
    <div class="card-content">
        <a class="d-block h-conatiner-image">
            <img class="mx-auto img-fit" src="https://www.logodesignlove.com/wp-content/uploads/2022/01/logo-wave-symbol-01.jpg"/>
        </a>
        <p class="agency-name">
            <a class="agency-name" href="#">
                agency from boo
            </a>
        </p>
        <p>
            <a href="#" class="btn btn-warning btn-sm">
                <i class="las la-plus-circle"></i>
                Join Now
            </a>
            <a href="#" class="btn btn-dark btn-sm">
                <i class="las la-eye"></i>
                Details
            </a>
        </p>
    </div>
</div>


<div class="col-md-2 frame-agency">
    <div class="card-content">
        <a class="d-block h-conatiner-image">
            <img class="mx-auto img-fit" src="https://99designs-blog.imgix.net/blog/wp-content/uploads/2017/05/attachment_61493098-e1582727199132.png?auto=format&q=60&fit=max&w=930"/>
        </a>
        <p class="agency-name">
            <a class="agency-name" href="#">
                agency from boo
            </a>
        </p>
        <p>
            <a href="#" class="btn btn-warning btn-sm">
                <i class="las la-plus-circle"></i>
                Join Now
            </a>
            <a href="#" class="btn btn-dark btn-sm">
                <i class="las la-eye"></i>
                Details
            </a>
        </p>
    </div>
</div>

<div class="col-md-2 frame-agency">
    <div class="card-content">
        <a class="d-block h-conatiner-image">
            <img class="mx-auto img-fit" src="https://brandmark.io/logo-rank/random/twitter.png"/>
        </a>
        <p class="agency-name">
            <a class="agency-name" href="#">
                agency from boo
            </a>
        </p>
        <p>
            <a href="#" class="btn btn-warning btn-sm">
                <i class="las la-plus-circle"></i>
                Join Now
            </a>
            <a href="#" class="btn btn-dark btn-sm">
                <i class="las la-eye"></i>
                Details
            </a>
        </p>
    </div>
</div> --}}




<style>
    .frame-agency{
        text-align: center;
        border:1px solid #f5f5f5;
    }
    .card-content{
        padding: 10px;

    }
    .agency-name{
        padding: 15px 0px;
        font-size: 16px;
        color: black;
        font-weight: 500;
    }
    .h-conatiner-image{
        min-height: 207px;
        max-height: 207px;
        height: 207px;
        //background-color: #f4f4f4;
        padding: 10px;
        border-radius: 13px;
        overflow: hidden;
    }
</style>
