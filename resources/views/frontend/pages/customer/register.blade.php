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
                            <h4 class="text-center mt-2">Customer register</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/customer/register') }}" method="post">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="first_name">First name *</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}"/>
                                    @error('first_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group mb-2">
                                    <label for="Last_name">Last name *</label>
                                    <input type="text" class="form-control" name="last_name" id="Last_name" value="{{ old('last_name') }}"/>
                                    @error('last_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="username">Username *</label>
                                    <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}"/>
                                    @error('username')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="phone">Mobile number *</label>
                                    <input class="form-control" id="phone" name="phone" type="text" value="{{ old('phone') }}"/>
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="email">Your email address *</label>
                                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}"/>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="form-group mb-2">
                                        <label for="country">Country *</label>
                                        <select class="crs-country form-control" name="country" data-region-id="region"></select>
                                        @error('country')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="region">Region *</label>
                                        <select class="form-control" name="region" id="region"></select>
                                        @error('region')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>



                                </div>

                                <div class="form-group mb-5">
                                    <label for="password">Password *</label>
                                    <input type="text" class="form-control" name="password" id="password" value="{{ old('password') }}"/>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <p>
                                    Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our
                                    <a href="#" class="text-primary">privacy policy</a>.
                                </p>
                                <a href="{{ route('vendor.register') }}" class="d-block mb-5 text-primary">Signup as a vendor?</a>
                                <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                                    <input type="checkbox" class="custom-checkbox" id="privecy" name="privecy"/>
                                    <label for="privecy" class="font-size-md">I agree to the <a href="#" class="text-primary font-size-md">privacy policy</a></label> <br>
                                    @error('privecy')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                            </form>
                            <p class="text-danger">Already have an account? <a href="{{ route('customer.login') }}"> Sign In</a></p>

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
