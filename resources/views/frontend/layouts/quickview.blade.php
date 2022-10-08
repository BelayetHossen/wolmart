<!-- Start of Quick View -->
<div class="product product-single product-popup">
    <div class="row gutter-lg">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="product-gallery product-gallery-sticky">
                <div class="swiper-container product-single-swiper swiper-theme nav-inner">
                    <div class="swiper-wrapper row cols-1 gutter-no" id="img_slider_cont">

                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6 overflow-hidden p-relative">
            <div class="product-details scrollable pl-0">
                <h2 class="product-title q_pro_title"></h2>
                <div class="product-bm-wrapper">
                    <figure class="brand">
                        <img class="q_pro_brand_img" src="" alt="Brand" width="102" height="48" />
                    </figure>
                    <div class="product-meta">
                        <div class="product-categories">
                            Category:
                            <span class="product-category q_pro_category"><a href="#"></a></span>
                        </div>
                        <div class="product-sku">
                            SKU: <span class="q_pro_sku"></span>
                        </div>
                    </div>
                </div>

                <hr class="product-divider">

                <div class="product-price q_pro_price"></div>

                <div class="ratings-container">

                    <div class="ratings-full">
                        <span class="ratings rate_style"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a class="rating-reviews"></a>
                </div>

                <div class="product-short-desc">
                    <ul class="list-type-check list-style-none q_pro_s_desc">

                    </ul>
                </div>

                <hr class="product-divider">

                {{-- <div class="product-form product-variation-form product-color-swatch">
                    <label>Color:</label>
                    <div class="d-flex align-items-center product-variations">
                        <a href="#" class="color" style="background-color: #ffcc01"></a>
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

                <div class="product-form">
                    <form id="add_to_cart" method="post">
                        @csrf
                        <div class="d-flex justify-content-between">

                            <input name="product_id" type="hidden" value="">
                            <div class="product-qty-form mt-2">
                                <div class="d-flex justify-content-between">
                                    <a class="quantity-minus w-icon-minus"></a>
                                    <input name="product_qty" class="quantity form-control" type="number" min="1"
                                        max="100" value="1">
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
                        <a href="#" class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Quick view -->
