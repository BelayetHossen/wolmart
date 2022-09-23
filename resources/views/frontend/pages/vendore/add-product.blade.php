@extends('frontend.layouts.app')

@section('main-content')
<main class="main">


     <!-- Start of Breadcrumb -->
     <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no py-4">
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li><a href="{{ route('vendor.dashboard') }}">vendor-dashboard</a></li>
            <li>Add product</li>
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

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row custom">


                @include('frontend\pages\layouts\vendor-sidebar')

                <div class="tab-content mb-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="mt-2">Upload a new product</h4>
                            <a href="{{ route('vendor.products.all') }}" class="btn btn-primary btn-sm text-white">All products</a>
                        </div>
                        <form action="{{ url('/vendor/product/create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Product title <span style="color:red;">*</span></label>
                                        <input name="title" type="text" class="form-control" id="title" value="{{ old('title') }}">
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="short_desc" class="form-label">Product short description <span style="color:red;">*</span></label>
                                        <textarea name="short_desc" class="form-control" id="short_desc" rows="3"> {{ old('short_desc') }}</textarea>
                                        @error('short_desc')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="long_desc" class="form-label">Product long description <span style="color:red;">*</span></label>
                                        <textarea name="long_desc" class="form-control" id="long_desc" rows="5">{{ old('long_desc') }}</textarea>
                                        @error('long_desc')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="image">Product photos <span style="color:red;">*</span></label>
                                        <div class="gallery-upload-wrap">
                                            <label class="select-image">
                                                <span class="upload-text">Select Product photos</span>
                                                <input name="photos[]" type="file" class="image-file" multiple=""
                                                    style=" display: none;">
                                            </label>
                                        </div>
                                        @error('photos')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="row" style="margin-top: 20px;">
                                        <span id="select-images"></span>
                                    </div>
                                    <script type="text/javascript">
                                        $(document).ready(function() {

                                            $(".image-file").on("change", function(e) {
                                                let file = e.target.files,
                                                    imagefiles = $(".image-file")[0].files;
                                                let i = 0;
                                                $.each(imagefiles, function(index, value) {
                                                    let f = file[i];
                                                    let fileReader = new FileReader();
                                                    fileReader.onload = (function(e) {
                                                        $(`
                                                        <div class="col-md-2 my-2 img-show">
                                                            <img style="width: 100%" src="${e
                                                            .target.result}" alt="" class="show-image">

                                                            <div class="top-right">
                                                                <a href="#" class="old_photo_remove">&times;</a>
                                                            </div>

                                                            <input type="file" name="images[]" value="${value.name}" style="display:none;">

                                                        </div>
                                                        `).insertAfter("#select-images");
                                                    });
                                                    fileReader.readAsDataURL(f);
                                                    i++;
                                                });
                                            });
                                        });
                                    </script>

                                    <div class="mb-3">
                                        <label for="video" class="form-label">Product video <small>(Youtube link)</small></label>
                                        <input name="video" type="text" class="form-control" id="video"value="{{ old('video') }}">
                                        @error('video')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="tags" class="form-label">Product tag <span style="color:red;">*</span></label>
                                        <div class="qtagselect isw360">
                                            <select name="tags[]" class="qtagselect__select" multiple>
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}" class="isblue">{{ $tag->name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <script>
                                            $('.qtagselect__select').tagselect();
                                        </script>
                                        @error('tags')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                        <div class="mb-3 mt-2">
                                            <label for="cat_1" class="form-label">Category <span style="color:red;">*</span></label>
                                            <select name="cat_1" class="form-control main_cat_select" value="{{ old('cat_1') }}">
                                                <option value="">-Select category-</option>
                                                @foreach ($cats_1 as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('cat_1')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="cat_2" class="form-label">Sub Category </label>
                                            <select id="" name="cat_2" class="form-control second_cat_select">
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="third_cat_id">Third category</label>
                                                <select id="third_cat_id" name="cat_3"
                                                    class="form-control third_cat_select">
                                                </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="brand" class="form-label">Brand <span style="color:red;">*</span></label>
                                            <select name="brand" class="form-control">
                                                <option value="">-Select brand-</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('brand')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="price">Price <span style="color:red;">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <span class="">৳</span>
                                                </div>
                                                <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                                            </div>
                                            @error('price')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="sell_price">Sell price </label>
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <span class="">৳</span>
                                                </div>
                                                <input type="number" class="form-control" name="sell_price" value="{{ old('sell_price') }}">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Add product">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
@endsection
