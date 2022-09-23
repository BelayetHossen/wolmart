@extends('frontend.layouts.app')

@section('main-content')
<main class="main">


     <!-- Start of Breadcrumb -->
     <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no py-4">
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li>vendor dashboard</li>
        </ul>
    </nav>
    <!-- End of Breadcrumb -->



    <style>
        .custom ul li{
            border: 1px solid #eee;
        }
        .custom ul li:hover{
            background: rgb(189, 190, 202);
            color: rgb(255, 255, 255);
        }
        .nav-tabs .nav-link{
            border: none;
        }
    </style>

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab-vertical row custom">



                @include('frontend\pages\layouts\vendor-sidebar')

                <div class="tab-content mb-6">
                    @if (session('msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Congratilations!</strong> {{ session('msg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="alert_msg_store_set"></div>
                    {{-- dashboard --}}
                    <div class="card">
                        <div class="card-body">
                            <p class="greeting">
                                Hello
                                <span class="text-dark font-weight-bold">{{ $vendor->f_name.' '.$vendor->l_name }}</span>
                                (not
                                <span class="text-dark font-weight-bold">{{ $vendor->f_name.' '.$vendor->l_name }}</span>? <a href="{{ url('/customer/logout') }}" class="text-primary">Log out</a>)
                            </p>
                            <hr>

                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-orders" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-orders">
                                                <i class="w-icon-orders"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Orders</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-downloads" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-download">
                                                <i class="w-icon-download"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Downloads</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-addresses" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-address">
                                                <i class="w-icon-map-marker"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Addresses</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-details" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-account">
                                                <i class="w-icon-user"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Account Details</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="wishlist.html" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-wishlist">
                                                <i class="w-icon-heart"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Wishlist</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="{{ route('vendor.logout') }}">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-logout">
                                                <i class="w-icon-logout"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Logout</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Products --}}
                    {{-- <div class="tab-pane mb-4" id="account-products">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" style="height:50px;">
                                <h4 class="mt-2">All products</h4>
                                <a href="{{ route('vendor.add.product') }}" class="btn btn-sm btn-primary text-white">Add new product</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="vendor_product_table"
                                        class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                                        <thead class="" style="background: #182444;">
                                            <tr>
                                                <th>SL</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Brand</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane mb-4" id="account-orders">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-orders">
                                <i class="w-icon-orders"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                            </div>
                        </div>

                        <table class="shop-table account-orders-table mb-6">
                            <thead>
                                <tr>
                                    <th class="order-id">Order</th>
                                    <th class="order-date">Date</th>
                                    <th class="order-status">Status</th>
                                    <th class="order-total">Total</th>
                                    <th class="order-actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="order-id">#2321</td>
                                    <td class="order-date">August 20, 2021</td>
                                    <td class="order-status">Processing</td>
                                    <td class="order-total"><span class="order-price">$121.00</span> for <span class="order-quantity"> 1</span> item</td>
                                    <td class="order-action">
                                        <a href="#" class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id">#2321</td>
                                    <td class="order-date">August 20, 2021</td>
                                    <td class="order-status">Processing</td>
                                    <td class="order-total"><span class="order-price">$150.00</span> for <span class="order-quantity"> 1</span> item</td>
                                    <td class="order-action">
                                        <a href="#" class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id">#2319</td>
                                    <td class="order-date">August 20, 2021</td>
                                    <td class="order-status">Processing</td>
                                    <td class="order-total"><span class="order-price">$201.00</span> for <span class="order-quantity"> 1</span> item</td>
                                    <td class="order-action">
                                        <a href="#" class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id">#2318</td>
                                    <td class="order-date">August 20, 2021</td>
                                    <td class="order-status">Processing</td>
                                    <td class="order-total"><span class="order-price">$321.00</span> for <span class="order-quantity"> 1</span> item</td>
                                    <td class="order-action">
                                        <a href="#" class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go Shop<i class="w-icon-long-arrow-right"></i></a>
                    </div>

                    <div class="tab-pane" id="account-downloads">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-downloads mr-2">
                                <i class="w-icon-download"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title ls-normal">Downloads</h4>
                            </div>
                        </div>
                        <p class="mb-4">No downloads available yet.</p>
                        <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go Shop<i class="w-icon-long-arrow-right"></i></a>
                    </div>

                    <div class="tab-pane" id="account-addresses">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-map-marker">
                                <i class="w-icon-map-marker"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
                            </div>
                        </div>
                        <p>The following addresses will be used on the checkout page by default.</p>
                        <div class="row">
                            <div class="col-sm-6 mb-6">
                                <div class="ecommerce-address billing-address pr-lg-8">
                                    <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                                    <address class="mb-4">
                                        <table class="address-table">
                                            <tbody>
                                                <tr>
                                                    <th>Name:</th>
                                                    <td>John Doe</td>
                                                </tr>
                                                <tr>
                                                    <th>Company:</th>
                                                    <td>Conia</td>
                                                </tr>
                                                <tr>
                                                    <th>Address:</th>
                                                    <td>Wall Street</td>
                                                </tr>
                                                <tr>
                                                    <th>City:</th>
                                                    <td>California</td>
                                                </tr>
                                                <tr>
                                                    <th>Country:</th>
                                                    <td>United States (US)</td>
                                                </tr>
                                                <tr>
                                                    <th>Postcode:</th>
                                                    <td>92020</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone:</th>
                                                    <td>1112223334</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </address>
                                    <a href="#" class="btn btn-link btn-underline btn-icon-right text-primary">Edit your billing address<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-6">
                                <div class="ecommerce-address shipping-address pr-lg-8">
                                    <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                                    <address class="mb-4">
                                        <table class="address-table">
                                            <tbody>
                                                <tr>
                                                    <th>Name:</th>
                                                    <td>John Doe</td>
                                                </tr>
                                                <tr>
                                                    <th>Company:</th>
                                                    <td>Conia</td>
                                                </tr>
                                                <tr>
                                                    <th>Address:</th>
                                                    <td>Wall Street</td>
                                                </tr>
                                                <tr>
                                                    <th>City:</th>
                                                    <td>California</td>
                                                </tr>
                                                <tr>
                                                    <th>Country:</th>
                                                    <td>United States (US)</td>
                                                </tr>
                                                <tr>
                                                    <th>Postcode:</th>
                                                    <td>92020</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </address>
                                    <a href="#" class="btn btn-link btn-underline btn-icon-right text-primary">Edit your shipping address<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>--}}


                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
@endsection
