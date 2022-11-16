@extends('frontend.layouts.app')

@section('main-content')
<main class="main">


    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no py-4">
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li>dashboard</li>
        </ul>
    </nav>
    <!-- End of Breadcrumb -->



    <style>
        .nav li a {
            text-align: left;
            padding-left: 10px !important;
            border: 1px solid #ccc !important;
            /* line-height: 2 !important; */
        }
    </style>

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row gutter-lg">
                <ul class="nav nav-tabs mb-6" role="tablist">
                    <li class="">
                        <a href="#account-dashboard" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-orders" class="nav-link">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-downloads" class="nav-link">Downloads</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-details" class="nav-link">Account details</a>
                    </li>
                    <li class="link-item">
                        <a href="wishlist.html" class="nav-link">Wishlist</a>
                    </li>
                    <li>
                        <a href="{{ route('customer.logout') }}" class="btn btn-warning btn-block">Logout</a>
                    </li>
                </ul>

                <div class="tab-content mb-6">
                    <div class="tab-pane active" id="account-dashboard">
                        <p class="greeting">
                            Hello
                            <span class="text-dark font-weight-bold">{{ $customer->f_name.' '.$customer->l_name
                                }}</span>
                            (not
                            <span class="text-dark font-weight-bold">{{ $customer->f_name.' '.$customer->l_name
                                }}</span>?
                            <a href="{{ route('customer.logout') }}" class="text-primary">Log out</a>)
                        </p>

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
                                <a href="{{ route('customer.logout') }}">
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

                    <div class="tab-pane mb-4" id="account-orders">
                        <div class="icon-box icon-box-side icon-box-light py-2">
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
                                @foreach ($orders as $item)
                                <tr>
                                    <td class="order-id">{{ $item->order_number }}</td>
                                    <td class="order-date">{{ $item->created_at->format('d-M-Y') }}</td>
                                    <td class="order-status">{{ $item->status }}</td>
                                    <td class="order-total">
                                        <span class="order-price">৳ {{ $item->total_price }}</span> for
                                        <span class="order-quantity"> {{ $item->total_qty }}</span> item
                                    </td>
                                    <td class="order-action">
                                        <a href="{{ url('/customer/order/'.$item->id) }}" type="button"
                                            class="btn btn-sm">
                                            View
                                        </a>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>

                        <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                            Shop<i class="w-icon-long-arrow-right"></i></a>
                    </div>








                    <div class="tab-pane" id="account-downloads">
                        <div class="icon-box icon-box-side icon-box-light bg-info py-2">
                            <span class="icon-box-icon icon-downloads mr-2">
                                <i class="w-icon-download"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title ls-normal">Downloads</h4>
                            </div>
                        </div>
                        <p class="mb-4">No downloads available yet.</p>
                        <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                            Shop<i class="w-icon-long-arrow-right"></i></a>
                    </div>



                    <div class="tab-pane" id="account-details">

                        <div class="msg"></div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center mt-2">Acount details</h4>
                            </div>
                            <div class="card-body">
                                <form id="customer_details_form" method="post" class="form account-details-form">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="first_name">First name *</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name"
                                                value="{{ $customer->f_name }}" />
                                            <input type="hidden" name="id" value="{{ $customer->id }}" />
                                            <p class="first_name_msg"></p>
                                        </div>
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="Last_name">Last name *</label>
                                            <input type="text" class="form-control" name="last_name" id="Last_name"
                                                value="{{ $customer->l_name }}" />
                                            <p class="last_name_msg"></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="phone">Mobile number *</label>
                                            <input class="form-control" id="phone" name="phone" type="text"
                                                value="{{ $customer->phone }}" />
                                            <p class="phone_msg"></p>
                                            <p class="phone_check"></p>
                                        </div>
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="email">Your email address *</label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                value="{{ $customer->email }}" />
                                            <p class="email_msg"></p>
                                            <p class="email_check"></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group row">
                                            <div class="form-group mb-2 col-md-6">
                                                <label for="country">Country *</label>
                                                <select class="crs-country form-control" name="country"
                                                    data-region-id="region"></select>
                                                <p class="country_msg"></p>
                                            </div>
                                            <div class="form-group mb-2 col-md-6">
                                                <label for="region">Region *</label>
                                                <select class="form-control" name="region" id="region"></select>
                                                <p class="region_msg"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="zilla">Zilla *</label>
                                            <input class="form-control" id="zilla" name="zilla" type="text"
                                                value="{{ $customer->zilla }}" />
                                            <p class="zilla_msg"></p>
                                        </div>
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="thana">Thana *</label>
                                            <input type="text" class="form-control" name="thana" id="thana"
                                                value="{{ $customer->thana }}" />
                                            <p class="thana_msg"></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="post">Post *</label>
                                            <input class="form-control" id="post" name="post" type="text"
                                                value="{{ $customer->post }}" />
                                            <p class="post_msg"></p>
                                        </div>
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="post_code">Post code *</label>
                                            <input type="text" class="form-control" name="post_code" id="post_code"
                                                value="{{ $customer->post_code }}" />
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-dark btn-rounded btn-block">Save
                                        changes</button>
                                </form>
                            </div>
                        </div>



                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="text-center mt-2">Change password</h4>
                            </div>
                            <div class="card-body">
                                <form id="customer_password_change_form" class="form account-details-form"
                                    method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="text-dark" for="cur-password">Current Password</label>
                                            <input type="password" class="form-control form-control-md"
                                                id="cur-password" name="cur_password">
                                            <input type="hidden" name="id" value="{{ $customer->id }}">
                                            <p class="cur_password_msg"></p>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark" for="new-password">New Password</label>
                                            <input type="password" class="form-control form-control-md"
                                                id="new-password" name="new_password">
                                            <p class="new_password_msg"></p>
                                        </div>
                                        <div class="form-group mb-10">
                                            <label class="text-dark" for="conf-password">Confirm New Password</label>
                                            <input type="password" class="form-control form-control-md"
                                                id="conf-password" name="conf_password">
                                            <p class="conf_password_msg"></p>
                                        </div>
                                        <button type="submit" class="btn btn-dark btn-rounded mb-4">Save
                                            Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>







                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
@endsection
