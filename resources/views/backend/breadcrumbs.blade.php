<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{$op}} {{$slot}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('Admin.Index')}}">Home</a></li>
                    <li>Gestione {{$gest}}</li>
                    <li class="active">{{$sez}}</li>
                    <li class="active">{{$op}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div id="error"> <!-- errore gestito con JS-->
</div>

@include('backend.alertmessage')


