@extends('backend.layouts.app')


@section('main-content')








<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="white_card_header">
                    <div class="box_header my-4">
                       <div class="main-title">
                          <h3 class="m-0">Trashed users<a href="{{ route('trashed.users.view') }}" class="badge bg-danger mx-3" style="font-size: 12px;">Trashed users</a>
                            <a href="{{ route('admin.user.view') }}" class="badge badge-success" style="font-size: 12px;">All users</a></h3>
                       </div>
                    </div>
                 </div>

                <div class="table-responsive">
                    <table id="trash_users" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                        <thead class="" style="background: #182444;">
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Photo</th>
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





@endsection
