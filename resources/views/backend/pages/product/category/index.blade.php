@extends('backend.layouts.app')


@section('main-content')






{{-- main category  --}}
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="white_card_header">
                    <div class="box_header m-0">
                       <div class="main-title">
                          <h3 class="m-0">Main categories</h3>
                       </div>
                       <div class="main-title float-right mb-4">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#main_category_add_modal">
                               Add category (main)
                           </button>
                           @php

                           @endphp
                       </div>
                    </div>
                 </div>


                 <div class="QA_table mb_30">
                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">

                        <table id="main_category_table" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline my-2">
                            <thead class="" style="background: #182444;">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
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


{{-- second category  --}}
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="white_card_header">
                    <div class="box_header m-0">
                       <div class="main-title">
                          <h3 class="m-0">Second categories</h3>
                       </div>
                       <div class="main-title float-right mb-4">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#second_productCategory_add_modal">
                               Add category (second)
                           </button>
                           @php

                           @endphp
                       </div>
                    </div>
                 </div>


                 <div class="QA_table mb_30">
                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">

                        <table id="second_productCategory_table" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline my-2">
                            <thead class="" style="background: #182444;">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Main category</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
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


{{-- third category  --}}
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="white_card_header">
                    <div class="box_header m-0">
                       <div class="main-title">
                          <h3 class="m-0">Third categories</h3>
                       </div>
                       <div class="main-title float-right mb-4">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#third_productCategory_add_modal">
                               Add category (third)
                           </button>
                           @php

                           @endphp
                       </div>
                    </div>
                 </div>


                 <div class="QA_table mb_30">
                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">

                        <table id="third_productCategory_table" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline my-2">
                            <thead class="" style="background: #182444;">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Second category</th>
                                    <th scope="col">Main category</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
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
























<!-- main category add Modal -->
<div class="modal fade" id="main_category_add_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form id="main_category_add_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add new category (main)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <br>
                    <fieldset>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="name">Category name</label>
                                <input id="name" class="form-control" name="name" type="text">
                            </div>
                            <span class="name-msg"></span>
                            <span class="name-check-msg"></span>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="photo">Photo <small>(png, svg, jpg, jpeg 250*250)</small></label>
                                <input id="photo" class="form-control" name="photo" type="file">
                            </div>
                            <span class="photo-msg"></span>
                            <img class="m-2 photo_preview" src="" alt="" style="width: 30%;">
                        </div>



                    </fieldset>
                    </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- second category add Modal -->
<div class="modal fade" id="second_productCategory_add_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="second_productCategory_add_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Add new category (second)</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <br>
                        <fieldset>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="main_cat_id">Main category</label>
                                    <select name="main_cat_id" class="form-control">
                                        <option value="">-Select a main category-</option>
                                        @foreach ($data as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <span class="main-cat-msg"></span>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="name">Category name</label>
                                    <input id="name" class="form-control" name="name" type="text">
                                </div>
                                <span class="name-msg"></span>
                                <span class="name-check-msg"></span>
                            </div>




                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="photo">Photo <small>(png, svg, jpg, jpeg 250*250)</small></label>
                                    <input id="photo" class="form-control" name="photo" type="file">
                                </div>
                                <span class="photo-msg"></span>
                                <img class="m-2 photo_preview" src="" alt="" style="width: 30%;">
                            </div>



                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add category</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>


<!-- third category add Modal -->
<div class="modal fade" id="third_productCategory_add_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="third_productCategory_add_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Add new category (third)</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <br>
                        <fieldset>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="main_cat_id">Main category</label>
                                    <select id="main_cat_select" name="main_cat_id" class="form-control">
                                        <option value="">-Select a main category-</option>
                                        @foreach ($data as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <span class="main-cat-msg"></span>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="second_cat_id">Second category</label>
                                    <select id="" name="second_cat_id" class="form-control select_second_category">



                                    </select>
                                </div>
                                <span class="second-cat-msg"></span>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="name">Category name (third)</label>
                                    <input id="name" class="form-control" name="name" type="text">
                                </div>
                                <span class="name-msg"></span>
                                <span class="name-check-msg"></span>
                            </div>




                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="photo">Photo <small>(png, svg, jpg, jpeg 250*250)</small></label>
                                    <input id="photo" class="form-control" name="photo" type="file">
                                </div>
                                <span class="photo-msg"></span>
                                <img class="m-2 photo_preview" src="" alt="" style="width: 30%;">
                            </div>



                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add category</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>



<!-- main category edit Modal -->
<div class="modal fade" id="main_category_edit_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="main_category_edit_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Edit category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <br>
                        <fieldset>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="name">Category name</label>
                                    <input id="name" class="form-control" name="name" type="text">
                                    <input  name="id" type="hidden">
                                </div>
                                <span class="name-msg"></span>
                                <span class="name-check-msg"></span>
                            </div>





                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="new_photo">Photo <small>(png, svg, jpg, jpeg 250*250)</small></label>
                                            <input id="new_photo" class="form-control" name="new_photo" type="file">
                                            <input name="old_photo" type="hidden">
                                        </div>
                                        <span class="photo-msg"></span>

                                    </div>
                                    <div class="col-sm-4 float-right mb-3">
                                        <img class="m-2" id="main_cat_edit_photo_preview" src="" alt="" style="width: 90%;">

                                    </div>

                                </div>

                            </div>



                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update category</button>
                        </div>
                    </form>
        </div>
    </div>
</div>


<!-- second category edit Modal -->
<div class="modal fade" id="second_category_edit_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="second_category_edit_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Edit category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <br>
                        <fieldset>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="main_cat_id">Main category</label>
                                    <div class="main_cat_select">

                                    </div>

                                </div>
                                <span class="main-cat-msg"></span>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="name">Category name</label>
                                    <input id="name" class="form-control" name="name" type="text">
                                    <input  name="id" type="hidden">
                                </div>
                                <span class="name-msg"></span>
                                <span class="name-check-msg"></span>
                            </div>




                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-3">
                                            <label for="new_photo">Photo <small>(png, svg, jpg, jpeg 250*250)</small></label>
                                            <input id="new_photo" class="form-control" name="new_photo" type="file">
                                            <input name="old_photo" type="hidden">
                                        </div>
                                        <span class="photo-msg"></span>
                                        <img class="m-2" id="second_cat_edit_photo_preview" src="" alt="" style="width: 30%;">

                                    </div>

                                </div>

                            </div>



                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update category</button>
                        </div>
                    </form>
        </div>
    </div>
</div>


<!-- third category edit Modal -->
<div class="modal fade" id="third_category_edit_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="second_category_edit_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Edit category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <br>
                        <fieldset>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="main_cat_id">Main category</label>
                                    <div class="main_cat_select">

                                    </div>

                                </div>
                                <span class="main-cat-msg"></span>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="second_cat_id">Second category</label>
                                    <div class="second_cat_select">

                                    </div>

                                </div>
                                <span class="second-cat-msg"></span>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="name">Category name</label>
                                    <input id="name" class="form-control" name="name" type="text">
                                    <input  name="id" type="hidden">
                                </div>
                                <span class="name-msg"></span>
                                <span class="name-check-msg"></span>
                            </div>




                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-3">
                                            <label for="new_photo">Photo <small>(png, svg, jpg, jpeg 250*250)</small></label>
                                            <input id="new_photo" class="form-control" name="new_photo" type="file">
                                            <input name="old_photo" type="hidden">
                                        </div>
                                        <span class="photo-msg"></span>
                                        <img class="m-2 photo_preview" id="" src="" alt="" style="width: 30%;">

                                    </div>

                                </div>

                            </div>



                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update category</button>
                        </div>
                    </form>
        </div>
    </div>
</div>











@endsection
