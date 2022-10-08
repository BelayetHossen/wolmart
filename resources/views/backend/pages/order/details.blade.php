@extends('backend.layouts.app')


@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="white_card_header">
                        <div class="box_header m-0">

                            <div class="main-title float-right mb-4">
                                <a class="btn btn-primary" href="">
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card header">
                                    <h4 class="p-2">Order Details</h4>
                                </div>
                                <div class="card-body">
                                    <table class="address-table">
                                        <tbody>
                                            <tr>
                                                <td>Order ID</td>
                                                <td>: {{ $order->order_number }}</td>
                                            </tr>

                                            @foreach ($carts as $cart)
                                            <tr>
                                                <td>{{ $cart->name }}</td>
                                                <td>: ৳ {{ $cart->price }}</td>
                                            </tr>
                                            @endforeach

                                            <tr>
                                                <td>Total Product</td>
                                                <td>: {{ $order->total_qty }}</td>
                                            </tr>
                                            <tr>
                                                <td>Payment Method</td>
                                                <td>: {{ $order->paymentMethod->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping Method</td>
                                                <td>: {{ $order->shippingMethod->title }}</td>
                                            </tr>
                                            <tr>
                                                <td>Packaging</td>
                                                <td>: {{ $order->packaging }}</td>
                                            </tr>
                                            <tr>
                                                <td>Total Price</td>
                                                <td>: ৳ {{ $order->total_price }}</td>
                                            </tr>
                                            <tr>
                                                <td>Payment status</td>
                                                <td>: {{ $order->total_qty }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card header">
                                    <h4 class="p-2">Billing Address</h4>
                                </div>
                                <div class="card-body">
                                    <table class="address-table">
                                        <tbody>
                                            <tr>
                                                <td>Name</td>
                                                <td>: {{ $order->customer_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>: {{ $order->customer_email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>: {{ $order->customer_phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Country</td>
                                                <td>: {{ $order->customer_country }}</td>
                                            </tr>
                                            <tr>
                                                <td>Region</td>
                                                <td>: {{ $order->customer_region }}</td>
                                            </tr>
                                            <tr>
                                                <td>Zilla</td>
                                                <td>: {{ $order->customer_zilla }}</td>
                                            </tr>
                                            <tr>
                                                <td>Thana</td>
                                                <td>: {{ $order->customer_thana }}</td>
                                            </tr>
                                            <tr>
                                                <td>Post</td>
                                                <td>: {{ $order->customer_post }}</td>
                                            </tr>
                                            <tr>
                                                <td>Post code</td>
                                                <td>: {{ $order->customer_post_code }}</td>
                                            </tr>
                                            <tr>
                                                <td>Pickup location</td>
                                                <td>: {{ $order->pickup_location }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card header">
                                    <h4 class="p-2">Shipping Address</h4>
                                </div>
                                <div class="card-body">
                                    <table class="address-table">
                                        @if ($order->shipping_name == '' || $order->shipping_name == ' ' || $order->shipping_name == null)
                                        <tbody>
                                            <tr>
                                                <td>Name</td>
                                                <td>: {{ $order->customer_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>: {{ $order->customer_email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>: {{ $order->customer_phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Country</td>
                                                <td>: {{ $order->customer_country }}</td>
                                            </tr>
                                            <tr>
                                                <td>Region</td>
                                                <td>: {{ $order->customer_region }}</td>
                                            </tr>
                                            <tr>
                                                <td>Zilla</td>
                                                <td>: {{ $order->customer_zilla }}</td>
                                            </tr>
                                            <tr>
                                                <td>Thana</td>
                                                <td>: {{ $order->customer_thana }}</td>
                                            </tr>
                                            <tr>
                                                <td>Post</td>
                                                <td>: {{ $order->customer_post }}</td>
                                            </tr>
                                            <tr>
                                                <td>Post code</td>
                                                <td>: {{ $order->customer_post_code }}</td>
                                            </tr>
                                            <tr>
                                                <td>Pickup location</td>
                                                <td>: {{ $order->pickup_location }}</td>
                                            </tr>
                                        </tbody>
                                        @else
                                        <tbody>
                                            <tr>
                                                <td>Name</td>
                                                <td>: {{ $order->shipping_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>: {{ $order->shipping_email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>: {{ $order->shipping_phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Country</td>
                                                <td>: {{ $order->shipping_country }}</td>
                                            </tr>
                                            <tr>
                                                <td>Region</td>
                                                <td>: {{ $order->shipping_region }}</td>
                                            </tr>
                                            <tr>
                                                <td>Zilla</td>
                                                <td>: {{ $order->shipping_zilla }}</td>
                                            </tr>
                                            <tr>
                                                <td>Thana</td>
                                                <td>: {{ $order->shipping_thana }}</td>
                                            </tr>
                                            <tr>
                                                <td>Post</td>
                                                <td>: {{ $order->shipping_post }}</td>
                                            </tr>
                                            <tr>
                                                <td>Post code</td>
                                                <td>: {{ $order->shipping_post_code }}</td>
                                            </tr>
                                            <tr>
                                                <td>Pickup location</td>
                                                <td>: {{ $order->pickup_location }}</td>
                                            </tr>
                                        </tbody>
                                        @endif



                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>




@endsection
