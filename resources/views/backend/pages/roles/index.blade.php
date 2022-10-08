@extends('backend.layouts.app')


@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="white_card_header">
                    <div class="box_header m-0">
                       <div class="main-title">
                          <h3 class="m-0">All roles</h3>
                       </div>
                       <div class="main-title float-right mb-4">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#role_add_modal">
                               Add new role
                           </button>
                       </div>
                    </div>
                 </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Role Name</th>
                                <th scope="col">Permissions</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="role_list">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- role add Modal -->
<div class="modal fade" id="role_add_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="role_add_form" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Add new role form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>

                        <fieldset>

                            <div class="form-group mb-3">
                                <label for="name">Role Name</label>
                                <input id="name" class="form-control" name="name" type="text">
                            </div>
                            <span class="name-msg"></span>
                            <span class="name-check-msg"></span>

                            <div class="form-group has-danger">
                                <label for="permission">Permission</label>
                                <hr>
                                    @foreach ($permission as $item)
                                    <li style="list-style: none;"><input name="permission[]" type="checkbox" value="{{ $item }}" id="{{ $item }}"> <label for="{{ $item }}"> {{ $item }}</label></li>
                                    @endforeach

                            </div>






                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add role</button>
                        </div>
                    </form>
        </div>
    </div>
</div>


<!-- role edit Modal -->

<div class="modal fade" id="role_edit_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="role_edit_form" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Role edit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>

                        <fieldset>

                            <div class="form-group mb-3">
                                <label for="name">Role Name</label>
                                <input id="name" class="form-control" name="name" type="text">
                                <input id="id" name="id" type="hidden">
                            </div>
                            <span class="name-msg"></span>
                            <span class="name-check-msg"></span>

                            <div class="form-group has-danger">
                                <label for="permission">Permission</label>
                                <hr>
                                    <div id="role_edit_permission">

                                    </div>

                            </div>

                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update role</button>
                        </div>
                    </form>
        </div>
    </div>
</div>


<!-- role show -->

<div class="modal fade" id="role_show_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">

                        <div class="modal-header">
                            <h5 class="modal-title">Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>

                        <div id="role_show_msg" class="show row">

                        </div>

                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
        </div>
    </div>
</div>












@endsection
