@if(session('success') or session('error'))
    <div class="col-sm-12">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible show mt_30" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session('error'))
                <div class="alert alert-danger alert-dismissible show mt_30" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        @endif
    </div>
@endif


