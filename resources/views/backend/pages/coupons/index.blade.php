@extends('backend.layouts.app')


@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="white_card_header">
                    <div class="box_header m-0">
                       <div class="main-title">
                          <h3 class="m-0">All coupons</h3>
                       </div>
                       <div class="main-title float-right mb-4">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#coupon_add_modal">
                               Add new coupon
                           </button>
                       </div>
                    </div>
                 </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Title</th>
                                <th scope="col">Code</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="coupon_list">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- coupon add Modal -->
<div class="modal fade" id="coupon_add_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">

                    <form id="coupon_add_form" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Add new coupon form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>

                        <style>
                            .hide{
                                display: none;
                            }
                        </style>

                        <fieldset>

                            <div class="form-group my-3">
                                <label for="title">Title</label>
                                <input id="title" class="form-control" name="title" type="text">
                            </div>
                            <span class="title-msg"></span>
                            <span class="title-check"></span>

                            <div class="form-group my-3">
                                <label for="code">Code</label>
                                <input id="code" class="form-control" name="code" type="text">
                            </div>
                            <span class="code-msg"></span>
                            <span class="code-check"></span>

                            <div class="form-group my-3">
                                <label for="dis_type">Discount type</label>
                                <select name="dis_type" id="" class="form-control discount_type">
                                    <option value="0">-Select-</option>
                                    <option value="1">Flat rate</option>
                                    <option value="2">Percentage</option>
                                </select>
                            </div>
                            <span class="dis-type-msg"></span>

                            <div class="flat hide">
                                <label for="amount">Amount in TK</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">৳</span>
                                    <input name="amount" type="number" class="form-control" >
                                  </div>
                                <span class="amount-msg"></span>
                            </div>
                            <div class="percentage hide">
                                <label for="percentage">Amount in percentage</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                    <input name="percentage" type="number" class="form-control" >
                                  </div>
                                <span class="percentage-msg"></span>
                            </div>

                            <div class="form-group my-3">
                                <label for="start_date">Start date</label>
                                <input id="start_date" class="form-control" name="start_date" type="date">
                            </div>
                            <span class="start-date-msg"></span>

                            <div class="form-group my-3">
                                <label for="end_date">End date</label>
                                <input id="end_date" class="form-control" name="end_date" type="date">
                            </div>
                            <span class="end-date-msg"></span>




                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add coupon</button>
                        </div>
                    </form>
        </div>
    </div>
</div>


<!-- coupon edit Modal -->
<div class="modal fade" id="coupon_edit_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">

                    <form id="coupon_edit_form" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Edit coupon form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>

                        <style>
                            .hide{
                                display: none;
                            }
                        </style>

                        <fieldset>

                            <div class="form-group my-3">
                                <label for="title">Title</label>
                                <input id="title" class="form-control" name="title" type="text">
                                <input name="id" type="hidden">
                            </div>
                            <span class="title-msg"></span>
                            <span class="title-check"></span>

                            <div class="form-group my-3">
                                <label for="code">Code</label>
                                <input id="code" class="form-control" name="code" type="text">
                            </div>
                            <span class="code-msg"></span>
                            <span class="code-check"></span>

                            <div class="form-group my-3">
                                <label for="dis_type">Discount type</label>
                                <select name="dis_type" id="" class="form-control discount_type">

                                </select>
                            </div>
                            <span class="dis-type-msg"></span>

                            <div class="flat hide">
                                <label for="amount">Amount in TK</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">৳</span>
                                    <input name="amount" type="number" class="form-control" >
                                  </div>
                                <span class="amount-msg"></span>
                            </div>
                            <div class="percentage hide">
                                <label for="percentage">Amount in percentage</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                    <input name="percentage" type="number" class="form-control" >
                                  </div>
                                <span class="percentage-msg"></span>
                            </div>

                            <div class="form-group my-3">
                                <label for="start_date">Start date</label>
                                <input id="start_date" class="form-control" name="start_date" type="date">
                            </div>
                            <span class="start-date-msg"></span>

                            <div class="form-group my-3">
                                <label for="end_date">End date</label>
                                <input id="end_date" class="form-control" name="end_date" type="date">
                            </div>
                            <span class="end-date-msg"></span>




                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update coupon</button>
                        </div>
                    </form>
        </div>
    </div>
</div>














@endsection
