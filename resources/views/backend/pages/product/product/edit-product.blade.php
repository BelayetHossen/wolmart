@extends('backend.layouts.app')


@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">New product</h3>
                            </div>

                        </div>
                    </div>
                    <hr>


                    <form action="{{ url('/product-update/'.$data->id.'') }}" id="product_edit_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <fieldset>


                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group mb-3">
                                        <label for="title">Product title</label>
                                        <input id="title" class="form-control" name="title" type="text" value="{{ $data->title }}">
                                        <input name="id" type="hidden" value="{{ $data->id }}">
                                    </div>
                                    <span class="title-msg"></span>
                                    <span class="title-check-msg"></span>

                                    <div class="form-group mb-3">
                                        <label for="product_add_desc">Product Description <small>(Make a long
                                                description)</small></label>
                                        <textarea name="long_desc" id="product_add_desc">{{ $data->long_desc }}</textarea>
                                    </div>
                                    <span class="long-desc-msg"></span>
                                    <script>
                                        CKEDITOR.replace('product_add_desc');
                                    </script>

                                    <div class="form-group mb-3">
                                        <label for="short_desc">Short Description <small>(Up to 200
                                                charecters)</small></label>
                                        <textarea name="short_desc" id="short_desc" maxlength="200" class="form-control">{{ $data->short_desc }}</textarea>
                                    </div>
                                    <span class="short-desc-msg"></span>



                                    {{-- <div class="form-group mb-3">
                                        <label for="images">Gallery image</label>
                                        <input name="photo[]" type="file" multiple>
                                    </div> --}}

                                    <div class="mb-3">
                                        <label for="image">Product Gallery</label>
                                        <div class="gallery-upload-wrap">
                                            <label class="select-image">
                                                <span class="upload-text">Select Product photos</span>
                                                <input name="newPhotos[]" type="file" class="image-file" multiple=""
                                                    style=" display: none;">
                                            </label>

                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <label for="">Show Gallery</label>

                                        @foreach ($images as $img)
                                        <div class="col-md-2 my-2 img-show">
                                            <img style="width: 100%" src="{{ $path.'/'.$img }}" alt="" class="show-image">

                                            <div class="top-right">
                                                <a href="#" product_id="{{ $data->id }}"  old_name="{{ $img }}" class="old_photo_remove">&times;</a>
                                            </div>
                                            
                                            <input type="hidden" name="oldPhotos[]" value="{{ $img }}">
                                        </div>
                                        @endforeach

                                        <div id="selected-images">
                                            
                                        </div>
                                        
                                        <div id="deletePhotos">
                                            
                                        </div>
                                        
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
                                                            
                                                            <input type="hidden" name="newPhotos[]" value="${value.name}">

                                                        </div>
                                                        `).insertAfter("#selected-images");
                                                       

                                                       
                                                    });
                                                    fileReader.readAsDataURL(f);
                                                    i++;
                                                });
                                            });
                                        });
                                    </script>






                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mb-3">
                                        <label for="tags">Tags</label>
                                        <select name="tags[]" class="form-control" id="tags" select2
                                            select2-hidden-accessible multiple="multiple" style="width: 100%">
                                            @foreach ($tags as $tag)

                                                @php
                                                    $tagselected = '';
                                                    if(json_decode($data->tags) == $tag->id){
                                                        $tagselected = 'selected';
                                                    } else {
                                                        $tagselected = '';
                                                    }
                                                @endphp 

                                                <option value="{{ $tag->id }}" class="select2-selection__choice" {{ $tagselected }}>{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <script>
                                        var values = $('#tags option[selected="true"]').map(function() {
                                            return $(this).val();
                                        }).get();

                                        // you have no need of .trigger("change") if you dont want to trigger an event
                                        $('#tags').select2({
                                            placeholder: "Please select"
                                        });
                                    </script>

                                    <div class="form-group mb-3">
                                        <label for="main_cat_id">Main category</label>
                                        <select name="main_cat_id" class="form-control main_cat_select">
                                            <option value="">-Select a main category-</option>
                                           
                                            @foreach ($cats_1 as $cat)
                                                @php
                                                    $selected = '';
                                                    if($data->cat_1 == $cat->id){
                                                        $selected = 'selected';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                @endphp 
                                                <option value="{{ $cat->id }}" {{ $selected }}>{{ $cat->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <span class="main-cat-msg"></span>


                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="second_cat_id">Second category</label>
                                            <select id="" name="second_cat_id"
                                                class="form-control second_cat_select">



                                            </select>
                                        </div>
                                        <span class="second-cat-msg"></span>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="third_cat_id">Third category</label>
                                            <select id="third_cat_id" name="third_cat_id"
                                                class="form-control third_cat_select">



                                            </select>
                                        </div>
                                        <span class="third-cat-msg"></span>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="product_brand">Brand</label>
                                        <select id="product_brand" name="product_brand" class="form-control">
                                            <option value="">-Product brand-</option>
                                            @foreach ($brands as $brand)
                                                @php
                                                    $selected = '';
                                                    if($data->brand == $brand->id){
                                                        $selected = 'selected';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                @endphp 
                                                <option value="{{ $brand->id }}" {{ $selected }}>{{ $brand->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <span class="brand-msg"></span>

                                    <div class="mb-3">
                                        <label for="price">Price</label>
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <span class="">৳</span>
                                            </div>
                                            <input type="number" class="form-control" name="price" value="{{ $data->price }}">
                                        </div>
                                    </div>
                                    <span class="price-msg"></span>


                                    <div class="mb-3">
                                        <label for="sell_price">Sell price</label>
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <span class="">৳</span>
                                            </div>
                                            <input type="number" class="form-control" name="sell_price" value="{{ $data->sell_price }}">
                                        </div>
                                    </div>
                                    <span class="sell-price-msg"></span>

                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <div class="">
                                                @php
                                                    $checked = '';
                                                    if($data->featured == true){
                                                        $checked = 'checked';
                                                    } else {
                                                        $checked = '';
                                                    }
                                                @endphp
                                                <input type="checkbox" name="featured" value=1 {{ $checked }}>
                                            </div>
                                        </div>
                                        <label for="featured" class="form-control"> Make featured</label>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <div class="">
                                                @php
                                                    $hot_checked = '';
                                                    if($data->hot != null){
                                                        $hot_checked = 'checked';
                                                    } else {
                                                        $hot_checked = '';
                                                    }
                                                @endphp
                                                <input class="hot_deals_checkbox" type="checkbox" name="hot_ck" value=true {{ $hot_checked }}>
                                            </div>
                                        </div>
                                        <label for="photo" class="form-control"> Hot Deals</label>

                                    </div>

                                    <div class="mb-3" id="hot_deals_date">

                                    </div>


                                </div>


                            </div>




                        </fieldset>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary add">Update product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
