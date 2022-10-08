@extends('backend.layouts.app')

@section('main-content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">All customers<a href="{{route('admin.customer.trash')}}"
                                    class="badge bg-danger mx-2" style="font-size: 12px;">Trashed customers</a></h3>
                        </div>
                        <div class="main-title float-right mb-4">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#customer_add_modal">
                                Add new customer
                            </button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="all_customer_table"
                        class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                        <thead class="" style="background: #182444;">
                            <tr>
                                <th>SL</th>
                                <th scope="col">name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
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

<!-- customer add Modal -->
<div class="modal fade" id="customer_add_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="modal-header">
                    <h5 class="modal-title">New customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form id="cusomer_add_form" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="first_name">First name *</label>
                        <input type="text" class="form-control" name="first_name" id="first_name">
                    </div>
                    <span class="fname-msg"></span>
                    <div class="form-group mb-2">
                        <label for="Last_name">Last name *</label>
                        <input type="text" class="form-control" name="last_name" id="Last_name">
                    </div>
                    <span class="lname-msg"></span>
                    <div class="form-group mb-2">
                        <label for="username">Username *</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <span class="username-msg"></span>
                    <span class="username-check"></span>
                    <div class="form-group mb-2">
                        <label for="phone">Mobile number *</label>
                        <input class="form-control" id="phone" name="phone" type="text">
                    </div>
                    <span class="phone-msg"></span>
                    <span class="phone-check-msg"></span>
                    <span class="phone-check"></span>
                    <div class="form-group mb-2">
                        <label for="email">Email address *</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <span class="email-msg"></span>
                    <span class="email-check-msg"></span>
                    <span class="email-check"></span>
                    <div class="form-group row">
                        <div class="form-group mb-2">
                            <label for="country">Country *</label>
                            <select class="form-control" name="country">
                                <option value="Bangladesh">Bangladesh</option>
                            </select>
                        </div>
                        <span class="country-msg"></span>
                        <div class="form-group mb-2">
                            <label for="region">Region *</label>
                            <select class="form-control" name="region" id="region">
                                <option value="">-Select-</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Rangpur">Rangpur</option>
                                <option value="Mymenshing">Mymenshing</option>
                                <option value="Khulna">Khulna</option>
                                <option value="Barishal">Barishal</option>
                                <option value="Sylhet">Sylhet</option>
                                <option value="Chittagong">Chittagong</option>
                            </select>
                        </div>
                        <span class="region-msg"></span>

                    </div>

                    <div class="form-group mb-2">
                        <label for="password">Password *</label>
                        <input type="text" class="form-control" name="password" id="password">
                    </div>
                    <span class="password-msg"></span>
                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- customer edit Modal -->
<div class="modal fade" id="customer_edit_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="modal-header">
                    <h5 class="modal-title">Edit customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form id="customer_edit_form" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="first_name">First name *</label>
                        <input type="text" class="form-control" name="first_name" id="first_name">
                        <input type="hidden" name="id">
                    </div>
                    <span class="fname-msg"></span>
                    <div class="form-group mb-2">
                        <label for="Last_name">Last name *</label>
                        <input type="text" class="form-control" name="last_name" id="Last_name">
                    </div>
                    <span class="lname-msg"></span>
                    <div class="form-group mb-2">
                        <label for="username">Username *</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <span class="username-msg"></span>
                    <span class="username-check"></span>
                    <div class="form-group mb-2">
                        <label for="phone">Mobile number *</label>
                        <input class="form-control" id="phone" name="phone" type="text">
                    </div>
                    <span class="phone-msg"></span>
                    <span class="phone-check-msg"></span>
                    <span class="phone-check"></span>
                    <div class="form-group mb-2">
                        <label for="email">Your email address *</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <span class="email-msg"></span>
                    <span class="email-check-msg"></span>
                    <span class="email-check"></span>
                    <div class="form-group row">
                        <div class="form-group mb-2">
                            <label for="country">Country *</label>
                            <select class="form-control" name="country">
                                <option value="Bangladesh">Bangladesh</option>
                            </select>
                        </div>
                        <span class="country-msg"></span>
                        <div class="form-group mb-2">
                            <label for="region">Region *</label>
                            <select class="form-control region_list" name="region" id="region">

                            </select>
                        </div>
                        <span class="region-msg"></span>

                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
