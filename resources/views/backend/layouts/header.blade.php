<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0 ">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="line_icon open_miniSide d-none d-lg-block">
                    <img src="{{ asset('') }}backend/img/line_img.png" alt="">
                </div>
                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="header_notification_warp d-flex align-items-center">
                        <li>
                            <a target="_blank" class="nav-link-notify" href="{{ route('home.index') }}"> <img
                                    src="{{ asset('') }}backend/img/icon/msg.svg" alt=""> </a>
                        </li>
                        <li>
                            <a class="CHATBOX_open nav-link-notify" href="#"> <img
                                    src="{{ asset('') }}backend/img/icon/msg.svg" alt=""> </a>
                        </li>
                        <li>
                            <a class="bell_notification_clicker nav-link-notify" href="#"> <img
                                    src="{{ asset('') }}backend/img/icon/bell.svg" alt="">
                            </a>
                            <div class="Menu_NOtification_Wrap">
                                <div class="notification_Header">
                                    <h4>Notifications</h4>
                                </div>
                                <div class="Notification_body">
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('') }}backend/img/staf/2.png" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>Cool Marketing </h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('') }}backend/img/staf/4.png" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>Awesome packages</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('') }}backend/img/staf/3.png" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>what a packages</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('') }}backend/img/staf/2.png" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>Cool Marketing </h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('') }}backend/img/staf/4.png" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>Awesome packages</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('') }}backend/img/staf/3.png" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>what a packages</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="nofity_footer">
                                    <div class="submit_button text-center pt_20">
                                        <a href="#" class="btn_1 green">See More</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>

                    {{-- User photo show in top right in dashboard --}}
                    @php
                        $img_name = Auth::guard('siteuser')->user()->photo;
                        $img = '';
                        if (Auth::guard('siteuser')->user()->photo == '') {
                            if (Auth::guard('siteuser')->user()->gender == 'Male') {
                                $img = asset('storage/gender_photo/male.jpg');
                            } else {
                                $img = asset('storage/gender_photo/female.jpg');
                            }
                        } else {
                            $img = url('storage/users') . '/' . $img_name;
                        }
                    @endphp

                    <div class="profile_info d-flex align-items-center">
                        <div class="profile_thumb mr_20">
                            <img src="{{ $img }}" alt="Profile photo">
                        </div>
                        <div class="author_name">
                            <h4 class="f_s_15 f_w_500 mb-0"> {{ Auth::guard('siteuser')->user()->name }} </h4>
                            <p class="f_s_12 f_w_400"> {{ Auth::guard('siteuser')->user()->role->name }} </p>
                        </div>
                        <div class="profile_info_iner">
                            <div class="profile_author_name">
                                <p>{{ Auth::guard('siteuser')->user()->role->name }}</p>
                                <h5>{{ Auth::guard('siteuser')->user()->name }}</h5>
                            </div>
                            <div class="profile_info_details bg-info">
                                {{-- <a href="{{ route('staff-user-setting') }}">My Settings</a> --}}
                                <a href="{{ route('admin.logout.system') }}">Log Out </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
