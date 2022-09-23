@extends('backend.layouts.app')


@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="white_card_header">
                    <div class="box_header m-0">
                       <div class="main-title">
                          <h3 class="m-0">All payments</h3>
                       </div>
                       <div class="main-title float-right mb-4">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#payment_add_modal">
                               Add new payment
                           </button>
                       </div>
                    </div>
                 </div>

                <div class="table-responsive">
                    <table id="admin_payment_table" class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Title</th>
                                <th scope="col">Sub title</th>
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




<!-- payment add Modal -->
<style>
    .type-option{
        padding: 5px;
        border: 1px solid rgb(1, 15, 214);
    }
    .hide{
        display: none;
    }
    .show{
        display: block;
    }
</style>

<div class="modal fade" id="payment_add_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="payment_add_form" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Add new payment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>

                        <fieldset>

                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" name="name" type="text">
                            </div>
                            <span class="name-msg"></span>

                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input id="title" class="form-control" name="title" type="text">
                            </div>
                            <span class="title-msg"></span>
                            <span class="title-check"></span>

                            <div class="form-group mb-3">
                                <label for="sub_title">Sub title</label>
                                <input id="sub_title" class="form-control" name="sub_title" type="text">
                            </div>
                            <span class="sub-title-msg"></span>

                            <div class="form-group mb-3">
                                <label for="details">Details</label>
                                <textarea name="details" id="details" class="form-control"></textarea>
                            </div>
                            <span class="details-msg"></span>

                            <div class="form-group mb-3">
                                <label for="type">Type</label>
                                <select name="type" id="" class="form-control payment_type">
                                    <option value="">-Select a type-</option>
                                    <option value="manual">Manual</option>
                                    <option value="autometic">Autometic</option>
                                </select>
                            </div>
                            <span class="type-msg"></span>
                            <div class="type-option hide">
                                <div class="form-group mb-3">
                                    <label for="client_id">Client Id</label>
                                    <input id="client_id" class="form-control" name="client_id" type="text">
                                </div>
                                <span class="client-id-msg"></span>
                                <div class="form-group mb-3">
                                    <label for="client_secret">Client Secret</label>
                                    <input id="client_secret" class="form-control" name="client_secret" type="text">
                                </div>
                                <span class="client-secret-msg"></span>
                            </div>


                            <div class="form-check">
                                <input name="is_default" class="form-check-input" type="checkbox" value="1" id="is_default">
                                <label class="form-check-label" for="is_default">Set as default
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Currencies</label>
                                <hr>
                            </div>
                            @foreach ($currencies as $item)
                            <div class="form-check">
                                <input name="currency[]" class="form-check-input" type="checkbox" value="{{ $item->id }}" id="{{ $item->id }}">
                                <label class="form-check-label" for="{{ $item->id }}">
                                  {{ $item->name }}
                                </label>
                            </div>
                            @endforeach

                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add payment</button>
                        </div>
                    </form>
        </div>
    </div>
</div>


<!-- payment edit Modal -->

<div class="modal fade" id="payment_edit_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="payment_edit_form" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Payment edit</h5>
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

                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input id="title" class="form-control" name="title" type="text">
                            </div>
                            <span class="title-msg"></span>
                            <span class="title-check"></span>

                            <div class="form-group mb-3">
                                <label for="sub_title">Sub title</label>
                                <input id="sub_title" class="form-control" name="sub_title" type="text">
                            </div>
                            <span class="sub-title-msg"></span>

                            <div class="form-group mb-3">
                                <label for="details">Details</label>
                                <textarea name="details" id="details" class="form-control"></textarea>
                            </div>
                            <span class="details-msg"></span>

                            <div class="form-group mb-3">
                                <label for="type">Type</label>
                                <select name="type" id="" class="form-control payment_type">

                                </select>
                            </div>
                            <span class="type-msg"></span>
                            <div class="type-option hide">
                                <div class="form-group mb-3">
                                    <label for="client_id">Client Id</label>
                                    <input id="client_id" class="form-control" name="client_id" type="text">
                                </div>
                                <span class="client-id-msg"></span>
                                <div class="form-group mb-3">
                                    <label for="client_secret">Client Secret</label>
                                    <input id="client_secret" class="form-control" name="client_secret" type="text">
                                </div>
                                <span class="client-secret-msg"></span>
                            </div>


                            <div class="form-check default_check">

                            </div>

                            <div class="form-group">
                                <label>Currencies</label>
                                <hr>
                            </div>

                            <div class="currency_cont"></div>



                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update payment</button>
                        </div>
                    </form>
        </div>
    </div>
</div>






@endsection
