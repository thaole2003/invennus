@extends('client.layouts.master')
@section('content')
    <div class="container mx-6" style="margin-top: 120px">
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
                                <img src="{{ asset($post->image) }}" alt="image">
                            </div>

                            <div class="article-content">
                                <ul class="entry-meta">
                                    <li><i class="far fa-user"></i> <a href="#">Comero</a></li>
                                    <li><i class="far fa-calendar-alt"></i> April 08, 2021</li>
                                    <li><i class="far fa-comment-dots"></i> 2 Comment</li>
                                </ul>

                                <h3>{{ $post->title }}</h3>

                                {!! $post->description !!}

                                <ul class="category">
                                    <li><span>Tags:</span></li>
                                    <li><a href="#">Business</a></li>
                                    <li><a href="#">Sell</a></li>
                                    <li><a href="#">Tips</a></li>
                                    <li><a href="#">Design</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="comments-area">
                            <h3 class="comments-title">2 Comments:</h3>

                            <ol class="comment-list">
                                <li class="comment">
                                    <article class="comment-body">
                                        <footer class="comment-meta">
                                            <div class="comment-author vcard">
                                                <img src="assets/img/author1.jpg" class="avatar" alt="image">
                                                <b class="fn">Comero</b>
                                                <span class="says">says:</span>
                                            </div>

                                            <div class="comment-metadata">
                                                <a href="#">
                                                    <time>April 24, 2021 at 10:59 am</time>
                                                </a>
                                            </div>
                                        </footer>

                                        <div class="comment-content">
                                            <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s,
                                                when an unknown printer took a galley of type and scrambled it to make a
                                                type
                                                specimen book.</p>
                                        </div>

                                        <div class="reply">
                                            <a href="#" class="comment-reply-link">Reply</a>
                                        </div>
                                    </article>

                                    <ol class="children">
                                        <li class="comment">
                                            <article class="comment-body">
                                                <footer class="comment-meta">
                                                    <div class="comment-author vcard">
                                                        <img src="assets/img/author2.jpg" class="avatar" alt="image">
                                                        <b class="fn">Comero</b>
                                                        <span class="says">says:</span>
                                                    </div>

                                                    <div class="comment-metadata">
                                                        <a href="#">
                                                            <time>April 24, 2021 at 10:59 am</time>
                                                        </a>
                                                    </div>
                                                </footer>

                                                <div class="comment-content">
                                                    <p>Lorem Ipsum has been the industry’s standard dummy text ever since
                                                        the
                                                        1500s, when an unknown printer took a galley of type and scrambled
                                                        it to
                                                        make a type specimen book.</p>
                                                </div>

                                                <div class="reply">
                                                    <a href="#" class="comment-reply-link">Reply</a>
                                                </div>
                                            </article>
                                        </li>

                                        <ol class="children">
                                            <li class="comment">
                                                <article class="comment-body">
                                                    <footer class="comment-meta">
                                                        <div class="comment-author vcard">
                                                            <img src="assets/img/author3.jpg" class="avatar" alt="image">
                                                            <b class="fn">Comero</b>
                                                            <span class="says">says:</span>
                                                        </div>

                                                        <div class="comment-metadata">
                                                            <a href="#">
                                                                <time>April 24, 2021 at 10:59 am</time>
                                                            </a>
                                                        </div>
                                                    </footer>

                                                    <div class="comment-content">
                                                        <p>Lorem Ipsum has been the industry’s standard dummy text ever
                                                            since
                                                            the 1500s, when an unknown printer took a galley of type and
                                                            scrambled it to make a type specimen book.</p>
                                                    </div>

                                                    <div class="reply">
                                                        <a href="#" class="comment-reply-link">Reply</a>
                                                    </div>
                                                </article>

                                                <ol class="children">
                                                    <li class="comment">
                                                        <article class="comment-body">
                                                            <footer class="comment-meta">
                                                                <div class="comment-author vcard">
                                                                    <img src="assets/img/author4.jpg" class="avatar"
                                                                        alt="image">
                                                                    <b class="fn">Comero</b>
                                                                    <span class="says">says:</span>
                                                                </div>

                                                                <div class="comment-metadata">
                                                                    <a href="#">
                                                                        <time>April 24, 2021 at 10:59 am</time>
                                                                    </a>
                                                                </div>
                                                            </footer>

                                                            <div class="comment-content">
                                                                <p>Lorem Ipsum has been the industry’s standard dummy text
                                                                    ever
                                                                    since the 1500s, when an unknown printer took a galley
                                                                    of
                                                                    type and scrambled it to make a type specimen book.</p>
                                                            </div>

                                                            <div class="reply">
                                                                <a href="#" class="comment-reply-link">Reply</a>
                                                            </div>
                                                        </article>
                                                    </li>
                                                </ol>
                                            </li>
                                        </ol>
                                    </ol>
                                </li>

                                <li class="comment">
                                    <article class="comment-body">
                                        <footer class="comment-meta">
                                            <div class="comment-author vcard">
                                                <img src="assets/img/author2.jpg" class="avatar" alt="image">
                                                <b class="fn">Comero</b>
                                                <span class="says">says:</span>
                                            </div>

                                            <div class="comment-metadata">
                                                <a href="#">
                                                    <time>April 24, 2021 at 10:59 am</time>
                                                </a>
                                            </div>
                                        </footer>

                                        <div class="comment-content">
                                            <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s,
                                                when an unknown printer took a galley of type and scrambled it to make a
                                                type
                                                specimen book.</p>
                                        </div>

                                        <div class="reply">
                                            <a href="#" class="comment-reply-link">Reply</a>
                                        </div>
                                    </article>
                                </li>
                            </ol>

                            <div class="comment-respond">
                                <h3 class="comment-reply-title">Leave a Reply</h3>

                                <form class="comment-form">
                                    <p class="comment-notes">
                                        <span id="email-notes">Your email address will not be published.</span>
                                        Required fields are marked
                                        <span class="required">*</span>
                                    </p>
                                    <p class="comment-form-comment">
                                        <label for="comment">Comment</label>
                                        <textarea name="comment" id="comment" cols="45" rows="5" maxlength="65525" required="required"></textarea>
                                    </p>
                                    <p class="comment-form-author">
                                        <label for="name">Name <span class="required">*</span></label>
                                        <input type="text" id="author" name="author" required="required">
                                    </p>
                                    <p class="comment-form-email">
                                        <label for="email">Email <span class="required">*</span></label>
                                        <input type="email" id="email" name="email" required="required">
                                    </p>
                                    <p class="comment-form-url">
                                        <label for="url">Website</label>
                                        <input type="url" id="url" name="url">
                                    </p>
                                    <p class="comment-form-cookies-consent">
                                        <input type="checkbox" value="yes" name="wp-comment-cookies-consent"
                                            id="wp-comment-cookies-consent">
                                        <label for="wp-comment-cookies-consent">Save my name, email, and website in this
                                            browser for the next time I comment.</label>
                                    </p>
                                    <p class="form-submit">
                                        <input type="submit" name="submit" id="submit" class="submit"
                                            value="Post Comment">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>

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
    </div>
@endsection
