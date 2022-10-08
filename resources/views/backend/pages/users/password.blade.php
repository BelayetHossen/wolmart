@extends('backend.layouts.app')




@section('main-content')










<div class="row p-3">
    <div class="col-12">
        <div class="main-title mb_30">
            <h3 class="m-0">Welcome Back, {{ Auth::guard('siteuser')->user()->name }}</h3>
        </div>
    </div>

    <div class="col-md-8 m-auto">
        <div class="card">
            <div class="card-body">
                @if (session('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('msg') }}!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="{{ url('/account/password/update') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="current_password">Current password</label>
                        <input id="current_password" class="form-control" name="current_password" type="password"
                            value="{{ old('current_password') }}">
                        <input name="id" type="hidden" value="{{ Auth::guard('siteuser')->user()->id }}">
                        @error('current_password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        @if (session('error'))
                        <strong class="text-danger">{{ session('error') }}!</strong>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">New password</label>
                        <input id="password" class="form-control" name="password" type="password"
                            value="{{ old('password') }}">
                        @error('password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="password_confirmation">Confirm new password</label>
                        <input id="password_confirmation" class="form-control" name="password_confirmation"
                            type="password" value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Save change</button>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
