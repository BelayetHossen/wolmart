@extends('backend.layouts.app')


@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{ route('admin.order.index') }}">
                            Back
                        </a>
                    </div>
                    @if (session('msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('msg') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <h3 class="title text-uppercase ls-10">Order details</h3>
                                    <div class="order-summary">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <b>Product</b>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($carts as $cart)
                                                <tr>
                                                    <td class="product-name">{{ $cart->name }} (৳ {{ $cart->price }}<i class="fas fa-times"></i> <span class="product-quantity">{{ $cart->qty }}</span>)</td>
                                                    <td class="product-total">৳ {{ $cart->qty * $cart->price }} </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>
                                                        <b>Payment method:</b>
                                                    </th>
                                                    <td>
                                                        <b>{{ $order->paymentMethod->name }}</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <b>Shipping by:</b>
                                                    </th>
                                                    <td>
                                                        <b>
                                                            <select name="" id="">
                                                                @foreach ($shippings as $item)
                                                                <option value="">{{ $item->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <b>Shipping fee:</b>
                                                    </th>
                                                    <td>
                                                        <b>+৳ {{ $order->shipping_fee }}</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <b>Packaging:</b>
                                                    </th>
                                                    <td>
                                                        <b>{{ $order->packaging }} +৳</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <b>Total</b>
                                                    </th>
                                                    <td>

                                                        <b>৳ {{ $order->total_price }}.00</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <b>Payment status:</b>
                                                    </th>
                                                    <td>
                                                        <b>{{ $order->payment_status }}</b>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <input name="total_price" type="hidden" value="">
                                        <input name="shipping_fee" type="hidden" value="">

                                        <div class="form-group place-order pt-6">
                                            <button type="submit" class="btn btn-dark btn-block btn-rounded">Save change</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                                Billing Details
                                            </h3>
                                            <form action="{{ url('/admin/order/billing/update') }}" method="POST">
                                                @csrf
                                                <div class="form-group mb-2">
                                                    <label>Name *</label>
                                                    <input type="text" class="form-control form-control-md" name="name" value="{{ $order->customer_name }}" />
                                                    <input type="hidden" name="id" value="{{ $order->id }}" />
                                                </div>
                                                @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror

                                                <div class="form-group mb-2">
                                                    <label for="phone">Mobile number *</label>
                                                    <input class="form-control" id="phone" name="phone" type="text" value="{{ $order->customer_phone }}"/>
                                                    @error('phone')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="email">Your email address *</label>
                                                    <input type="text" class="form-control" name="email" id="email" value="{{ $order->customer_email }}"/>
                                                    @error('email')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Zilla *</label>
                                                    <input type="text" class="form-control form-control-md" name="zilla" value="{{ $order->customer_zilla }}" />
                                                </div>
                                                @error('zilla')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <div class="row gutter-sm">
                                                    <div class="col-xs-6">
                                                        <div class="form-group">
                                                            <label>Thana *</label>
                                                            <input type="text" class="form-control form-control-md" name="thana" value="{{ $order->customer_thana }}" />
                                                        </div>
                                                        @error('thana')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-group">
                                                            <label>Post *</label>
                                                            <input type="text" class="form-control form-control-md" name="post" value="{{ $order->customer_post }}" />
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
                                                            <input type="text" class="form-control form-control-md" name="village" value="{{ $order->customer_vill }}" />
                                                        </div>
                                                        @error('village')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-group">
                                                            <label>Post code *</label>
                                                            <input type="text" class="form-control form-control-md" name="post_code" value="{{ $order->customer_post_code }}" />
                                                        </div>
                                                        @error('post_code')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pickup location *</label>
                                                        <input type="text" class="form-control form-control-md" name="pickup_location" value="{{ $order->pickup_location }}" />
                                                    </div>
                                                    @error('pickup_location')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group place-order pt-6 mt-2">
                                                    <button type="submit" class="btn btn-dark btn-rounded">Save change</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                                Shipping Details
                                            </h3>
                                            <form action="{{ url('/admin/order/shipping/update') }}" method="POST">
                                                @csrf
                                                <div class="form-group mb-2">
                                                    <label>Name *</label>
                                                    <input type="text" class="form-control form-control-md" name="name2" value="{{ $order->shipping_name }}" />
                                                    <input type="hidden" name="id" value="{{ $order->id }}" />
                                                </div>
                                                @error('name2')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror

                                                <div class="form-group mb-2">
                                                    <label for="phone2">Mobile number *</label>
                                                    <input class="form-control" id="phone2" name="phone2" type="text" value="{{ $order->shipping_phone }}"/>
                                                    @error('phone2')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="email2">Email address *</label>
                                                    <input type="text" class="form-control" name="email2" id="email2" value="{{ $order->shipping_email }}"/>
                                                    @error('email2')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Zilla *</label>
                                                    <input type="text" class="form-control form-control-md" name="zilla2" value="{{ $order->shipping_zilla }}" />
                                                </div>
                                                @error('zilla2')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <div class="row gutter-sm">
                                                    <div class="col-xs-6">
                                                        <div class="form-group">
                                                            <label>Thana *</label>
                                                            <input type="text" class="form-control form-control-md" name="thana2" value="{{ $order->shipping_thana }}" />
                                                        </div>
                                                        @error('thana2')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-group">
                                                            <label>Post *</label>
                                                            <input type="text" class="form-control form-control-md" name="post2" value="{{ $order->shipping_post }}" />
                                                        </div>
                                                        @error('post2')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row gutter-sm">

                                                    <div class="col-xs-6">
                                                        <div class="form-group">
                                                            <label>Post code *</label>
                                                            <input type="text" class="form-control form-control-md" name="post_code2" value="{{ $order->shipping_post_code }}" />
                                                        </div>
                                                        @error('post_code2')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pickup location *</label>
                                                        <input type="text" class="form-control form-control-md" name="pickup_location2" value="{{ $order->pickup_location }}" />
                                                    </div>
                                                    @error('pickup_location2')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group place-order pt-6 mt-2">
                                                    <button type="submit" class="btn btn-dark btn-rounded">Save change</button>
                                                </div>
                                            </form>
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




@endsection
