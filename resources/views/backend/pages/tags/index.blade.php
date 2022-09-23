@extends('backend.layouts.app')


@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="white_card_header">
                    <div class="box_header m-0">
                       <div class="main-title">
                          <h3 class="m-0">All Tags</h3>
                       </div>
                       <div class="main-title float-right mb-4">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tag_add_modal">
                               Add new tag
                           </button>
                       </div>
                    </div>
                 </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Tag Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="product_tag_list">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- tag add Modal -->
@php

@endphp

<div class="modal fade" id="tag_add_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="tag_add_form" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Add new tag form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>

                        <fieldset>

                            <div class="form-group my-3">
                                <label for="name">Tag Name</label>
                                <input id="name" class="form-control" name="name" type="text">
                            </div>
                            <span class="name-msg"></span>
                            <span class="name-check-msg"></span>


                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add tag</button>
                        </div>
                    </form>
        </div>
    </div>
</div>


<!-- tag edit Modal -->

<div class="modal fade" id="tag_edit_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                    <form id="tag_edit_form" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Tag edit</h5>
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



                        </fieldset>
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update tag</button>
                        </div>
                    </form>
        </div>
    </div>
</div>















@endsection
