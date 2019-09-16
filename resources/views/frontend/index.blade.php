@extends('frontend.layout')

@section('content')
    <!-- =====  BANNER START  ===== -->
    <div class="banner">
        <div class="main-banner owl-carousel">
            <div class="item"><a href="#"><img src="{{asset('images/frontend/banner/Misfit-Vapor.png')}}" alt="Main Banner" class="img-responsive" /></a></div>
            <div class="item"><a href="#"><img src="{{asset('images/frontend/banner/edifice-radio.png')}}" alt="Main Banner" class="img-responsive" /></a></div>
        </div>
    </div>
    <!-- =====  BANNER END  ===== -->
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <!-- =====  SUB BANNER  STRAT ===== -->
        <div class="row">
            <div class="col-sm-3 mt_20 cms-icon ">
                <div class="feature-i-left ptb_30 ">
                    <div class="icon-right Shipping"></div>
                    <h6>Free Shipping</h6>
                    <p>Free dedlivery worldwide</p>
                </div>
            </div>
            <div class="col-sm-3 mt_20 cms-icon ">
                <div class="feature-i-left ptb_30 ">
                    <div class="icon-right Order"></div>
                    <h6>Order Online</h6>
                    <p>Hours : 8am - 11pm</p>
                </div>
            </div>
            <div class="col-sm-3 mt_20 cms-icon ">
                <div class="feature-i-left ptb_30 ">
                    <div class="icon-right Save"></div>
                    <h6>Shop And Save</h6>
                    <p>For All Spices & Herbs</p>
                </div>
            </div>
            <div class="col-sm-3 mt_20 cms-icon ">
                <div class="feature-i-left ptb_30 ">
                    <div class="icon-right Safe"></div>
                    <h6>Safe Shoping</h6>
                    <p>Ensure genuine 100%</p>
                </div>
            </div>
        </div>

        @include('frontend.partials.sliderproducts')

        <div class="row">
            <div class="cms_banner">
                <div class="col-xs-12 mt_60">
                    <div id="subbanner4" class="sub-hover">
                        <div class="sub-img"><a href="#"><img src="images/sub5.jpg" alt="Sub Banner5" class="img-responsive"></a></div>
                    </div>
                </div>
            </div>

            @include('frontend.partials.slideroffers')

            <div class="col-sm-12 mtb_10">
                <!-- =====  Blog ===== -->
                <div id="Blog" class="mt_50">
                    <div class="heading-part mb_10 ">
                        <h2 class="main_title">Latest News</h2>
                    </div>
                    <div class="blog-contain box">
                        <div class="blog owl-carousel ">
                            <div class="item">
                                <div class="box-holder">
                                    <div class="thumb post-img"><a href="#"> <img src="images/blog/blog_img_01.jpg" alt="themini"> </a>
                                        <div class="date-time text-center">
                                            <div class="day"> 11</div>
                                            <div class="month">Aug</div>
                                        </div>
                                        <div class="post-image-hover"> </div>
                                        <div class="post-info">
                                            <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                                            <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                                            <div class="view-blog">
                                                <div class="write-comment pull-left"> <a href="single_blog.html"> 0 Comments</a> </div>
                                                <div class="read-more pull-right"> <a href="single_blog.html"> <i class="fa fa-link"></i> read more</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="box-holder">
                                    <div class="thumb post-img"><a href="#"> <img src="images/blog/blog_img_02.jpg" alt="themini"> </a>
                                        <div class="date-time text-center">
                                            <div class="day"> 11</div>
                                            <div class="month">Aug</div>
                                        </div>
                                        <div class="post-image-hover"> </div>
                                        <div class="post-info">
                                            <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                                            <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                                            <div class="view-blog">
                                                <div class="write-comment pull-left"> <a href="single_blog.html"> 0 Comments</a> </div>
                                                <div class="read-more pull-right"> <a href="single_blog.html"> <i class="fa fa-link"></i> read more</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="box-holder">
                                    <div class="thumb post-img"><a href="#"> <img src="images/blog/blog_img_03.jpg" alt="themini"> </a>
                                        <div class="date-time text-center">
                                            <div class="day"> 11</div>
                                            <div class="month">Aug</div>
                                        </div>
                                        <div class="post-image-hover"> </div>
                                        <div class="post-info">
                                            <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                                            <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                                            <div class="view-blog">
                                                <div class="write-comment pull-left"> <a href="single_blog.html"> 0 Comments</a> </div>
                                                <div class="read-more pull-right"> <a href="single_blog.html"> <i class="fa fa-link"></i> read more</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="box-holder">
                                    <div class="thumb post-img"><a href="#"> <img src="images/blog/blog_img_04.jpg" alt="themini"> </a>
                                        <div class="date-time text-center">
                                            <div class="day"> 11</div>
                                            <div class="month">Aug</div>
                                        </div>
                                        <div class="post-image-hover"> </div>
                                        <div class="post-info">
                                            <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                                            <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                                            <div class="view-blog">
                                                <div class="write-comment pull-left"> <a href="single_blog.html"> 0 Comments</a> </div>
                                                <div class="read-more pull-right"> <a href="single_blog.html"> <i class="fa fa-link"></i> read more</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- =====  Blog end ===== -->
                </div>
            </div>
        </div>
        <!-- =====  SUB BANNER END  ===== -->

        @include('frontend.partials.sliderbrands')

    </div>
    <!-- =====  CONTAINER END  ===== -->

@endsection
