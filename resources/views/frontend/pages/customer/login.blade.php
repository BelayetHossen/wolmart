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
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="text-center mt-2">Customer login</h4>

                        </div>

                        <style>
                            .field-validate{
                                border: 2px solid #f70303!important;
                            }
                        </style>

                        <div class="card-body margin_left">
                            <div class="login_msg"></div>

                            <div class="tab-content">
                                <div class="tab-pane active" id="sign-in">
                                @if (session('msg'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Hello customer!</strong> {{ session('msg') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                    <form id="customer_login_form_modal" method="post">
                                        @csrf
                                        <div class="form-group my-2">
                                            <label for="email">Mobile number or Email *</label>
                                            <input type="text" class="form-control" name="email" id="username"
                                            @if (Cookie::has('customer_email')) value="{{ Cookie::get('customer_email') }}"
                                            @endif
                                            >
                                            <div class="email-msg"></div>
                                            <div class="email-check"></div>
                                        </div>
                                        <div class="form-group my-2">
                                            <label for="password">Password *</label>
                                            <input type="text" class="form-control" name="password" id="password"
                                            @if (Cookie::has('customer_password')) value="{{ Cookie::get('customer_password') }}"
                                            @endif
                                            >
                                            <div class="password-msg"></div>
                                        </div>
                                        <div class="form-checkbox d-flex align-items-center justify-content-between py-3">
                                            <input type="checkbox" class="custom-checkbox" id="remember" name="customer_remember" @if (Cookie::has('customer_password')) checked="checked"@endif>
                                            <label for="customer_remember">Remember me</label>
                                            <a href="{{ route('password.reset.index') }}">Lost your password?</a>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block my-1">Sign In</button>
                                    </form>
                                    <p class="text-danger">Don't have an account? <a href="{{ route('customer.register') }}"> Sign up</a></p>
                                </div>



                            </div>
                            <p class="text-center">OR, Sign in with social account</p>
                            <div class="social-icons social-icon-border-color d-flex justify-content-center">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-google fab fa-google"></a>
                            </div>

                        </div>
                    </div>

                    {{-- <div class="card">
                        <div class="card-header">
                            <h4 class="text-center mt-2">Customer Login</h4>
                            @if (session('msg'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Hello customer!</strong> {{ session('msg') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/customer/login') }}" method="post">
                                @csrf




                                <div class="form-group mb-2">
                                    <label for="email">Mobile number or email address *</label>
                                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}"/>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="form-group mb-5">
                                    <label for="password">Password *</label>
                                    <input type="text" class="form-control" name="password" id="password" value="{{ old('password') }}"/>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                                    <input type="checkbox" class="custom-checkbox" id="privecy" name="privecy"/>
                                    <label for="privecy" class="font-size-md">I agree to the <a href="#" class="text-primary font-size-md">privacy policy</a></label> <br>
                                    @error('privecy')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </form>
                            <p class="text-danger">Don't have an account? <a href="{{ route('customer.register') }}"> Sign Up</a></p>

                            <p class="text-center">Sign in with social account</p>
                            <div class="social-icons social-icon-border-color d-flex justify-content-center">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-google fab fa-google"></a>
                            </div>
                        </div>
                    </div> --}}



                </div>
            </div>
        </div>
    </div>
</main>


@endsection
