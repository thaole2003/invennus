@extends('client.layouts.master')
@section('content')
    <div class="container mx-6" style="margin-top: 120px">
        <h3 style="text-align: center;padding-bottom:10px"> Tin tức</h3>
        <div class="page-title-area">
            <div class="container">
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li>Tin tức</li>
                </ul>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start News Area -->
        <section class="news-area ptb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-blog-post">
                                        <div class="blog-image">
                                            <a href="{{ route('post.detail', $post->id) }}"><img style="width:400px;height:350px"
                                                    src="{{ asset($post->image) }}" alt="image"></a>

                                            {{-- <div class="post-tag">
                                                <a href="#">Shop</a>
                                            </div> --}}
                                        </div>

                                        <div class="blog-post-content">
                                            <span class="date">{{ $post->created_at->format('M d, Y') }}</span>
                                            <h3><a href="{{ route('post.detail', $post->id) }}">{{ $post->title }}</a></h3>

                                            <a href="{{ route('post.detail', $post->id) }}" class="read-more-btn">Đọc chi tiết
                                                <i class="icofont-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{--
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post">
                                <div class="blog-image">
                                    <a href="#"><img src="assets/img/blog2.jpg" alt="image"></a>

                                    <div class="post-tag">
                                        <a href="#">Inspiration</a>
                                    </div>
                                </div>

                                <div class="blog-post-content">
                                    <span class="date">27 Feb, 2021</span>
                                    <h3><a href="#">The Best Marketing top use Management Tools</a></h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum.</p>
                                    <a href="#" class="read-more-btn">Read More <i
                                            class="icofont-double-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post">
                                <div class="blog-image">
                                    <a href="#"><img src="assets/img/blog3.jpg" alt="image"></a>

                                    <div class="post-tag">
                                        <a href="#">Sell</a>
                                    </div>
                                </div>

                                <div class="blog-post-content">
                                    <span class="date">28 Feb, 2021</span>
                                    <h3><a href="#">3 WooCommerce Plugins to Boost Sales</a></h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum.</p>
                                    <a href="#" class="read-more-btn">Read More <i
                                            class="icofont-double-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post">
                                <div class="blog-image">
                                    <a href="#"><img src="assets/img/blog4.jpg" alt="image"></a>

                                    <div class="post-tag">
                                        <a href="#">Marketing</a>
                                    </div>
                                </div>

                                <div class="blog-post-content">
                                    <span class="date">29 Feb, 2021</span>
                                    <h3><a href="#">Top 21 Must-Read Blogs For Creative Agencies</a></h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum.</p>
                                    <a href="#" class="read-more-btn">Read More <i
                                            class="icofont-double-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post">
                                <div class="blog-image">
                                    <a href="#"><img src="assets/img/blog5.jpg" alt="image"></a>

                                    <div class="post-tag">
                                        <a href="#">Shop</a>
                                    </div>
                                </div>

                                <div class="blog-post-content">
                                    <span class="date">25 Feb, 2021</span>
                                    <h3><a href="#">The Most Popular New top Business Apps</a></h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum.</p>
                                    <a href="#" class="read-more-btn">Read More <i
                                            class="icofont-double-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post">
                                <div class="blog-image">
                                    <a href="#"><img src="assets/img/blog6.jpg" alt="image"></a>

                                    <div class="post-tag">
                                        <a href="#">Inspiration</a>
                                    </div>
                                </div>

                                <div class="blog-post-content">
                                    <span class="date">27 Feb, 2021</span>
                                    <h3><a href="#">The Best Marketing top use Management Tools</a></h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum.</p>
                                    <a href="#" class="read-more-btn">Read More <i
                                            class="icofont-double-right"></i></a>
                                </div>
                            </div>
                        </div> --}}

                            <div class="col-lg-12 col-md-12">
                            </div>
                            {{-- <div class="pagination-area">
                                    <a href="#" class="prev page-numbers"><i class="fas fa-angle-double-left"></i></a>
                                    <a href="#" class="page-numbers">1</a>
                                    <span class="page-numbers current" aria-current="page">2</span>
                                    <a href="#" class="page-numbers">3</a>
                                    <a href="#" class="page-numbers">4</a>
                                    <a href="#" class="next page-numbers"><i
                                            class="fas fa-angle-double-right"></i></a>
                                </div> --}}

                        </div>
                    </div>
                    {{ $posts->links() }}
                    <div class="col-lg-4 col-md-12">
                        @if ($ads)
                        @foreach ($ads as $item)
                        <div class="product-single-aside"  style="margin-top:20px">

                            <div class="aside-trending-products">
                                <img src="{{ asset($item->image)  }}"
                                    alt="image">

                                <div class="category">
                                    <h4>{{ $item->title }}</h4>
                                    <span>{{ $item->description }}</span>
                                </div>

                                <a href="#"></a>
                            </div>
                        </div>
                        @endforeach

                        @endif

                    </div>
                </div>
            </div>
        </section>
        <!-- End News Area -->
    </div>
@endsection
