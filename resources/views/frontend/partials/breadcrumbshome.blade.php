<!-- =====  BREADCRUMB START  ===== -->
<div class="col-sm-12">
    <div class="breadcrumb ptb_20">
        <h1>{{$slot}}</h1>
        <ul>
            <li><a href="{{route('Home')}}">Home</a></li>
            <li class="active">{{$slot}}</li>
        </ul>
    </div>
</div>
<!-- =====  BREADCRUMB END  ===== -->

@include('frontend.partials.message')

