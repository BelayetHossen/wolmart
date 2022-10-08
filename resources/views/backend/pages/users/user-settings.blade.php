@extends('backend.layouts.app')




@section('main-content')








{{-- Auth User photo show --}}
@php
$img_name = Auth::guard('siteuser')->user()->photo;
if (Auth::guard('siteuser')->user()->photo == ''){

if (Auth::guard('siteuser')->user()->gender == 'Male') {
$img = asset('storage/gender_photo/male.jpg');
} else {
$img = asset('storage/gender_photo/female.jpg');
}

} else{
$img = asset('storage/users').'/'.$img_name;
}
@endphp


<div class="row p-3">
    <div class="col-12">
        <div class="main-title mb_30">
            <h3 class="m-0">Welcome Back, {{ Auth::guard('siteuser')->user()->name }}</h3>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 box-col-6">
        <div class="card custom-card">
            <div class="card-header"><img class="img-fluid" src="{{ asset('') }}backend/img/profilebox/1.jpg" alt=""
                    data-original-title="" title=""></div>
            <div class="card-profile"><img class="rounded-circle" src="{{ $img }}" alt="" data-original-title=""
                    title=""></div>
            <ul class="card-social">
                <li><a href="#" data-original-title="" title=""><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" data-original-title="" title=""><i class="fab fa-google-plus-g"></i></a></li>
                <li><a href="#" data-original-title="" title=""><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" data-original-title="" title=""><i class="fab fa-instagram"></i></a></li>
                <li><a href="#" data-original-title="" title=""><i class="fa-brands fa-youtube"></i></a></li>
            </ul>
            <div class="text-center profile-details">
                <h4>{{ Auth::guard('siteuser')->user()->name }}</h4>
                <h6>{{ Auth::guard('siteuser')->user()->role->name }}</h6>
            </div>

        </div>
    </div>


    <div class="col-lg-8">
        @if (session('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('msg') }}!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="{{ url('/account/update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" name="name" type="text" value="{{ $data->name }}">
                        <input name="id" type="hidden" value="{{ $data->id }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" name="email" type="text" value="{{ $data->email }}">
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">-Select-</option>
                            <option value="Male" {{ ($data->gender == 'Male') ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ ($data->gender == 'Female') ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input id="phone" class="form-control " name="phone" type="text" value="{{ $data->phone }}">
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input id="facebook" class="form-control " name="facebook" type="text"
                            value="{{ $social->facebook }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="twiter">Twiter</label>
                        <input id="twiter" class="form-control " name="twiter" type="text"
                            value="{{ $social->twiter }}">
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input id="instagram" class="form-control " name="instagram" type="text"
                            value="{{ $social->instagram }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="youtube">Youtube</label>
                        <input id="youtube" class="form-control " name="youtube" type="text"
                            value="{{ $social->youtube }}">
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input name=" old_photo" type="hidden">
                        <input id="photo" class="form-control " name="photo" type="file">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-end">Update</button>
        </form>
    </div>









</div>

@endsection
