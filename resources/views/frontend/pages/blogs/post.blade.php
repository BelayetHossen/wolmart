@extends('frontend.layouts.app')


@Section('main-content')





<main class="main">

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-6">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home.index') }}">Home</a></li>
                <li>Blog</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content mb-8">
        <div class="container">
            <div class="row gutter-lg">


                <div class="main-content post-single-content">
                    <div class="post post-grid post-single">
                        <figure class="post-media br-sm">
                            <img src="{{ asset('').'storage/posts/'.$post->image }}" alt="Blog" width="930" height="500" />
                        </figure>
                        <div class="post-details">
                            <div class="post-meta">
                                by <a href="#" class="post-author">{{ $post->getPublisher->name }}</a> - <a href="#" class="post-date">{{ $post->updated_at }}</a>
                                <a href="#" class="post-comment"><i class="w-icon-comments"></i><span>0</span>Comments</a>
                            </div>
                            <h2 class="post-title"><a href="#">{{ $post->title }}</a></h2>
                            <div class="post-content">
                                <p>{!! htmlspecialchars_decode($post->long_desc) !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="tags">
                        <label class="text-dark mr-2">Tags:</label>
                        @foreach (json_decode($post->tags) as $tag)
                        <a href="#" class="tag">{{ $tag }}</a>
                        @endforeach
                    </div>
                    <!-- End Tag -->
                    <div class="social-links mb-10">
                        <div class="social-icons social-no-color border-thin">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                            <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                            <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                        </div>
                    </div>
                    <!-- End Social Links -->
                    <div class="post-author-detail">
                        <figure class="author-media mr-4">
                            @php
                            $img = '';
                                if ($post->getPublisher->photo == null) {

                                    if ($post->getPublisher->gender == 'Male') {
                                    $img = asset('').'storage/gender_photo/male.jpg';
                                    } else {
                                    $img = asset('').'storage/gender_photo/female.jpg';
                                    }

                                } else {
                                    $img = asset('').'storage/users/'.$post->getPublisher->photo;
                                }

                            @endphp
                            <img src="{{ $img }}" alt="Author" width="105" height="105" />
                        </figure>
                        <div class="author-details">
                            <div class="author-name-wrapper flex-wrap mb-2">
                                <h4 class="author-name font-weight-bold mb-2 pr-4 mr-auto">
                                    {{ $post->getPublisher->name }}
                                    <span class="font-weight-normal text-default">(AUTHOR)</span>
                                </h4>
                                <a href="#" class="btn btn-primary btn-link btn-icon-right pb-0 text-normal font-weight-normal mb-2">More Posts by admin<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                            <p class="mb-0">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismoder eu pulvinar nunc sapien ornare nisl. Ped earcudaap ibuseu, fermentum et, dapibus sed, urna. Morbi interdum mollis sapien.</p>
                        </div>
                    </div>
                    <!-- End Post Author Detail -->
                    <div class="post-navigation">
                        <div class="nav nav-prev">
                            <a href="#" class="align-items-start text-left">
                                <span><i class="w-icon-long-arrow-left"></i>previous post</span>
                                <span class="nav-content mb-0 text-normal">Vivamus vestibulum ntulla nec ante</span>
                            </a>
                        </div>
                        <div class="nav nav-next">
                            <a href="#" class="align-items-end text-right">
                                <span>next post<i class="w-icon-long-arrow-right"></i></span>
                                <span class="nav-content mb-0 text-normal">Fusce lacinia arcuet nulla</span>
                            </a>
                        </div>
                    </div>
                    <!-- End Post Navigation -->
                    <h4 class="title title-lg font-weight-bold mt-10 pt-1 mb-5">Related Posts</h4>
                    <div class="swiper">
                        <div
                            class="post-slider swiper-container swiper-theme nav-top pb-2 swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events"
                            data-swiper-options="{
                                        'spaceBetween': 20,
                                        'slidesPerView': 1,
                                        'breakpoints': {
                                            '576': {
                                                'slidesPerView': 2
                                            },
                                            '768': {
                                                'slidesPerView': 3
                                            },
                                            '992': {
                                                'slidesPerView': 2
                                            },
                                            '1200': {
                                                'slidesPerView': 3
                                            }
                                        }
                                    }"
                        >
                            <div class="swiper-wrapper" id="swiper-wrapper-3f41c210cbc247105c" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                                <div class="swiper-slide post post-grid swiper-slide-active" role="group" aria-label="1 / 4" style="width: 296.667px; margin-right: 20px;">
                                    <figure class="post-media br-sm">
                                        <a href="post-single.html">
                                            <img src="{{asset('')}}frontend/assets/images/blog/single/2.jpg" alt="Post" width="296" height="190" style="background-color: #bcbcb4;" />
                                        </a>
                                    </figure>
                                    <div class="post-details text-center">
                                        <div class="post-meta">by <a href="#" class="post-author">Logan Cee</a> - <a href="#" class="post-date">03.05.2021</a></div>
                                        <h4 class="post-title mb-3"><a href="post-single.html">Fashion tell about who you are from...</a></h4>
                                        <a href="post-single.html" class="btn btn-link btn-dark btn-underline font-weight-normal">Read More<i class="w-icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="swiper-slide post post-grid swiper-slide-next" role="group" aria-label="2 / 4" style="width: 296.667px; margin-right: 20px;">
                                    <figure class="post-media br-sm">
                                        <a href="post-single.html">
                                            <img src="{{asset('')}}frontend/assets/images/blog/single/3.jpg" alt="Post" width="296" height="190" style="background-color: #cad2d1;" />
                                        </a>
                                    </figure>
                                    <div class="post-details text-center">
                                        <div class="post-meta">by <a href="#" class="post-author">Hilary Kreton</a> - <a href="#" class="post-date">03.05.2021</a></div>
                                        <h4 class="post-title mb-3"><a href="post-single.html">Comes a cool blog post with Images</a></h4>
                                        <a href="post-single.html" class="btn btn-link btn-dark btn-underline font-weight-normal">Read More<i class="w-icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="swiper-slide post post-grid" role="group" aria-label="3 / 4" style="width: 296.667px; margin-right: 20px;">
                                    <figure class="post-media br-sm">
                                        <a href="post-single.html">
                                            <img src="{{asset('')}}frontend/assets/images/blog/single/4.jpg" alt="Post" width="296" height="190" style="background-color: #ececec;" />
                                        </a>
                                    </figure>
                                    <div class="post-details text-center">
                                        <div class="post-meta">by <a href="#" class="post-author">Casper Dailn</a> - <a href="#" class="post-date">03.05.2021</a></div>
                                        <h4 class="post-title mb-3"><a href="post-single.html">Comes a cool blog post with Images</a></h4>
                                        <a href="post-single.html" class="btn btn-link btn-dark btn-underline font-weight-normal">Read More<i class="w-icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="swiper-slide post post-grid" role="group" aria-label="4 / 4" style="width: 296.667px; margin-right: 20px;">
                                    <figure class="post-media br-sm">
                                        <a href="post-single.html">
                                            <img src="{{asset('')}}frontend/assets/images/blog/single/5.jpg" alt="Post" width="296" height="190" style="background-color: #afafaf;" />
                                        </a>
                                    </figure>
                                    <div class="post-details text-center">
                                        <div class="post-meta">by <a href="#" class="post-author">John Doe</a> - <a href="#" class="post-date">03.05.2021</a></div>
                                        <h4 class="post-title mb-3"><a href="post-single.html">We want to be different and fashion gives to me that outlet</a></h4>
                                        <a href="post-single.html" class="btn btn-link btn-dark btn-underline font-weight-normal">Read More<i class="w-icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <button class="swiper-button-next" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-3f41c210cbc247105c" aria-disabled="false"></button>
                            <button class="swiper-button-prev swiper-button-disabled" disabled="" tabindex="-1" aria-label="Previous slide" aria-controls="swiper-wrapper-3f41c210cbc247105c" aria-disabled="true"></button>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                    <!-- End Related Posts -->

                    <h4 class="title title-lg font-weight-bold pt-1 mt-10">3 Comments</h4>
                    <ul class="comments list-style-none pl-0">
                        <li class="comment">
                            <div class="comment-body">
                                <figure class="comment-avatar">
                                    <img src="{{asset('')}}frontend/assets/images/blog/single/1.png" alt="Avatar" width="90" height="90" />
                                </figure>
                                <div class="comment-content">
                                    <h4 class="comment-author font-weight-bold">
                                        <a href="#">John Doe</a>
                                        <span class="comment-date">Aug 23, 2021 at 10:46 am</span>
                                    </h4>
                                    <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl.arcu fer ment umet, dapibus sed, urna.</p>
                                    <a href="#" class="btn btn-dark btn-link btn-underline btn-icon-right btn-reply">Reply<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="comment">
                            <div class="comment-body">
                                <figure class="comment-avatar">
                                    <img src="{{asset('')}}frontend/assets/images/blog/single/2.png" alt="Avatar" width="90" height="90" />
                                </figure>
                                <div class="comment-content">
                                    <h4 class="comment-author font-weight-bold">
                                        <a href="#">Semi Colon</a>
                                        <span class="comment-date">Aug 24, 2021 at 13:25 am</span>
                                    </h4>
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales.</p>
                                    <a href="#" class="btn btn-dark btn-link btn-underline btn-icon-right btn-reply">Reply<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="comment">
                            <div class="comment-body">
                                <figure class="comment-avatar">
                                    <img src="{{asset('')}}frontend/assets/images/blog/single/1.png" alt="Avatar" width="90" height="90" />
                                </figure>
                                <div class="comment-content">
                                    <h4 class="comment-author font-weight-bold">
                                        <a href="#">John Doe</a>
                                        <span class="comment-date">Aug 23, 2021 at 10:46 am</span>
                                    </h4>
                                    <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl.arcu fer ment umet, dapibus sed, urna.</p>
                                    <a href="#" class="btn btn-dark btn-link btn-underline btn-icon-right btn-reply">Reply<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- End Comments -->
                    <form class="reply-section pb-4">
                        <h4 class="title title-md font-weight-bold pt-1 mt-10 mb-0">Leave a Reply</h4>
                        <p>Your email address will not be published. Required fields are marked</p>
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <input type="text" class="form-control" placeholder="Enter Your Name" id="name" />
                            </div>
                            <div class="col-sm-6 mb-4">
                                <input type="text" class="form-control" placeholder="Enter Your Email" id="email_1" />
                            </div>
                        </div>
                        <textarea cols="30" rows="6" placeholder="Write a Comment" class="form-control mb-4" id="comment"></textarea>
                        <button class="btn btn-dark btn-rounded btn-icon-right btn-comment">Post Comment<i class="w-icon-long-arrow-right"></i></button>
                    </form>
                </div>
                <!-- End of Main Content -->

                <aside class="sidebar right-sidebar blog-sidebar sidebar-fixed sticky-sidebar-wrapper">
                    <div class="sidebar-overlay">
                        <a href="#" class="sidebar-close">
                            <i class="close-icon"></i>
                        </a>
                    </div>
                    <a href="#" class="sidebar-toggle">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <div class="sidebar-content">
                        <div class="pin-wrapper" style="height: 1517.42px;">
                            <div class="sticky-sidebar" style="border-bottom: 0px none rgb(102, 102, 102); width: 280px;">

                                <div class="widget widget-search-form">
                                    <div class="widget-body">
                                        <form action="#" method="GET" class="input-wrapper input-wrapper-inline">
                                            <input type="text" class="form-control" placeholder="Search in Blog" autocomplete="off" required="" />
                                            <button class="btn btn-search"><i class="w-icon-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <!-- End of Widget search form -->
                                        <div class="widget widget-categories mb-0">
                                            <h3 class="widget-title bb-no">Categories</h3>
                                            <ul class="widget-body filter-items search-ul">
                                                @foreach ($cats_1 as $cat_1)
                                                <li><a href="blog.html">{{ $cat_1->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget categories -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="widget widget-posts">
                                            <h3 class="widget-title bb-no">Popular Posts</h3>
                                            <div class="widget-body">
                                                <div class="swiper">
                                                    <div
                                                        class="swiper-container swiper-theme nav-top swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events"
                                                        data-swiper-options="{
                                                                'spaceBetween': 20,
                                                                'slidesPerView': 1
                                                            }"
                                                    >
                                                        <div class="swiper-wrapper" id="swiper-wrapper-4aa1f57561c13cb10" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                                                            <div class="swiper-slide widget-col swiper-slide-active" role="group" aria-label="1 / 2" style="width: 280px; margin-right: 20px;">
                                                                <div class="post-widget mb-4">
                                                                    <figure class="post-media br-sm">
                                                                        <img src="{{asset('')}}frontend/assets/images/blog/sidebar/1.jpg" alt="150" height="150" />
                                                                    </figure>
                                                                    <div class="post-details">
                                                                        <div class="post-meta">
                                                                            <a href="#" class="post-date">March 1, 2021</a>
                                                                        </div>
                                                                        <h4 class="post-title">
                                                                            <a href="post-single.html">Fashion tells about who you are from external point</a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="post-widget mb-4">
                                                                    <figure class="post-media br-sm">
                                                                        <img src="{{asset('')}}frontend/assets/images/blog/sidebar/2.jpg" alt="150" height="150" />
                                                                    </figure>
                                                                    <div class="post-details">
                                                                        <div class="post-meta">
                                                                            <a href="#" class="post-date">March 5, 2021</a>
                                                                        </div>
                                                                        <h4 class="post-title">
                                                                            <a href="post-single.html">New found the men dress for summer</a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="post-widget mb-2">
                                                                    <figure class="post-media br-sm">
                                                                        <img src="{{asset('')}}frontend/assets/images/blog/sidebar/3.jpg" alt="150" height="150" />
                                                                    </figure>
                                                                    <div class="post-details">
                                                                        <div class="post-meta">
                                                                            <a href="#" class="post-date">March 1, 2021</a>
                                                                        </div>
                                                                        <h4 class="post-title">
                                                                            <a href="post-single.html">Cras ornare tristique elit</a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide widget-col swiper-slide-next" role="group" aria-label="2 / 2" style="width: 280px; margin-right: 20px;">
                                                                <div class="post-widget mb-4">
                                                                    <figure class="post-media br-sm">
                                                                        <img src="{{asset('')}}frontend/assets/images/blog/sidebar/4.jpg" alt="150" height="150" />
                                                                    </figure>
                                                                    <div class="post-details">
                                                                        <div class="post-meta">
                                                                            <a href="#" class="post-date">March 1, 2021</a>
                                                                        </div>
                                                                        <h4 class="post-title">
                                                                            <a href="post-single.html">Vivamus vestibulum ntulla nec ante</a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="post-widget mb-4">
                                                                    <figure class="post-media br-sm">
                                                                        <img src="{{asset('')}}frontend/assets/images/blog/sidebar/5.jpg" alt="150" height="150" />
                                                                    </figure>
                                                                    <div class="post-details">
                                                                        <div class="post-meta">
                                                                            <a href="#" class="post-date">March 5, 2021</a>
                                                                        </div>
                                                                        <h4 class="post-title">
                                                                            <a href="post-single.html">Fusce lacinia arcuet nulla</a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="post-widget mb-2">
                                                                    <figure class="post-media br-sm">
                                                                        <img src="{{asset('')}}frontend/assets/images/blog/sidebar/6.jpg" alt="150" height="150" />
                                                                    </figure>
                                                                    <div class="post-details">
                                                                        <div class="post-meta">
                                                                            <a href="#" class="post-date">March 1, 2021</a>
                                                                        </div>
                                                                        <h4 class="post-title">
                                                                            <a href="post-single.html">Comes a cool blog post with Images</a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-4aa1f57561c13cb10" aria-disabled="false"></div>
                                                        <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-4aa1f57561c13cb10" aria-disabled="true"></div>
                                                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget posts -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="widget widget-tags">
                                            <h3 class="widget-title bb-no">Browse Tags</h3>
                                            <div class="widget-body tags">
                                                @foreach ($tags as $tag)
                                                <a href="#" class="tag">{{ $tag->name }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="widget widget-calendar">
                                            <h3 class="widget-title bb-no">Calendar</h3>
                                            <div class="widget-body">
                                                <div
                                                    class="calendar-container"
                                                    data-calendar-options="{
                                                            'dayExcerpt': 1
                                                        }"
                                                >
                                                    <div class="calendar">
                                                        <div class="calendar-header">
                                                            <a href="#" class="btn-calendar btn-calendar-prev"><i class="la la-angle-left"></i></a><span class="calendar-title">August 2022</span>
                                                            <a href="#" class="btn-calendar btn-calendar-next"><i class="la la-angle-right"></i></a>
                                                        </div>
                                                        <table>
                                                            <thead>
                                                                <th class="holiday">s</th>
                                                                <th>m</th>
                                                                <th>t</th>
                                                                <th>w</th>
                                                                <th>t</th>
                                                                <th>f</th>
                                                                <th>s</th>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><span class="day disabled" data-date="2022-07-30T18:00:00.000Z">31</span></td>
                                                                    <td><span class="day" data-date="2022-07-31T18:00:00.000Z">1</span></td>
                                                                    <td><span class="day" data-date="2022-08-01T18:00:00.000Z">2</span></td>
                                                                    <td><span class="day" data-date="2022-08-02T18:00:00.000Z">3</span></td>
                                                                    <td><span class="day" data-date="2022-08-03T18:00:00.000Z">4</span></td>
                                                                    <td><span class="day" data-date="2022-08-04T18:00:00.000Z">5</span></td>
                                                                    <td><span class="day" data-date="2022-08-05T18:00:00.000Z">6</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="day" data-date="2022-08-06T18:00:00.000Z">7</span></td>
                                                                    <td><span class="day" data-date="2022-08-07T18:00:00.000Z">8</span></td>
                                                                    <td><span class="day" data-date="2022-08-08T18:00:00.000Z">9</span></td>
                                                                    <td><span class="day" data-date="2022-08-09T18:00:00.000Z">10</span></td>
                                                                    <td><span class="day" data-date="2022-08-10T18:00:00.000Z">11</span></td>
                                                                    <td><span class="day" data-date="2022-08-11T18:00:00.000Z">12</span></td>
                                                                    <td><span class="day" data-date="2022-08-12T18:00:00.000Z">13</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="day" data-date="2022-08-13T18:00:00.000Z">14</span></td>
                                                                    <td><span class="day" data-date="2022-08-14T18:00:00.000Z">15</span></td>
                                                                    <td><span class="day" data-date="2022-08-15T18:00:00.000Z">16</span></td>
                                                                    <td><span class="day" data-date="2022-08-16T18:00:00.000Z">17</span></td>
                                                                    <td><span class="day" data-date="2022-08-17T18:00:00.000Z">18</span></td>
                                                                    <td><span class="day" data-date="2022-08-18T18:00:00.000Z">19</span></td>
                                                                    <td><span class="day" data-date="2022-08-19T18:00:00.000Z">20</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="day today" data-date="2022-08-20T18:00:00.000Z">21</span></td>
                                                                    <td><span class="day" data-date="2022-08-21T18:00:00.000Z">22</span></td>
                                                                    <td><span class="day" data-date="2022-08-22T18:00:00.000Z">23</span></td>
                                                                    <td><span class="day" data-date="2022-08-23T18:00:00.000Z">24</span></td>
                                                                    <td><span class="day" data-date="2022-08-24T18:00:00.000Z">25</span></td>
                                                                    <td><span class="day" data-date="2022-08-25T18:00:00.000Z">26</span></td>
                                                                    <td><span class="day" data-date="2022-08-26T18:00:00.000Z">27</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="day" data-date="2022-08-27T18:00:00.000Z">28</span></td>
                                                                    <td><span class="day" data-date="2022-08-28T18:00:00.000Z">29</span></td>
                                                                    <td><span class="day" data-date="2022-08-29T18:00:00.000Z">30</span></td>
                                                                    <td><span class="day" data-date="2022-08-30T18:00:00.000Z">31</span></td>
                                                                    <td><span class="day disabled" data-date="2022-08-31T18:00:00.000Z">1</span></td>
                                                                    <td><span class="day disabled" data-date="2022-09-01T18:00:00.000Z">2</span></td>
                                                                    <td><span class="day disabled" data-date="2022-09-02T18:00:00.000Z">3</span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>


    <!-- End of Page Content -->
</main>



@endsection
