@extends('frontend.layouts.app')

@section('main-content')
<main class="main">


    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no py-4">
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li><a href="{{ route('vendor.dashboard') }}">vendor-dashboard</a></li>
            <li>Edit product</li>
        </ul>
    </nav>
    <!-- End of Breadcrumb -->



    <style>
        .custom ul li {
            border: 1px solid #eee;
        }

        .custom ul li:hover {
            background: rgb(189, 190, 202);
            color: rgb(255, 255, 255);
        }

        .nav-tabs .nav-link {
            border: none;
        }
    </style>
    <style>
        .gallery-upload-wrap {
            margin-bottom: 20px;
            border: 3px dashed #373063;
            position: relative;
        }

        .gallery-upload-wrap:hover {

            border: 3px dashed #008d0c;
        }

        input[type="file"] {
            display: block;
        }

        .select-image {
            margin-top: 10px;
            color: rgb(0, 143, 12);
            background-color: #F0F0F0;
            display: block;
            position: relative;
            width: 100%;
            max-width: 500px;
            height: 40px;
            box-shadow: 0 2px 4px 0 hsl(0deg 0% 55% / 50%);
            text-align: center;
            padding-top: 9px;
            /* font-size: 18px; */
            cursor: pointer;

            border-color: #3AA0FF;
            border-radius: 1em;
            margin: 25px auto;
        }

        input[type="file"] {}

        .upload-text {
            color: #40A0FF;
            font-weight: 500;

            cursor: pointer;
        }

        .upload-image {
            padding: 15px;
            margin-top: 10px;
            font-size: 16px;
        }

        .cross-image {
            border: 1px solid #91c47b;
            padding: 5px;
            border-radius: 20px;
            color: rgb(233, 233, 233);
            background: rgb(194, 3, 3);
            width: 80px;
            text-align: center;
            font-size: 14px;
            cursor: pointer;
        }
    </style>
    <style>
        .img-show {
            position: relative;
            text-align: center;

        }

        .img-show:hover {
            opacity: 0.7;

        }

        .top-right {
            position: absolute;
            top: 0px;
            right: 15px;
        }

        .top-right a {
            font-size: 25px;
            color: #ec0000;
            background: rgb(255, 255, 255);
            border-radius: 20%;
            opacity: 0;
        }

        .show-hide {
            opacity: 1 !important;
        }
    </style>

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row custom">


                @include('frontend\pages\layouts\vendor-sidebar')

                <div class="tab-content mb-6">
                    @if (session('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratilations!</strong> {{ session('msg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="mt-2">All products</h4>
                            <a href="{{ route('vendor.add.product') }}" class="btn btn-primary btn-sm text-white">Add
                                new order</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="vendor_order_table"
                                    class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                                    <thead class="" style="background: #182444;">
                                        <tr>
                                            <th>SL</th>
                                            <th scope="col">Customer contact</th>
                                            <th scope="col">Order number</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
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
