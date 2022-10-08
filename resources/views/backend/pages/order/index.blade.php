@extends('backend.layouts.app')


@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0 bg-success p-2">ALL ORDERS</h3>
                            </div>
                            <div class="main-title float-right mb-4">
                                <a class="btn btn-primary" href="{{ route('admin.order.add') }}">
                                    Add new order
                                </a>
                                @php

                                @endphp
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="all_order_table"
                            class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                            <thead class="" style="background: #182444;">
                                <tr>
                                    <th>SL</th>
                                    <th scope="col">Customer contact</th>
                                    <th scope="col">Order number</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Options</th>
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
