@extends('frontend.layouts.app')


@Section('main-content')


<style>
    .main {
        background-color: rgb(248, 248, 248);
    }
</style>



<main class="main">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no">
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li>Shop</li>
        </ul>

    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">

            @include('frontend.pages.layouts.shop-top')

            <!-- Start of Shop Content -->
            <div class="shop-content row gutter-lg mb-10">
                <!-- Start of Sidebar, Shop Sidebar -->
                @include('frontend.pages.layouts.shop-sideber')
                <!-- End of Shop Sidebar -->



                <!-- Start of Shop Main Content -->
                <div class="main-content">
                    <nav class="toolbox sticky-toolbox sticky-content fix-top">
                        <div class="toolbox-left">
                            <a href="#"
                                class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle btn-icon-left d-block d-lg-none"><i
                                    class="w-icon-category"></i><span>Filters</span></a>
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <label>Sort By :</label>
                                <select name="orderby" class="form-control">
                                    <option value="default" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by latest</option>
                                    <option value="price-low">Sort by pric: low to high</option>
                                    <option value="price-high">Sort by price: high to low</option>
                                </select>
                            </div>
                        </div>
                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show select-box">
                                <select name="count" class="form-control">
                                    <option value="9">Show 9</option>
                                    <option value="12" selected="selected">Show 12</option>
                                    <option value="24">Show 24</option>
                                    <option value="36">Show 36</option>
                                </select>
                            </div>
                            <div class="toolbox-item toolbox-layout">
                                <a href="shop-banner-sidebar.html" class="icon-mode-grid btn-layout active">
                                    <i class="w-icon-grid"></i>
                                </a>
                                <a href="shop-list.html" class="icon-mode-list btn-layout">
                                    <i class="w-icon-list"></i>
                                </a>
                            </div>
                        </div>
                    </nav>


                    <div class="product-msg"></div>

                    <div class="product-wrapper row cols-lg-5 cols-md-3 cols-sm-2 cols-2" id="shop_product_section">

                        @if (count($products)==0)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>No product!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @else
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
                                            mb_strimwidth($product->title, 0, 25) }} ..</a>
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
                    @endif

                </div>




                <div class="toolbox toolbox-pagination justify-content-between">
                    <p class="showing-info mb-2 mb-sm-0">Showing<span>1-12 of 60</span>Products</p>
                    <ul class="pagination">
                        <li class="prev disabled">
                            <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true"> <i
                                    class="w-icon-long-arrow-left"></i>Prev </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="next">
                            <a href="#" aria-label="Next"> Next<i class="w-icon-long-arrow-right"></i> </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End of Shop Main Content -->
        </div>
        <!-- End of Shop Content -->
    </div>
    </div>
    <!-- End of Page Content -->
</main>















@endsection
