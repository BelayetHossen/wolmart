@php
$permission = json_decode(Auth::guard('siteuser')->user()->role->permission);
@endphp




<nav class="sidebar dark_sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="index-2.html"><img src="{{ asset('') }}backend/img/logo_white.png"
                alt=""></a>
        <a class="small_logo" href="index-2.html"><img src="{{ asset('') }}backend/img/mini_logo.png" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>



    <ul id="sidebar_menu">

        @if (in_array('Dashboard', $permission))
            <li class="">
                <a href="{{ route('admin.dashboard.view') }}">
                    <div class="nav_icon_small">
                        <img src="{{ asset('') }}backend/img/menu-icon/1.svg" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Dashboard </span>
                    </div>
                </a>
            </li>
        @endif

        @if (in_array('Post', $permission))
            <li class="">
                <a class="" href="{{ route('admin.post.index') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('') }}backend/img/menu-icon/forms.svg" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Post</span>
                    </div>
                </a>
            </li>
        @endif


        @if (in_array('User', $permission))
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('') }}backend/img/menu-icon/4.svg" alt="">

                    </div>
                    <div class="nav_title">
                        <span>User</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{ route('admin.role.view') }}">Role</a></li>
                    <li><a href="{{ route('admin.user.view') }}">User</a></li>
                </ul>
            </li>
        @endif


        @if (in_array('Product', $permission))
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('') }}backend/img/menu-icon/3.svg" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Product</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{ route('product.index') }}">All Products</a></li>
                    <li><a href="{{ route('add.product') }}">Add new Product</a></li>
                    <li><a href="{{ route('product-category.index') }}">Categories</a></li>
                    <li><a href="{{ route('brand.page.load') }}">Brand</a></li>
                    <li><a href="{{ route('tag.index') }}">Tag</a></li>
                    <li><a href="{{ route('product.review.index') }}">Review & Ratings</a></li>
                </ul>
            </li>
        @endif



        @if (in_array('Order', $permission))
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('') }}backend/img/menu-icon/2.svg" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Order</span>
                    </div>
                </a>
                <ul>
                    <li><a href="">Role</a></li>
                    <li><a href="">User</a></li>
                </ul>
            </li>
        @endif

        @if (in_array('Genarel settings', $permission))
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('') }}backend/img/menu-icon/General.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Genarel settings</span>
                </div>
            </a>
            <ul>
                <li><a href="{{ route('admin.coupon.index') }}">Coupons</a></li>
            </ul>
        </li>
        @endif
        @if (in_array('Shipping settings', $permission))
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('') }}backend/img/menu-icon/General.svg" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Shipping settings</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{ route('admin.shipping.index') }}">Shipping method</a></li>
                    <li><a href="{{ route('admin.currency.index') }}">Currency</a></li>
                    <li><a href="{{ route('admin.payment.index') }}">Payment</a></li>
                </ul>
            </li>
        @endif













    </ul>
</nav>
