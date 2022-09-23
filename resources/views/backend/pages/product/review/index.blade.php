

@extends('backend.layouts.app')


@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="white_card_header">
                    <div class="box_header m-0">
                       <div class="main-title">
                          <h3 class="m-2">All reviews</h3>
                       </div>
                    </div>
                 </div>

                <div class="table-responsive">
                    <table id="review_table" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Review</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Review by</th>
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







<!-- review edit Modal -->
<div class="modal fade" id="review_edit_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="review_edit_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Review edit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <br>
                        <fieldset>



                            <div class="col-sm-12 mb-2">
                                <div class="form-group">
                                    <label for="product">Product</label>
                                    <select name="product" id="product" class="form-control p_product">

                                    </select>
                                </div>
                                <span class="product-msg"></span>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="form-group">
                                    <label for="review">Review</label>
                                    <input id="review" class="form-control" name="review" type="text">
                                    <input id="id" class="form-control" name="id" type="hidden">
                                </div>
                                <span class="review-msg"></span>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <select name="rating" id="rating" class="form-control p_rating">

                                    </select>
                                </div>
                                <span class="rating-msg"></span>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control p_review">

                                    </select>
                                </div>
                                <span class="status-msg"></span>
                            </div>





                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update review</button>
                        </div>
                    </form>
        </div>
    </div>
</div>






@endsection
