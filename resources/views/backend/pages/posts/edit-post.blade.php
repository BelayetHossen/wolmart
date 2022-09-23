@extends('backend.layouts.app')


@section('main-content')




    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Edit post</h3>
                            </div>

                        </div>
                    </div>
                    <hr>


                    <form action="{{ url('/post/update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <fieldset>


                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group mb-3">
                                        <label for="title">Post title <span style="color:red;">*</span></label>
                                        <input id="title" class="form-control" name="title" type="text" value="{{ $post->title }}">
                                        <input id="id" name="id" type="hidden" value="{{ $post->id }}">
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="post_add_desc">Post Description <span style="color:red;">*</span><small>(Make a long
                                                description)</small></label>
                                        <textarea name="long_desc" id="post_add_desc">{{ $post->long_desc }}</textarea>
                                        @error('long_desc')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <script>
                                        CKEDITOR.replace('post_add_desc');
                                    </script>


                                    <div class="mb-3">
                                        <label for="image">Photo <span style="color:red;">*</span></label>
                                        <div class="gallery-upload-wrap">
                                            <label class="select-image">
                                                <span class="upload-text">Select post photo</span>
                                                <input name="photo" type="file" class="image-file" style=" display: none;">
                                                <input name="old_photo" type="hidden" value="{{ $post->image }}">
                                            </label>
                                        </div>
                                        @error('photo')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="row" style="margin-top: 20px;">
                                        <img class="photo_preview" src="{{ url('storage/posts/').'/'.$post->image }}" alt="">
                                    </div>

                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $(document).on('change', '.image-file', function (e) {
                                                let image = URL.createObjectURL(e.target.files[0]);
                                                $('.photo_preview').attr('src', image);
                                            });
                                        });
                                    </script>

                                    <div class="form-group mb-3">
                                        <label for="video">Video <small style="">(youtube video link)</small></label>
                                        <input id="video" class="form-control" name="video" type="text" value="{{ $post->video }}">
                                    </div>

                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mb-3">
                                        <label for="tags">Tags <span style="color:red;">*</span></label>
                                        <select name="tags[]" class="form-control" id="tags" select2
                                            select2-hidden-accessible multiple="multiple" style="width: 100%">
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->name }}">{{ $tag->name }}</option>
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
                                        <label for="cat_1">Main category <span style="color:red;">*</span></label>
                                        <select name="cat_1" class="form-control main_cat_select">
                                            <option value="">-Select a main category-</option>
                                            @foreach ($cats_1 as $cat)
                                                @php
                                                    $selected = '';
                                                    if($post->cat_1 == $cat->id){
                                                        $selected = 'selected';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                @endphp
                                                <option value="{{ $cat->id }}" {{ $selected }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('cat_1')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="cat_2">Second category</label>
                                            <select id="" name="cat_2" class="form-control second_cat_select">
                                                <option value="">-Select a main category-</option>
                                                @foreach ($cats_2 as $cat)
                                                    @php
                                                        $selected = '';
                                                        if($post->cat_2 == $cat->id){
                                                            $selected = 'selected';
                                                        } else {
                                                            $selected = '';
                                                        }
                                                    @endphp
                                                    <option value="{{ $cat->id }}" {{ $selected }}>{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="cat_3">Third category</label>
                                            <select id="third_cat_id" name="cat_3" class="form-control third_cat_select">
                                                @foreach ($cats_3 as $cat)
                                                    @php
                                                        $selected = '';
                                                        if($post->cat_3 == $cat->id){
                                                            $selected = 'selected';
                                                        } else {
                                                            $selected = '';
                                                        }
                                                    @endphp
                                                    <option value="{{ $cat->id }}" {{ $selected }}>{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="brand">Brand <span style="color:red;">*</span></label>
                                        <select id="brand" name="brand" class="form-control">
                                            <option value="">-Product brand-</option>
                                            @foreach ($brands as $brand)
                                                @php
                                                    $selected = '';
                                                    if($post->brand == $brand->id){
                                                        $selected = 'selected';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                @endphp
                                                <option value="{{ $brand->id }}" {{ $selected }}>{{ $brand->name }}</option>
                                            @endforeach

                                        </select>
                                        @error('brand')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>


                                </div>


                            </div>




                        </fieldset>

                        <div class="modal-footer">
                            <a href="{{ route('admin.post.index') }}" class="btn btn-warning">Back</a>
                            <button type="submit" class="btn btn-primary">Update post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
