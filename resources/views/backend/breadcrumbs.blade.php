
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{$sez}} {{$title}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('Admin.Index')}}">Home</a></li>
                    <li>Gestione {{$slot}}</li>
                    <li class="active">{{$title}}</li>
                    <li class="active">{{$sez}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>