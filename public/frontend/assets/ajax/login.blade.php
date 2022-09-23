<div class="login-popup">
    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
        <ul class="nav nav-tabs text-uppercase" role="tablist">
            <li class="nav-item">
                <a href="#sign-in" class="nav-link active">Sign In</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="sign-in">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Mobile number or Email *</label>
                        <input type="text" class="form-control" name="email" id="username">
                    </div>
                    <div class="form-group mb-0">
                        <label for="password">Password *</label>
                        <input type="text" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                        <a href="#">Lost your password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </form>
                <p class="text-danger">Don't have an account? <a href="#"> Sign up</a></p>
            </div>



        </div>
        <p class="text-center">Sign in with social account</p>
        <div class="social-icons social-icon-border-color d-flex justify-content-center">
            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
            <a href="#" class="social-icon social-google fab fa-google"></a>
        </div>
    </div>
</div>
