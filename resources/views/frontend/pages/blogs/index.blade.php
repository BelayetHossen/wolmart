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
    <div class="page-content mb-10 pb-2">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content">
                    <div class="row cols-sm-2">
                        @foreach ($posts as $post)
                        <article class="post post-grid-type overlay-zoom mb-6 fashion">
                            <figure class="post-media br-sm">
                                <a href="{{ url('/blog').'/'.$post->slug }}">
                                    <img src="{{ asset('').'storage/posts/'.$post->image }}" width="600" height="420" alt="blog" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">{{ $post->mainCat->name }}</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="{{ url('/blog').'/'.$post->slug }}">{{ $post->title }}</a>
                                </h4>
                                <div class="post-content">
                                    <p>
                                        {!! htmlspecialchars_decode(mb_strimwidth($post->long_desc, 0, 100)) !!}
                                    </p>
                                    <a href="{{ url('/blog').'/'.$post->slug }}" class="btn btn-link btn-danger">....(read more)</a>
                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">{{ $post->getPublisher->name }}</a> - <a href="#" class="post-date">{{ $post->updated_at }}</a>
                                    <a href="#" class="post-comment"><i class="w-icon-comments"></i><span>7</span>Comments</a>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>
                    <ul class="pagination justify-content-center">
                        <li class="prev disabled">
                            <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true"> <i class="w-icon-long-arrow-left"></i>Prev </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="next">
                            <a href="#" aria-label="Next"> Next<i class="w-icon-long-arrow-right"></i> </a>
                        </li>
                    </ul>
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
