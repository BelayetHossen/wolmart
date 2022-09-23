@extends('frontend.layouts.app')


@Section('main-content')






    <main class="main">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav container">
            <ul class="breadcrumb bb-no">
                <li><a href="{{ route('home.index') }}">Home</a></li>
                <li><a href="{{ route('vendor.index') }}">Agents</a></li>
                <li>{{ $vendor->store_name }}</li>
            </ul>

        </nav>
        <!-- End of Breadcrumb -->





        <div class="page-content mb-8">
            <div class="container">
                <div class="store store-wcfm-banner">
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
                    <figure class="store-media">
                        <img src="{{ $url.$banner_src }}" alt="Vendor" width="1240" height="460" style="background-color: #40475e;" />
                    </figure>
                    <div class="store-content">
                        <div class="store-content-left mr-auto">
                            <div class="personal-info">
                                <figure class="seller-brand">
                                    <img src="{{ $url.$logo_src }}" alt="Brand" width="100" height="100" />
                                </figure>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="address-info">
                                <h4 class="store-title">{{ $vendor->store_name }}</h4>
                                <ul class="seller-info-list list-style-none">
                                    <li class="store-address">
                                        <i class="w-icon-map-marker"></i>
                                        {{ $vendor->post.','.$vendor->thana.','.$vendor->zilla }}
                                    </li>
                                    <li class="store-phone">
                                        <a href="tel:{{ $vendor->phone }}">
                                            <i class="w-icon-phone"></i>
                                            {{ $vendor->phone }}
                                        </a>
                                    </li>
                                    <li class="store-email">
                                        <a href="email:#">
                                            <i class="far fa-envelope"></i>
                                            {{ $vendor->email }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="store-content-right">
                            <div class="btn btn-white btn-rounded btn-icon-left btn-inquiry"><i class="far fa-question-circle"></i>Inquiry</div>
                            <div class="social-icons social-icons-colored border-thin">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-linkedin fab fa-linkedin"></a>
                                <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Store WCMP Banner -->

                <div class="row gutter-lg">

                    @include('frontend.pages.vendore.front.layouts.sideber')
                    <!-- End of Sidebar -->

                    <div class="main-content">
                        <div class="tab tab-nav-underline tab-nav-boxed tab-vendor-wcfm">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#tab-1" class="nav-link active">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab-2" class="nav-link">About</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab-3" class="nav-link">Policies</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab-4" class="nav-link">Reviews(1)</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-1">
                                    <nav class="toolbox sticky-toolbox sticky-content fix-top">
                                        <div class="toolbox-left">
                                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                                <label>Sort By :</label>
                                                <select name="orderby" class="form-control">
                                                    <option value="default" selected="selected">Default sorting </option>
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
                                                <a href="vendor-wcfm-store-product-grid.html" class="icon-mode-grid btn-layout active">
                                                    <i class="w-icon-grid"></i>
                                                </a>
                                                <a href="vendor-wcfm-store-product-list.html" class="icon-mode-list btn-layout">
                                                    <i class="w-icon-list"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </nav>


                                    <div class="vendor_products_msg"></div>


                                    <div class="product-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-2" id="vendor_category_product_section">

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
                                                    @endphp

                                                    <div class="product product-image-gap product-simple">
                                                        <figure class="product-media">
                                                            <a href="{{ url('/').'/item/'.$product->slug }}">
                                                                <img src="{{asset('')}}storage/products/{{ $photo_1 }}" alt="Product" width="295" height="335" />
                                                                <img src="{{asset('')}}storage/products/{{ $photo_2 }}" alt="Product" width="295" height="335" />
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
                                                                <a href="#" product_slug="{{ $product->slug }}" class="btn-product btn-quickview" title="Quick View">Quick view</a>
                                                            </div>
                                                        </figure>
                                                        <div class="product-details">
                                                            <a href="#" class="btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                                            <div class="product-name">
                                                                <a href="{{ url('/').'/item/'.$product->slug }}">{{ mb_strimwidth($product->title, 0, 25) }} ..</a>
                                                            </div>
                                                            <div class="ratings-container">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 100%;"></span>
                                                                    <span class="tooltiptext tooltip-top">5.00</span>
                                                                </div>
                                                                <a href="product-default.html" class="rating-reviews">(1 reviews)</a>
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
                                                                            <input name="product_qty" type="hidden"value="1">
                                                                            <button type="submit" class="btn-cart btn-product btn btn-link btn-underline" data-toggle="tooltip" data-placement="top" title="Add to cart" style="">
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

                                </div>
                                <div class="tab-pane" id="tab-2">
                                    <p class="mb-4">
                                        <strong>L</strong>orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulputate eu scelerisque felis. Vel
                                        pretium lectus quam id leo in vitae turpis massa. Nunc id cursus metus aliquam. Libero id faucibus nisl tincidunt eget. Aliquam id diam maecenas ultricies mi eget mauris.
                                    </p>
                                    <p>
                                        <strong>L</strong>orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt tellus in metus vulputate eu scelerisque felis. Vel pretium lectus quam id leo. id faucibus nisl
                                        tincidunt eget. Aliquam id diam maecenas ultricies mi eget mauris. ut labore et dolore magna aliqua. Venenatis.
                                    </p>
                                </div>
                                <div class="tab-pane" id="tab-3">
                                    <div class="policies-area">
                                        <h3 class="title">Shipping Policy</h3>
                                        <p><strong>L</strong>orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt arcu cursus. Sagittis id consectetur purus ut. Tellus rutrum tellus pelle.</p>
                                    </div>
                                    <div class="policies-area">
                                        <h3 class="title">Refund Policy</h3>
                                        <p><strong>L</strong>orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt arcu cursus. Sagittis id consectetur purus ut. Tellus rutrum tellus pelle.</p>
                                    </div>
                                    <div class="policies-area">
                                        <h3 class="title text-left">Cancellation / Return / Exchange Policy</h3>
                                        <p><strong>L</strong>orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt arcu cursus. Sagittis id consectetur purus ut. Tellus rutrum tellus pelle.</p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-4">
                                    <div class="review-area">
                                        <h3 class="title font-weight-bold mb-5">Write A Review</h3>
                                        <input name="review" type="text" class="form-control" placeholder="your review" />
                                        <button class="btn btn-rounded">Add Your Review</button>
                                    </div>
                                    <!-- End of Reveiw Area -->
                                    <div class="review-area">
                                        <h3 class="title font-weight-bold mb-5">Reviews</h3>
                                        <div class="reviewers d-flex align-items-center flex-wrap mb-7">
                                            <div class="reviewers-picture d-flex mr-2">
                                                <figure>
                                                    <img src="{{asset('')}}frontend/assets/images/vendor/wcfm/avatar.png" alt="Avatar" width="113" height="112" />
                                                </figure>
                                                <figure>
                                                    <img src="{{asset('')}}frontend/assets/images/vendor/wcfm/avatar.png" alt="Avatar" width="113" height="112" />
                                                </figure>
                                                <figure>
                                                    <img src="{{asset('')}}frontend/assets/images/vendor/wcfm/avatar.png" alt="Avatar" width="113" height="112" />
                                                </figure>
                                            </div>
                                            <div class="reviewer-name"><a href="#" class="font-weight-bold mr-1">John Doe</a>has reviewed this store</div>
                                        </div>
                                        <!-- End of Reviewers -->
                                        <div class="review-ratings">
                                            <div class="review-ratings-left mr-auto">
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                    </div>
                                                    <label>5.0 Feature</label>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                    </div>
                                                    <label>5.0 Varity</label>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                    </div>
                                                    <label>5.0 Flexibility</label>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                    </div>
                                                    <label>5.0 Delivery</label>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                    </div>
                                                    <label>5.0 Support</label>
                                                </div>
                                            </div>
                                            <!-- End of Review Ratings Left -->
                                            <div class="review-ratings-right">
                                                <div class="average-rating">5.0<sub>/5</sub></div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full mr-0">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End of Review Ratings Right -->
                                        </div>
                                        <!-- End of Review Ratings -->
                                        <div class="user-wrap">
                                            <div class="user-photo">
                                                <figure>
                                                    <img src="{{asset('')}}frontend/assets/images/vendor/wcfm/avatar.png" alt="Avatar" width="113" height="112" />
                                                </figure>
                                                <div class="rated text-center">
                                                    <label>Rated</label>
                                                    <span class="score">5.0</span>
                                                </div>
                                            </div>
                                            <!-- End of User Photo -->
                                            <div class="user-info">
                                                <h4 class="user-name">John Doe</h4>
                                                <div class="user-date mb-7">
                                                    <span>1 Reviews</span>
                                                    <span>April 1, 2021 12:12 Pm</span>
                                                </div>
                                                <p>Diam in arcu cursus euismod quis. Eget sit amet tellusvitae sapien pellentesque habitant morbi tristique senectus et. Cras adipiscing enim ermentum et sollicitudin ac orci phasellus.</p>
                                            </div>
                                            <!-- End of User Info -->
                                            <div class="review-ratings">
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                    </div>
                                                    <label>5.0 Feature</label>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                    </div>
                                                    <label>5.0 Varity</label>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                    </div>
                                                    <label>5.0 Flexibility</label>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                    </div>
                                                    <label>5.0 Delivery</label>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                    </div>
                                                    <label>5.0 Support</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of User Wrap -->
                                    </div>
                                    <!-- End of Reveiw Area -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Main Content -->
                </div>
            </div>
        </div>








    </main>















@endsection
