

@extends('backend.layouts.app')


@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="white_card_header">
                    <div class="box_header m-0">
                       <div class="main-title">
                          <h3 class="m-0">All brands</h3>
                       </div>
                       <div class="main-title float-right mb-4">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#brand_add_modal">
                               Add new brand
                           </button>
                       </div>
                    </div>
                 </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Status</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="brand_list">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- brand add Modal -->
@php

@endphp

<div class="modal fade" id="brand_add_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="brand_add_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Add new brand form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>

                        <fieldset>

                            <div class="form-group mb-3">
                                <label for="name">Brand Name</label>
                                <input id="name" class="form-control" name="name" type="text">
                            </div>
                            <span class="name-msg"></span>
                            <span class="name-check-msg"></span>

                            <div class="form-group mb-3">
                                <label for="logo">Brand logo</label>
                                <input id="logo" class="form-control" name="logo" type="file">
                            </div>
                            <span class="logo-msg"></span>
                            <span class="logo-check-msg"></span>








                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add brand</button>
                        </div>
                    </form>
        </div>
    </div>
</div>


<!-- brand edit Modal -->
<div class="modal fade" id="brand_edit_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="brand_edit_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">User edit form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <br>
                        <fieldset>


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input id="name" class="form-control" name="name" type="text">
                                            <input id="id" class="form-control" name="id" type="hidden">
                                        </div>
                                        <span class="name-msg"></span>
                                        <span class="name-check-msg"></span>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="new_logo">Logo</label><br>
                                            <img class="mb-2" id="brand_edit_logo_preview" src="" alt="" style="width: 200px;">
                                            <input id="new_logo" class="form-control " name="new_logo" type="file">
                                            <input id="old_logo" name="old_logo" type="hidden">
                                            <input name="edit_id" type="hidden">
                                        </div>
                                    </div>



                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update brand</button>
                        </div>
                    </form>
        </div>
    </div>
</div>


<!-- brand show -->

<div class="modal fade" id="brand_show_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">

                        <div class="modal-header">
                            <h5 class="modal-title">Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>

                        <div id="brand_show_msg" class="show row">

                        </div>

                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
            </div>
        </div>
    </div>
</div>












@endsection
