@extends('frontend.layouts.app')

@section('main-content')
<main class="main">


     <!-- Start of Breadcrumb -->
     <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no py-4">
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li><a href="{{ route('vendor.dashboard') }}">vendor-dashboard</a></li>
            <li>Shop settings</li>
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
                    <div class="card">
                        @if (session('msg'))
                            <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                                <strong>{{ session('msg') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="alert_msg_store_set"></div>
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="mt-2">Shop settings</h4>
                            <a href="{{ route('vendor.dashboard') }}" class="btn btn-primary btn-sm text-white">Back</a>
                        </div>
                        <div class="card-body">
                            {{-- Logo banner update --}}
                            <form action="{{ url('/vendor/logo-banner') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row ">
                                    <h4 class="bg-info py-2">Shop logo & banner</h4>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="image">Shop logo <span style="color:red;">(150x150)</span></label>
                                            <input name="id" type="hidden" value="{{ Auth::guard('vendor')->user()->id }}">
                                            <input name="old_logo" type="hidden" value="{{ $data->logo }}">
                                            <div class="gallery-upload-wrap">
                                                <label class="select-image">
                                                    <span class="upload-text">Upload</span>
                                                    <input name="logo" type="file" class="logo-file" style=" display: none;">
                                                </label>
                                            </div>
                                            @error('logo')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <img class="logo_preview float-right" src="{{ $logo }}" style="width:40%;">

                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                $(document).on('change', '.logo-file', function (e) {
                                                    let image = URL.createObjectURL(e.target.files[0]);
                                                    $('.logo_preview').attr('src', image);
                                                })
                                            });
                                        </script>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="image">Shop banner <span style="color:red;">(1240x460)</span></label>
                                            <div class="gallery-upload-wrap">
                                                <label class="select-image">
                                                    <span class="upload-text">Upload</span>
                                                    <input name="banner" type="file" class="banner-file" style=" display: none;">
                                                    <input name="old_banner" type="hidden" value="{{ $data->banner }}">
                                                </label>
                                            </div>
                                            @error('banner')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <img class="banner_preview float-right" src="{{ $banner }}" style="width:80%;">
                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                $(document).on('change', '.banner-file', function (e) {
                                                    let image = URL.createObjectURL(e.target.files[0]);
                                                    $('.banner_preview').attr('src', image);
                                                })
                                            });
                                        </script>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary my-4 float-end">Update logo & banner</button>
                            </form><hr>
                        </div>

                        <div class="card-body">
                            <form action="{{ url('/vendor/store/details/update') }}" method="post">
                                @csrf
                                <input name="id" type="hidden" value="{{ $vendor->id }}"/>
                                <div class="row my-3 mt-5">
                                    <h4 class="bg-info py-2">Shop details</h4>
                                    <div class="form-group mb-2">
                                        <label for="store_name">Store name *</label>
                                        <input class="form-control" id="store_name" name="store_name" type="text" value="{{ $vendor->store_name }}"/>
                                        @error('store_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="shop_url">Shop URL <span class="text-success">(the field is auto set by store name)</span></label>
                                        <input type="text" class="form-control" name="shop_url" id="shop_url" value="{{ $vendor->store_url }}" disabled/>
                                        @error('shop_url')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-5">
                                        <label for="shop_addr">Shop address *</label>
                                        <input type="text" class="form-control" name="shop_addr" id="shop_addr" value="{{ $vendor->shop_addr }}"/>
                                        @error('shop_addr')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-5">
                                        <label for="about">About store *</label>
                                        <textarea name="about" class="form-control" id="about_store_text" rows="5">{!! htmlspecialchars_decode($vendor->about) !!}</textarea>
                                        @error('about')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <script>
                                            CKEDITOR.replace('about_store_text');
                                        </script>
                                    </div>

                                    @php
                                        $store_time = json_decode($vendor->store_time);
                                    @endphp

                                    <div class="form-group mb-5">
                                        <label for="store_time">Store time *</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="basic-addon1">Saturday</span>
                                            <input name="sat_start_time" type="time" class="form-control" value="{{ $store_time->sat->start }}">
                                            @error('sat_start_time')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <span class="input-group-text">to</span>
                                            <input name="sat_end_time" type="time" class="form-control" value="{{ $store_time->sat->end }}">
                                            @error('sat_end_time')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="basic-addon1">Sunday</span>
                                            <input name="sun_start_time" type="time" class="form-control" value="{{ $store_time->sun->start }}">
                                            @error('sun_start_time')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <span class="input-group-text">to</span>
                                            <input name="sun_end_time" type="time" class="form-control" value="{{ $store_time->sun->end }}">
                                            @error('sun_end_time')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="basic-addon1">Monday</span>
                                            <input name="mon_start_time" type="time" class="form-control" value="{{ $store_time->mon->start }}">
                                            @error('mon_start_time')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <span class="input-group-text">to</span>
                                            <input name="mon_end_time" type="time" class="form-control" value="{{ $store_time->mon->end }}">
                                            @error('mon_end_time')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="basic-addon1">Tuesday</span>
                                            <input name="tue_start_time" type="time" class="form-control" value="{{ $store_time->tue->start }}">
                                            @error('tue_start_time')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <span class="input-group-text">to</span>
                                            <input name="tue_end_time" type="time" class="form-control" value="{{ $store_time->tue->end }}">
                                            @error('tue_end_time')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="basic-addon1">Wednesday</span>
                                            <input name="wed_start_time" type="time" class="form-control" value="{{ $store_time->wed->start }}">
                                            @error('wed_start_time')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <span class="input-group-text">to</span>
                                            <input name="wed_end_time" type="time" class="form-control" value="{{ $store_time->wed->end }}">
                                            @error('wed_end_time')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="basic-addon1">Thursday</span>
                                            <input name="thu_start_time" type="time" class="form-control" value="{{ $store_time->thu->start }}">
                                            @error('thu_start_time')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <span class="input-group-text">to</span>
                                            <input name="thu_end_time" type="time" class="form-control" value="{{ $store_time->thu->end }}">
                                            @error('thu_end_time')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="basic-addon1">Friday</span>
                                            <input name="fri_start_time" type="time" class="form-control" value="{{ $store_time->fri->start }}">
                                            @error('fri_start_time')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <span class="input-group-text">to</span>
                                            <input name="fri_end_time" type="time" class="form-control" value="{{ $store_time->fri->end }}">
                                            @error('fri_end_time')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group mb-5">
                                        <label for="shipping_rules">Shipping rules *</label>
                                        <textarea name="shipping_rules" class="form-control" id="ven_shipp_rule" rows="5">{!! htmlspecialchars_decode($vendor->shipping_rules) !!}</textarea>
                                        @error('shipping_rules')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <script>
                                            CKEDITOR.replace('ven_shipp_rule');
                                        </script>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="policy">Policy *</label>
                                        <textarea name="policy" class="form-control" id="policy_text" rows="5">{!! htmlspecialchars_decode($vendor->policy) !!}</textarea>
                                        @error('shipping_rules')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <script>
                                            CKEDITOR.replace('policy_text');
                                        </script>
                                    </div>


                                </div>
                                <button type="submit" class="btn btn-primary float-end">Update shop details</button>
                            </form>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
@endsection
