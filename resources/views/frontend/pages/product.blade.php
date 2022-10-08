@extends('frontend.layouts.app')


@Section('main-content')




<!-- Start of Main -->
<main class="main mb-10 pb-1">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no">
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li><a href="{{ route('home.index') }}">{{ $product->maincat->name }}</a></li>
            <li>{{ $product->title }}</li>
        </ul>
        <ul class="product-nav list-style-none">
            <li class="product-nav-prev">
                <a href="#">
                    <i class="w-icon-angle-left"></i>
                </a>
                <span class="product-nav-popup">
                    <img src="{{asset('')}}frontend/assets/images/products/product-nav-prev.jpg" alt="Product"
                        width="110" height="110" />
                    <span class="product-name">Soft Sound Maker</span>
                </span>
            </li>
            <li class="product-nav-next">
                <a href="#">
                    <i class="w-icon-angle-right"></i>
                </a>
                <span class="product-nav-popup">
                    <img src="{{asset('')}}frontend/assets/images/products/product-nav-next.jpg" alt="Product"
                        width="110" height="110" />
                    <span class="product-name">Fabulous Sound Speaker</span>
                </span>
            </li>
        </ul>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    @php
    $rate = 0;
    $recomand = 0;
    foreach ($product->getReviews as $review){
    $rate += intval($review->rating);

    }
    $ever = 0;
    if (count($product->getReviews)!=0){
    $ever = $rate/count($product->getReviews);
    }
    if($ever<=0){ $evrating='0%' ; } elseif($ever<=1){ $evrating='20%' ; } elseif ($ever<=2) { $evrating='40%' ; }
        elseif ($ever<=3) { $evrating='60%' ; } elseif ($ever<=4) { $evrating='80%' ; } elseif ($ever<=5) {
        $evrating='100%' ; } @endphp <div class="page-content">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content">
                    <div class="product product-single row">
                        <div class="col-md-6 mb-6">
                            <div class="product-gallery product-gallery-sticky">
                                <div class="swiper-container product-single-swiper swiper-theme nav-inner"
                                    data-swiper-options="{
                                                    'navigation': {
                                                        'nextEl': '.swiper-button-next',
                                                        'prevEl': '.swiper-button-prev'
                                                    }
                                                }">
                                    <div class="swiper-wrapper row cols-1 gutter-no">

                                        @foreach (json_decode($product->image) as $image)
                                        <div class="swiper-slide">
                                            <figure class="product-image">
                                                <img src="{{ $img_path.$image }}"
                                                    data-zoom-image="{{ $img_path.$image }}"
                                                    alt="Electronics Black Wrist Watch" width="800" height="900" />
                                            </figure>
                                        </div>
                                        @endforeach


                                    </div>
                                    <button class="swiper-button-next"></button>
                                    <button class="swiper-button-prev"></button>
                                    <a href="#" class="product-gallery-btn product-image-full"><i
                                            class="w-icon-zoom"></i></a>
                                </div>
                                <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                                    'navigation': {
                                                        'nextEl': '.swiper-button-next',
                                                        'prevEl': '.swiper-button-prev'
                                                    }
                                                }">
                                    <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">

                                        @foreach (json_decode($product->image) as $image)
                                        <div class="product-thumb swiper-slide">
                                            <img src="{{ $img_path.$image }}" alt="Product Thumb" width="800"
                                                height="900" />
                                        </div>
                                        @endforeach


                                    </div>
                                    <button class="swiper-button-next"></button>
                                    <button class="swiper-button-prev"></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 mb-md-6">
                            <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                <h1 class="product-title">{{ $product->title }}</h1>
                                <div class="product-bm-wrapper">
                                    <figure class="brand">
                                        <img src="{{ $brandimg.'/'.$product->getBrand->logo }}" alt="Brand" width="102"
                                            height="48" />
                                    </figure>
                                    <div class="product-meta">
                                        <div class="product-categories">
                                        </div>
                                        <div class="product-categories">
                                            Category:
                                            <span class="product-category"><a href="#">{{
                                                    $product->maincat->name
                                                    }}</a></span>
                                        </div>
                                        <div class="product-sku">SKU: <span>{{ $product->sku }}</span></div>
                                    </div>
                                </div>

                                <hr class="product-divider" />

                                <div class="product-price">{!! htmlspecialchars_decode($price) !!}</div>

                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: {{ $evrating }};"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="#product-tab-reviews" class="rating-reviews scroll-to">({{
                                        count($product->getReviews) }} Reviews)</a>
                                </div>

                                <div class="product-short-desc">
                                    <ul class="list-type-check list-style-none">
                                        <li>{{ $product->short_desc }}</li>
                                    </ul>
                                </div>

                                <hr class="product-divider" />

                                {{-- <div class="product-form product-variation-form product-color-swatch">
                                    <label>Color:</label>
                                    <div class="d-flex align-items-center product-variations">
                                        <a href="#" class="color" style="background-color: #ffcc01;"></a>
                                        <a href="#" class="color" style="background-color: #ca6d00;"></a>
                                        <a href="#" class="color" style="background-color: #1c93cb;"></a>
                                        <a href="#" class="color" style="background-color: #ccc;"></a>
                                        <a href="#" class="color" style="background-color: #333;"></a>
                                    </div>
                                </div>
                                <div class="product-form product-variation-form product-size-swatch">
                                    <label class="mb-1">Size:</label>
                                    <div class="flex-wrap d-flex align-items-center product-variations">
                                        <a href="#" class="size">Small</a>
                                        <a href="#" class="size">Medium</a>
                                        <a href="#" class="size">Large</a>
                                        <a href="#" class="size">Extra Large</a>
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

                                            <input name="product_id" type="hidden" value="{{ $product->id }}">
                                            <div class="product-qty-form mt-2">
                                                <div class="d-flex justify-content-between">
                                                    <a class="quantity-minus w-icon-minus"></a>
                                                    <input name="product_qty" class="quantity form-control"
                                                        type="number" min="1" max="100" value="1">
                                                    <a class="quantity-plus w-icon-plus"></a>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-cart disabled">
                                                <i class="w-icon-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>



                                <div class="social-links-wrapper">
                                    <div class="social-links">
                                        <div class="social-icons social-no-color border-thin">
                                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                            <a href="#" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                            <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                            <a href="#" class="social-icon social-youtube fab fa-linkedin-in"></a>
                                        </div>
                                    </div>
                                    <span class="divider d-xs-show"></span>
                                    <div class="product-link-wrapper d-flex">
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                        <a href="#"
                                            class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-5">
                            <div class="banner banner-video product-video br-xs">
                                <figure class="banner-media">
                                    <a href="#">
                                        <img src="{{asset('')}}frontend/assets/images/products/video-banner-610x300.jpg"
                                            alt="banner" width="610" height="300" style="background-color: #bebebe;" />
                                    </a>
                                    <a class="btn-play-video btn-iframe"
                                        href="{{asset('')}}frontend/assets/video/memory-of-a-woman.mp4"></a>
                                </figure>
                            </div>
                        </div>

                    </div>

                    <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#product-tab-description" class="nav-link active">Description</a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-tab-vendor" class="nav-link">Vendor Info</a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-tab-reviews" class="nav-link">Customer Reviews ( {{
                                    count($product->getReviews) }} )</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="product-tab-description">
                                <div class="row mb-4">
                                    <div class="col mb-5">
                                        <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                                        {!! htmlspecialchars_decode($product->long_desc) !!}
                                    </div>

                                </div>

                            </div>

                            {{-- Vendore --}}
                            <div class="tab-pane" id="product-tab-vendor">
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-4">
                                        @php
                                        $vendor_name = $product->getVendor->f_name.' '.$product->getVendor->l_name;
                                        $store_name = $product->getVendor->store_name;
                                        $vendor_username = $product->getVendor->username;
                                        $vendor_id = $product->getVendor->id;
                                        $vendor_phone = $product->getVendor->phone;
                                        $store_location = $product->getVendor->thana . ',
                                        '.$product->getVendor->zilla;

                                        if ($product->getvendor->banner != null){
                                        $bnsrc = '/storage/vendors/'.$product->getvendor->banner;
                                        $logosrc = '/storage/vendors/'.$product->getvendor->logo;
                                        } else {

                                        $bnsrc = '/backend/img/profile/avater.jpg';
                                        $logosrc = '/backend/img/profile/avater.jpg';

                                        }
                                        @endphp
                                        <figure class="vendor-banner br-sm">
                                            <img src="{{ $path.$bnsrc }}" alt="Vendor Banner" width="610" height="295"
                                                style="background-color: #353b55;" />
                                        </figure>
                                    </div>
                                    <div class="col-md-6 pl-2 pl-md-6 mb-4">
                                        <div class="vendor-user">
                                            <figure class="vendor-logo mr-4">
                                                <a href="#">
                                                    <img src="{{ $path.$logosrc }}" alt="Vendor Logo" width="80"
                                                        height="80" />
                                                </a>
                                            </figure>
                                            <div>
                                                <div class="vendor-name"><a href="#">{{ $vendor_name }}</a></div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 90%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <a href="#" class="rating-reviews">(32 Reviews)</a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="vendor-info list-style-none">
                                            <li class="store-name">
                                                <label>Store Name:</label>
                                                <span class="detail">{{ $store_name }}</span>
                                            </li>
                                            <li class="store-address">
                                                <label>Address:</label>
                                                <span class="detail">Steven Street, El Carjon, CA 92020, United
                                                    States
                                                    (US)</span>
                                            </li>
                                            <li class="store-phone">
                                                <label>Phone:</label>
                                                <a href="#tel:">{{$vendor_phone}}</a>
                                            </li>
                                        </ul>
                                        <a href="{{ url('/agent').'/'.$vendor_username }}"
                                            class="btn btn-dark btn-link btn-underline btn-icon-right">Visit Store<i
                                                class="w-icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                <p class="mb-5">
                                    <strong class="text-dark">L</strong>orem ipsum dolor sit amet, consectetur
                                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua.
                                    Venenatis tellus in metus
                                    vulputate eu scelerisque felis. Vel pretium lectus quam id leo in vitae turpis
                                    massa. Nunc id cursus metus aliquam. Libero id faucibus nisl tincidunt eget.
                                    Aliquam
                                    id diam maecenas ultricies
                                    mi eget mauris. Volutpat ac tincidunt vitae semper quis lectus. Vestibulum
                                    mattis
                                    ullamcorper velit sed. A arcu cursus vitae congue mauris.
                                </p>
                                <p class="mb-2">
                                    <strong class="text-dark">A</strong> arcu cursus vitae congue mauris. Sagittis
                                    id
                                    consectetur purus ut. Tellus rutrum tellus pellentesque eu tincidunt tortor
                                    aliquam
                                    nulla. Diam in arcu cursus
                                    euismod quis. Eget sit amet tellus cras adipiscing enim eu. In fermentum et
                                    sollicitudin ac orci phasellus. A condimentum vitae sapien pellentesque habitant
                                    morbi tristique senectus et. In
                                    dictum non consectetur a erat. Nunc scelerisque viverra mauris in aliquam sem
                                    fringilla.
                                </p>
                            </div>
                            <div class="tab-pane" id="product-tab-reviews">
                                <div class="row mb-4">
                                    <div class="col-xl-4 col-lg-5 mb-4">
                                        <div class="ratings-wrapper">
                                            <div class="avg-rating-container">


                                                <h4 class="avg-mark font-weight-bolder ls-50">{{
                                                    mb_strimwidth($ever, 0,
                                                    3) }}</h4>
                                                <div class="avg-rating">
                                                    <p class="text-dark mb-1">Average Rating</p>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings"
                                                                style="width: {{ $evrating }};"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <a href="{{ url('/').'/item/'.$product->slug }}"
                                                            class="rating-reviews">( {{ count($product->getReviews)
                                                            }}
                                                            Reviews)</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ratings-value d-flex align-items-center text-dark ls-25">
                                                <span class="text-dark font-weight-bold">{{
                                                    intval($ever)/intval(100)
                                                    }}</span>Recommended<span class="count">(2 of 3)</span>
                                            </div>
                                            <div class="ratings-list mt-3">
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>70%</mark>
                                                    </div>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 80%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>30%</mark>
                                                    </div>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 60%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>40%</mark>
                                                    </div>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 40%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>0%</mark>
                                                    </div>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 20%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>0%</mark>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-7 mb-4">


                                        <div class="review-form-wrapper">
                                            <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your
                                                Review
                                            </h3>

                                            @php
                                            $rrrr = '';

                                            if ( Auth::guard('customer')->check()) {
                                            $rrrr = '<p class="text-danger">The review option is only for customer
                                            </p>
                                            <button class="btn btn-primary pro_review_btn">Click here to Submit a
                                                review</button>';
                                            } else {
                                            $rrrr = '<p class="text-danger">The review option is only for customer
                                            </p>
                                            <button class="btn login_btn">Click here to Login first</button>';
                                            }



                                            @endphp


                                            {!! htmlspecialchars_decode($rrrr) !!}


                                            <!-- review Modal -->
                                            <div class="modal fade" id="reviewModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="card-header d-flex justify-content-between">
                                                                    <h4 class="text-center mt-2">Product review</h4>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <style>
                                                                    .fa-star:hover {
                                                                        color: orange;
                                                                    }

                                                                    .checked {
                                                                        color: orange;
                                                                    }

                                                                    .rating-form span {
                                                                        font-size: 30px;
                                                                    }
                                                                </style>
                                                                <div class="card-body margin_left">

                                                                    <form method="POST" class="product-review-form">
                                                                        @csrf
                                                                        <div class="rating-form">


                                                                            <span rate="1"
                                                                                class="fa fa-star star1"></span>
                                                                            <span rate="2"
                                                                                class="fa fa-star star2"></span>
                                                                            <span rate="3"
                                                                                class="fa fa-star star3"></span>
                                                                            <span rate="4"
                                                                                class="fa fa-star star4"></span>
                                                                            <span rate="5"
                                                                                class="fa fa-star star5"></span>

                                                                            <input type="hidden" name="rating" value="">
                                                                            <input type="hidden" name="product_id"
                                                                                value="{{ $product->id }}">

                                                                            <span class="rating-msg"></span>

                                                                        </div>
                                                                        <textarea cols="30" rows="6"
                                                                            placeholder="Write Your Review Here..."
                                                                            class="form-control mb-2"
                                                                            name="review"></textarea>
                                                                        <span class="review-msg"></span>


                                                                        <button type="submit"
                                                                            class="btn btn-primary">Submit
                                                                            Review</button>
                                                                    </form>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>


                                    </div>
                                </div>


                                {{-- Show Review --}}

                                <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">



                                    <div class="tab-content">
                                        <div class="tab-pane active" id="show-all">
                                            <ul class="comments list-style-none">



                                                @foreach ($reviews as $review)

                                                @php
                                                if($review->rating==1){
                                                $rating = '20%';
                                                } elseif ($review->rating==2) {
                                                $rating = '40%';
                                                } elseif ($review->rating==3) {
                                                $rating = '60%';
                                                } elseif ($review->rating==4) {
                                                $rating = '80%';
                                                } elseif ($review->rating==5) {
                                                $rating = '100%';
                                                }
                                                @endphp

                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <figure class="comment-avatar">
                                                            <img src="{{asset('')}}backend/img/profile/avater.jpg"
                                                                alt="Commenter Avatar" width="90" height="90" />
                                                        </figure>
                                                        <div class="comment-content">
                                                            <h4 class="comment-author">
                                                                <a href="#">{{ $review->getReviewPublisher->f_name
                                                                    .' '
                                                                    .$review->getReviewPublisher->l_name }}</a>
                                                                <span class="comment-date">March 22, 2021 at 1:54
                                                                    pm</span>
                                                            </h4>
                                                            <div class="ratings-container comment-rating">
                                                                <div class="ratings-full">
                                                                    <span class="ratings"
                                                                        style="width: {{ $rating }};"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                {{ $review->review }}
                                                            </p>
                                                            <div class="comment-action">
                                                                <a href="#"
                                                                    class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                    <i class="far fa-thumbs-up"></i>Helpful (1) </a>
                                                                <a href="#"
                                                                    class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                    <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- <section class="vendor-product-section">
                        <div class="title-link-wrapper mb-4">
                            <h4 class="title text-left">More Products From This Vendor</h4>
                            <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More Products<i
                                    class="w-icon-long-arrow-right"></i></a>
                        </div>
                        <div class="swiper-container swiper-theme" data-swiper-options="{
                                            'spaceBetween': 20,
                                            'slidesPerView': 2,
                                            'breakpoints': {
                                                '576': {
                                                    'slidesPerView': 3
                                                },
                                                '768': {
                                                    'slidesPerView': 4
                                                },
                                                '992': {
                                                    'slidesPerView': 3
                                                }
                                            }
                                        }">
                            <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/products/default/1-1.jpg"
                                                alt="Product" width="300" height="338" />
                                            <img src="{{asset('')}}frontend/assets/images/products/default/1-2.jpg"
                                                alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="shop-banner-sidebar.html">Accessories</a>
                                        </div>
                                        <h4 class="product-name"><a href="product-default.html">Sticky Pencil</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">$20.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/products/default/2.jpg"
                                                alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="shop-banner-sidebar.html">Electronics</a>
                                        </div>
                                        <h4 class="product-name"><a href="product-default.html">Mini
                                                Multi-Functional
                                                Cooker</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(5 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price"><ins class="new-price">$480.00</ins><del
                                                    class="old-price">$534.00</del></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/products/default/3.jpg"
                                                alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="shop-banner-sidebar.html">Sports</a></div>
                                        <h4 class="product-name"><a href="product-default.html">Skate Pan</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price"><ins class="new-price">$278.00</ins><del
                                                    class="old-price">$310.00</del></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/products/default/4-1.jpg"
                                                alt="Product" width="300" height="338" />
                                            <img src="{{asset('')}}frontend/assets/images/products/default/4-2.jpg"
                                                alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="shop-banner-sidebar.html">Accessories</a>
                                        </div>
                                        <h4 class="product-name"><a href="product-default.html">Clip Attachment</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(5 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">$40.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> --}}


                    <section class="related-product-section">
                        <div class="title-link-wrapper mb-4">
                            <h4 class="title">Related Products</h4>
                            <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More Products<i
                                    class="w-icon-long-arrow-right"></i></a>
                        </div>
                        <div class="swiper-container swiper-theme" data-swiper-options="{
                                            'spaceBetween': 20,
                                            'slidesPerView': 2,
                                            'breakpoints': {
                                                '576': {
                                                    'slidesPerView': 3
                                                },
                                                '768': {
                                                    'slidesPerView': 4
                                                },
                                                '992': {
                                                    'slidesPerView': 3
                                                }
                                            }
                                        }">
                            <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/products/default/5.jpg"
                                                alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Drone</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">$632.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/products/default/6.jpg"
                                                alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Official Camera</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price"><ins class="new-price">$263.00</ins><del
                                                    class="old-price">$300.00</del></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/products/default/7-1.jpg"
                                                alt="Product" width="300" height="338" />
                                            <img src="{{asset('')}}frontend/assets/images/products/default/7-2.jpg"
                                                alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Phone Charge Pad</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(8 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">$23.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('')}}frontend/assets/images/products/default/8.jpg"
                                                alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Fashionalble
                                                Pencil</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(9 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">$50.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                </div>
                <!-- End of Main Content -->






                {{-- Right side bar --}}
                <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                    <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                    <div class="sidebar-content scrollable">
                        <div class="sticky-sidebar">


                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between p-2">
                                        <h6 class="m-auto">Vendore info</h6>
                                        <img src="{{ $path.$logosrc }}" alt="Vendor Logo" width="80px" />
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="d-flex justify-content-between px-4 py-2">
                                        <label>Store Name:</label>
                                        <span class="detail">{{ $store_name }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between px-4 py-2">
                                        <label>Location:</label>
                                        <span class="detail">{{ $store_location }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between px-4 py-2">
                                        <label>Phone:</label>
                                        <span class="detail">{{ $vendor_phone }}</span>
                                    </div>



                                </div>

                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="btn btn-primary btn-sm">Contact seller</a>
                                        <a href="{{ url('/agent').'/'.$vendor_username }}"
                                            class="btn btn-primary btn-sm">Store</a>
                                    </div>
                                </div>
                            </div>


                            <!-- End of Widget Icon Box -->

                            <div class="widget widget-banner mb-9">
                                <div class="banner banner-fixed br-sm">
                                    <figure>
                                        <img src="{{asset('')}}frontend/assets/images/shop/banner3.jpg" alt="Banner"
                                            width="266" height="220" style="background-color: #1d2d44;" />
                                    </figure>
                                    <div class="banner-content">
                                        <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                            40<sup class="font-weight-bold">%</sup><sub
                                                class="font-weight-bold text-uppercase ls-25">Off</sub></div>
                                        <h4 class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                            Ultimate Sale
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Widget Banner -->

                            <div class="widget widget-products">
                                <div class="title-link-wrapper mb-2">
                                    <h4 class="title title-link font-weight-bold">More Products</h4>
                                </div>

                                <div class="swiper nav-top">
                                    <div class="swiper-container swiper-theme nav-top" data-swiper-options="{
                                                'slidesPerView': 1,
                                                'spaceBetween': 20,
                                                'navigation': {
                                                    'prevEl': '.swiper-button-prev',
                                                    'nextEl': '.swiper-button-next'
                                                }
                                            }">
                                        <div class="swiper-wrapper">
                                            <div class="widget-col swiper-slide">
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{asset('')}}frontend/assets/images/shop/13.jpg"
                                                                alt="Product" width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Smart Watch</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$80.00 - $90.00</div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{asset('')}}frontend/assets/images/shop/14.jpg"
                                                                alt="Product" width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Sky Medical Facility</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$58.00</div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{asset('')}}frontend/assets/images/shop/15.jpg"
                                                                alt="Product" width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Black Stunt Motor</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$374.00</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-col swiper-slide">
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{asset('')}}frontend/assets/images/shop/16.jpg"
                                                                alt="Product" width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Skate Pan</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$278.00</div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{asset('')}}frontend/assets/images/shop/17.jpg"
                                                                alt="Product" width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Modern Cooker</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$324.00</div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{asset('')}}frontend/assets/images/shop/18.jpg"
                                                                alt="Product" width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">CT Machine</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$236.00</div>
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
                </aside>
                <!-- End of Sidebar -->
            </div>
        </div>
        </div>
        <!-- End of Page Content -->
</main>
<!-- End of Main -->









{{--
<!-- Root element of PhotoSwipe. Must have class pswp -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <!-- Background of PhotoSwipe. It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">
        <!-- Container that holds slides.
			PhotoSwipe keeps only 3 of them in the DOM to save memory.
			Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" aria-label="Close (Esc)"></button>
                <button class="pswp__button pswp__button--zoom" aria-label="Zoom in/out"></button>

                <div class="pswp__preloader">
                    <div class="loading-spin"></div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button--arrow--left" aria-label="Previous (arrow left)"></button>
            <button class="pswp__button--arrow--right" aria-label="Next (arrow right)"></button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
<!-- End of PhotoSwipe --> --}}








@endsection
