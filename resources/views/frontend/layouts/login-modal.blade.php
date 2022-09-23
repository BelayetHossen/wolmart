



<!-- login Modal -->
<div class="modal fade" id="login_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="text-center mt-2">Customer login</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

                </div>
            </div>
    </div>
</div>
