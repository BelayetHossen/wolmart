

@extends('backend.layouts.app')


@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="white_card_header">
                    <div class="box_header m-0">
                       <div class="main-title">
                          <h3 class="m-0">All shipping methods</h3>
                       </div>
                       <div class="main-title float-right mb-4">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#shipping_add_modal">
                               Add new shipping method
                           </button>
                       </div>
                    </div>
                 </div>

                <div class="table-responsive">
                    <table id="shipping_table" class="">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Title</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Status</th>
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




<!-- shipping add Modal -->
<div class="modal fade" id="shipping_add_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="shipping_add_form" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">New shipping method</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>

                        <fieldset>

                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input id="title" class="form-control" name="title" type="text">
                            </div>
                            <span class="title-msg"></span>
                            <span class="title-check-msg"></span>

                            <div class="form-group mb-3">
                                <label for="duration">Duration <span>(days)</span></label>
                                <input id="duration" class="form-control" name="duration" type="number" min="1">
                            </div>
                            <span class="duration-msg"></span>

                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                            </div>
                            <span class="price-msg"></span>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Dhaka ৳</span>
                                <input name="dha_price" type="number" min="1" class="form-control" placeholder="Price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Barishal ৳</span>
                                <input name="bari_price" type="number" min="1" class="form-control" placeholder="Price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Chittagong ৳</span>
                                <input name="chit_price" type="number" min="1" class="form-control" placeholder="Price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Khulna ৳</span>
                                <input name="khul_price" type="number" min="1" class="form-control" placeholder="Price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Mymenshing ৳</span>
                                <input name="mym_price" type="number" min="1" class="form-control" placeholder="Price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rajshahi ৳</span>
                                <input name="raj_price" type="number" min="1" class="form-control" placeholder="Price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rangpur ৳</span>
                                <input name="rang_price" type="number" min="1" class="form-control" placeholder="Price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Sylhet ৳</span>
                                <input name="syl_price" type="number" min="1" class="form-control" placeholder="Price">
                            </div>



                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add shipping method</button>
                        </div>
                    </form>
        </div>
    </div>
</div>
<!-- brand edit Modal -->
<div class="modal fade" id="shipping_edit_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="shipping_edit_form" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Edit shipping method</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>

                        <fieldset>

                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input id="title" class="form-control" name="title" type="text">
                                <input name="id" type="hidden">
                            </div>
                            <span class="title-msg"></span>
                            <span class="title-check-msg"></span>

                            <div class="form-group mb-3">
                                <label for="duration">Duration <span>(days)</span></label>
                                <input id="duration" class="form-control" name="duration" type="number" min="1">
                            </div>
                            <span class="duration-msg"></span>

                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                            </div>
                            <span class="price-msg"></span>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Dhaka ৳</span>
                                <input name="dha_price" type="number" min="1" class="form-control" placeholder="Price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Barishal ৳</span>
                                <input name="bari_price" type="number" min="1" class="form-control" placeholder="Price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Chittagong ৳</span>
                                <input name="chit_price" type="number" min="1" class="form-control" placeholder="Price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Khulna ৳</span>
                                <input name="khul_price" type="number" min="1" class="form-control" placeholder="Price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Mymenshing ৳</span>
                                <input name="mym_price" type="number" min="1" class="form-control" placeholder="Price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rajshahi ৳</span>
                                <input name="raj_price" type="number" min="1" class="form-control" placeholder="Price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rangpur ৳</span>
                                <input name="rang_price" type="number" min="1" class="form-control" placeholder="Price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Sylhet ৳</span>
                                <input name="syl_price" type="number" min="1" class="form-control" placeholder="Price">
                            </div>



                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update shipping method</button>
                        </div>
                    </form>
        </div>
    </div>
</div>





@endsection
