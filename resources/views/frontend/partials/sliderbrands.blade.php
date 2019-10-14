
<div id="brand_carouse" class="ptb_30 text-center">
    <div class="type-01">
        <div class="heading-part mb_10 ">
            <h2 class="main_title">Brand Logo</h2>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="brand owl-carousel ptb_20">
                    @foreach($brands as $brand)
                        <div class="logoBrand item text-center">
                            <a href="#" class="helper">
                                <img src="{{asset($brand->path_logo)}}" alt="{{$brand->name}}" class="img-responsive" />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
