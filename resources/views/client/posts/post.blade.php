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
                                            <a href="{{ route('post.detail', $post->slug) }}"><img style="width:100%;height:100%"
                                                    src="{{ asset($post->image) }}" alt="image"></a>

                                            {{-- <div class="post-tag">
                                                <a href="#">Shop</a>
                                            </div> --}}
                                        </div>

                                        <div class="blog-post-content">
                                            <span class="date">{{ $post->created_at->format('M d, Y') }}</span>
                                            <h3><a style="min-height: 55px" href="{{ route('post.detail', $post->slug) }}">{!! mb_strimwidth($post->title, 0, 75, '...') !!}</a></h3>

                                            <a href="{{ route('post.detail', $post->id) }}" class="read-more-btn">Đọc chi tiết
                                                <i class="icofont-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
