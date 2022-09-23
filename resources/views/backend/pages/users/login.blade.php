<!DOCTYPE html>
<html lang="zxx">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <title>Standard Dashboard | Admin user login</title>
      <link rel="icon" href="img/mini_logo.png" type="image/png">
      <link rel="stylesheet" href="{{ asset('') }}backend/css/bootstrap1.min.css" />
      <link rel="stylesheet" href="{{ asset('') }}backend/vendors/themefy_icon/themify-icons.css" />
      <link rel="stylesheet" href="{{ asset('') }}backend/vendors/font_awesome/css/all.min.css" />
      <link rel="stylesheet" href="{{ asset('') }}backend/vendors/scroll/scrollable.css" />
      <link rel="stylesheet" href="{{ asset('') }}backend/css/metisMenu.css">
      <link rel="stylesheet" href="{{ asset('') }}backend/css/style1.css" />
      <link rel="stylesheet" href="{{ asset('') }}backend/css/colors/default.css" id="colorSkinCSS">
   </head>
   <body class="bg-dark">


    <div class="col-sm-6 m-auto mt-5">
        <div class="white_box mb_30">
           <div class="row justify-content-center">
              <div class="col-sm-12">
                 <div class="modal-content cs_modal">
                    <div class="modal-header justify-content-center theme_bg_1">
                       <h5 class="modal-title text_white">Admin Login</h5>
                    </div>
                    <div class="modal-body">
                       <form action="{{ route('admin.login.system') }}" method="POST">
                           @csrf
                          <div class="">
                             <input name="email" type="text" class="form-control" placeholder="Username/Phone/Email">
                          </div>
                          <div class="">
                             <input name="password" type="password" class="form-control" placeholder="Password">
                          </div>
                          <div class="">
                            <button class="btn_1 full_width text-center" type="submit">Log in</button>
                          </div>
                          <p>Need an account? <a data-bs-toggle="modal" data-bs-target="#sing_up" data-bs-dismiss="modal" href="#"> Sign Up</a></p>
                          <div class="text-center">
                             <a href="#" data-bs-toggle="modal" data-bs-target="#forgot_password" data-bs-dismiss="modal" class="pass_forget_btn">Forget Password?</a>
                          </div>
                       </form>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>

     <div class="row my-2">
         <div class="col-sm-12 text-center">
             <p class="text-light">Standard dashboard corporation</p>
         </div>
     </div>


      <script src="{{ asset('') }}backend/js/jquery1-3.4.1.min.js"></script>
      <script src="{{ asset('') }}backend/js/popper1.min.js"></script>
      <script src="{{ asset('') }}backend/js/bootstrap1.min.js"></script>
      <script src="{{ asset('') }}backend/js/metisMenu.js"></script>
      <script src="{{ asset('') }}backend/vendors/scroll/perfect-scrollbar.min.js"></script>
      <script src="{{ asset('') }}backend/vendors/scroll/scrollable-custom.js"></script>
      <script src="{{ asset('') }}backend/js/custom.js"></script>
   </body>
</html>
