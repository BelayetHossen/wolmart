@extends('frontend.layouts.app')


@Section('main-content')






<main class="main">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no">
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li>Agents</li>
        </ul>

    </nav>
    <!-- End of Breadcrumb -->





    <div class="container">
        <div class="row gutter-lg">
            <aside class="sidebar vendor-sidebar sticky-sidebar-wrapper left-sidebar sidebar-fixed">
                <div class="sidebar-overlay"></div>
                <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-right"></i></a>
                <div class="sidebar-content">
                    <div class="pin-wrapper" style="height: 485.375px;">
                        <div class="sticky-sidebar" style="border-bottom: 0px none rgb(102, 102, 102); width: 280px;">
                            <div class="widget widget-search-form">
                                <div class="widget-body">
                                    <form action="#" method="GET" class="input-wrapper input-wrapper-inline">
                                        <input type="text" class="form-control" placeholder="Search ..." autocomplete="off" required="" />
                                        <button class="btn btn-search"><i class="w-icon-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!-- End of Widget -->

                            <div class="widget widget-filter">
                                <h4 class="widget-title">Filter By Category</h4>
                                <div class="widget-body">
                                    <form class="select-box">
                                        <select name="orderby" class="form-control">
                                            <option value="choose" selected="selected">Choose Category ...</option>
                                            <option value="clothing">Clothings</option>
                                            <option value="men">Men's</option>
                                            <option value="electronics">Office Electronics</option>
                                            <option value="accessories">Accessories</option>
                                            <option value="home-kitchen">Home &amp; Kitchen</option>
                                            <option value="healthy-beauty">Healthy &amp; Beauty</option>
                                            <option value="jewelry-watch">Jewelry &amp; Watch</option>
                                            <option value="smart-watch">Smart Watches</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <!-- End of Widget -->

                            <div class="widget widget-filter">
                                <h4 class="widget-title">Filter By Location</h4>
                                <div class="widget-body">
                                    <form class="select-box">
                                        <select name="orderby" class="form-control">
                                            <option value="choose" selected="selected">Choose Location ...</option>
                                            <option value="afghanistan">Afghanistan</option>
                                            <option value="aland">Aland Islands</option>
                                            <option value="albania">Albania</option>
                                            <option value="algeria">Algeria</option>
                                            <option value="bahamas">Bahamas</option>
                                            <option value="cuba">Cuba</option>
                                            <option value="greece">Greece</option>
                                        </select>
                                    </form>
                                    <form class="select-box">
                                        <select name="orderby" class="form-control">
                                            <option value="choose" selected="selected">Choose State</option>
                                        </select>
                                    </form>
                                    <form>
                                        <input type="search" id="city" name="city" class="form-control" placeholder="Search by City" required="" />
                                        <input type="search" id="zip" name="zip" class="form-control" placeholder="Search by Zip" required="" />
                                    </form>
                                </div>
                            </div>
                            <!-- End of Widget -->
                        </div>
                    </div>
                    <!-- End of Sticky Sidebar -->
                </div>
                <!-- End of Sidebar Content -->
            </aside>
            <!-- End of Sidebar -->

            <div class="main-content">
                <div class="toolbox wcfm-toolbox">
                    <div class="toolbox-left">
                        <form class="select-box toolbox-item">
                            <select name="orderby" class="form-control">
                                <option value="old-new" selected="selected">Sort by newness: old to new</option>
                                <option value="new-old">Sort by newness: new to old</option>
                                <option value="low-high">Sort by average rating: low to high</option>
                                <option value="high-low">Sort by average rating: high to low</option>
                                <option value="old-new">Sort Alphabetical: A to Z</option>
                                <option value="old-new">Sort Alphabetical: Z to A</option>
                            </select>
                        </form>
                    </div>
                    <div class="toolbox-right">
                        <div class="toolbox-item">
                            <label class="showing-info">Showing 1-2 of 2 result</label>
                        </div>
                    </div>
                </div>
                <!-- End of Toolbox -->

                <div class="row cols-sm-2">

                    <style>
                        .banner_img img:hover{
                            background-color: rgba(231, 0, 0, 0.644);
                            opacity: 0.5;
                        }
                    </style>

                    @foreach ($vendors as $vendor)
                        @php
                        if ($vendor->logo == null){
                            $logo_src = '/backend/img/profile/avater.jpg';
                        } else{
                            $logo_src = '/storage/vendors/'.$vendor->logo;
                        }
                        if ($vendor->banner == null){
                            $banner_src = '/backend/img/profile/vendor-banner.jpg';
                        } else{
                            $banner_src = '/storage/vendors/'.$vendor->banner;
                        }
                        @endphp
                    <div class="store-wrap mb-4">
                        <div class="store store-grid store-wcfm" style="color:#000!important;">
                            <div class="store-header">
                                <figure class="store-banner banner_img ">
                                    <img src="{{ $url.$banner_src }}" alt="Vendor" width="400" height="194" style="background-color: #40475e;" />
                                </figure>
                            </div>
                            <!-- End of Store Header -->
                            <div class="store-content">
                                <h4 class="store-title">
                                    <a href="{{ url('/agent').'/'.$vendor->username }}">{{ $vendor->store_name }}</a>
                                </h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                </div>
                                <ul class="seller-info-list list-style-none">
                                    <li class="store-email">
                                        <a href="email:#">
                                            <i class="far fa-envelope"></i>
                                            {{ $vendor->email }}
                                        </a>
                                    </li>
                                    <li class="store-phone">
                                        <a href="tel:{{ $vendor->phone }}">
                                            <i class="w-icon-phone"></i>
                                            {{ $vendor->phone }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End of Store Content -->
                            <div class="store-footer">
                                <figure class="seller-brand">
                                    <img src="{{ $url.$logo_src }}" alt="Brand" width="80" height="80" />
                                </figure>
                                <a href="#" class="btn btn-inquiry btn-rounded btn-icon-left"><i class="far fa-question-circle"></i>Inquiry</a>
                                <a href="{{ url('/agent').'/'.$vendor->username }}" class="btn btn-rounded btn-visit">Visit</a>
                            </div>
                            <!-- End of Store Footer -->
                        </div>
                        <!-- End of Store -->
                    </div>
                    @endforeach


                </div>
            </div>
            <!-- End of Main Content -->
        </div>
    </div>







</main>















@endsection
