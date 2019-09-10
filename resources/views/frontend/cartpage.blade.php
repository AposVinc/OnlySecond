@extends('frontend.layout')

@section('content')
<!-- =====  CONTAINER START  ===== -->
<div class="container">
    <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
            <div class="breadcrumb ptb_20">
                <h1>Carrello</h1>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Carrello</li>
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
             <div class="left_banner left-sidebar-widget mb_50 mt_30"> <a href="#"><img src="images/left1.jpg" alt="Left Banner" class="img-responsive" /></a>
             </div>
                     <div class="left-special left-sidebar-widget mb_50">
                          <div class="heading-part mb_20 ">
                              <h2 class="main_title">Top Products</h2>
                          </div>
                          <div id="left-special" class="owl-carousel">
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
                                              <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="Breil Classic" alt="Breil Classic" src="images/product/product3.jpg"> <img class="img-responsive" title="Breil " alt="Breil Classic" src="images/product/product3-1.jpg"> </a> </div>
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
                              <ul class="row ">
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
                              </ul>
                          </div>
                      </div>
        </div>
        <div class="col-sm-8 col-lg-9 mtb_20">
            <form enctype="multipart/form-data" method="post" action="#">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td class="text-center">Immagine</td>
                            <td class="text-left">Nome Prodotto</td>
                            <td class="text-left">Collezione</td>
                            <td class="text-left">Categoria</td>
                            <td class="text-left">Genere</td>
                            <td class="text-right">Quantità</td>
                            <td class="text-right">Prezzo</td>
                            <td class="text-right">Totale</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center"><a href="#"><img src="images/product/70x84.jpg" alt="Breil Classic" title="Breil Classic"></a></td>
                            <td class="text-left"><a href="product.html">Breil</a></td>
                            <td class="text-left">Cod collezione</td>
                            <td class="text-left">Categoria</td>
                            <td class="text-left">Uomo</td>
                            <td class="text-left">
                                <div style="max-width: 200px;" class="input-group btn-block">
                                    <input type="text" class="form-control quantity" size="1" value="1" name="quantity">
                                    <span class="input-group-btn">
                      <button class="btn" title="" data-toggle="tooltip" type="submit" data-original-title="Update"><i class="fa fa-refresh"></i></button>
                      <button  class="btn btn-danger" title="" data-toggle="tooltip" type="button" data-original-title="Remove"><i class="fa fa-times-circle"></i></button>
                      </span></div>
                            </td>
                            <td class="text-right">230.00€</td>
                            <td class="text-right">230.00€</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>

            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td class="text-right"><strong>Sub-Totale:</strong></td>
                            <td class="text-right">230.00€</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Tassa(Iva 5%):</strong></td>
                            <td class="text-right">11.50€</td>
                        </tr>

                        <tr>
                            <td class="text-right"><strong>Totale:</strong></td>
                            <td class="text-right">241.50€</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <form action="{{route('Shop')}}">
                <input class="btn pull-left mt_30" type="submit" value="Continua Lo Shopping" />
            </form>
            <form action="{{route('Checkout')}}">
                <input class="btn pull-right mt_30" type="submit" value="Checkout" />
            </form>
        </div>
    </div>
    <div id="brand_carouse" class="ptb_30 text-center">
        <div class="type-01">
            <div class="heading-part mb_20 ">
                <h2 class="main_title">Brand Logo</h2>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="brand owl-carousel ptb_20">
                        <div class="item text-center"> <a href="#"><img src="images/brand/brand1.png" alt="Disney" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="images/brand/brand2.png" alt="Dell" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="images/brand/brand3.png" alt="Harley" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="images/brand/brand4.png" alt="Canon" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="images/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="images/brand/brand6.png" alt="Canon" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="images/brand/brand7.png" alt="Canon" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="images/brand/brand8.png" alt="Canon" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="images/brand/brand9.png" alt="Canon" class="img-responsive" /></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =====  CONTAINER END  ===== -->
    @endsection
