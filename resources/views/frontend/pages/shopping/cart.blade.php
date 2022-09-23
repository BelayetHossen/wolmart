@extends('frontend.layouts.app') @Section('main-content')

<main class="main cart">
    @php
        $cart_count = count($carts);
    @endphp

    <style>
        .red-color{
            border: 2px solid rgb(255, 1, 1);
        }
    </style>


    @if ($cart_count != 0)
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="active"><a href="cart.html">Shopping Cart</a></li>
                <li><a href="checkout.html">Checkout</a></li>
                <li><a href="order.html">Order Complete</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <div class="row gutter-lg mb-10">

                <div class="col-lg-8 pr-lg-4 mb-6">
                    <div class="card">
                        <div class="card-body p-2">
                            <table class="shop-table cart-table">
                                <thead class="p-2">
                                    <tr>
                                        <th class="product-name ml-2"><span>Product</span></th>
                                        <th></th>
                                        <th class="product-price"><span>Price</span></th>
                                        <th class="product-quantity"><span>Quantity</span></th>
                                        <th class="product-subtotal"><span>Subtotal</span></th>
                                    </tr>
                                </thead>
                                {{-- {{ $carts }} --}}
                                <input class="shi_price" name="shi_price" type="hidden" value="00">
                                <tbody class="cart_list">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="cart-action mb-6">
                        <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                        <a href="{{ route('cart.destroy') }}"><button type="submit" class="btn btn-rounded btn-default btn-clear" name="clear_cart" value="Clear Cart">Clear Cart</button></a>
                    </div>

                    <form id="coupon_form" class="coupon">
                        @csrf
                        <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
                        <input type="text" class="form-control border border-succes mb-4" placeholder="Enter coupon code here..." name="coupon">
                        <div class="coupon-msg"></div>
                        <button class="btn btn-dark btn-outline btn-rounded">Apply Coupon</button>
                    </form>
                </div>
                <div class="col-lg-4 sticky-sidebar-wrapper shadow pt-2">
                    <div class="pin-wrapper" style="height: 791.359px;">
                        <div class="sticky-sidebar" style="border-bottom: 0px none rgb(102, 102, 102); width: 393.312px;">
                            <div class="cart-summary mb-4">
                                <h3 class="cart-title text-uppercase">Cart Totals</h3>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Subtotal</label>
                                    <span class="cart_sub_total">৳{{ $cart_subtotal }}</span>
                                </div>

                                <hr class="divider" />

                                <form id="update_total_form" method="post">
                                    @csrf

                                    <ul class="shipping-methods mb-2">
                                        <li>
                                            <label class="shipping-title text-dark font-weight-bold">Shipping method</label>
                                        </li>
                                        <input type="hidden" name="shipping" value="">
                                        <span class="shipping-msg"></span>
                                        @foreach ($shippings as $shipping)
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="{{ $shipping->title }}" class="custom-control-input shipping_method" name="shipping_id" value="{{ $shipping->id }}">
                                                <label for="{{ $shipping->title }}" class="custom-control-label color-dark">{{ $shipping->title }} -<span>({{ $shipping->duration }}days)</span>
                                                </label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>

                                    <div class="shipping-calculator">
                                        <label class="shipping-title text-dark font-weight-bold mb-2">Shipping to <strong></strong></label>

                                        <div class="form-group mb-2">
                                            <select class="form-control" name="region" id="region" value="">
                                                <option class="form-control" value="">-Select your region-</option>
                                                <option class="form-control" value="Dhaka" selected>Dhaka</option>
                                                <option class="form-control" value="Rajshahi">Rajshahi</option>
                                                <option class="form-control" value="Rangpur">Rangpur</option>
                                                <option class="form-control" value="Mymenshing">Mymenshing</option>
                                                <option class="form-control" value="Barishal">Barishal</option>
                                                <option class="form-control" value="Sylhet">Sylhet</option>
                                                <option class="form-control" value="Chittagong">Chittagong</option>
                                                <option class="form-control" value="Khulna">Khulna</option>
                                            </select>
                                            <span class="region-msg"></span>
                                        </div>
                                        <button type="submit" class="btn btn-dark btn-outline btn-rounded">Add shipping</button>
                                    </div>
                                    <div class="alt-msg mt-2"></div>
                                </form>

                                <hr class="divider mb-6" />
                                <div class="order-total d-flex justify-content-between align-items-center shipping_fee text-danger">
                                </div>
                                <div class="order-total d-flex justify-content-between align-items-center text-success">
                                    <label>Total</label>
                                    <span class="ls-50 total_price">৳ {{ $cart_subtotal }}</span>
                                </div>

                                <a href="{{ route('checkout.index') }}" class="btn btn-block btn-dark btn-icon-right btn-rounded btn-checkout"> Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- End of PageContent -->

    @else
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
    @endif
</main>







@endsection
