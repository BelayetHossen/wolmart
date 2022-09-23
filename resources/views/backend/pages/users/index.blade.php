@extends('backend.layouts.app')


@section('main-content')







<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="white_card_header">
                    <div class="box_header m-0">
                       <div class="main-title">
                          <h3 class="m-0">All users<a href="{{ route('trashed.users.view') }}" class="badge bg-danger mx-2" style="font-size: 12px;">Trashed users</a><a href="{{ route('staff.users.view') }}" class="badge bg-info mx-1" style="font-size: 12px;">All staff</a></h3>
                       </div>
                       <div class="main-title float-right mb-4">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#user_add_modal">
                               Register new user
                           </button>
                           @php

                           @endphp
                       </div>
                    </div>
                 </div>

                <div class="table-responsive">
                    <table id="user_table" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                        <thead class="" style="background: #182444;">
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Phone</th>
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




<!-- user add Modal -->
<div class="modal fade" id="user_add_modal">
    <div class="modal-dialog" role="document" style="max-width: 1000px;">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="user_add_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Add new user form</h5>
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
                                                    @foreach ($role as $roles)
                                                        <option value="{{ $roles->id }}">{{ $roles->name }}</option>
                                                    @endforeach
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

                                        <div class="form-group mt-2">
                                            <label for="password">Password</label>
                                            <input id="password" class="form-control " name="password" type="text" value="{{ $rand_pass }}">
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





<!-- user edit Modal -->
<div class="modal fade" id="user_edit_modal">
    <div class="modal-dialog" role="document" style="max-width: 1000px;">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="user_edit_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">User edit form</h5>
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
                                            <img class="mb-2" id="user_edit_photo_preview" src="" alt="" style="width: 200px;">
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



<!-- single user view Modal -->

<div class="modal fade" id="user_show_modal">
    <div class="modal-dialog" role="document" style="max-width: 1000px;">
       <div class="modal-content">

        <div class="modal-body">

             <div class="modal-header">
                <h5 class="modal-title">User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
             </div>

             <div class="row my-2">
                <div class="col-sm-8">
                   <div id="single_user_info" class="table-responsive">

                   </div>
                </div>

                <div class="col-sm-4 user_photo_view">
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
