@extends('backend.layouts.app')


@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="white_card_header">
                    <div class="box_header m-0">
                       <div class="main-title">
                          <h3 class="m-0">All currency</h3>
                       </div>
                       <div class="main-title float-right mb-4">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#currency_add_modal">
                               + Add new currency
                           </button>
                       </div>
                    </div>
                 </div>

                <div class="table-responsive">
                    <table id="admin_currency_table" class="table">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Currency Name</th>
                                <th scope="col">Symbol</th>
                                <th scope="col">Value</th>
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




<!-- currency add Modal -->
<div class="modal fade" id="currency_add_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="currency_add_form" method="POST">
                        @csrf
                        <div class="modal-header mb-3">
                            <h5 class="modal-title">Add new currency</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>

                        <fieldset>

                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" name="name" type="text">
                            </div>
                            <span class="name-msg"></span>
                            <span class="name-check"></span>

                            <div class="form-group mb-3">
                                <label for="symbol">Symbol</label>
                                <input id="symbol" class="form-control" name="symbol" type="text">
                            </div>
                            <span class="symbol-msg"></span>
                            <div class="form-group mb-3">
                                <label for="value">Value <small>(Please Enter The Value For 1 USD = ?)</small></label>
                                <input id="value" class="form-control" name="value" type="text">
                            </div>
                            <span class="value-msg"></span>








                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add currency</button>
                        </div>
                    </form>
        </div>
    </div>
</div>


<!-- currency edit Modal -->

<div class="modal fade" id="currency_edit_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form id="currency_edit_form" method="POST">
                    @csrf
                    <div class="modal-header mb-3">
                        <h5 class="modal-title">Edit currency</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>

                    <fieldset>

                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input id="name" class="form-control" name="name" type="text">
                            <input name="id" type="hidden">
                        </div>
                        <span class="name-msg"></span>
                        <span class="name-check-msg"></span>

                        <div class="form-group mb-3">
                            <label for="symbol">Symbol</label>
                            <input id="symbol" class="form-control" name="symbol" type="text">
                        </div>
                        <span class="symbol-msg"></span>
                        <div class="form-group mb-3">
                            <label for="value">Value <small>(Please Enter The Value For 1 USD = ?)</small></label>
                            <input id="value" class="form-control" name="value" type="text">
                        </div>
                        <span class="value-msg"></span>








                    </fieldset>
                    </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add currency</button>
                    </div>
                </form>
        </div>
    </div>
</div>






@endsection
