@extends('backend.layouts.app')


@section('main-content')
<div class="row">
    <div class="col-sm-8 m-auto">
        <div class="card mt-3">
            @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('msg') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card-header">
                <a class="btn btn-primary" href="{{ route('admin.order.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">


                <form action="{{ url('/admin/order/create') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label>Customer email*</label>
                        <select name="customer_email" class="form-control" id="customer_email">
                            <!-- Dropdown List Option -->
                        </select>
                    </div>
                    @error('customer_email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="form-group mb-2">
                        <label>Product *</label>
                        <select name="product" class="form-control" id="add_product">
                            <!-- Dropdown List Option -->
                        </select>
                    </div>
                    @error('product')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="form-group mb-2">
                        <label>Shipping method *</label>
                        <select name="shipping_id" class="form-control">
                            @foreach ($shippings as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('shipping_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="form-group mb-2">
                        <label>Payment method *</label>
                        <select name="payment_method" class="form-control">
                            @foreach ($payments as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('payment_method')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group mb-2">
                        <label>Shipping region *</label>
                        <select name="region" class="form-control">
                            <option value="">-Select-</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Mymenshing">Mymenshing</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Barishal">Barishal</option>
                            <option value="Chittagong">Chittagong</option>
                        </select>
                    </div>
                    @error('region')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group mb-2">
                        <label>Pickup location *</label>
                        <input type="text" name="pickup_location" class="form-control">
                    </div>
                    @error('pickup_location')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary float-end">Place order</button>

                </form>










                <script type="text/javascript">
                    $.ajax({
                            url: "/admin/order/product/get",
                            success: function (data) {
                                $("#add_product").select2({
                                data: data
                                });
                            },
                        });

                </script>
                <script type="text/javascript">
                    $.ajax({
                            url: "/admin/order/customer/email",
                            success: function (data) {
                                $("#customer_email").select2({
                                data: data
                                });
                            },
                        });
                </script>







            </div>
        </div>
    </div>
</div>







@endsection
