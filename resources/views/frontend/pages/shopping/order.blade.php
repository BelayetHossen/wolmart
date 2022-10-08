@extends('frontend.layouts.app') @Section('main-content')





<main class="main order">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="passed"><a href="cart.html">Shopping Cart</a></li>
                <li class="passed"><a href="checkout.html">Checkout</a></li>
                <li class="active"><a href="order.html">Order Complete</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content mb-10 pb-2">
        <div class="container">
            <div class="order-success text-center font-weight-bolder text-white bg-success">
                <i class="fas fa-check"></i>
                Thank you. Your order has been received and created an account successfully, you can <a href="#" class="d-lg-show login_btn btn btn-sm"><i class="w-icon-account"></i>Sign In</a> to visit dashboard
            </div>
            {{-- <!-- End of Order Success --> 01826028787 ripon --}}

            <ul class="order-view list-style-none">
                <li>
                    <label>Order number</label>
                    <strong>{{ $order->order_number }}</strong>
                </li>
                <li>
                    <label>Status</label>
                    <strong>{{ $order->status }}</strong>
                </li>
                <li>
                    <label>Date</label>
                    <strong>{{ $order->created_at }}</strong>
                </li>
                <li>
                    <label>Total</label>
                    <strong>৳ {{ $order->total_price }}</strong>
                </li>
                <li>
                    <label>Payment method</label>
                    <strong>{{ $order->paymentMethod->name }}</strong>
                </li>
            </ul>
            <!-- End of Order View -->

            <div class="order-details-wrapper mb-5">
                <h4 class="title text-uppercase ls-25 mb-5">Order Details</h4>
                <table class="order-table">
                    <thead>
                        <tr>
                            <th class="text-dark">Product</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach (json_decode($order->cart) as $cart)
                        <tr class="bb-no">
                            <td class="product-name">{{ $cart->name }} (৳ {{ $cart->price }}<i class="fas fa-times"></i> <span class="product-quantity">{{ $cart->qty }}</span>)</td>
                            <td class="product-total">৳ {{ $cart->qty * $cart->price }}</td>
                        </tr>
                        @endforeach

                        {{-- <tr>
                            <td>
                                <a href="#">Palm Print Jacket</a>&nbsp;<strong>x 1</strong><br />
                                Vendor : <a href="#">Vendor 1</a>
                            </td>
                            <td>$40.00</td>
                        </tr> --}}

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Subtotal:</th>
                            <td>৳ {{ $order->total_price - $order->shipping_fee }}</td>
                        </tr>
                        <tr>
                            <th>Shipping:</th>
                            <td class="text-danger">{{ $order->shippingMethod->title .' + ৳'. $order->shipping_fee}}</td>
                        </tr>
                        <tr>
                            <th>Payment method:</th>
                            <td>{{ $order->paymentMethod->name }}</td>
                        </tr>
                        <tr class="total">
                            <th class="border-no">Total:</th>
                            <td class="border-no">৳ {{ $order->total_price }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- End of Order Details -->

            <div class="sub-orders mb-10">
                <table class="order-subtable">
                    <thead>
                        <tr>
                            <th class="order">Order number</th>
                            <th class="date">Date</th>
                            <th class="status">Status</th>
                            <th class="total">Total</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $item)
                        <tr>
                            <td class="order">{{ $item->order_number }}</td>
                            <td class="date">{{ $item->created_at }}</td>
                            <td class="status">{{ $item->status }}</td>
                            <td class="total">৳ {{ $item->total_price }}</td>
                            <td class="action"><a href="order-view.html" class="btn btn-rounded">View</a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- End of Sub Orders-->

            <div id="account-addresses">
                <div class="row">
                    <div class="col-sm-6 mb-8">
                        <div class="ecommerce-address billing-address">
                            <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                            <address class="mb-4">
                                <table class="address-table">
                                    <tbody>
                                        <tr>
                                            <td>Name:</td>
                                            <td>{{ $order->customer_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>{{ $order->customer_email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone:</td>
                                            <td>{{ $order->customer_phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone:</td>
                                            <td>{{ $order->customer_phone }}</td>
                                        </tr>

                                        <tr class="email">
                                            <td>nicework125@gmail.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </address>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-8">
                        <div class="ecommerce-address shipping-address">
                            <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                            <address class="mb-4">
                                <table class="address-table">
                                    <tbody>
                                        <tr>
                                            <td>John Doe</td>
                                        </tr>
                                        <tr>
                                            <td>Conia</td>
                                        </tr>
                                        <tr>
                                            <td>Wall Street</td>
                                        </tr>
                                        <tr>
                                            <td>California</td>
                                        </tr>
                                        <tr>
                                            <td>United States (US)</td>
                                        </tr>
                                        <tr>
                                            <td>92020</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Account Address -->

            <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6"><i class="w-icon-long-arrow-left"></i>Back To List</a>
        </div>
    </div>
    <!-- End of PageContent -->
</main>











@endsection
