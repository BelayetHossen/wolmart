

<style>
    .widget-custom {
        background-color: #007ACC!important;
        padding-left: 4px!important;
        color: #fff!important;
    }

    .widget-collapsible .widget-custom label::after {
        position: absolute;
        content: "";
        left: 0;
        bottom: -1.2rem;
        width: 100%;
        height: 2px;
        background-color: #007ACC;
    }
    .widget-collapsible .toggle-btn{

    }
    .widget-collapsible .toggle-btn::before, .widget-collapsible .toggle-btn::after {
        content: "";
        position: absolute;
        border-top: 2px solid #ffffff!important;
        padding-right: 4px!important;
    }
    .widget-collapsible ul li a{
        padding: 5px 10px!important;
        background-color: rgb(185, 185, 185)!important;
    }
    .widget-collapsible ul li a:hover{
        padding: 5px 10px!important;
        background-color: rgb(145, 145, 145)!important;
        color: #fff!important;
    }
</style>



<aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
    <!-- Start of Sidebar Overlay -->
    <div class="sidebar-overlay"></div>
    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

    <!-- Start of Sidebar Content -->
    <div class="sidebar-content scrollable">
        <!-- Start of Sticky Sidebar -->
        <div class="pin-wrapper" style="height: 1813.3px;">
            <div class="sticky-sidebar" style="border-bottom: 0px none rgb(102, 102, 102); width: 280px;">
                <div class="filter-actions">
                    <label>Filter :</label>
                    <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                </div>
                <!-- Start of Collapsible widget -->
                <div class="widget widget-collapsible">
                    <h3 class="widget-title widget-custom"><label>All Categories</label><span class="toggle-btn"></span></h3>
                    <ul class="widget-body filter-items search-ul">
                        @foreach ($cats1 as $cat1)
                        {{-- <li><a href="{{ url('/category/'.$cat1->slug) }}">{{ $cat1->name }}</a></li> --}}
                        <li><a href="#" class="category_search_btn" cat1_slug="{{ $cat1->slug }}"><img src="{{ $imgPath.'/categories/'.$cat1->photo }}" alt="" style="width: 35px;">{{ ' '.$cat1->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- End of Collapsible Widget -->

                <!-- Start of Collapsible Widget -->
                <div class="widget widget-collapsible">
                    <h3 class="widget-title widget-custom"><label>Brands</label><span class="toggle-btn"></span></h3>
                    <ul class="widget-body filter-items search-ul">
                        @foreach ($brands as $brand)
                        <li><a href="#" class="brand_search_btn" brand_slug="{{ $brand->slug }}"><img src="{{ $imgPath.'/brands/'.$brand->logo }}" alt="" style="width: 35px;">{{ ' '.$brand->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- End of Collapsible Widget -->

                <!-- Start of Collapsible Widget -->
                <div class="widget widget-collapsible">
                    <h3 class="widget-title widget-custom"><label>Price</label><span class="toggle-btn"></span></h3>
                    <div class="widget-body">
                        <ul class="filter-items search-ul">
                            <li><a href="#">$0.00 - $100.00</a></li>
                            <li><a href="#">$100.00 - $200.00</a></li>
                            <li><a href="#">$200.00 - $300.00</a></li>
                            <li><a href="#">$300.00 - $500.00</a></li>
                            <li><a href="#">$500.00+</a></li>
                        </ul>
                        <form class="price-range">
                            <input type="number" name="min_price" class="min_price text-center" placeholder="$min" /><span class="delimiter">-</span>
                            <input type="number" name="max_price" class="max_price text-center" placeholder="$max" /><a href="#" class="btn btn-primary btn-rounded">Go</a>
                        </form>
                    </div>
                </div>
                <!-- End of Collapsible Widget -->

                <!-- Start of Collapsible Widget -->
                <div class="widget widget-collapsible">
                    <h3 class="widget-title widget-custom"><label>Size</label><span class="toggle-btn"></span></h3>
                    <ul class="widget-body filter-items item-check mt-1">
                        <li><a href="#">Extra Large</a></li>
                        <li><a href="#">Large</a></li>
                        <li><a href="#">Medium</a></li>
                        <li><a href="#">Small</a></li>
                    </ul>
                </div>
                <!-- End of Collapsible Widget -->


                <!-- Start of Collapsible Widget -->
                <div class="widget widget-collapsible">
                    <h3 class="widget-title widget-custom"><label>Color</label><span class="toggle-btn"></span></h3>
                    <ul class="widget-body filter-items item-check mt-1">
                        <li><a href="#">Black</a></li>
                        <li><a href="#">Blue</a></li>
                        <li><a href="#">Brown</a></li>
                        <li><a href="#">Green</a></li>
                        <li><a href="#">Grey</a></li>
                        <li><a href="#">Orange</a></li>
                        <li><a href="#">Yellow</a></li>
                    </ul>
                </div>
                <!-- End of Collapsible Widget -->

                <!-- Start of Collapsible Widget -->
                <div class="card">
                    <div class="card-body">
                        <div class="widget widget-tags">
                            <h3 class="widget-title"><label>Tags</label><span class="toggle-btn"></span></h3>
                            <div class="widget-body tags">
                                @foreach ($tags as $tag)
                                <a class="tag_search_btn tag" tag_slug="{{ $tag->slug }}" tag_id="{{ $tag->id }}" href="#" style="">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Collapsible Widget -->
            </div>
        </div>
        <!-- End of Sidebar Content -->
    </div>
    <!-- End of Sidebar Content -->
</aside>
