@extends('client.layouts.master')
@section('content')
    <div class="container mx-6" style="margin-top: 120px">

        <div class="page-title-area">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Blog</li>
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
                                            <a href="{{ route('post.detail', $post->id) }}"><img
                                                    src="{{ asset($post->image) }}" alt="image"></a>

                                            {{-- <div class="post-tag">
                                                <a href="#">Shop</a>
                                            </div> --}}
                                        </div>

                                        <div class="blog-post-content">
                                            <span class="date">{{ $post->created_at->format('M d, Y') }}</span>
                                            <h3><a href="{{ route('post.detail', $post->id) }}">{{ $post->title }}</a></h3>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem
                                                Ipsum.</p>
                                            <a href="{{ route('post.detail', $post->id) }}" class="read-more-btn">Read More
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
                        <aside class="widget-area" id="secondary">
                            <section class="widget widget_comero_posts_thumb">
                                <h3 class="widget-title">Popular Posts</h3>

                                <article class="item">
                                    <a href="#" class="thumb">
                                        <span class="fullimage cover bg1" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <time datetime="2021-06-30">June 30, 2021</time>
                                        <h4 class="title usmall"><a href="#">How to change yourself for the
                                                better.</a>
                                        </h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>

                                <article class="item">
                                    <a href="#" class="thumb">
                                        <span class="fullimage cover bg2" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <time datetime="2021-06-30">June 30, 2021</time>
                                        <h4 class="title usmall"><a href="#">10 Tactics for marketing your
                                                company.</a>
                                        </h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>

                                <article class="item">
                                    <a href="#" class="thumb">
                                        <span class="fullimage cover bg3" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <time datetime="2021-06-30">June 30, 2021</time>
                                        <h4 class="title usmall"><a href="#">Google web ranking changing much.</a>
                                        </h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>
                            </section>

                            <section class="widget widget_recent_comments">
                                <h3 class="widget-title">Recent Comments</h3>

                                <ul>
                                    <li>
                                        <span class="comment-author-link">
                                            <a href="#">A WordPress Commenter</a>
                                        </span>
                                        on
                                        <a href="#">Hello world!</a>
                                    </li>
                                    <li>
                                        <span class="comment-author-link">
                                            <a href="#">Comero</a>
                                        </span>
                                        on
                                        <a href="#">Hello world!</a>
                                    </li>
                                    <li>
                                        <span class="comment-author-link">
                                            <a href="#">Wordpress</a>
                                        </span>
                                        on
                                        <a href="#">Hello world!</a>
                                    </li>
                                    <li>
                                        <span class="comment-author-link">
                                            <a href="#">A WordPress Commenter</a>
                                        </span>
                                        on
                                        <a href="#">Hello world!</a>
                                    </li>
                                    <li>
                                        <span class="comment-author-link">
                                            <a href="#">Comero</a>
                                        </span>
                                        on
                                        <a href="#">Hello world!</a>
                                    </li>
                                </ul>
                            </section>

                            <section class="widget widget_recent_entries">
                                <h3 class="widget-title">Recent Posts</h3>

                                <ul>
                                    <li><a href="#">How to Become a Successful Entry Level UX Designer</a></li>
                                    <li><a href="#">How to start your business as an entrepreneur</a></li>
                                    <li><a href="#">How to be a successful entrepreneur</a></li>
                                    <li><a href="#">How to Become a Successful Entry Level UX Designer</a></li>
                                    <li><a href="#">Protect your workplace from cyber attacks</a></li>
                                </ul>
                            </section>

                            <section class="widget widget_archive">
                                <h3 class="widget-title">Archives</h3>

                                <ul>
                                    <li><a href="#">May 2021</a></li>
                                    <li><a href="#">April 2021</a></li>
                                    <li><a href="#">June 2021</a></li>
                                </ul>
                            </section>

                            <section class="widget widget_categories">
                                <h3 class="widget-title">Categories</h3>

                                <ul>
                                    <li><a href="#">Business</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Shop</a></li>
                                    <li><a href="#">Tips</a></li>
                                    <li><a href="#">Uncategorized</a></li>
                                </ul>
                            </section>

                            <section class="widget widget_meta">
                                <h3 class="widget-title">Meta</h3>

                                <ul>
                                    <li><a href="#">Log in</a></li>
                                    <li><a href="#">Entries <abbr title="Really Simple Syndication">RSS</abbr></a>
                                    </li>
                                    <li><a href="#">Comments <abbr title="Really Simple Syndication">RSS</abbr></a>
                                    </li>
                                    <li><a href="#">WordPress.org</a></li>
                                </ul>
                            </section>

                            <section class="widget widget_tag_cloud">
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
                            </section>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- End News Area -->
    </div>
@endsection
