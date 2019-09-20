<!-- =====  BANNER START  ===== -->
<div class="col-sm-12">
    <div class="breadcrumb ptb_20">
        <h1>{{$slot}}</h1>
        <ul>
            <li><a href="{{route('Profile')}}">Il Mio Profilo</a></li>
            <li class="active">{{$slot}}</li>
        </ul>
    </div>
</div>
