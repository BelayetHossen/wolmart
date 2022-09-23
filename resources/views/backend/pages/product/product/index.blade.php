@extends('backend.layouts.app')


@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0 bg-success p-2">ALL PRODUCTS<a href="{{ route('product.trashed.index') }}"
                                        class="badge bg-danger mx-2" style="font-size: 12px;">Trashed products</a></h3>
                            </div>
                            <div class="main-title float-right mb-4">
                                <a class="btn btn-primary" href="{{ route('add.product') }}">
                                    Add new product
                                </a>
                                @php

                                @endphp
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="products_table"
                            class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                            <thead class="" style="background: #182444;">
                                <tr>
                                    <th>SL</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Price</th>
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




    <!-- product add Modal -->
    <div class="modal fade" id="product_add_modal">
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">

                <div class="modal-body">
                    <form id="product_add_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Add new product form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <br>
                        <fieldset>


                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" class="form-control" name="name" type="text">
                                    </div>
                                    <span class="name-msg"></span>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select name="role_id" class="form-control">
                                            <option value="" disabled>-Select-</option>

                                            <option value="ffff">ffff</option>

                                        </select>
                                    </div>
                                    <span class="role-msg"></span>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select name="gender" class="form-control">
                                            <option value="" disabled>-Select-</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="gender-msg"></div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input id="phone" class="form-control " name="phone" type="text">
                                    </div>
                                    <div class="phone-msg"></div>
                                    <div class="phone-check"></div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" class="form-control " name="email" type="text">
                                    </div>
                                    <div class="email-msg"></div>
                                    <div class="email-check"></div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" class="form-control " name="username" type="text">
                                    </div>
                                    <div class="username-msg"></div>
                                    <div class="username-check"></div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="photo">Photo</label>
                                        <input id="photo" class="form-control " name="photo" type="file">
                                    </div>
                                </div>
                            </div>



                        </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add user</button>
                </div>
                </form>
            </div>
        </div>
    </div>





    <!-- product edit Modal -->
    <div class="modal fade" id="product_edit_modal">
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">

                <div class="modal-body">
                    <form id="product_edit_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Product edit form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <br>
                        <fieldset>


                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" class="form-control" name="name" type="text">
                                    </div>
                                    <span class="name-msg"></span>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <div class="user_edit_role">

                                        </div>
                                    </div>
                                    <span class="role-msg"></span>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <div class="user_gender_edit"></div>
                                    </div>
                                    <div class="gender-msg"></div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input id="phone" class="form-control " name="phone" type="text">
                                    </div>
                                    <div class="phone-msg"></div>
                                    <div class="phone-check"></div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" class="form-control " name="email" type="text">
                                    </div>
                                    <div class="email-msg"></div>
                                    <div class="email-check"></div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" class="form-control " name="username" type="text">
                                    </div>
                                    <div class="username-msg"></div>
                                    <div class="username-check"></div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="new_photo">Photo</label><br>
                                        <img class="mb-2" id="user_edit_photo_preview" src="" alt=""
                                            style="width: 200px;">
                                        <input id="new_photo" class="form-control " name="new_photo" type="file">
                                        <input id="old_photo" name="old_photo" type="hidden">
                                        <input name="edit_id" type="hidden">
                                    </div>
                                </div>
                            </div>



                        </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update user</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
