@extends('frontend.layouts.app')

@section('main-content')
<main class="main">


     <!-- Start of Breadcrumb -->
     <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no py-4">
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li><a href="{{ route('vendor.dashboard') }}">vendor-dashboard</a></li>
            <li>Account</li>
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
        .img-show{
            position: relative;
            text-align: center;

        }
        .img-show:hover{
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
        .show-hide{
            opacity: 1!important;
        }
    </style>

    @php
    use Illuminate\Support\Facades\Auth;
    $vendor = Auth::guard('vendor')->user();
    @endphp

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row custom">


                @include('frontend\pages\layouts\vendor-sidebar')

                <div class="tab-content mb-6">
                    <div class="alert_msg_store_set"></div>

                    <div class="card">
                        @if (session('msg'))
                            <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                                <strong>{{ session('msg') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="mt-2">Account Details</h4>
                            <a href="{{ route('vendor.dashboard') }}" class="btn btn-primary btn-sm text-white">Back</a>
                        </div>
                        <div class="card-body">
                            <h4 class="mt-2">Account option</h4>
                            <div class="">
                                <form action="{{ url('/vendor/account/details/update') }}" method="post">
                                    @csrf
                                    <input name="id" type="hidden" value="{{ $vendor->id }}">
                                    <div class="form-group mb-2">
                                        <label for="first_name">First name *</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $vendor->f_name }}"/>
                                        @error('first_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="Last_name">Last name *</label>
                                        <input type="text" class="form-control" name="last_name" id="Last_name" value="{{ $vendor->l_name }}"/>
                                        @error('last_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="username">Username *</label>
                                        <input type="text" class="form-control" name="username" id="username" value="{{ $vendor->username }}" disabled/>
                                        @error('username')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="phone">Mobile number *</label>
                                        <input class="form-control" id="phone" name="phone" type="text" value="{{ $vendor->phone }}"/>
                                        @error('phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="email">Your email address *</label>
                                        <input type="text" class="form-control" name="email" id="email" value="{{ $vendor->email }}"/>
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="form-group mb-2">
                                        <label for="country">Country *</label>
                                        <select class="crs-country form-control a_country" name="country" data-region-id="region"></select>
                                        @error('country')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <script>
                                            $(document).ready(function () {
                                                let option = $('.a_country option').val();
                                                console.log(option);
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="region">Region *</label>
                                        <select class="form-control" name="region" id="region"></select>
                                        @error('region')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="zilla">Zilla *</label>
                                            <input type="text" class="form-control" name="zilla" id="zilla" value="{{ $vendor->zilla }}"/>
                                            @error('zilla')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="thana">Thana *</label>
                                            <input type="text" class="form-control" name="thana" id="thana" value="{{ $vendor->thana }}"/>
                                            @error('thana')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="post">Post *</label>
                                            <input type="text" class="form-control" name="post" id="post" value="{{ $vendor->post }}"/>
                                            @error('post')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="post_code">Post code *</label>
                                            <input type="text" class="form-control" name="post_code" id="post_code" value="{{ $vendor->post_code }}"/>
                                            @error('post_code')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group mb-5">
                                        <label for="bank">bKash/Rocket/Nagad/Bank *</label>
                                        <input type="text" class="form-control" name="bank" id="bank" value="{{ $vendor->bank }}"/>
                                        @error('bank')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <button type="submit" class="btn btn-primary float-end">Update account details</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="mt-2">Change password</h4>
                            <div class="">
                                <form action="" method="post">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label for="password">Current password *</label>
                                        <input type="password" class="form-control" name="password" id="password" >
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="new_password">New password *</label>
                                        <input type="password" class="form-control" name="new_password" id="new_password" >
                                        @error('new_password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="confirm_new_password">Confirm new password *</label>
                                        <input type="password" class="form-control" name="confirm_new_password" id="confirm_new_password" >
                                        @error('confirm_new_password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary float-end">Change password</button>
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
