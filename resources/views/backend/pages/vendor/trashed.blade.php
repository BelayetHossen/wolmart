@extends('backend.layouts.app')

@section('main-content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Trashed vendors<a href="{{ route('admin.vendor.index') }}"
                                    class="badge bg-success mx-2" style="font-size: 12px;">All vendors</a></h3>
                        </div>
                        <div class="main-title float-right mb-4">
                            <a href="{{ route('admin.vendor.index') }}" class="btn btn-primary">
                                Back
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="trashed_vendor_table"
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


@endsection
