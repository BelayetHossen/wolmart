@extends('frontend.layouts.app') @Section('main-content')

<main class="main checkout">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="passed"><a href="cart.html">Shopping Cart</a></li>
                <li class="active"><a href="checkout.html">Checkout</a></li>
                <li><a href="order.html">Order Complete</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    @if ($carts == [])
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card my-3">
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            No product in your cart!
                          </div>
                          <div class="cart-action mb-6">
                            <a href="{{ route('shop.index') }}" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="page-content">
        <div class="container">



            @if (Auth::guard('customer')->check() == false)
            <div>Returning customer? <a href="#" class="d-lg-show login_btn btn btn-sm"><i class="w-icon-account"></i>Sign In</a></div>

            @endif


            <div class="coupon-toggle mt-2">Have a coupon? <a href="#" class="show-coupon font-weight-bold text-uppercase text-dark">Enter your code</a></div>
            <div class="coupon-content mb-4" style="display: none;">
                <p>If you have a coupon code, please apply it below.</p>
                <div class="input-wrapper-inline">
                    <input type="text" name="coupon_code" class="form-control form-control-md mr-1 mb-2" placeholder="Coupon code" id="coupon_code" />
                    <button type="submit" class="btn button btn-rounded btn-coupon mb-2" name="apply_coupon" value="Apply coupon">Apply Coupon</button>
                </div>
            </div>



            <form action="{{ url('/order/create') }}" class="form checkout-form" method="post">
                @csrf
                <div class="row mb-9">
                    <div class="col-lg-7 pr-lg-4 mb-4">



                        <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                            Billing Details
                        </h3>
                        <div class="row gutter-sm">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>First name *</label>
                                    <input type="text" class="form-control form-control-md" name="firstname" value="{{ (Auth::guard('customer')->check()) ? Auth::guard('customer')->user()->f_name : old('firstname') }}" />
                                </div>
                                <input type="hidden" value="{{ (Auth::guard('customer')->check()) ? Auth::guard('customer')->user()->id : '' }} ">

                                @error('firstname')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Last name *</label>
                                    <input type="text" class="form-control form-control-md" name="lastname" value="{{ (Auth::guard('customer')->check()) ? Auth::guard('customer')->user()->l_name : old('lastname') }}" />
                                </div>
                                @error('lastname')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                            @if (Auth::guard('customer')->check() == false)
                                <div class="form-group mb-2">
                                    <label for="username">Username *</label>
                                    <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}"/>
                                    @error('username')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-5">
                                    <label for="password">Password *</label>
                                    <input type="text" class="form-control" name="password" id="password" value="{{ old('password') }}"/>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            @endif

                        <div class="form-group mb-2">
                            <label for="phone">Mobile number *</label>
                            <input class="form-control" id="phone" name="phone" type="text" value="{{ (Auth::guard('customer')->check()) ? Auth::guard('customer')->user()->phone : old('phone') }}"/>
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Your email address *</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ (Auth::guard('customer')->check()) ? Auth::guard('customer')->user()->email : old('email') }}"/>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="form-group mb-2">
                                <label for="country">Country *</label>
                                <select class="crs-country form-control" name="country" data-region-id="region"></select>
                                @error('country')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="region">Region *</label>
                                <select class="form-control" name="region" id="region"></select>
                                @error('region')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Zilla *</label>
                            <input type="text" class="form-control form-control-md" name="zilla" value="{{ (Auth::guard('customer')->check()) ? Auth::guard('customer')->user()->zilla : old('zilla') }}" />
                        </div>
                        @error('zilla')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="row gutter-sm">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Thana *</label>
                                    <input type="text" class="form-control form-control-md" name="thana" value="{{ old('thana') }}" />
                                </div>
                                @error('thana')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Post *</label>
                                    <input type="text" class="form-control form-control-md" name="post" value="{{ old('post') }}" />
                                </div>
                                @error('post')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row gutter-sm">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Village *</label>
                                    <input type="text" class="form-control form-control-md" name="village" value="{{ old('village') }}" />
                                </div>
                                @error('village')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Post code *</label>
                                    <input type="text" class="form-control form-control-md" name="post_code" value="{{ old('post_code') }}" />
                                </div>
                                @error('post_code')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Pickup location *</label>
                                <input type="text" class="form-control form-control-md" name="pickup_location" value="{{ old('pickup_location') }}" />
                            </div>
                            @error('pickup_location')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror


                        </div>

                        <style>
                            .hide{
                                display: none;
                            }
                            .show{
                                display: block;
                            }
                        </style>












                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input id="shipping_checkbox" class="shipping_checkbox" type="checkbox" name="shipping_checkbox" value=true>
                            </div>
                            <label for="shipping_checkbox" class="mt-2 px-2"> Ship to deffarent address</label>
                        </div>
                        <div class="deff_ship_content hide">
                            <div class="row gutter-sm">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>First name *</label>
                                        <input type="text" class="form-control form-control-md" name="firstname2" value="{{ old('firstname2') }}" />
                                    </div>
                                    @error('firstname2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Last name *</label>
                                        <input type="text" class="form-control form-control-md" name="lastname2" value="{{ old('lastname2') }}" />
                                    </div>
                                    @error('lastname2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="phone2">Mobile number *</label>
                                <input class="form-control" id="phone2" name="phone2" type="text" value="{{ old('phone2') }}"/>
                                @error('phone2')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="email2">Email address *</label>
                                <input type="text" class="form-control" name="email2" id="email2" value="{{ old('email2') }}"/>
                                @error('email2')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="form-group mb-2">
                                    <label for="country2">Country *</label>
                                    <select class="crs-country form-control" name="country2" data-region-id="region2"></select>
                                    @error('country2')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="region2">Region *</label>
                                    <select class="form-control" name="region2" id="region2"></select>
                                    @error('region2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Zilla *</label>
                                <input type="text" class="form-control form-control-md" name="zilla2" value="{{ old('zilla2') }}" />
                            </div>
                            @error('zilla2')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="row gutter-sm">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Thana *</label>
                                        <input type="text" class="form-control form-control-md" name="thana2" value="{{ old('thana2') }}" />
                                    </div>
                                    @error('thana2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Post *</label>
                                        <input type="text" class="form-control form-control-md" name="post2" value="{{ old('post2') }}" />
                                    </div>
                                    @error('post2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row gutter-sm">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Village *</label>
                                        <input type="text" class="form-control form-control-md" name="village2" value="{{ old('village2') }}" />
                                    </div>
                                    @error('village2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Post code *</label>
                                        <input type="text" class="form-control form-control-md" name="post_code2" value="{{ old('post_code2') }}" />
                                    </div>
                                    @error('post_code2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Pickup location *</label>
                                    <input type="text" class="form-control form-control-md" name="pickup_location2" value="{{ old('pickup_location2') }}" />
                                </div>
                                @error('pickup_location2')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="order-notes">Order notes (optional)</label>
                            <textarea name="order_note" class="form-control mb-0" id="order-notes" name="order-notes" cols="30" rows="4" placeholder="Notes about your order, e.g special notes for delivery"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                        <div class="pin-wrapper" style="height: 898.969px;">
                            <div class="order-summary-wrapper sticky-sidebar" style="border-bottom: 1px solid rgb(238, 238, 238); width: 505px;">
                                <h3 class="title text-uppercase ls-10">Your Order</h3>
                                <div class="order-summary">
                                    <table class="order-table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">
                                                    <b>Product</b>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $cart)
                                            <tr class="bb-no">
                                                <td class="product-name">{{ $cart->name }} (৳ {{ $cart->price }}<i class="fas fa-times"></i> <span class="product-quantity">{{ $cart->qty }}</span>)</td>
                                                <td class="product-total">৳ {{ $cart->qty * $cart->price }}</td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr class="shipping-methods">
                                                <th>
                                                    <b>Shipping by:</b>
                                                </th>
                                                <td>
                                                    <b>{{ Cookie::get('shipping_method') }}</b>
                                                </td>
                                            </tr>
                                            <tr class="shipping-methods">
                                                <th>
                                                    <b>Shipping to:</b>
                                                </th>
                                                <td>
                                                    <b>{{ Cookie::get('shipping_addr') }}</b>
                                                </td>
                                            </tr>
                                            <tr class="shipping-methods">
                                                <th>
                                                    <b>Shipping fee:</b>
                                                </th>
                                                <td>
                                                    <b>+৳ {{ Cookie::get('shipping_price') }}</b>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>
                                                    <b>Total</b>
                                                </th>
                                                <td>
                                                    @php
                                                        $sub_total = str_replace(',','',$subtotal);
                                                    @endphp
                                                    <b>৳ {{ $sub_total + Cookie::get('shipping_price') }}.00</b>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <input name="total_price" type="hidden" value="{{ $sub_total + Cookie::get('shipping_price') }}">
                                    <input name="shipping_fee" type="hidden" value="{{ Cookie::get('shipping_price') }}">


                                    <div class="payment-methods" id="payment_method">
                                        <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                        <div class="accordion payment-accordion">
                                            <style>
                                                .collapse:not(.show) {
                                                    display: block;
                                                }
                                            </style>
                                            @foreach ($payments as $item)

                                            <div class="card">
                                                <div class="card-header">

                                                    <a href="#cash-on-delivery" class="expand" ></a>

                                                    <div class="mb-3">
                                                        <input name="payment_method" type="radio" value="{{ $item->id }}" id="{{ $item->id }}"><label class="mx-2" for="{{ $item->id }}">{{ $item->name }}</label>
                                                    </div>

                                                    <div id="cash-on-delivery" class="card-body collapsed" style="display: none;">
                                                        <p class="mb-0">
                                                            {{ $item->title }}
                                                        </p>
                                                        <p class="mb-0 text-success">
                                                            {{ $item->sub_title }}
                                                        </p>
                                                        <p class="mb-0">
                                                            {{ $item->details }}
                                                        </p>
                                                    </div>

                                                </div>

                                            </div>
                                            @endforeach


                                        </div>
                                    </div>


                                    <div class="form-group place-order pt-6">
                                        <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>




        </div>
    </div>
    @endif




    <!-- End of PageContent -->
</main>










@endsection
