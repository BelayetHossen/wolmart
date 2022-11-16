@extends('frontend.layouts.app')


@Section('main-content')





<main class="main">


    <div class="container">
        <div class="row">

            {{-- Category --}}
            {{-- <div class="col-md-3">
                <div class="category_box">
                    <ul class="menu vertical-menu category-menu">
                        <li class="has-submenu">
                            <a href="shop-fullwidth-banner.html"> <i class="w-icon-tshirt2"></i>Fashion </a>
                            <ul class="megamenu">
                                <li>
                                    <h4 class="menu-title">Women</h4>
                                    <hr class="divider" />
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">New Arrivals</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Best Sellers</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Accessories</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Jewlery &amp; Watches</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <h4 class="menu-title">Men</h4>
                                    <hr class="divider" />
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">New Arrivals</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Best Sellers</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Accessories</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Jewlery &amp; Watches</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="banner-fixed menu-banner menu-banner2">
                                        <figure>
                                            <img src="assets/images/menu/banner-2.jpg" alt="Menu Banner" width="235"
                                                height="347" />
                                        </figure>
                                        <div class="banner-content">
                                            <div class="banner-price-info mb-1 ls-normal">
                                                Get up to
                                                <strong class="text-primary text-uppercase">20%Off</strong>
                                            </div>
                                            <h3 class="banner-title ls-normal">Hot Sales</h3>
                                            <a href="shop-banner-sidebar.html"
                                                class="btn btn-dark btn-sm btn-link btn-slide-right btn-icon-right">
                                                Shop Now<i class="w-icon-long-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="shop-fullwidth-banner.html"> <i class="w-icon-home"></i>Home &amp; Garden </a>
                            <ul class="megamenu">
                                <li>
                                    <h4 class="menu-title">Bedroom</h4>
                                    <hr class="divider" />
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Beds, Frames &amp; Bases</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Dressers</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Nightstands</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Kid's Beds &amp; Headboards</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Armoires</a></li>
                                    </ul>

                                    <h4 class="menu-title mt-1">Living Room</h4>
                                    <hr class="divider" />
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Coffee Tables</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Chairs</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Tables</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Futons &amp; Sofa Beds</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Cabinets &amp; Chests</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <h4 class="menu-title">Office</h4>
                                    <hr class="divider" />
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Office Chairs</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Desks</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bookcases</a></li>
                                        <li><a href="shop-fullwidth-banner.html">File Cabinets</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Breakroom Tables</a></li>
                                    </ul>

                                    <h4 class="menu-title mt-1">Kitchen &amp; Dining</h4>
                                    <hr class="divider" />
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Dining Sets</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Kitchen Storage Cabinets</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bashers Racks</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Dining Chairs</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Dining Room Tables</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bar Stools</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="menu-banner banner-fixed menu-banner3">
                                        <figure>
                                            <img src="assets/images/menu/banner-3.jpg" alt="Menu Banner" width="235"
                                                height="461" />
                                        </figure>
                                        <div class="banner-content">
                                            <h4 class="banner-subtitle font-weight-normal text-white mb-1">
                                                Restroom
                                            </h4>
                                            <h3 class="banner-title font-weight-bolder text-white ls-normal">
                                                Furniture Sale
                                            </h3>
                                            <div class="banner-price-info text-white font-weight-normal ls-25">Up to
                                                <span class="text-secondary text-uppercase font-weight-bold">25%
                                                    Off</span>
                                            </div>
                                            <a href="shop-banner-sidebar.html"
                                                class="btn btn-white btn-link btn-sm btn-slide-right btn-icon-right">
                                                Shop Now<i class="w-icon-long-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="shop-fullwidth-banner.html"> <i class="w-icon-electronics"></i>Electronics </a>
                            <ul class="megamenu">
                                <li>
                                    <h4 class="menu-title">Laptops &amp; Computers</h4>
                                    <hr class="divider" />
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Desktop Computers</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Monitors</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Laptops</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Hard Drives &amp; Storage</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Computer Accessories</a></li>
                                    </ul>

                                    <h4 class="menu-title mt-1">TV &amp; Video</h4>
                                    <hr class="divider" />
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">TVs</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Home Audio Speakers</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Projectors</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Media Streaming Devices</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <h4 class="menu-title">Digital Cameras</h4>
                                    <hr class="divider" />
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Digital SLR Cameras</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Sports &amp; Action Cameras</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Camera Lenses</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Photo Printer</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Digital Memory Cards</a></li>
                                    </ul>

                                    <h4 class="menu-title mt-1">Cell Phones</h4>
                                    <hr class="divider" />
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Carrier Phones</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Unlocked Phones</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Phone &amp; Cellphone Cases</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Cellphone Chargers</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="menu-banner banner-fixed menu-banner4">
                                        <figure>
                                            <img src="assets/images/menu/banner-4.jpg" alt="Menu Banner" width="235"
                                                height="433" />
                                        </figure>
                                        <div class="banner-content">
                                            <h4 class="banner-subtitle font-weight-normal">Deals Of The Week</h4>
                                            <h3 class="banner-title text-white">Save On Smart EarPhone</h3>
                                            <div
                                                class="banner-price-info text-secondary font-weight-bolder text-uppercase text-secondary">
                                                20% Off
                                            </div>
                                            <a href="shop-banner-sidebar.html"
                                                class="btn btn-white btn-outline btn-sm btn-rounded">Shop Now</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="shop-fullwidth-banner.html"> <i class="w-icon-furniture"></i>Furniture </a>
                            <ul class="megamenu type2">
                                <li class="row">
                                    <div class="col-md-3 col-lg-3 col-6">
                                        <h4 class="menu-title">Furniture</h4>
                                        <hr class="divider" />
                                        <ul>
                                            <li><a href="shop-fullwidth-banner.html">Sofas &amp; Couches</a></li>
                                            <li><a href="shop-fullwidth-banner.html">Armchairs</a></li>
                                            <li><a href="shop-fullwidth-banner.html">Bed Frames</a></li>
                                            <li><a href="shop-fullwidth-banner.html">Beside Tables</a></li>
                                            <li><a href="shop-fullwidth-banner.html">Dressing Tables</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-6">
                                        <h4 class="menu-title">Lighting</h4>
                                        <hr class="divider" />
                                        <ul>
                                            <li><a href="shop-fullwidth-banner.html">Light Bulbs</a></li>
                                            <li><a href="shop-fullwidth-banner.html">Lamps</a></li>
                                            <li><a href="shop-fullwidth-banner.html">Celling Lights</a></li>
                                            <li><a href="shop-fullwidth-banner.html">Wall Lights</a></li>
                                            <li><a href="shop-fullwidth-banner.html">Bathroom Lighting</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-6">
                                        <h4 class="menu-title">Home Accessories</h4>
                                        <hr class="divider" />
                                        <ul>
                                            <li><a href="shop-fullwidth-banner.html">Decorative Accessories</a></li>
                                            <li><a href="shop-fullwidth-banner.html">Candals &amp; Holders</a></li>
                                            <li><a href="shop-fullwidth-banner.html">Home Fragrance</a></li>
                                            <li><a href="shop-fullwidth-banner.html">Mirrors</a></li>
                                            <li><a href="shop-fullwidth-banner.html">Clocks</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-6">
                                        <h4 class="menu-title">Garden &amp; Outdoors</h4>
                                        <hr class="divider" />
                                        <ul>
                                            <li><a href="shop-fullwidth-banner.html">Garden Furniture</a></li>
                                            <li><a href="shop-fullwidth-banner.html">Lawn Mowers</a></li>
                                            <li><a href="shop-fullwidth-banner.html">Pressure Washers</a></li>
                                            <li><a href="shop-fullwidth-banner.html">All Garden Tools</a></li>
                                            <li><a href="shop-fullwidth-banner.html">Outdoor Dining</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-6">
                                        <div class="banner banner-fixed menu-banner5 br-xs">
                                            <figure>
                                                <img src="assets/images/menu/banner-5.jpg" alt="Banner" width="410"
                                                    height="123" style="background-color: #d2d2d2;" />
                                            </figure>
                                            <div class="banner-content text-right y-50">
                                                <h4
                                                    class="banner-subtitle font-weight-normal text-default text-capitalize">
                                                    New Arrivals
                                                </h4>
                                                <h3 class="banner-title font-weight-bolder text-capitalize ls-normal">
                                                    Amazing Sofa
                                                </h3>
                                                <div class="banner-price-info font-weight-normal ls-normal">Starting at
                                                    <strong>$125.00</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="banner banner-fixed menu-banner5 br-xs">
                                            <figure>
                                                <img src="assets/images/menu/banner-6.jpg" alt="Banner" width="410"
                                                    height="123" style="background-color: #9f9888;" />
                                            </figure>
                                            <div class="banner-content y-50">
                                                <h4
                                                    class="banner-subtitle font-weight-normal text-white text-capitalize">
                                                    Best Seller
                                                </h4>
                                                <h3
                                                    class="banner-title font-weight-bolder text-capitalize text-white ls-normal">
                                                    Chair &amp; Lamp
                                                </h3>
                                                <div class="banner-price-info font-weight-normal ls-normal text-white">
                                                    From <strong>$165.00</strong></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html"> <i class="w-icon-heartbeat"></i>Healthy &amp; Beauty
                            </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html"> <i class="w-icon-gift"></i>Gift Ideas </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html"> <i class="w-icon-gamepad"></i>Toy &amp; Games </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html"> <i class="w-icon-ice-cream"></i>Cooking </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html"> <i class="w-icon-ios"></i>Smart Phones </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html"> <i class="w-icon-ruby"></i>Accessories </a>
                        </li>
                        <li>
                            <a href="shop-banner-sidebar.html"
                                class="font-weight-bold text-primary text-uppercase ls-25"> View All Categories<i
                                    class="w-icon-angle-right"></i> </a>
                        </li>
                    </ul>
                </div>

            </div> --}}
            <div class="col-md-12">
                {{-- Slider --}}
                <section class="intro-section">
                    <div class="swiper-container swiper-theme nav-inner pg-inner swiper-nav-lg animation-slider pg-xxl-hide nav-xxl-show nav-hide"
                        data-swiper-options="{
                                        'slidesPerView': 1,
                                        'autoplay': {
                                            'delay': 8000,
                                            'disableOnInteraction': false
                                        }
                                    }">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide banner banner-fixed intro-slide intro-slide1"
                                style="background-image: url(assets/images/demos/demo1/sliders/slide-1.jpg); background-color: #ebeef2;">
                                <div class="container">
                                    <figure class="slide-image skrollable slide-animate">
                                        <img src="{{asset('')}}frontend/assets/images/demos/demo1/sliders/shoes.png"
                                            alt="Banner" data-bottom-top="transform: translateY(10vh);"
                                            data-top-bottom="transform: translateY(-10vh);" width="474" height="397" />
                                    </figure>
                                    <div class="banner-content y-50 text-right">
                                        <h5 class="banner-subtitle font-weight-normal text-default ls-50 lh-1 mb-2 slide-animate"
                                            data-animation-options="{
                                                'name': 'fadeInRightShorter',
                                                'duration': '1s',
                                                'delay': '.2s'
                                            }">
                                            Custom <span class="p-relative d-inline-block">Men’s</span>
                                        </h5>
                                        <h3 class="banner-title font-weight-bolder ls-25 lh-1 slide-animate"
                                            data-animation-options="{
                                                'name': 'fadeInRightShorter',
                                                'duration': '1s',
                                                'delay': '.4s'
                                            }">
                                            RUNNING SHOES
                                        </h3>
                                        <p class="font-weight-normal text-default slide-animate" data-animation-options="{
                                                'name': 'fadeInRightShorter',
                                                'duration': '1s',
                                                'delay': '.6s'
                                            }">
                                            Sale up to <span class="font-weight-bolder text-secondary">30% OFF</span>
                                        </p>

                                        <a href="shop-list.html"
                                            class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                                            data-animation-options="{
                                                'name': 'fadeInRightShorter',
                                                'duration': '1s',
                                                'delay': '.8s'
                                            }">
                                            SHOP NOW<i class="w-icon-long-arrow-right"></i>
                                        </a>
                                    </div>
                                    <!-- End of .banner-content -->
                                </div>
                                <!-- End of .container -->
                            </div>
                            <!-- End of .intro-slide1 -->

                            <div class="swiper-slide banner banner-fixed intro-slide intro-slide2"
                                style="background-image: url(assets/images/demos/demo1/sliders/slide-2.jpg); background-color: #ebeef2;">
                                <div class="container">
                                    <figure class="slide-image skrollable slide-animate" data-animation-options="{
                                                'name': 'fadeInUpShorter',
                                                'duration': '1s'
                                            }">
                                        <img src="{{asset('')}}frontend/assets/images/demos/demo1/sliders/men.png"
                                            alt="Banner" data-bottom-top="transform: translateX(10vh);"
                                            data-top-bottom="transform: translateX(-10vh);" width="480" height="633" />
                                    </figure>
                                    <div class="banner-content d-inline-block y-50">
                                        <h5 class="banner-subtitle font-weight-normal text-default ls-50 slide-animate"
                                            data-animation-options="{
                                                    'name': 'fadeInUpShorter',
                                                    'duration': '1s',
                                                    'delay': '.2s'
                                                }">
                                            Mountain-<span class="text-secondary">Climbing</span>
                                        </h5>
                                        <h3 class="banner-title font-weight-bolder text-dark mb-0 ls-25 slide-animate"
                                            data-animation-options="{
                                                    'name': 'fadeInUpShorter',
                                                    'duration': '1s',
                                                    'delay': '.4s'
                                                }">
                                            Hot & Packback
                                        </h3>
                                        <p class="font-weight-normal text-default slide-animate" data-animation-options="{
                                                    'name': 'fadeInUpShorter',
                                                    'duration': '1s',
                                                    'delay': '.8s'
                                                }">
                                            Only until the end of this week.
                                        </p>
                                        <a href="shop-banner-sidebar.html"
                                            class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                                            data-animation-options="{
                                                    'name': 'fadeInUpShorter',
                                                    'duration': '1s',
                                                    'delay': '1s'
                                                }">
                                            SHOP NOW<i class="w-icon-long-arrow-right"></i>
                                        </a>
                                    </div>
                                    <!-- End of .banner-content -->
                                </div>
                                <!-- End of .container -->
                            </div>
                            <!-- End of .intro-slide2 -->

                            <div class="swiper-slide banner banner-fixed intro-slide intro-slide3"
                                style="background-image: url(assets/images/demos/demo1/sliders/slide-3.jpg); background-color: #f0f1f2;">
                                <div class="container">
                                    <figure class="slide-image skrollable slide-animate" data-animation-options="{
                                                'name': 'fadeInDownShorter',
                                                'duration': '1s'
                                            }">
                                        <img src="{{asset('')}}frontend/assets/images/demos/demo1/sliders/skate.png"
                                            alt="Banner" data-bottom-top="transform: translateY(10vh);"
                                            data-top-bottom="transform: translateY(-10vh);" width="310" height="444" />
                                    </figure>
                                    <div class="banner-content text-right y-50">
                                        <p class="font-weight-normal text-default text-uppercase mb-0 slide-animate"
                                            data-animation-options="{
                                                    'name': 'fadeInLeftShorter',
                                                    'duration': '1s',
                                                    'delay': '.6s'
                                                }">
                                            Top weekly Seller
                                        </p>
                                        <h5 class="banner-subtitle font-weight-normal text-default ls-25 slide-animate"
                                            data-animation-options="{
                                                    'name': 'fadeInLeftShorter',
                                                    'duration': '1s',
                                                    'delay': '.4s'
                                                }">
                                            Trending Collection
                                        </h5>
                                        <h3 class="banner-title p-relative font-weight-bolder ls-50 slide-animate"
                                            data-animation-options="{
                                                    'name': 'fadeInLeftShorter',
                                                    'duration': '1s',
                                                    'delay': '.2s'
                                                }">
                                            <span class="text-white mr-4">Roller</span>-skate
                                        </h3>
                                        <div class="btn-group slide-animate" data-animation-options="{
                                                    'name': 'fadeInLeftShorter',
                                                    'duration': '1s',
                                                    'delay': '.8s'
                                                }">
                                            <a href="shop-list.html"
                                                class="btn btn-dark btn-outline btn-rounded btn-icon-right">SHOP NOW<i
                                                    class="w-icon-long-arrow-right"></i></a>
                                        </div>
                                        <!-- End of .banner-content -->
                                    </div>
                                    <!-- End of .container -->
                                </div>
                            </div>
                            <!-- End of .intro-slide3 -->
                        </div>
                        <div class="swiper-pagination"></div>
                        <button class="swiper-button-next"></button>
                        <button class="swiper-button-prev"></button>
                    </div>
                    <!-- End of .swiper-container -->
                </section>
                <!-- End of .intro-section -->
            </div>
        </div>
    </div>





    {{-- Icon box --}}
    <div class="container">
        <div class="swiper-container appear-animate icon-box-wrapper br-sm mt-6 mb-6" data-swiper-options="{
                            'slidesPerView': 1,
                            'loop': false,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 2
                                },
                                '768': {
                                    'slidesPerView': 3
                                },
                                '1200': {
                                    'slidesPerView': 4
                                }
                            }
                        }">
            <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
                <div class="swiper-slide icon-box icon-box-side icon-box-primary">
                    <span class="icon-box-icon icon-shipping">
                        <i class="w-icon-truck"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title font-weight-bold mb-1">Free Shipping & Returns</h4>
                        <p class="text-default">For all orders over $99</p>
                    </div>
                </div>
                <div class="swiper-slide icon-box icon-box-side icon-box-primary">
                    <span class="icon-box-icon icon-payment">
                        <i class="w-icon-bag"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title font-weight-bold mb-1">Secure Payment</h4>
                        <p class="text-default">We ensure secure payment</p>
                    </div>
                </div>
                <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-money">
                    <span class="icon-box-icon icon-money">
                        <i class="w-icon-money"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title font-weight-bold mb-1">Money Back Guarantee</h4>
                        <p class="text-default">Any back within 30 days</p>
                    </div>
                </div>
                <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-chat">
                    <span class="icon-box-icon icon-chat">
                        <i class="w-icon-chat"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title font-weight-bold mb-1">Customer Support</h4>
                        <p class="text-default">Call or email us 24/7</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Iocn Box Wrapper -->




    {{-- Promotion banner --}}
    <div class="container mt-3">
        <div class="row category-cosmetic-lifestyle appear-animate mb-5">
            <div class="col-md-6 ">
                <div class="banner banner-fixed category-banner-1 br-xs">
                    <figure>
                        <img src="{{asset('')}}frontend/assets/images/demos/demo1/categories/3-1.jpg"
                            alt="Category Banner" width="610" height="200" style="background-color: #3b4b48;" />
                    </figure>
                    <div class="banner-content y-50 pt-1">
                        <h5 class="banner-subtitle font-weight-bold text-uppercase">Natural Process</h5>
                        <h3 class="banner-title font-weight-bolder text-capitalize text-white">
                            Cosmetic Makeup<br />
                            Professional
                        </h3>
                        <a href="shop-banner-sidebar.html"
                            class="btn btn-white btn-link btn-underline btn-icon-right">Shop Now<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="banner banner-fixed category-banner-2 br-xs">
                    <figure>
                        <img src="{{asset('')}}frontend/assets/images/demos/demo1/categories/3-2.jpg"
                            alt="Category Banner" width="610" height="200" style="background-color: #e5e5e5;" />
                    </figure>
                    <div class="banner-content y-50 pt-1">
                        <h5 class="banner-subtitle font-weight-bold text-uppercase">Trending Now</h5>
                        <h3 class="banner-title font-weight-bolder text-capitalize">
                            Women's Lifestyle<br />
                            Collection
                        </h3>
                        <a href="shop-banner-sidebar.html"
                            class="btn btn-dark btn-link btn-underline btn-icon-right">Shop Now<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Category Cosmetic Lifestyle -->





    {{-- Hot deals --}}
    <div class="container">

        <div class="row deals-wrapper appear-animate mb-8">
            <div class="col-lg-9 mb-4">
                <div class="single-product h-100 br-sm">
                    <h4 class="title-sm title-underline font-weight-bolder ls-normal">
                        Hot Deals of The Day
                    </h4>
                    <div class="swiper">
                        <div class="swiper-container swiper-theme nav-top swiper-nav-lg" data-swiper-options="{
                                            'spaceBetween': 20,
                                            'slidesPerView': 1
                                        }">
                            <div class="swiper-wrapper row cols-1 gutter-no">

                                @foreach ($hot_products as $product)

                                @php
                                $photo_arr = json_decode($product->image);
                                $photo_1 = $photo_arr[0];
                                $photo_2 = $photo_arr[1];

                                if ($product->sell_price != null){
                                $ab = $product->sell_price;
                                $a1 = $product->price - $ab;
                                $a2 = $a1*100;
                                $dis = ($a2 / $ab);

                                if ($product->sell_price) {
                                $discount = '<label class="product-label label-discount bg-danger">'.ceil($dis).'%
                                    Off</label>';
                                } else{
                                $discount = '';
                                }
                                }

                                $rate = 0;
                                $recomand = 0;
                                foreach ($product->getReviews as $review){
                                $rate += intval($review->rating);

                                }
                                $ever = 0;
                                if (count($product->getReviews)!=0){
                                $ever = $rate/count($product->getReviews);
                                }
                                if($ever<=0){ $evrating='0%' ; } elseif($ever<=1){ $evrating='20%' ; } elseif ($ever<=2)
                                    { $evrating='40%' ; } elseif ($ever<=3) { $evrating='60%' ; } elseif ($ever<=4) {
                                    $evrating='80%' ; } elseif ($ever<=5) { $evrating='100%' ; } if ($product->
                                    sell_price) {
                                    $price = '<ins class="new-price">৳ '.$product->sell_price.'</ins>
                                    <del class="old-price">৳ '.$product->price.'</del>';
                                    } else {
                                    $price = '<ins class="new-price">৳ '.$product->price.'</ins>';
                                    }



                                    @endphp <div class="swiper-slide">
                                        <div class="product product-single row">
                                            <div class="col-md-6">
                                                <div
                                                    class="product-gallery product-gallery-sticky product-gallery-vertical">
                                                    <div
                                                        class="swiper-container product-single-swiper swiper-theme nav-inner">
                                                        <div class="swiper-wrapper row cols-1 gutter-no">
                                                            @foreach ($photo_arr as $item)
                                                            <div class="swiper-slide">
                                                                <figure class="product-image">
                                                                    <img src="{{asset('')}}storage/products/{{ $item }}"
                                                                        data-zoom-image="{{asset('')}}storage/products/{{ $item }}"
                                                                        alt="Product Image" width="800" height="900" />
                                                                </figure>
                                                            </div>
                                                            @endforeach


                                                        </div>
                                                        <button class="swiper-button-next"></button>
                                                        <button class="swiper-button-prev"></button>

                                                        @if ($product->sell_price != null)
                                                        <div class="product-label-group">
                                                            {!! htmlspecialchars_decode($discount) !!}
                                                        </div>
                                                        @endif

                                                    </div>
                                                    <div class="product-thumbs-wrap swiper-container"
                                                        data-swiper-options="{
                                                            'direction': 'vertical',
                                                            'breakpoints': {
                                                                '0': {
                                                                    'direction': 'horizontal',
                                                                    'slidesPerView': 4
                                                                },
                                                                '992': {
                                                                    'direction': 'vertical',
                                                                    'slidesPerView': 'auto'
                                                                }
                                                            }
                                                        }">
                                                        <div
                                                            class="product-thumbs swiper-wrapper row cols-lg-1 cols-4 gutter-sm">
                                                            @foreach ($photo_arr as $item)
                                                            <div class="product-thumb swiper-slide">
                                                                <img src="{{asset('')}}storage/products/{{ $item }}"
                                                                    alt="Product thumb" width="60" height="68" />
                                                            </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="product-details scrollable">
                                                    <h2 class="product-title mb-1"><a href="product-default.html">{{
                                                            $product->title }}</a></h2>

                                                    <hr class="product-divider" />

                                                    <div class="product-price"><ins class="new-price ls-50"> {!!
                                                            htmlspecialchars_decode($price) !!}</ins></div>

                                                    @php
                                                    $hot = json_decode($product->hot);
                                                    $end_date = str_replace("-",", ", $hot[1]);

                                                    $init = strtotime($hot[1]) - strtotime($hot[0]);
                                                    $days = floor($init / 3600 / 24);
                                                    $hours = floor($init / 3600);
                                                    $minutes = floor(($init / 60) % 60);
                                                    $seconds = $init % 60;
                                                    @endphp



                                                    <div class="product-countdown-container flex-wrap">
                                                        <label class="mr-2 text-danger">Offer Ends In:</label>
                                                        <div class="product-countdown countdown-compact"
                                                            data-until="{{$end_date}}" data-compact="true">
                                                            {{ $days }} days, {{ $hours }}: {{ $minutes }}: {{ $seconds
                                                            }}
                                                        </div>
                                                    </div>

                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings"
                                                                style="width: {{ $evrating }};"></span>
                                                            <span class="tooltiptext tooltip-top">5.00</span>
                                                        </div>
                                                        <a href="{{ url('/').'/item/'.$product->slug }}"
                                                            class="rating-reviews">({{
                                                            count($product->getReviews) }} Reviews)</a>
                                                    </div>

                                                    {{-- <div
                                                        class="product-form product-variation-form product-size-swatch mb-3">
                                                        <label class="mb-1">Size:</label>
                                                        <div
                                                            class="flex-wrap d-flex align-items-center product-variations">
                                                            <a href="#" class="size">Extra Large</a>
                                                            <a href="#" class="size">Large</a>
                                                            <a href="#" class="size">Medium</a>
                                                            <a href="#" class="size">Small</a>
                                                        </div>
                                                        <a href="#" class="product-variation-clean">Clean All</a>
                                                    </div>

                                                    <div class="product-variation-price">
                                                        <span></span>
                                                    </div> --}}

                                                    <div class="fix-bottom product-sticky-content sticky-content">

                                                        <form id="add_to_cart" method="post">
                                                            @csrf
                                                            <div class="d-flex justify-content-between">

                                                                <input name="product_id" type="hidden"
                                                                    value="{{ $product->id }}">
                                                                <div class="product-qty-form mt-2">
                                                                    <div class="d-flex justify-content-between">
                                                                        <a class="quantity-minus w-icon-minus"></a>
                                                                        <input name="product_qty"
                                                                            class="quantity form-control" type="number"
                                                                            min="1" max="100" value="1">
                                                                        <a class="quantity-plus w-icon-plus"></a>
                                                                    </div>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-cart disabled">
                                                                    <i class="w-icon-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="social-links-wrapper mt-1">
                                                        <div class="social-links">
                                                            <div class="social-icons social-no-color border-thin">
                                                                <a href="#"
                                                                    class="social-icon social-facebook w-icon-facebook"></a>
                                                                <a href="#"
                                                                    class="social-icon social-twitter w-icon-twitter"></a>
                                                                <a href="#"
                                                                    class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                                                <a href="#"
                                                                    class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                                                <a href="#"
                                                                    class="social-icon social-youtube fab fa-linkedin-in"></a>
                                                            </div>
                                                        </div>
                                                        <span class="divider d-xs-show"></span>
                                                        <div class="product-link-wrapper d-flex">
                                                            <a href="#"
                                                                class="btn-product-icon btn-wishlist w-icon-heart"></a>
                                                            <a href="#"
                                                                class="btn-product-icon btn-compare btn-icon-left w-icon-compare"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach



                            </div>
                            <button class="swiper-button-prev"></button>
                            <button class="swiper-button-next"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="widget widget-products widget-products-bordered h-100">
                    <div class="widget-body br-sm h-100" style="padding: 5px 10px">
                        <h4 class="title-sm title-underline font-weight-bolder ls-normal mb-2">Top 10 Best Seller</h4>
                        <div class="swiper">
                            <div class="swiper-container swiper-theme nav-top" data-swiper-options="{
                                                'slidesPerView': 1,
                                                'spaceBetween': 20,
                                                'breakpoints': {
                                                    '576': {
                                                        'slidesPerView': 2
                                                    },
                                                    '768': {
                                                        'slidesPerView': 3
                                                    },
                                                    '992': {
                                                        'slidesPerView': 1
                                                    }
                                                }
                                            }">
                                <div class="swiper-wrapper row cols-lg-1 cols-md-3">


                                    <div class="swiper-slide product-widget-wrap">

                                        @foreach ($best_10 as $product)
                                        @php
                                        if ($product->sell_price != null){
                                        $ab = $product->sell_price;
                                        $a1 = $product->price - $ab;
                                        $a2 = $a1*100;
                                        $dis = ($a2 / $ab);

                                        if ($product->sell_price) {
                                        $discount = '<label
                                            class="product-label label-discount bg-danger">'.ceil($dis).'%
                                            Off</label>';
                                        } else{
                                        $discount = '';
                                        }
                                        }

                                        $rate = 0;
                                        $recomand = 0;
                                        foreach ($product->getReviews as $review){
                                        $rate += intval($review->rating);

                                        }
                                        $ever = 0;
                                        if (count($product->getReviews)!=0){
                                        $ever = $rate/count($product->getReviews);
                                        }
                                        if($ever<=0){ $evrating='0%' ; } elseif($ever<=1){ $evrating='20%' ; } elseif
                                            ($ever<=2) { $evrating='40%' ; } elseif ($ever<=3) { $evrating='60%' ; }
                                            elseif ($ever<=4) { $evrating='80%' ; } elseif ($ever<=5) { $evrating='100%'
                                            ; } if ($product->
                                            sell_price) {
                                            $price = '<ins class="new-price">৳ '.$product->sell_price.'</ins>
                                            <del class="old-price">৳ '.$product->price.'</del>';
                                            } else {
                                            $price = '<ins class="new-price">৳ '.$product->price.'</ins>';
                                            }

                                            $img_arr = json_decode($product->image);
                                            @endphp
                                            <div class="product product-widget bb-no">
                                                <figure class="product-media">
                                                    <a href="product-default.html">
                                                        <img src="{{asset('')}}storage/products/{{ $img_arr[0] }}"
                                                            alt="Product" width="105" height="118" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name">
                                                        <a href="product-default.html">{{ $product->title }}</a>
                                                    </h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings"
                                                                style="width: {{ $evrating }};"></span>
                                                            <span class="tooltiptext tooltip-top">5.00</span>
                                                        </div>
                                                        <a href="{{ url('/').'/item/'.$product->slug }}"
                                                            class="rating-reviews">({{
                                                            count($product->getReviews) }} Reviews)</a>
                                                    </div>
                                                    <div class="product-price">
                                                        <ins class="new-price">{!! htmlspecialchars_decode($price)
                                                            !!}</ins>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach



                                    </div>


                                    <div class="swiper-slide product-widget-wrap">


                                        <div class="product product-widget bb-no">
                                            <figure class="product-media">
                                                <a href="product-default.html">
                                                    <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/2-4.jpg"
                                                        alt="Product" width="105" height="118" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a href="product-default.html">Latest Speaker</a>
                                                </h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 60%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                                <div class="product-price">
                                                    <ins class="new-price">$250.68</ins>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product product-widget bb-no">
                                            <figure class="product-media">
                                                <a href="product-default.html">
                                                    <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/2-5.jpg"
                                                        alt="Product" width="105" height="118" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a href="product-default.html">Men's Black Wrist Watch</a>
                                                </h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                                <div class="product-price"><ins class="new-price">$135.60</ins><del
                                                        class="old-price">$155.70</del></div>
                                            </div>
                                        </div>
                                        <div class="product product-widget">
                                            <figure class="product-media">
                                                <a href="product-default.html">
                                                    <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/2-6.jpg"
                                                        alt="Product" width="105" height="118" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a href="product-default.html">Wash Machine</a>
                                                </h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                                <div class="product-price">
                                                    <ins class="new-price">$215.68</ins>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="swiper-slide product-widget-wrap">

                                        <div class="product product-widget bb-no">
                                            <figure class="product-media">
                                                <a href="product-default.html">
                                                    <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/2-7.jpg"
                                                        alt="Product" width="105" height="118" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a href="product-default.html">Security Guard</a>
                                                </h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                                <div class="product-price">
                                                    <ins class="new-price">$320.00</ins>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product product-widget bb-no">
                                            <figure class="product-media">
                                                <a href="product-default.html">
                                                    <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/2-8.jpg"
                                                        alt="Product" width="105" height="118" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a href="product-default.html">Apple Super Notecom</a>
                                                </h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                                <div class="product-price"><ins class="new-price">$243.30</ins><del
                                                        class="old-price">$253.50</del></div>
                                            </div>
                                        </div>
                                        <div class="product product-widget">
                                            <figure class="product-media">
                                                <a href="product-default.html">
                                                    <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/2-9.jpg"
                                                        alt="Product" width="105" height="118" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a href="product-default.html">HD Television</a>
                                                </h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 60%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                                <div class="product-price"><ins class="new-price">$450.68</ins><del
                                                        class="old-price">$500.00</del></div>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <button class="swiper-button-next"></button>
                                <button class="swiper-button-prev"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Deals Wrapper -->
    </div>








    <!-- category-section top-category -->
    <section class="category-section top-category bg-grey pt-10 pb-10 appear-animate">
        <div class="container pb-2">
            <h2 class="title justify-content-center pt-1 ls-normal mb-5">Top Categories</h2>
            <div class="swiper">
                <div class="swiper-container swiper-theme pg-show" data-swiper-options="{
                                    'spaceBetween': 20,
                                    'slidesPerView': 2,
                                    'breakpoints': {
                                        '576': {
                                            'slidesPerView': 3
                                        },
                                        '768': {
                                            'slidesPerView': 5
                                        },
                                        '992': {
                                            'slidesPerView': 6
                                        }
                                    }
                                }">
                    <div class="swiper-wrapper row cols-lg-6 cols-md-5 cols-sm-3 cols-2">

                        @foreach ($cats1 as $cat1)

                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="{{ url('/category') }}/{{ $cat1->slug }}" class=" category-media cat_btn"
                                cat1_slug="{{ $cat1->slug }}">
                                <img src="{{asset('')}}storage/categories/{{ $cat1->photo }}" alt="Category" width="100"
                                    height="100" />
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">{{ $cat1->name }}</h4>
                                <a href="{{ url('/category') }}/{{ $cat1->slug }}"
                                    class="btn btn-primary btn-link btn-underline">Shop Now</a>
                            </div>
                        </div>

                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of .category-section top-category -->





    <div class="container">
        <h2 class="title justify-content-center ls-normal mb-4 mt-10 pt-1 appear-animate fadeIn appear-animation-visible"
            style="animation-duration: 1.2s;">Popular Departments
        </h2>
        <div class="tab tab-nav-boxed tab-nav-outline appear-animate fadeIn appear-animation-visible"
            style="animation-duration: 1.2s;">
            <ul class="nav nav-tabs justify-content-center" role="tablist">
                <li class="nav-item mr-2 mb-2">
                    <a class="nav-link br-sm font-size-md ls-normal active" href="#tab1-1">New arrivals</a>
                </li>
                <li class="nav-item mr-2 mb-2">
                    <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-2">Best seller</a>
                </li>
                <li class="nav-item mr-2 mb-2">
                    <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-3">most popular</a>
                </li>
                <li class="nav-item mr-0 mb-2">
                    <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-4">Featured</a>
                </li>
            </ul>
        </div>
        <!-- End of Tab -->
        <div class="tab-content product-wrapper appear-animate fadeIn appear-animation-visible"
            style="animation-duration: 1.2s;">

            <div class="tab-pane pt-4 active in" id="tab1-1">
                <div class="row cols-xl-6 cols-md-4 cols-sm-3 cols-2">

                    @foreach ($products as $product)
                    <div class="product-wrap">
                        @php
                        $photo_arr = json_decode($product->image);
                        $photo_1 = $photo_arr[0];
                        $photo_2 = $photo_arr[1];

                        $rate = 0;
                        $recomand = 0;
                        foreach ($product->getReviews as $review){
                        $rate += intval($review->rating);

                        }
                        $ever = 0;
                        if (count($product->getReviews)!=0){
                        $ever = $rate/count($product->getReviews);
                        }
                        if($ever<=0){ $evrating='0%' ; } elseif($ever<=1){ $evrating='20%' ; } elseif ($ever<=2) {
                            $evrating='40%' ; } elseif ($ever<=3) { $evrating='60%' ; } elseif ($ever<=4) {
                            $evrating='80%' ; } elseif ($ever<=5) { $evrating='100%' ; } @endphp <div
                            class="product product-image-gap product-simple">
                            <figure class="product-media">
                                <a href="{{ url('/').'/item/'.$product->slug }}">
                                    <img src="{{asset('')}}storage/products/{{ $photo_1 }}" alt="Product" width="295"
                                        height="335" />
                                    <img src="{{asset('')}}storage/products/{{ $photo_2 }}" alt="Product" width="295"
                                        height="335" />
                                </a>

                                @php

                                if ($product->sell_price != null){
                                $ab = $product->sell_price;
                                $a1 = $product->price - $ab;
                                $a2 = $a1*100;
                                $dis = ($a2 / $ab);

                                if ($product->sell_price) {
                                $discount = '<label class="product-label label-discount">'.ceil($dis).'% Off</label>';
                                } else{
                                $discount = '';
                                }
                                }
                                @endphp

                                @if ($product->sell_price != null)
                                <div class="product-label-group">
                                    {!! htmlspecialchars_decode($discount) !!}
                                </div>
                                @endif

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" product_slug="{{ $product->slug }}" class="btn-product btn-quickview"
                                        title="Quick View">Quick view</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <a href="#" class="btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                <div class="product-name">
                                    <a href="{{ url('/').'/item/'.$product->slug }}">{{ mb_strimwidth($product->title,
                                        0, 25) }} ..</a>
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: {{ $evrating }};"></span>
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                    <a href="{{ url('/').'/item/'.$product->slug }}" class="rating-reviews">({{
                                        count($product->getReviews) }} Reviews)</a>
                                </div>

                                @php
                                if ($product->sell_price) {
                                $price = '<ins class="new-price">৳ '.$product->sell_price.'</ins>
                                <del class="old-price">৳ '.$product->price.'</del>';
                                } else {
                                $price = '<ins class="new-price">৳ '.$product->price.'</ins>';
                                }
                                @endphp



                                <div class="product-pa-wrapper">
                                    <div class="product-price">{!! htmlspecialchars_decode($price) !!}</div>

                                    <div class="product-action">
                                        <form id="add_to_cart" method="post">
                                            @csrf
                                            <div class="" style="">

                                                <input name="product_id" type="hidden" value="{{ $product->id }}">
                                                <input name="product_qty" type="hidden" value="1">
                                                <button type="submit"
                                                    class="btn-cart btn-product btn btn-link btn-underline"
                                                    data-toggle="tooltip" data-placement="top" title="Add to cart"
                                                    style="">
                                                    <i class="w-icon-cart"></i>
                                                    <span>Add to cart</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <!-- End of Tab Pane -->
        <div class="tab-pane pt-4" id="tab1-2">
            <div class="row cols-xl-6 cols-md-4 cols-sm-3 cols-2">


                @foreach ($best_sellers as $product)
                <div class="product-wrap">
                    @php
                    $photo_arr = json_decode($product->image);
                    $photo_1 = $photo_arr[0];
                    $photo_2 = $photo_arr[1];

                    $rate = 0;
                    $recomand = 0;
                    foreach ($product->getReviews as $review){
                    $rate += intval($review->rating);

                    }
                    $ever = 0;
                    if (count($product->getReviews)!=0){
                    $ever = $rate/count($product->getReviews);
                    }
                    if($ever<=0){ $evrating='0%' ; } elseif($ever<=1){ $evrating='20%' ; } elseif ($ever<=2) {
                        $evrating='40%' ; } elseif ($ever<=3) { $evrating='60%' ; } elseif ($ever<=4) { $evrating='80%'
                        ; } elseif ($ever<=5) { $evrating='100%' ; } @endphp <div
                        class="product product-image-gap product-simple">
                        <figure class="product-media">
                            <a href="{{ url('/').'/item/'.$product->slug }}">
                                <img src="{{asset('')}}storage/products/{{ $photo_1 }}" alt="Product" width="295"
                                    height="335" />
                                <img src="{{asset('')}}storage/products/{{ $photo_2 }}" alt="Product" width="295"
                                    height="335" />
                            </a>

                            @php

                            if ($product->sell_price != null){
                            $ab = $product->sell_price;
                            $a1 = $product->price - $ab;
                            $a2 = $a1*100;
                            $dis = ($a2 / $ab);

                            if ($product->sell_price) {
                            $discount = '<label class="product-label label-discount">'.ceil($dis).'% Off</label>';
                            } else{
                            $discount = '';
                            }
                            }
                            @endphp

                            @if ($product->sell_price != null)
                            <div class="product-label-group">
                                {!! htmlspecialchars_decode($discount) !!}
                            </div>
                            @endif

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                            </div>
                            <div class="product-action">
                                <a href="#" product_slug="{{ $product->slug }}" class="btn-product btn-quickview"
                                    title="Quick View">Quick view</a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <a href="#" class="btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                            <div class="product-name">
                                <a href="{{ url('/').'/item/'.$product->slug }}">{{ mb_strimwidth($product->title, 0,
                                    25) }} ..</a>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: {{ $evrating }};"></span>
                                    <span class="tooltiptext tooltip-top">5.00</span>
                                </div>
                                <a href="{{ url('/').'/item/'.$product->slug }}" class="rating-reviews">({{
                                    count($product->getReviews) }} Reviews)</a>
                            </div>

                            @php
                            if ($product->sell_price) {
                            $price = '<ins class="new-price">৳ '.$product->sell_price.'</ins>
                            <del class="old-price">৳ '.$product->price.'</del>';
                            } else {
                            $price = '<ins class="new-price">৳ '.$product->price.'</ins>';
                            }
                            @endphp



                            <div class="product-pa-wrapper">
                                <div class="product-price">{!! htmlspecialchars_decode($price) !!}</div>

                                <div class="product-action">
                                    <form id="add_to_cart" method="post">
                                        @csrf
                                        <div class="" style="">

                                            <input name="product_id" type="hidden" value="{{ $product->id }}">
                                            <input name="product_qty" type="hidden" value="1">
                                            <button type="submit"
                                                class="btn-cart btn-product btn btn-link btn-underline"
                                                data-toggle="tooltip" data-placement="top" title="Add to cart" style="">
                                                <i class="w-icon-cart"></i>
                                                <span>Add to cart</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <!-- End of Tab Pane -->
    <div class="tab-pane pt-4" id="tab1-3">
        <div class="row cols-xl-6 cols-md-4 cols-sm-3 cols-2">

            @foreach ($populers as $product)
            <div class="product-wrap">
                @php
                $photo_arr = json_decode($product->image);
                $photo_1 = $photo_arr[0];
                $photo_2 = $photo_arr[1];

                $rate = 0;
                $recomand = 0;
                foreach ($product->getReviews as $review){
                $rate += intval($review->rating);

                }
                $ever = 0;
                if (count($product->getReviews)!=0){
                $ever = $rate/count($product->getReviews);
                }
                if($ever<=0){ $evrating='0%' ; } elseif($ever<=1){ $evrating='20%' ; } elseif ($ever<=2) {
                    $evrating='40%' ; } elseif ($ever<=3) { $evrating='60%' ; } elseif ($ever<=4) { $evrating='80%' ; }
                    elseif ($ever<=5) { $evrating='100%' ; } @endphp <div
                    class="product product-image-gap product-simple">
                    <figure class="product-media">
                        <a href="{{ url('/').'/item/'.$product->slug }}">
                            <img src="{{asset('')}}storage/products/{{ $photo_1 }}" alt="Product" width="295"
                                height="335" />
                            <img src="{{asset('')}}storage/products/{{ $photo_2 }}" alt="Product" width="295"
                                height="335" />
                        </a>

                        @php

                        if ($product->sell_price != null){
                        $ab = $product->sell_price;
                        $a1 = $product->price - $ab;
                        $a2 = $a1*100;
                        $dis = ($a2 / $ab);

                        if ($product->sell_price) {
                        $discount = '<label class="product-label label-discount">'.ceil($dis).'% Off</label>';
                        } else{
                        $discount = '';
                        }
                        }
                        @endphp

                        @if ($product->sell_price != null)
                        <div class="product-label-group">
                            {!! htmlspecialchars_decode($discount) !!}
                        </div>
                        @endif

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                        </div>
                        <div class="product-action">
                            <a href="#" product_slug="{{ $product->slug }}" class="btn-product btn-quickview"
                                title="Quick View">Quick view</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <a href="#" class="btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                        <div class="product-name">
                            <a href="{{ url('/').'/item/'.$product->slug }}">{{ mb_strimwidth($product->title, 0, 25) }}
                                ..</a>
                        </div>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: {{ $evrating }};"></span>
                                <span class="tooltiptext tooltip-top">5.00</span>
                            </div>
                            <a href="{{ url('/').'/item/'.$product->slug }}" class="rating-reviews">({{
                                count($product->getReviews) }} Reviews)</a>
                        </div>

                        @php
                        if ($product->sell_price) {
                        $price = '<ins class="new-price">৳ '.$product->sell_price.'</ins>
                        <del class="old-price">৳ '.$product->price.'</del>';
                        } else {
                        $price = '<ins class="new-price">৳ '.$product->price.'</ins>';
                        }
                        @endphp



                        <div class="product-pa-wrapper">
                            <div class="product-price">{!! htmlspecialchars_decode($price) !!}</div>

                            <div class="product-action">
                                <form id="add_to_cart" method="post">
                                    @csrf
                                    <div class="" style="">

                                        <input name="product_id" type="hidden" value="{{ $product->id }}">
                                        <input name="product_qty" type="hidden" value="1">
                                        <button type="submit" class="btn-cart btn-product btn btn-link btn-underline"
                                            data-toggle="tooltip" data-placement="top" title="Add to cart" style="">
                                            <i class="w-icon-cart"></i>
                                            <span>Add to cart</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
            </div>
        </div>
        @endforeach

    </div>
    </div>
    <!-- End of Tab Pane -->
    <div class="tab-pane pt-4" id="tab1-4">
        <div class="row cols-xl-6 cols-md-4 cols-sm-3 cols-2">

            @foreach ($hot_products as $product)
            <div class="product-wrap">
                @php
                $photo_arr = json_decode($product->image);
                $photo_1 = $photo_arr[0];
                $photo_2 = $photo_arr[1];

                $rate = 0;
                $recomand = 0;
                foreach ($product->getReviews as $review){
                $rate += intval($review->rating);

                }
                $ever = 0;
                if (count($product->getReviews)!=0){
                $ever = $rate/count($product->getReviews);
                }
                if($ever<=0){ $evrating='0%' ; } elseif($ever<=1){ $evrating='20%' ; } elseif ($ever<=2) {
                    $evrating='40%' ; } elseif ($ever<=3) { $evrating='60%' ; } elseif ($ever<=4) { $evrating='80%' ; }
                    elseif ($ever<=5) { $evrating='100%' ; } @endphp <div
                    class="product product-image-gap product-simple">
                    <figure class="product-media">
                        <a href="{{ url('/').'/item/'.$product->slug }}">
                            <img src="{{asset('')}}storage/products/{{ $photo_1 }}" alt="Product" width="295"
                                height="335" />
                            <img src="{{asset('')}}storage/products/{{ $photo_2 }}" alt="Product" width="295"
                                height="335" />
                        </a>

                        @php

                        if ($product->sell_price != null){
                        $ab = $product->sell_price;
                        $a1 = $product->price - $ab;
                        $a2 = $a1*100;
                        $dis = ($a2 / $ab);

                        if ($product->sell_price) {
                        $discount = '<label class="product-label label-discount">'.ceil($dis).'% Off</label>';
                        } else{
                        $discount = '';
                        }
                        }
                        @endphp

                        @if ($product->sell_price != null)
                        <div class="product-label-group">
                            {!! htmlspecialchars_decode($discount) !!}
                        </div>
                        @endif

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                        </div>
                        <div class="product-action">
                            <a href="#" product_slug="{{ $product->slug }}" class="btn-product btn-quickview"
                                title="Quick View">Quick view</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <a href="#" class="btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                        <div class="product-name">
                            <a href="{{ url('/').'/item/'.$product->slug }}">{{ mb_strimwidth($product->title, 0, 25) }}
                                ..</a>
                        </div>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: {{ $evrating }};"></span>
                                <span class="tooltiptext tooltip-top">5.00</span>
                            </div>
                            <a href="{{ url('/').'/item/'.$product->slug }}" class="rating-reviews">({{
                                count($product->getReviews) }} Reviews)</a>
                        </div>

                        @php
                        if ($product->sell_price) {
                        $price = '<ins class="new-price">৳ '.$product->sell_price.'</ins>
                        <del class="old-price">৳ '.$product->price.'</del>';
                        } else {
                        $price = '<ins class="new-price">৳ '.$product->price.'</ins>';
                        }
                        @endphp



                        <div class="product-pa-wrapper">
                            <div class="product-price">{!! htmlspecialchars_decode($price) !!}</div>

                            <div class="product-action">
                                <form id="add_to_cart" method="post">
                                    @csrf
                                    <div class="" style="">

                                        <input name="product_id" type="hidden" value="{{ $product->id }}">
                                        <input name="product_qty" type="hidden" value="1">
                                        <button type="submit" class="btn-cart btn-product btn btn-link btn-underline"
                                            data-toggle="tooltip" data-placement="top" title="Add to cart" style="">
                                            <i class="w-icon-cart"></i>
                                            <span>Add to cart</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
            </div>
        </div>
        @endforeach

    </div>
    </div>
    <!-- End of Tab Pane -->
    </div>
    <!-- End of Tab Content -->



    <!-- End of Reviewed Producs -->
    </div>




    <div class="container">
        <div class="row category-cosmetic-lifestyle appear-animate mb-5 fadeIn appear-animation-visible"
            style="animation-duration: 1.2s;">
            <div class="col-md-6 mb-4">
                <div class="banner banner-fixed category-banner-1 br-xs">
                    <figure>
                        <img src="assets/images/demos/demo1/categories/3-1.jpg" alt="Category Banner" width="610"
                            height="200" style="background-color: #3B4B48;">
                    </figure>
                    <div class="banner-content y-50 pt-1">
                        <h5 class="banner-subtitle font-weight-bold text-uppercase">Natural Process</h5>
                        <h3 class="banner-title font-weight-bolder text-capitalize text-white">Cosmetic
                            Makeup<br>Professional</h3>
                        <a href="shop-banner-sidebar.html"
                            class="btn btn-white btn-link btn-underline btn-icon-right">Shop
                            Now<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="banner banner-fixed category-banner-2 br-xs">
                    <figure>
                        <img src="assets/images/demos/demo1/categories/3-2.jpg" alt="Category Banner" width="610"
                            height="200" style="background-color: #E5E5E5;">
                    </figure>
                    <div class="banner-content y-50 pt-1">
                        <h5 class="banner-subtitle font-weight-bold text-uppercase">Trending Now</h5>
                        <h3 class="banner-title font-weight-bolder text-capitalize">Women's
                            Lifestyle<br>Collection</h3>
                        <a href="shop-banner-sidebar.html"
                            class="btn btn-dark btn-link btn-underline btn-icon-right">Shop
                            Now<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>





    {{-- Fashion section --}}
    <div class="container">
        <div class="product-wrapper-1 appear-animate mb-5 fadeIn appear-animation-visible"
            style="animation-duration: 1.2s;">
            <div class="title-link-wrapper pb-1 mb-4">
                <h2 class="title ls-normal mb-0">Fashions &amp; Clothing</h2>
                <a href="{{ route('shop.index') }}" class="font-size-normal font-weight-bold ls-25 mb-0">More
                    Products<i class="w-icon-long-arrow-right"></i></a>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-4 mb-4">
                    <div class="banner h-100 br-sm" style="background-image: url(assets/images/demos/demo1/banners/2.jpg);
                        background-color: #ebeced;">
                        <div class="banner-content content-top">
                            <h5 class="banner-subtitle font-weight-normal mb-2">Weekend Sale</h5>
                            <hr class="banner-divider bg-dark mb-2">
                            <h3 class="banner-title font-weight-bolder ls-25 text-uppercase">
                                New Arrivals<br> <span class="font-weight-normal text-capitalize">Collection</span>
                            </h3>
                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-outline btn-rounded btn-sm">shop
                                Now</a>
                        </div>
                    </div>
                </div>
                <!-- End of Banner -->
                <div class="col-lg-9 col-sm-8">
                    <div class="row cols-xl-4 cols-md-3 cols-sm-2 cols-2">

                        @foreach ($fashion_products as $product)
                        <div class="product-wrap">
                            @php
                            $photo_arr = json_decode($product->image);
                            $photo_1 = $photo_arr[0];
                            $photo_2 = $photo_arr[1];

                            $rate = 0;
                            $recomand = 0;
                            foreach ($product->getReviews as $review){
                            $rate += intval($review->rating);

                            }
                            $ever = 0;
                            if (count($product->getReviews)!=0){
                            $ever = $rate/count($product->getReviews);
                            }
                            if($ever<=0){ $evrating='0%' ; } elseif($ever<=1){ $evrating='20%' ; } elseif ($ever<=2) {
                                $evrating='40%' ; } elseif ($ever<=3) { $evrating='60%' ; } elseif ($ever<=4) {
                                $evrating='80%' ; } elseif ($ever<=5) { $evrating='100%' ; } @endphp <div
                                class="product product-image-gap product-simple">
                                <figure class="product-media">
                                    <a href="{{ url('/').'/item/'.$product->slug }}">
                                        <img src="{{asset('')}}storage/products/{{ $photo_1 }}" alt="Product"
                                            width="295" height="335" />
                                        <img src="{{asset('')}}storage/products/{{ $photo_2 }}" alt="Product"
                                            width="295" height="335" />
                                    </a>

                                    @php

                                    if ($product->sell_price != null){
                                    $ab = $product->sell_price;
                                    $a1 = $product->price - $ab;
                                    $a2 = $a1*100;
                                    $dis = ($a2 / $ab);

                                    if ($product->sell_price) {
                                    $discount = '<label class="product-label label-discount">'.ceil($dis).'%
                                        Off</label>';
                                    } else{
                                    $discount = '';
                                    }
                                    }
                                    @endphp

                                    @if ($product->sell_price != null)
                                    <div class="product-label-group">
                                        {!! htmlspecialchars_decode($discount) !!}
                                    </div>
                                    @endif

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Compare"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" product_slug="{{ $product->slug }}"
                                            class="btn-product btn-quickview" title="Quick View">Quick view</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <a href="#" class="btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                    <div class="product-name">
                                        <a href="{{ url('/').'/item/'.$product->slug }}">{{
                                            mb_strimwidth($product->title, 0, 25) }}
                                            ..</a>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: {{ $evrating }};"></span>
                                            <span class="tooltiptext tooltip-top">5.00</span>
                                        </div>
                                        <a href="{{ url('/').'/item/'.$product->slug }}" class="rating-reviews">({{
                                            count($product->getReviews) }} Reviews)</a>
                                    </div>

                                    @php
                                    if ($product->sell_price) {
                                    $price = '<ins class="new-price">৳ '.$product->sell_price.'</ins>
                                    <del class="old-price">৳ '.$product->price.'</del>';
                                    } else {
                                    $price = '<ins class="new-price">৳ '.$product->price.'</ins>';
                                    }
                                    @endphp



                                    <div class="product-pa-wrapper">
                                        <div class="product-price">{!! htmlspecialchars_decode($price) !!}</div>

                                        <div class="product-action">
                                            <form id="add_to_cart" method="post">
                                                @csrf
                                                <div class="" style="">

                                                    <input name="product_id" type="hidden" value="{{ $product->id }}">
                                                    <input name="product_qty" type="hidden" value="1">
                                                    <button type="submit"
                                                        class="btn-cart btn-product btn btn-link btn-underline"
                                                        data-toggle="tooltip" data-placement="top" title="Add to cart"
                                                        style="">
                                                        <i class="w-icon-cart"></i>
                                                        <span>Add to cart</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



    {{-- Home & garden --}}
    <div class="container">
        <div class="product-wrapper-1 appear-animate mb-5 fadeIn appear-animation-visible"
            style="animation-duration: 1.2s;">
            <div class="title-link-wrapper pb-1 mb-4">
                <h2 class="title ls-normal mb-0">Home &amp; Garden</h2>
                <a href="{{ route('shop.index') }}" class="font-size-normal font-weight-bold ls-25 mb-0">More
                    Products<i class="w-icon-long-arrow-right"></i></a>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-4 mb-4">
                    <div class="banner h-100 br-sm" style="background-image: url(assets/images/demos/demo1/banners/5.jpg);
                    background-color: #EAEFF3;">
                        <div class="banner-content content-top">
                            <h5 class="banner-subtitle font-weight-normal mb-2">Deals And Promotions</h5>
                            <hr class="banner-divider bg-dark mb-2">
                            <h3 class="banner-title font-weight-bolder text-uppercase ls-25">
                                Trending <br> <span class="font-weight-normal text-capitalize">House
                                    Utensil</span>
                            </h3>
                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-outline btn-rounded btn-sm">shop
                                now</a>
                        </div>
                    </div>
                </div>
                <!-- End of Banner -->
                <div class="col-lg-9 col-sm-8">
                    <div class="row cols-xl-4 cols-md-3 cols-sm-2 cols-2">

                        @foreach ($home_products as $product)
                        <div class="product-wrap">
                            @php
                            $photo_arr = json_decode($product->image);
                            $photo_1 = $photo_arr[0];
                            $photo_2 = $photo_arr[1];

                            $rate = 0;
                            $recomand = 0;
                            foreach ($product->getReviews as $review){
                            $rate += intval($review->rating);

                            }
                            $ever = 0;
                            if (count($product->getReviews)!=0){
                            $ever = $rate/count($product->getReviews);
                            }
                            if($ever<=0){ $evrating='0%' ; } elseif($ever<=1){ $evrating='20%' ; } elseif ($ever<=2) {
                                $evrating='40%' ; } elseif ($ever<=3) { $evrating='60%' ; } elseif ($ever<=4) {
                                $evrating='80%' ; } elseif ($ever<=5) { $evrating='100%' ; } @endphp <div
                                class="product product-image-gap product-simple">
                                <figure class="product-media">
                                    <a href="{{ url('/').'/item/'.$product->slug }}">
                                        <img src="{{asset('')}}storage/products/{{ $photo_1 }}" alt="Product"
                                            width="295" height="335" />
                                        <img src="{{asset('')}}storage/products/{{ $photo_2 }}" alt="Product"
                                            width="295" height="335" />
                                    </a>

                                    @php

                                    if ($product->sell_price != null){
                                    $ab = $product->sell_price;
                                    $a1 = $product->price - $ab;
                                    $a2 = $a1*100;
                                    $dis = ($a2 / $ab);

                                    if ($product->sell_price) {
                                    $discount = '<label class="product-label label-discount">'.ceil($dis).'%
                                        Off</label>';
                                    } else{
                                    $discount = '';
                                    }
                                    }
                                    @endphp

                                    @if ($product->sell_price != null)
                                    <div class="product-label-group">
                                        {!! htmlspecialchars_decode($discount) !!}
                                    </div>
                                    @endif

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Compare"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" product_slug="{{ $product->slug }}"
                                            class="btn-product btn-quickview" title="Quick View">Quick view</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <a href="#" class="btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                    <div class="product-name">
                                        <a href="{{ url('/').'/item/'.$product->slug }}">{{
                                            mb_strimwidth($product->title, 0, 25) }}
                                            ..</a>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: {{ $evrating }};"></span>
                                            <span class="tooltiptext tooltip-top">5.00</span>
                                        </div>
                                        <a href="{{ url('/').'/item/'.$product->slug }}" class="rating-reviews">({{
                                            count($product->getReviews) }} Reviews)</a>
                                    </div>

                                    @php
                                    if ($product->sell_price) {
                                    $price = '<ins class="new-price">৳ '.$product->sell_price.'</ins>
                                    <del class="old-price">৳ '.$product->price.'</del>';
                                    } else {
                                    $price = '<ins class="new-price">৳ '.$product->price.'</ins>';
                                    }
                                    @endphp



                                    <div class="product-pa-wrapper">
                                        <div class="product-price">{!! htmlspecialchars_decode($price) !!}</div>

                                        <div class="product-action">
                                            <form id="add_to_cart" method="post">
                                                @csrf
                                                <div class="" style="">

                                                    <input name="product_id" type="hidden" value="{{ $product->id }}">
                                                    <input name="product_qty" type="hidden" value="1">
                                                    <button type="submit"
                                                        class="btn-cart btn-product btn btn-link btn-underline"
                                                        data-toggle="tooltip" data-placement="top" title="Add to cart"
                                                        style="">
                                                        <i class="w-icon-cart"></i>
                                                        <span>Add to cart</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
















    {{-- <div class="container">

        <div class="product-wrapper-1 appear-animate mb-5">
            <div class="title-link-wrapper pb-1 mb-4">
                <h2 class="title ls-normal mb-0">Clothing & Apparel</h2>
                <a href="shop-boxed-banner.html" class="font-size-normal font-weight-bold ls-25 mb-0">More Products<i
                        class="w-icon-long-arrow-right"></i></a>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-4 mb-4">
                    <div class="banner h-100 br-sm"
                        style="background-image: url(assets/images/demos/demo1/banners/2.jpg); background-color: #ebeced;">
                        <div class="banner-content content-top">
                            <h5 class="banner-subtitle font-weight-normal mb-2">Weekend Sale</h5>
                            <hr class="banner-divider bg-dark mb-2" />
                            <h3 class="banner-title font-weight-bolder ls-25 text-uppercase">
                                New Arrivals<br />
                                <span class="font-weight-normal text-capitalize">Collection</span>
                            </h3>
                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-outline btn-rounded btn-sm">shop
                                Now</a>
                        </div>
                    </div>
                </div>
                <!-- End of Banner -->
                <div class="col-lg-9 col-sm-8">
                    <div class="swiper-container swiper-theme" data-swiper-options="{
                                        'spaceBetween': 20,
                                        'slidesPerView': 2,
                                        'breakpoints': {
                                            '992': {
                                                'slidesPerView': 3
                                            },
                                            '1200': {
                                                'slidesPerView': 4
                                            }
                                        }
                                    }">

                        <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                            <div class="swiper-slide product-col">
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/4-1.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Men’s Clothing</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-price"><ins class="new-price">$23.99</ins><del
                                                class="old-price">$25.68</del></div>
                                    </div>
                                </div>
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/4-5-1.jpg"
                                                alt="Product" width="216" height="243" />
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/4-5-2.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Best Travel Bag</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-price"><ins class="new-price">$25.68</ins><del
                                                class="old-price">$28.99</del></div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide product-col">
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/4-2-1.jpg"
                                                alt="Product" width="216" height="243" />
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/4-2-2.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Women’s Fashion Handbag
                                            </a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-price"><ins class="new-price">$25.68</ins><del
                                                class="old-price">$25.89</del></div>
                                    </div>
                                </div>
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/4-6.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Gray Leather Shoes</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-price"><ins class="new-price">$26.88</ins><del
                                                class="old-price">$27.89</del></div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide product-col">
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/4-3.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Black Winter Skating</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-price"><ins class="new-price">$40.86</ins><del
                                                class="old-price">$45.89</del></div>
                                    </div>
                                </div>
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/4-7.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Men's Black Wrist
                                                Watch</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-price"><ins class="new-price">$135.60</ins><del
                                                class="old-price">$155.70</del></div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide product-col">
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/4-4-1.jpg"
                                                alt="Product" width="216" height="243" />
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/4-4-2.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Sport Women's Wear</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-price"><ins class="new-price">$220.20</ins><del
                                                class="old-price">$300.62</del></div>
                                    </div>
                                </div>
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/4-8.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Women’s Hiking Hat</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <span class="price">$53.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End of Product Wrapper 1 -->

    {{-- <div class="container">
        <div class="product-wrapper-1 appear-animate mb-8">
            <div class="title-link-wrapper pb-1 mb-4">
                <h2 class="title ls-normal mb-0">Consumer Electric</h2>
                <a href="shop-boxed-banner.html" class="font-size-normal font-weight-bold ls-25 mb-0">More Products<i
                        class="w-icon-long-arrow-right"></i></a>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-4 mb-4">
                    <div class="banner h-100 br-sm"
                        style="background-image: url(assets/images/demos/demo1/banners/3.jpg); background-color: #252525;">
                        <div class="banner-content content-top">
                            <h5 class="banner-subtitle text-white font-weight-normal mb-2">New Collection</h5>
                            <hr class="banner-divider bg-white mb-2" />
                            <h3 class="banner-title text-white font-weight-bolder text-uppercase ls-25">
                                Top Camera <br />
                                <span class="font-weight-normal text-capitalize">Mirrorless</span>
                            </h3>
                            <a href="shop-banner-sidebar.html" class="btn btn-white btn-outline btn-rounded btn-sm">shop
                                now</a>
                        </div>
                    </div>
                </div>
                <!-- End of Banner -->
                <div class="col-lg-9 col-sm-8">
                    <div class="swiper-container swiper-theme" data-swiper-options="{
                                'spaceBetween': 20,
                                'slidesPerView': 2,
                                'breakpoints': {
                                    '992': {
                                        'slidesPerView': 3
                                    },
                                    '1200': {
                                        'slidesPerView': 4
                                    }
                                }
                            }">
                        <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                            <div class="swiper-slide product-col">
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/5-1-1.jpg"
                                                alt="Product" width="216" height="243" />
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/5-1-2.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">6% Off</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Professional Pixel
                                                Camera</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(5 reviews)</a>
                                        </div>
                                        <div class="product-price"><ins class="new-price">$215.68</ins><del
                                                class="old-price">$230.45</del></div>
                                    </div>
                                </div>
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/5-5.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Latest Speaker</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$250.68</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide product-col">
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/5-2-1.jpg"
                                                alt="Product" width="216" height="243" />
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/5-2-2.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Wash Machine</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(9 reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$215.68</ins>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/5-6.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Security Guard</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$320.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide product-col">
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/5-3.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">10% Off</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">HD Television</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-price"><ins class="new-price">$450.68</ins><del
                                                class="old-price">$500.00</del></div>
                                    </div>
                                </div>
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/5-7.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">10% Off</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">USB Receipt</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(5 reviews)</a>
                                        </div>
                                        <div class="product-price"><ins class="new-price">$26.89</ins><del
                                                class="old-price">$29.79</del></div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide product-col">
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/5-4.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Data Transformer
                                                Tool</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(6 reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$64.47</ins>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/5-8.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">7% Off</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Multi Functional Apple
                                                iPhone</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(9 reviews)</a>
                                        </div>
                                        <div class="product-price"><ins class="new-price">$136.26</ins><del
                                                class="old-price">$145.90</del></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <!-- End of Produts -->
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End of Product Wrapper 1 -->


    {{-- <div class="container">
        <div class="banner banner-fashion appear-animate br-sm mb-9"
            style="background-image: url(assets/images/demos/demo1/banners/4.jpg); background-color: #383839;">
            <div class="banner-content align-items-center">
                <div class="content-left d-flex align-items-center mb-3">
                    <div class="banner-price-info font-weight-bolder text-secondary text-uppercase lh-1 ls-25">
                        25
                        <sup class="font-weight-bold">%</sup><sub class="font-weight-bold ls-25">Off</sub>
                    </div>
                    <hr class="banner-divider bg-white mt-0 mb-0 mr-8" />
                </div>
                <div class="content-right d-flex align-items-center flex-1 flex-wrap">
                    <div class="banner-info mb-0 mr-auto pr-4 mb-3">
                        <h3 class="banner-title text-white font-weight-bolder text-uppercase ls-25">For Today's Fashion
                        </h3>
                        <p class="text-white mb-0">
                            Use code <span
                                class="text-dark bg-white font-weight-bold ls-50 pl-1 pr-1 d-inline-block">Black
                                <strong>12345</strong></span> to get best offer.
                        </p>
                    </div>
                    <a href="shop-banner-sidebar.html"
                        class="btn btn-white btn-outline btn-rounded btn-icon-right mb-3">Shop Now<i
                            class="w-icon-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End of Banner Fashion -->


    <div class="container">
        {{-- <div class="product-wrapper-1 appear-animate mb-7">
            <div class="title-link-wrapper pb-1 mb-4">
                <h2 class="title ls-normal mb-0">Home Garden & Kitchen</h2>
                <a href="shop-boxed-banner.html" class="font-size-normal font-weight-bold ls-25 mb-0">More Products<i
                        class="w-icon-long-arrow-right"></i></a>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-4 mb-4">
                    <div class="banner h-100 br-sm"
                        style="background-image: url(assets/images/demos/demo1/banners/5.jpg); background-color: #eaeff3;">
                        <div class="banner-content content-top">
                            <h5 class="banner-subtitle font-weight-normal mb-2">Deals And Promotions</h5>
                            <hr class="banner-divider bg-dark mb-2" />
                            <h3 class="banner-title font-weight-bolder text-uppercase ls-25">
                                Trending <br />
                                <span class="font-weight-normal text-capitalize">House Utensil</span>
                            </h3>
                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-outline btn-rounded btn-sm">shop
                                now</a>
                        </div>
                    </div>
                </div>
                <!-- End of Banner -->
                <div class="col-lg-9 col-sm-8">
                    <div class="swiper-container swiper-theme" data-swiper-options="{
                                'spaceBetween': 20,
                                'slidesPerView': 2,
                                'breakpoints': {
                                    '992': {
                                        'slidesPerView': 3
                                    },
                                    '1200': {
                                        'slidesPerView': 4
                                    }
                                }
                            }">
                        <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                            <div class="swiper-slide product-col">
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/6-1.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Home Sofa</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(5 reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$75.99</ins>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/6-5.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Electric Rice-Cooker</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$215.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide product-col">
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/6-2-1.jpg"
                                                alt="Product" width="216" height="243" />
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/6-2-2.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">21% Off</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Kitchen Table</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(9 reviews)</a>
                                        </div>
                                        <div class="product-price"><ins class="new-price">$75.50</ins><del
                                                class="old-price">$95.68</del></div>
                                    </div>
                                </div>
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/6-6.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Kitchen Cooker</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$150.60</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide product-col">
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/6-3-1.jpg"
                                                alt="Product" width="216" height="243" />
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/6-3-2.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Table Lamp</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$45.60</ins>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/6-7.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">12% Off</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Electric Frying Pan</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(5 reviews)</a>
                                        </div>
                                        <div class="product-price"><ins class="new-price">$137.35</ins><del
                                                class="old-price">$155.65</del></div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide product-col">
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/6-4.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">18% Off</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Latest Chair</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(6 reviews)</a>
                                        </div>
                                        <div class="product-price"><ins class="new-price">$70.00</ins><del
                                                class="old-price">$85.00</del></div>
                                    </div>
                                </div>
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/6-8-1.jpg"
                                                alt="Product" width="216" height="243" />
                                            <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/6-8-2.jpg"
                                                alt="Product" width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Automatic Crusher</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(9 reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$220.25</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <!-- End of Produts -->
                </div>
            </div>
        </div> --}}
    </div>
    <!-- End of Product Wrapper 1 -->



    {{-- Brands --}}
    <div class="container">
        <h2 class="title title-underline mb-4 ls-normal appear-animate">Brands</h2>
        <div class="swiper-container swiper-theme brands-wrapper mb-9 appear-animate" data-swiper-options="{'spaceBetween': 0,'slidesPerView': 2,'breakpoints': {'576': {
                                    'slidesPerView': 3
                                },
                                '768': {
                                    'slidesPerView': 4
                                },
                                '992': {
                                    'slidesPerView': 5
                                },
                                '1200': {
                                    'slidesPerView': 6
                                }
                            }}">
            <div class="swiper-wrapper row gutter-no cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">

                <style>
                    .brand-wrapper img:hover {
                        transition: transform .5s;
                    }

                    .brand-wrapper img:hover {
                        transform: scale(1.1);
                    }
                </style>

                @foreach ($brands as $brand)
                <div class="swiper-slide col-md-1">
                    <figure class="brand-wrapper">
                        <a href="{{ url('/brand').'/'.$brand->slug }}">
                            <img src="{{url('storage/brands').'/'.$brand->logo}}" alt="Brand" width="100" height="70">
                        </a>
                    </figure>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- End of Brands Wrapper -->



    {{-- <div class="container">
        <div class="post-wrapper appear-animate mb-4">
            <div class="title-link-wrapper pb-1 mb-4">
                <h2 class="title ls-normal mb-0">From Our Blog</h2>
                <a href="blog-listing.html" class="font-weight-bold font-size-normal">View All Articles</a>
            </div>
            <div class="swiper">
                <div class="swiper-container swiper-theme" data-swiper-options="{
                            'slidesPerView': 1,
                            'spaceBetween': 20,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 2
                                },
                                '768': {
                                    'slidesPerView': 3
                                },
                                '992': {
                                    'slidesPerView': 4
                                }
                            }
                        }">
                    <div class="swiper-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-1">
                        <div class="swiper-slide post text-center overlay-zoom">
                            <figure class="post-media br-sm">
                                <a href="post-single.html">
                                    <img src="{{asset('')}}frontend/assets/images/demos/demo1/blogs/1.jpg" alt="Post"
                                        width="280" height="180" style="background-color: #4b6e91;" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-meta">by <a href="#" class="post-author">John Doe</a> - <a href="#"
                                        class="post-date mr-0">03.05.2021</a></div>
                                <h4 class="post-title"><a href="post-single.html">Aliquam tincidunt mauris eurisus</a>
                                </h4>
                                <a href="post-single.html" class="btn btn-link btn-dark btn-underline">Read More<i
                                        class="w-icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="swiper-slide post text-center overlay-zoom">
                            <figure class="post-media br-sm">
                                <a href="post-single.html">
                                    <img src="{{asset('')}}frontend/assets/images/demos/demo1/blogs/2.jpg" alt="Post"
                                        width="280" height="180" style="background-color: #cec9cf;" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-meta">by <a href="#" class="post-author">John Doe</a> - <a href="#"
                                        class="post-date mr-0">03.05.2021</a></div>
                                <h4 class="post-title"><a href="post-single.html">Cras ornare tristique elit</a></h4>
                                <a href="post-single.html" class="btn btn-link btn-dark btn-underline">Read More<i
                                        class="w-icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="swiper-slide post text-center overlay-zoom">
                            <figure class="post-media br-sm">
                                <a href="post-single.html">
                                    <img src="{{asset('')}}frontend/assets/images/demos/demo1/blogs/3.jpg" alt="Post"
                                        width="280" height="180" style="background-color: #c9c7bb;" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-meta">by <a href="#" class="post-author">John Doe</a> - <a href="#"
                                        class="post-date mr-0">03.05.2021</a></div>
                                <h4 class="post-title"><a href="post-single.html">Vivamus vestibulum ntulla nec ante</a>
                                </h4>
                                <a href="post-single.html" class="btn btn-link btn-dark btn-underline">Read More<i
                                        class="w-icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="swiper-slide post text-center overlay-zoom">
                            <figure class="post-media br-sm">
                                <a href="post-single.html">
                                    <img src="{{asset('')}}frontend/assets/images/demos/demo1/blogs/4.jpg" alt="Post"
                                        width="280" height="180" style="background-color: #d8dce0;" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-meta">by <a href="#" class="post-author">John Doe</a> - <a href="#"
                                        class="post-date mr-0">03.05.2021</a></div>
                                <h4 class="post-title"><a href="post-single.html">Fusce lacinia arcuet nulla</a></h4>
                                <a href="post-single.html" class="btn btn-link btn-dark btn-underline">Read More<i
                                        class="w-icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Post Wrapper -->



    <div class="container">
        <h2 class="title title-underline mb-4 ls-normal appear-animate">Your Recent Views</h2>
        <div class="swiper-container swiper-theme shadow-swiper appear-animate pb-4 mb-8" data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 2,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 3
                                },
                                '768': {
                                    'slidesPerView': 5
                                },
                                '992': {
                                    'slidesPerView': 6
                                },
                                '1200': {
                                    'slidesPerView': 8
                                }
                            }
                        }">
            <div class="swiper-wrapper row cols-xl-8 cols-lg-6 cols-md-4 cols-2">
                <div class="swiper-slide product-wrap mb-0">
                    <div class="product text-center product-absolute">
                        <figure class="product-media">
                            <a href="https://www.portotheme.com/html/wolmart/product-defaproduct-default.html">
                                <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/7-1.jpg"
                                    alt="Category image" width="130" height="146" style="background-color: #fff;" />
                            </a>
                        </figure>
                        <h4 class="product-name">
                            <a href="product-default.html">Women's Fashion Handbag</a>
                        </h4>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap mb-0">
                    <div class="product text-center product-absolute">
                        <figure class="product-media">
                            <a href="https://www.portotheme.com/html/wolmart/product-defaproduct-default.html">
                                <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/7-2.jpg"
                                    alt="Category image" width="130" height="146" style="background-color: #fff;" />
                            </a>
                        </figure>
                        <h4 class="product-name">
                            <a href="product-default.html">Electric Frying Pan</a>
                        </h4>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap mb-0">
                    <div class="product text-center product-absolute">
                        <figure class="product-media">
                            <a href="https://www.portotheme.com/html/wolmart/product-defaproduct-default.html">
                                <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/7-3.jpg"
                                    alt="Category image" width="130" height="146" style="background-color: #fff;" />
                            </a>
                        </figure>
                        <h4 class="product-name">
                            <a href="product-default.html">Black Winter Skating</a>
                        </h4>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap mb-0">
                    <div class="product text-center product-absolute">
                        <figure class="product-media">
                            <a href="https://www.portotheme.com/html/wolmart/product-defaproduct-default.html">
                                <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/7-4.jpg"
                                    alt="Category image" width="130" height="146" style="background-color: #fff;" />
                            </a>
                        </figure>
                        <h4 class="product-name">
                            <a href="product-default.html">HD Television</a>
                        </h4>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap mb-0">
                    <div class="product text-center product-absolute">
                        <figure class="product-media">
                            <a href="https://www.portotheme.com/html/wolmart/product-defaproduct-default.html">
                                <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/7-5.jpg"
                                    alt="Category image" width="130" height="146" style="background-color: #fff;" />
                            </a>
                        </figure>
                        <h4 class="product-name">
                            <a href="product-default.html">Home Sofa</a>
                        </h4>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap mb-0">
                    <div class="product text-center product-absolute">
                        <figure class="product-media">
                            <a href="https://www.portotheme.com/html/wolmart/product-defaproduct-default.html">
                                <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/7-6.jpg"
                                    alt="Category image" width="130" height="146" style="background-color: #fff;" />
                            </a>
                        </figure>
                        <h4 class="product-name">
                            <a href="product-default.html">USB Receipt</a>
                        </h4>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap mb-0">
                    <div class="product text-center product-absolute">
                        <figure class="product-media">
                            <a href="https://www.portotheme.com/html/wolmart/product-defaproduct-default.html">
                                <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/7-7.jpg"
                                    alt="Category image" width="130" height="146" style="background-color: #fff;" />
                            </a>
                        </figure>
                        <h4 class="product-name">
                            <a href="product-default.html">Electric Rice-Cooker</a>
                        </h4>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap mb-0">
                    <div class="product text-center product-absolute">
                        <figure class="product-media">
                            <a href="https://www.portotheme.com/html/wolmart/product-defaproduct-default.html">
                                <img src="{{asset('')}}frontend/assets/images/demos/demo1/products/7-8.jpg"
                                    alt="Category image" width="130" height="146" style="background-color: #fff;" />
                            </a>
                        </figure>
                        <h4 class="product-name">
                            <a href="product-default.html">Table Lamp</a>
                        </h4>
                    </div>
                </div>
                <!-- End of Product Wrap -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <!-- End of Reviewed Producs -->
    </div> --}}
    <!--End of Catainer -->
</main>




@endsection
