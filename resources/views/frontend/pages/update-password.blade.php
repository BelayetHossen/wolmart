@extends('frontend.layouts.app')


@Section('main-content')




            <!-- Start of Main -->
            <main class="main mb-10 pb-1">
                <!-- Start of Breadcrumb -->
                <nav class="breadcrumb-nav container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="{{ route('home.index') }}">Home</a></li>
                        <li>Reset password</li>
                    </ul><hr>
                </nav>
                <!-- End of Breadcrumb -->

                <!-- Start of Page Content -->
                <div class="page-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 m-auto">
                                <style>
                                    .red-color{
                                        border:2px solid rgb(255, 0, 0)!important;
                                    }
                                    .green-color{
                                        border:2px solid rgb(51, 218, 0)!important;
                                    }
                                </style>
                                <div class="card">
                                    <div class="card-body update-content">

                                        <form class="password_reset_update_form" method="post">
                                            @csrf
                                            <div class="form-group mb-6">
                                                <label for="password">New Password *</label>
                                                <input type="text" id="password" name="password" class="form-control">
                                                <input type="hidden" id="email" name="email" value="{{ $email }}">
                                                <input type="hidden" id="token" name="token" value="{{ $token }}">
                                                <div class="password-msg"></div>
                                            </div>
                                            <div class="form-group mb-6">
                                                <label for="conf_password">Confirm Password *</label>
                                                <input type="text" id="conf_password" name="conf_password" class="form-control">
                                                <div class="password-conf"></div>
                                                <div class="password-check"></div>
                                            </div>

                                            <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4 btn-block">Update password</button>
                                        </form>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Page Content -->
            </main>
            <!-- End of Main -->









        {{-- <!-- Root element of PhotoSwipe. Must have class pswp -->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <!-- Background of PhotoSwipe. It's a separate element as animating opacity is faster than rgba(). -->
            <div class="pswp__bg"></div>

            <!-- Slides wrapper with overflow:hidden. -->
            <div class="pswp__scroll-wrap">
                <!-- Container that holds slides.
			PhotoSwipe keeps only 3 of them in the DOM to save memory.
			Don't modify these 3 pswp__item elements, data is added later on. -->
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>

                <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <!--  Controls are self-explanatory. Order can be changed. -->

                        <div class="pswp__counter"></div>

                        <button class="pswp__button pswp__button--close" aria-label="Close (Esc)"></button>
                        <button class="pswp__button pswp__button--zoom" aria-label="Zoom in/out"></button>

                        <div class="pswp__preloader">
                            <div class="loading-spin"></div>
                        </div>
                    </div>

                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div>

                    <button class="pswp__button--arrow--left" aria-label="Previous (arrow left)"></button>
                    <button class="pswp__button--arrow--right" aria-label="Next (arrow right)"></button>

                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PhotoSwipe --> --}}








@endsection
