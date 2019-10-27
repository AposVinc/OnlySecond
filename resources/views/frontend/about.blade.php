@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container mt_30">
        <div class="row ">
            <div class="col-sm-12 col-lg-auto mtb_20">
                <!-- about  -->
                <div class="row">
                    <div class="col-md-12">
                        <figure> <img src="{{asset($fields->ab_path_img_storia)}}" alt=""> </figure>
                    </div>
                    <div class="col-md-12">
                        <div class="about-text">
                            <div class="about-heading-wrap">
                                <h2 class="about-heading mb_20 mt_40 ptb_10"> La Storia Della Nostra Azienda <span> Only Second </span></h2>
                            </div>
                            <p>{{$fields->ab_desc_storia}}</p>
                        </div>
                    </div>
                </div>


                <div class="heading-part mb_20 mt_40">
                    <h2 class="main_title">Perchè Acquistare su OnlySecond?</h2>
                </div>

                <div class="row">
                    <div class="panel-group col-lg-12" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. {{$fields->ab_why_tit_1}}</a> </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>{{$fields->ab_why_txt_1}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">2. {{$fields->ab_why_tit_2}}</a> </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>{{$fields->ab_why_txt_2}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">3. {{$fields->ab_why_tit_3}}</a> </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>{{$fields->ab_why_txt_3}}</p>
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">4. {{$fields->ab_why_tit_4}}</a> </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>{{$fields->ab_why_txt_4}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">5. {{$fields->ab_why_tit_5}}</a> </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>{{$fields->ab_why_txt_5}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">6. {{$fields->ab_why_tit_6}}</a> </h4>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>{{$fields->ab_why_txt_6}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="heading-part mb_10">
                    <h2 class="main_title mt_50">Il Nostro Team</h2>
                </div>

                <div class="team_grid box">
                    <div class="team3col owl-carousel">
                        <div class="item team-detail">
                            <div class="team-item-img"> <img src="{{asset($fields->ab_team_path_1)}}" alt="" /> </div>
                            <h4 class="team-title  mtb_10">{{$fields->ab_team_name_1}}</h4>
                            <p>{{$fields->ab_team_desc_1}}</p>
                            <ul class="social mt_20 mb_80">
                                <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.dribbble.com/" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="https://www.behance.net/" target="_blank"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                        <div class="item team-detail">
                            <div class="team-item-img"> <img src="{{asset($fields->ab_team_path_2)}}" alt="" /> </div>
                            <h4 class="team-title  mtb_10">{{$fields->ab_team_name_2}}</h4>
                            <p>{{$fields->ab_team_desc_2}}</p>
                            <ul class="social mt_20 mb_80">
                                <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.dribbble.com/" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="https://www.behance.net/" target="_blank"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                        <div class="item team-detail">
                            <div class="team-item-img"> <img src="{{asset($fields->ab_team_path_3)}}" alt="" /> </div>
                            <h4 class="team-title  mtb_10">{{$fields->ab_team_name_3}}</h4>
                            <p>{{$fields->ab_team_desc_3}}</p>
                            <ul class="social mt_20 mb_80">
                                <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.dribbble.com/" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="https://www.behance.net/" target="_blank"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- =====  CONTAINER END  ===== -->
@endsection
