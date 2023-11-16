@extends('client.layouts.master')
@section('content')
    <div class="container mx-6" style="margin-top: 120px">
            <h3 style="text-align: center;padding-bottom:10px">{{   $post->user->name  }} </h3>

        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="container">
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li>{{ $post->title }}</li>
                </ul>
            </div>
        </div>
        <section class="blog-details-area ptb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="blog-details">
                            <div class="article-img">
                                <img  style="width:850px;height:650px" src="{{ asset($post->image) }}" alt="image">
                            </div>

                            <div class="article-content">
                                <ul class="entry-meta">
                                    <li><i class="far fa-user"></i> <a href="#">{{ $post->user->name }}</a></li>
                                    <li><i class="far fa-calendar-alt"></i> {{  $post->created_at->format('Y-m-d') }}</li>
                                </ul>

                                <h3>{{ $post->title }}</h3>

                                {!! $post->description !!}

                                {{-- <ul class="category">
                                    <li><span>Tags:</span></li>
                                    <li><a href="#">Business</a></li>
                                    <li><a href="#">Sell</a></li>
                                    <li><a href="#">Tips</a></li>
                                    <li><a href="#">Design</a></li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <aside class="widget-area" id="secondary">
                            <section class="widget widget_comero_posts_thumb">
                                @if (count($posts)>0)
                                <h3 class="widget-title">Bài viết phổ biến</h3>
                                @foreach ( $posts as $post )
                                <article class="item">
                                    <a href="{{ route('post.detail', $post->id) }}" class="thumb">
                                        <img src="{{ asset($post->image)  }}" alt="">
                                        <span class="fullimage cover " role="img"></span>
                                    </a>
                                    <div class="info">
                                        <time datetime="2021-06-30">{{ $post->created_at->format('Y-m-d')  }}</time>
                                        <h4 class="title usmall"><a href="#">{{ $post->title }}.</a>
                                        </h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>
                                @endforeach
                                @endif


                            </section>
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

                            {{-- <section class="widget widget_tag_cloud">
                                <h3 class="widget-title">Tags</h3>

                                <div class="tagcloud">
                                    <a href="#">Business <span class="tag-link-count"> (3)</span></a>
                                    <a href="#">Design <span class="tag-link-count"> (3)</span></a>
                                    <a href="#">IT <span class="tag-link-count"> (2)</span></a>
                                    <a href="#">Marketing <span class="tag-link-count"> (2)</span></a>
                                    <a href="#">Mobile <span class="tag-link-count"> (1)</span></a>
                                    <a href="#">Protect <span class="tag-link-count"> (1)</span></a>
                                    <a href="#">Startup <span class="tag-link-count"> (1)</span></a>
                                    <a href="#">Tips <span class="tag-link-count"> (2)</span></a>
                                </div>
                            </section> --}}
                        </aside>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
