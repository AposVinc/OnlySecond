@extends('frontend.layout')

@section('content')
<!-- =====  CONTAINER START  ===== -->
<div class="container">
    <div class="row ">
        <!-- =====  BANNER START  ===== -->
        <div class="col-sm-12">
            <div class="breadcrumb ptb_20">
                <h1>Checkout</h1>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
        <!-- =====  BREADCRUMB END===== -->
        <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
            <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
                <div class="nav-responsive">
                    <div class="heading-part">
                        <h2 class="main_title">Top category</h2>
                    </div>
                    <ul class="nav  main-navigation collapse in">
                        <li><a href="#">Appliances</a></li>
                        <li><a href="#">Mobile Phones</a></li>
                        <li><a href="#">Tablet PC & Accessories</a></li>
                        <li><a href="#">Consumer Electronics</a></li>
                        <li><a href="#">Computers & Networking</a></li>
                        <li><a href="#">Electrical & Tools</a></li>
                        <li><a href="#">Apparel</a></li>
                        <li><a href="#">Bags & Shoes</a></li>
                        <li><a href="#">Toys & Hobbies</a></li>
                        <li><a href="#">Watches & Jewelry</a></li>
                        <li><a href="#">Home & Garden</a></li>
                        <li><a href="#">Health & Beauty</a></li>
                        <li><a href="#">Outdoors & Sports</a></li>
                    </ul>
                </div>
            </div>
            <!--<div class="left_banner left-sidebar-widget mb_50 mt_30"> <a href="#"><img src="images/left1.jpg" alt="Left Banner" class="img-responsive" /></a> </div>
            <div class="left-special left-sidebar-widget mb_50">
                <div class="heading-part mb_20 ">
                    <h2 class="main_title">Top Products</h2>
                </div>
                <div id="left-special" class="owl-carousel">
                    <ul class="row ">
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product8.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product8-1.jpg"> </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product9.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product9-1.jpg"> </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product10.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product10-1.jpg"> </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="row ">
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product1.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product1-1.jpg"> </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product2.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product2-1.jpg"> </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product3.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product3-1.jpg"> </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="row ">
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product4.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product4-1.jpg"> </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product5.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product5-1.jpg"> </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product6.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product6-1.jpg"> </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="row ">
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product7.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product7-1.jpg"> </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product8.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product8-1.jpg"> </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product9.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product9-1.jpg"> </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>-->
        </div>
        <div class="col-sm-8 col-lg-9 mtb_20">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default  ">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Step 1: Opzioni di Checkout <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3>Nuovo Cliente</h3>
                                    <p>Opzioni di Checkout:</p>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" checked="checked" value="register" name="account"> Registrazione Account</label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="guest" name="account"> Checkout Da Ospite</label>
                                    </div>
                                    <p>Creando un account sarai in grado di fare acquisti più velocemente, essere aggiornato sullo stato di un ordine e tenere traccia degli ordini che hai effettuato in precedenza.</p>
                                    <input type="button" class="btn mt_20" data-loading-text="Loading..." id="button-account" value="Continua">
                                </div>
                                <div class="col-sm-6">
                                    <h3>Cliente Registrato</h3>
                                    <p>Io sono un cliente abituale </p>
                                    <div class="form-group">
                                        <label for="input-email" class="control-label">E-Mail</label>
                                        <input type="text" class="form-control" id="input-email" placeholder="E-Mail" value="" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-password" class="control-label">Password</label>
                                        <input type="password" class="form-control" id="input-password" placeholder="Password" value="" name="password">
                                        <input type="button" class="btn" data-loading-text="Loading..." id="button-login" value="Login">
                                        <a class="pt_30" href="#">Password Dimenticata</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Step 2: Indirizzo Di Fatturazione <i class="fa fa-caret-down"></i></a> </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form class="form-horizontal">
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="existing" name="payment_address" data-id="payment-existing"> Voglio utilizzare un indirizzo esistente </label>
                                </div>
                                <div id="payment-existing">
                                    <select class="form-control" name="address_id">
                                        <option selected="selected" value="4">Via, Città, Provincia, Regione, Paese </option>
                                    </select>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="new" name="payment_address" data-id="payment-new"> Voglio utilizzare un nuovo indirizzo </label>
                                </div>
                                <br>
                                <div id="payment-new" style="display: none;">
                                    <div class="form-group required">
                                        <label for="input-payment-firstname" class="col-sm-2 control-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-payment-firstname" placeholder="Nome" value="" name="firstname">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-lastname" class="col-sm-2 control-label">Cognome</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-payment-lastname" placeholder="Cognome" value="" name="lastname">
                                        </div>
                                    </div>

                                    <div class="form-group required">
                                        <label for="input-payment-address-1" class="col-sm-2 control-label">Indirizzo</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-payment-address-1" placeholder="Indirizzo" value="" name="address_1">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-city" class="col-sm-2 control-label">Paese</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-payment-city" placeholder="Paese" value="" name="city">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-country" class="col-sm-2 control-label">Regione</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="input-payment-country" name="country_id">
                                                <option value=""> --- Seleziona --- </option>
                                                <option value="1">Abruzzo</option>
                                                <option value="2">Basilicata</option>
                                                <option value="3">Calabria</option>
                                                <option value="4">Campania</option>
                                                <option value="5">Emilia Romagna</option>
                                                <option value="6">Friuli Venezia Giulia</option>
                                                <option value="7">Lazio</option>
                                                <option value="8">Liguria</option>
                                                <option value="9">Lombardia</option>
                                                <option value="10">Marche</option>
                                                <option value="11">Molise</option>
                                                <option value="12">Piemonte</option>
                                                <option value="13">Puglia</option>
                                                <option value="14">Sardegna</option>
                                                <option value="15">Sicilia</option>
                                                <option value="16">Toscana</option>
                                                <option value="17">Trentino Alto Adige</option>
                                                <option value="18">Umbria</option>
                                                <option value="19">Valle D'Aosta</option>
                                                <option value="20">Veneto</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-city" class="col-sm-2 control-label">Città</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-payment-city" placeholder="Città" value="" name="city">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-payment-postcode" class="col-sm-2 control-label">Codice Postale</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-payment-postcode" placeholder="Codice Postale" value="" name="postcode">
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons clearfix">
                                    <div class="pull-right">
                                        <input type="button" class="btn" data-loading-text="Loading..." id="button-payment-address" value="Continua">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Step 3: Dettagli Spedizione <i class="fa fa-caret-down"></i></a> </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form class="form-horizontal">
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="existing" name="shipping_address"> Voglio utilizzare un indirizzo esistente </label>
                                </div>
                                <div id="shipping-existing">
                                    <select class="form-control" name="address_id">
                                        <option selected="selected" value="4">Via, Città, Provincia, Regione, Paese</option>
                                    </select>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="existing" name="shipping_address"> Voglio utilizzare l'indirizzo di fatturazione </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="new" name="shipping_address"> Voglio utilizzare un nuovo indirizzo </label>
                                </div>
                                <br>
                                <div id="shipping-new" style="display: none;">
                                    <div class="form-group required">
                                        <label for="input-payment-firstname" class="col-sm-2 control-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-payment-firstname" placeholder="Nome" value="" name="firstname">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-lastname" class="col-sm-2 control-label">Cognome</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-payment-lastname" placeholder="Cognome" value="" name="lastname">
                                        </div>
                                    </div>

                                    <div class="form-group required">
                                        <label for="input-payment-address-1" class="col-sm-2 control-label">Indirizzo</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-payment-address-1" placeholder="Indirizzo" value="" name="address_1">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-city" class="col-sm-2 control-label">Paese</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-payment-city" placeholder="Paese" value="" name="city">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-country" class="col-sm-2 control-label">Regione</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="input-payment-country" name="country_id">
                                                <option value=""> --- Seleziona --- </option>
                                                <option value="1">Abruzzo</option>
                                                <option value="2">Basilicata</option>
                                                <option value="3">Calabria</option>
                                                <option value="4">Campania</option>
                                                <option value="5">Emilia Romagna</option>
                                                <option value="6">Friuli Venezia Giulia</option>
                                                <option value="7">Lazio</option>
                                                <option value="8">Liguria</option>
                                                <option value="9">Lombardia</option>
                                                <option value="10">Marche</option>
                                                <option value="11">Molise</option>
                                                <option value="12">Piemonte</option>
                                                <option value="13">Puglia</option>
                                                <option value="14">Sardegna</option>
                                                <option value="15">Sicilia</option>
                                                <option value="16">Toscana</option>
                                                <option value="17">Trentino Alto Adige</option>
                                                <option value="18">Umbria</option>
                                                <option value="19">Valle D'Aosta</option>
                                                <option value="20">Veneto</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-city" class="col-sm-2 control-label">Città</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-payment-city" placeholder="Città" value="" name="city">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-payment-postcode" class="col-sm-2 control-label">Codice Postale</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-payment-postcode" placeholder="Codice Postale" value="" name="postcode">
                                        </div>
                                    </div>

                                </div>
                                <p><strong>Aggiungi informazioni aggiuntive per la spedizione</strong></p>
                                <p>
                                    <textarea class="form-control" rows="8" name="comment">es. Palazzo A, Scala B, Terzo Piano...</textarea>
                                </p>
                                <div class="buttons clearfix">
                                    <div class="pull-right">
                                        <input type="button" class="btn" data-loading-text="Loading..." id="button-shipping-address" value="Continua">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour">Step 4: Metodo Di Consegna <i class="fa fa-caret-down"></i></a> </h4>
                    </div>
                    <div id="collapsefour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Per favore seleziona il tuo metodo di consegna preferito per questo ordine.</p>
                            <div class="radio">
                                <label>
                                    <input type="radio" checked="checked" value="flat.flat" name="shipping_method"> Spedizione Standard- 5.00€ (4-5 giorni lavorativi)
                                        <p>Con ordine superiore a 150,00€, spedizione standard- 0,00€</p>

                                    <input type="radio" checked="checked" value="flat.flat" name="shipping_method"> Spedizione Rapida- 10.00€ (2 giorni lavorativi)
                                </label>
                            </div>

                            <div class="buttons">
                                <div class="pull-right">
                                    <input type="button" class="btn mt_20" data-loading-text="Loading..." id="button-shipping-method" value="Continua">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsefive">Step 5: Metodo Di Pagamento <i class="fa fa-caret-down"></i></a> </h4>
                    </div>
                    <div id="collapsefive" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Per favore seleziona il metodo di pagamento che preferisci utilizzare per quest'ordine</p>

                            <div class="radio">
                                <label>
                                    <input type="radio" checked="checked" value="cod" name="payment_method"> Pagamento con Bonifico </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" checked="new" value="cod" name="payment_method"> Pagamento con Paypal </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" checked="new" value="cod" name="payment_method"> Pagamento con Carta Di Credito </label>
                            </div>

                            <div class="buttons">
                                <div class="pull-right mt_20">Ho letto e sono d'accordo con i <a class="agree" href="#"><b>Termini e le Condizioni</b></a>
                                    <input type="checkbox" value="1" name="agree"> &nbsp;
                                    <input type="button" class="btn" data-loading-text="Loading..." id="button-payment-method" value="Continua">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsesix">Step 6: Conferma l'ordine <i class="fa fa-caret-down"></i></a> </h4>
                    </div>
                    <div id="collapsesix" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <td class="text-left"><strong>Nome del prodotto</strong></td>
                                        <td class="text-left"><strong>Brand</strong></td>
                                        <td class="text-left"><strong>Categoria</strong></td>
                                        <td class="text-right"><strong>Genere</strong></td>
                                        <td class="text-right"><strong>Colore</strong></td>
                                        <td class="text-right"><strong>Prezzo</strong></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-left"><a href="http://localhost/opc001/index.php?route=product/product&amp;product_id=46">Orologio Breil</a></td>
                                        <td class="text-left">Breil</td>
                                        <td class="text-left">64983</td>
                                        <td class="text-right">Donna</td>
                                        <td class="text-right">Nero</td>
                                        <td class="text-right">200,00€</td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td class="text-right" colspan="5"><strong>Prezzo:</strong></td>
                                        <td class="text-right">200,00€</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" colspan="5"><strong>Costo di spedizione:</strong></td>
                                        <td class="text-right">Gratuita</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" colspan="5"><strong>Totale:</strong></td>
                                        <td class="text-right">200,00€</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="buttons">
                                <div class="pull-right">
                                    <input type="button" data-loading-text="Loading..." class="btn" id="button-confirm" value="Conferma Ordine">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =====  CONTAINER END  ===== -->
@endsection