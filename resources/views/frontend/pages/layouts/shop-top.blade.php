
<!-- Start of Shop Banner -->
<div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs" style="background-image: url(assets/images/shop/banner1.jpg); background-color: #ffc74e;">
    <div class="banner-content">
        <h4 class="banner-subtitle font-weight-bold">Accessories Collection</h4>
        <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">Smart Wrist Watches</h3>
        <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Discover Now<i class="w-icon-long-arrow-right"></i></a>
    </div>
</div>
<!-- End of Shop Banner -->


    {{-- Brands --}}
    {{-- <div class="container bg-dark">
        <div class="swiper-container swiper-theme brands-wrapper mb-9 appear-animate"
            data-swiper-options="{
                'spaceBetween': 0,
                'slidesPerView': 2,
                'breakpoints': {
                    '576': {
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
                }
            }">
            <div class="swiper-wrapper row gutter-no cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">

                <style>
                    .brand-wrapper img:hover{
                        transition: transform .5s;
                    }
                    .brand-wrapper img:hover{
                        transform: scale(1.1);
                    }
                </style>

                @foreach ($brands as $brand)
                <div class="swiper-slide col-md-1">
                    <figure class="brand-wrapper">
                        <a href="#" class="brand_search_btn" brand_slug="{{ $brand->slug }}">
                            <img src="{{url('storage/brands').'/'.$brand->logo}}" alt="Brand" width="100" height="70" />
                        </a>
                    </figure>
                </div>
                @endforeach

            </div>
        </div>
    </div> --}}
        <!-- End of Brands Wrapper -->



<!-- Start of Shop Category -->
{{-- <div class="shop-default-category category-ellipse-section mb-6">
    <div class="swiper-container swiper-theme shadow-swiper swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events"
        data-swiper-options="{
                'spaceBetween': 20,
                'slidesPerView': 2,
                'breakpoints': {
                    '480': {
                        'slidesPerView': 3
                    },
                    '576': {
                        'slidesPerView': 4
                    },
                    '768': {
                        'slidesPerView': 6
                    },
                    '992': {
                        'slidesPerView': 7
                    },
                    '1200': {
                        'slidesPerView': 8,
                        'spaceBetween': 30
                    }
                }
            }">
        <div class="swiper-wrapper" id="swiper-wrapper-dddd996c546eae9e" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">

            @foreach ($cats1 as $cat1)
            <div class="swiper-slide category-wrap swiper-slide-active" role="group" aria-label="1 / 8" style="width: 128.75px; margin-right: 30px;">
                <div class="category category-ellipse">
                    <figure class="category-media">
                        <a href="#" class="category_search_btn" cat1_slug="{{ $cat1->slug }}">
                            <img src="{{ $imgPath.'/categories/'.$cat1->photo }}" alt="Categroy" width="190" height="190" style="background-color: #5c92c0;" />
                        </a>
                    </figure>
                    <div class="category-content">
                        <h4 class="category-name">
                            <a href="#" class="category_search_btn" cat1_slug="{{ $cat1->slug }}">{{ $cat1->name }}</a>
                        </h4>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets" style="display: none;">
            <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span>
        </div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    </div>
</div> --}}
<!-- End of Shop Category -->


