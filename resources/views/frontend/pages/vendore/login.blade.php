@extends('frontend.layouts.app')

@section('main-content')

<main class="main login-page">


    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no py-4">
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li>my account</li>
        </ul>
    </nav>
    <!-- End of Breadcrumb -->







    <div class="page-content">
        <div class="container py-3" style="background-color: #F5F5F5;">
            <div class="row">
                <div class="col-md-6 m-auto">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center mt-2">Agent Login</h4>
                            @if (session('msg'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Hello customer!</strong> {{ session('msg') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/vendor/login') }}" method="post">
                                @csrf




                                <div class="form-group mb-2">
                                    <label for="email">Mobile number or email address *</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                    @if (Cookie::has('vendor_email')) value="{{ Cookie::get('vendor_email') }}"@endif>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="form-group mb-5">
                                    <label for="password">Password *</label>
                                    <input type="text" class="form-control" name="password" id="password" @if (Cookie::has('vendor_password')) value="{{ Cookie::get('vendor_password') }}"@endif>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-checkbox d-flex align-items-center justify-content-between py-3">
                                    <input type="checkbox" class="custom-checkbox" id="remember" name="vendor_remember" @if (Cookie::has('vendor_password')) checked="checked"@endif>
                                    <label for="remember">Remember me</label>
                                    <a href="{{ route('password.reset.index') }}">Lost your password?</a>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </form>
                            <p class="text-danger">Don't have an account? <a href="{{ route('vendor.register') }}"> Sign Up</a></p>

                            <p class="text-center">Sign in with social account</p>
                            <div class="social-icons social-icon-border-color d-flex justify-content-center">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-google fab fa-google"></a>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</main>


@endsection
