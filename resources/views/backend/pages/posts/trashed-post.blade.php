@extends('backend.layouts.app')


@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title mb-3 bg-danger p-2 d-block">
                                <h3 class="">TRASHED POSTS<a href="{{ route('admin.post.index') }}"
                                        class="badge bg-success mx-2" style="font-size: 12px;">Active posts</a></h3>
                            </div>

                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="trashed_posts_table"
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










@endsection
