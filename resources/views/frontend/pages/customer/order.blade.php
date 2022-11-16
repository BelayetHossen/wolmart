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
            <div class="row py-2">
                <div class="col-md-8 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3>Order details</h3>
                                <a href="{{ route('customer.dashboard') }}" class="btn btn-dark text-white">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
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


                                                    <tr>
                                                        <td>Product</td>
                                                        @foreach ($carts as $cart)
                                                        <td>: {{ $cart->name }}</td>
                                                        @endforeach
                                                    </tr>

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
                                                @if ($order->shipping_name == '' || $order->shipping_name == ' ' ||
                                                $order->shipping_name == null)
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
@endsection
