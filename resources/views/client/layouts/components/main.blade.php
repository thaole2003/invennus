@extends('client.layouts.master')

@section('content')

    <!-- Start Facility Area -->
    <!-- End Navbar Area -->

    <div class="home-slides-two owl-carousel owl-theme">

        @foreach ($banners as $banner)
            <div class="banner-section jarallax" style="background-image: url({{ $banner->image }})"
                data-jarallax='{"speed": 0.3}'>
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="banner-content">
                                <span class="sub-title">{{ $banner->meta_title }}</span>
                                <h1>{{ $banner->title }}</h1>
                                <p>{{ $banner->description }}</p>
                                {{-- <a href="#" class="btn btn-primary">Shop women's</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <section class="facility-area black-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="facility-box">
                        <div class="icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h3>Thanh toán khi nhận hàng (COD)</h3>
                        <p class="text-white">Giao hàng toàn quốc.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="facility-box">
                        <div class="icon">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <h3>Đổi hàng miễn phí</h3>
                        <p class="text-white">Trong 30 ngày kể từ ngày mua.</p>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="facility-box">
                        <div class="icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h3>Miễn phí giao hàng</h3>
                        <p class="text-white">Với đơn hàng trên 599.000đ..</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="facility-box">
                        <div class="icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3>Hỗ trợ 24/7</h3>
                        <p class="text-white">Hotline: 0332132912.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Facility Area -->

    <!-- Start Category Boxes Area -->
    <section class="category-boxes-area pt-60">
        <div class="container-fluid">
            <div class="row">
                {{-- đổ dữ liệu category --}}
                @if (count($category) > 0)
                    @foreach ($category as $item)
                        <div class="col-lg-3 col-sm-6 col-md-6">
                            <div style="position: relative" class="single-category-boxes w-100">
                                <img class="" style="width:100%;height:350px"
                                    src="{{ $item->image ? asset($item->image) : asset('fe/assets/img/category-products-img5.jpg') }}"
                                    alt="image">


                                <h3>{{ $item->name }}<span class="text-white">( {{ $item->products_count }} Sản Phẩm)</span></h3>
                            <form action="{{ route('search') }}" method="POST" class="" >
                                @csrf
                                @method('post')
                                <input type="" hidden name="category_id" value="{{ $item->id }}">
                                <button class="shop-now-btn" style="border-radius:15px;position: absolute; bottom:10px;right:10px">Xem ngay</button>
                            </form>
                                <a href="#" class="link-btn"></a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- End Category Boxes Area -->

    <!-- Start All Products Area -->
    <section class="all-products-area pb-60">
        <div class="container">
            <div class="tab products-category-tab">
                <div class="section-title">
                    <h2>Sản phẩm nổi bật</h2>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <ul class="tabs without-bg">
                            <li><a href="#">
                                    <span class="dot"></span> Sản phẩm mới nhất
                                </a></li>

                            {{-- <li><a href="#">
                                    <span class="dot"></span> Sản phẩm bán chạy nhất
                                </a></li> --}}

                            <li><a href="#">
                                    <span class="dot"></span>Sản phẩm giảm sâu
                                </a></li>
                        </ul>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="tab_content">
                            <div class="tabs_item">
                                <img src="" class="" alt="">
                                <div class="all-products-slides-two owl-carousel owl-theme">
                                    @foreach ($products as $product)
                                        <div class="single-product-box">
                                            <div class="product-image">

                                                <a href="#">
                                                    <img src="{{ $product->image }}" alt="image">
                                                    <img src="{{ isset($product->images[0]->image) ? $product->images[0]->image : asset('img/logo.jpg') }}" alt="image">
                                                </a>

                                                <ul>
                                                    <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                            title="Quick View" data-bs-toggle="modal"
                                                            data-bs-target="#productQuickView{{ $product->id }}"><i
                                                                class="far fa-eye"></i></a></li>
                                                    <li><a href="{{ route('wishlist.add-to-wishlist', $product->id) }}"
                                                            data-tooltip="tooltip" data-placement="left"
                                                            title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product-content">
                                                <h3><a
                                                        href="{{ route('product.detail', $product->id) }}">{{ $product->title }}</a>
                                                </h3>
                                                <div style="height: 50px" class="product-price">
                                                    @if ($product->sales)
                                                        @php
                                                            $discountedPrice = $product->price - $product->sales->discount;
                                                            $discountedPrice = max($discountedPrice, 0);
                                                        @endphp
                                                        <span style="text-decoration: line-through; " class="old-price">{{ number_format($product->price) }} VND</span><br>
                                                        <span style="font-weight: bold;color: red; font-size: 1.25rem; line-height: 1.75rem;" class="new-price">{{ number_format($discountedPrice) }} VND</span>
                                                    @else
                                                        <span style="" class="">{{ $product->metatitle}}</span><br>
                                                        <span style="font-weight: bold; font-size: 1.25rem; color: red; line-height: 1.75rem;" class="new-price">{{ number_format($product->price) }} VND</span>
                                                    @endif
                                                </div>
                                                <a href="{{ route('product.detail', $product->id) }}" class="btn btn-light">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tabs_item">
                                <img src="" class="" alt="">
                                <div class="all-products-slides-two owl-carousel owl-theme">
                                    @foreach ($product_sale as $product)
                                        <div class="single-product-box">
                                            <div class="product-image">

                                                <a href="#">
                                                    <img src="{{ $product->image }}" alt="image">
                                                    <img src="{{ isset($product->images[0]->image) ? $product->images[0]->image : asset('img/logo.jpg') }}" alt="image">
                                                </a>

                                                <ul>
                                                    <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                            title="Quick View" data-bs-toggle="modal"
                                                            data-bs-target="#productQuickView{{ $product->id }}"><i
                                                                class="far fa-eye"></i></a></li>
                                                    <li><a href="{{ route('wishlist.add-to-wishlist', $product->id) }}"
                                                            data-tooltip="tooltip" data-placement="left"
                                                            title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product-content">
                                                <h3><a
                                                        href="{{ route('product.detail', $product->id) }}">{{ $product->title }}</a>
                                                </h3>
                                                <div style="height: 50px" class="product-price">
                                                    @if ($product->sales)
                                                        @php
                                                            $discountedPrice = $product->price - $product->sales->discount;
                                                            $discountedPrice = max($discountedPrice, 0);
                                                        @endphp
                                                        <span style="text-decoration: line-through; " class="old-price">{{ number_format($product->price) }} VND</span><br>
                                                        <span style="font-weight: bold;color: red; font-size: 1.25rem; line-height: 1.75rem;" class="new-price">{{ number_format($discountedPrice) }} VND</span>
                                                    @else
                                                        <span style="" class="">{{ $product->metatitle}}</span><br>
                                                        <span style="font-weight: bold; font-size: 1.25rem; color: red; line-height: 1.75rem;" class="new-price">{{ number_format($product->price) }} VND</span>
                                                    @endif
                                                </div>
                                                <a href="{{ route('product.detail', $product->id) }}" class="btn btn-light">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End all Products Area -->

    <!-- Start Products Offer Area -->
    <section class="products-offer-area bg-image2 ptb-60 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="products-offer-content">
                <span class="sub-title">Tràn ngập ưu đãi!</span>
                <h1>Sự lựa chọn đa dạng!</h1>
                <p>Trải nghiệm ngay</p>
                <a href="#" class="btn btn-primary">Quần bò</a>
                <a href="#" class="btn btn-primary">Quần vải</a>
            </div>
        </div>
    </section>
    <!-- End Products Offer Area -->

    <!-- Start News Area -->
    <section class="news-area ptb-60">
        <div class="container">
            <div class="section-title">
                <h2><span class=""></span> Bài viết mới nhất</h2>
            </div>

            <div class="row">
                <div class="news-slides owl-carousel owl-theme">
                    <div class="col-lg-12 col-md-12">
                        <div class="single-news-post">
                            <div class="news-image">
                                <a href="#"><img src="{{ asset('fe/assets/img/blog-img1.jpg') }}"
                                        alt="image"></a>
                            </div>

                            <div class="news-content">
                                <h3><a href="#">Styling White Jeans after Labor Day</a></h3>
                                <span class="author">By <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <a href="#" class="btn btn-light">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="single-news-post">
                            <div class="news-image">
                                <a href="#"><img src="{{ asset('fe/assets/img/blog-img2.jpg') }}"
                                        alt="image"></a>
                            </div>

                            <div class="news-content">
                                <h3><a href="#">The Best Ecommerce Platform for Growing Sales</a></h3>
                                <span class="author">By <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <a href="#" class="btn btn-light">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="single-news-post">
                            <div class="news-image">
                                <a href="#"><img src="{{ asset('fe/assets/img/blog-img3.jpg') }}"
                                        alt="image"></a>
                            </div>

                            <div class="news-content">
                                <h3><a href="#">The Evolution of the B2B Buying Process</a></h3>
                                <span class="author">By <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <a href="#" class="btn btn-light">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="single-news-post">
                            <div class="news-image">
                                <a href="#"><img src="{{ asset('fe/assets/img/blog-img4.jpg') }}"
                                        alt="image"></a>
                            </div>

                            <div class="news-content">
                                <h3><a href="#">The Best eCommerce Blogs for Online Retailers</a></h3>
                                <span class="author">By <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <a href="#" class="btn btn-light">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="single-news-post">
                            <div class="news-image">
                                <a href="#"><img src="{{ asset('fe/assets/img/blog-img5.jpg') }}"
                                        alt="image"></a>
                            </div>

                            <div class="news-content">
                                <h3><a href="#">How to Do Social Media Customer Service</a></h3>
                                <span class="author">By <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <a href="#" class="btn btn-light">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End News Area -->

    <!-- Start Partner Area -->
    <div class="partner-area">
        <div class="container">
            <div class="partner-slides owl-carousel owl-theme">
                <div class="partner-item">
                    <a href="#" target="_blank"><img src="{{ asset('fe/assets/img/partner1.png') }}"
                            alt="image"></a>
                </div>

                <div class="partner-item">
                    <a href="#" target="_blank"><img src="{{ asset('fe/assets/img/partner2.png') }}"
                            alt="image"></a>
                </div>

                <div class="partner-item">
                    <a href="#" target="_blank"><img src="{{ asset('fe/assets/img/partner3.png') }}"
                            alt="image"></a>
                </div>

                <div class="partner-item">
                    <a href="#" target="_blank"><img src="{{ asset('fe/assets/img/partner4.png') }}"
                            alt="image"></a>
                </div>

                <div class="partner-item">
                    <a href="#" target="_blank"><img src="{{ asset('fe/assets/img/partner5.png') }}"
                            alt="image"></a>
                </div>

                <div class="partner-item">
                    <a href="#" target="_blank"><img src="{{ asset('fe/assets/img/partner6.png') }}"
                            alt="image"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Partner Area -->

    <!-- Start Subscribe Area -->
    {{-- <section class="subscribe-area ptb-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="newsletter-content">
                        <h3>Subscribe to our newsletter</h3>
                        <p>A short sentence describing what someone will receive by subscribing</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <form class="newsletter-form" data-bs-toggle="validator">
                        <input type="email" class="form-control" placeholder="Enter your email address" name="EMAIL"
                            required autocomplete="off">
                        <button type="submit">Subscribe</button>
                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End Subscribe Area -->

    <!-- Start Instagram Area -->
    <div class="instagram-area">
        <div class="instagram-slides owl-carousel owl-theme">
            <div class="instagram-box">
                <img src="{{ asset('fe/assets/img/instagram1.jpg') }}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>

            <div class="instagram-box">
                <img src="{{ asset('fe/assets/img/instagram2.jpg') }}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>

            <div class="instagram-box">
                <img src="{{ asset('fe/assets/img/instagram3.jpg') }}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>

            <div class="instagram-box">
                <img src="{{ asset('fe/assets/img/instagram4.jpg') }}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>

            <div class="instagram-box">
                <img src="{{ asset('fe/assets/img/instagram5.jpg') }}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>

            <div class="instagram-box">
                <img src="{{ asset('fe/assets/img/instagram6.jpg') }}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>

            <div class="instagram-box">
                <img src="{{ asset('fe/assets/img/instagram7.jpg') }}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>

            <div class="instagram-box">
                <img src="{{ asset('fe/assets/img/instagram8.jpg') }}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>

            <div class="instagram-box">
                <img src="{{ asset('fe/assets/img/instagram9.jpg') }}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>
        </div>
    </div>
    <!-- End Instagram Area -->

    <!-- Start Shopping Cart Modal -->
    <div class="modal right fade shoppingCartModal" id="shoppingCartModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>

                <div class="modal-body">
                    <h3>My Cart ({{ $countCart }})</h3>
                    <div class="product-cart-content">
                        {{-- @if (count($carts)> 0 )
                        @foreach ($carts as $value)
                            <div class="product-cart">
                                <div class="product-image">
                                    <img src="{{ $value->ProductVariant->product->image }}" alt="image">
                                </div>

                                <div class="product-content">
                                    <h3><a href="#">{{ $value->ProductVariant->product->title }}</a></h3>
                                    <span>{{ $value->ProductVariant->color->name }} /
                                        {{ $value->ProductVariant->size->name }}</span>
                                    <div class="product-price">
                                        <span>{{ $value->quantity }}</span>
                                        <span>x</span>
                                        <span class="price">${{ $value->ProductVariant->product->price }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @endif --}}



                    </div>

                    <div class="product-cart-subtotal">
                        <span>Subtotal</span>

                        <span class="subtotal">$500.00</span>
                    </div>

                    <div class="product-cart-btn">
                        <a href="#" class="btn btn-primary">Proceed to Checkout</a>
                        <a href="{{ route('cart.view-cart') }}" class="btn btn-light">View Shopping Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shopping Cart Modal -->

    <!-- Start Wishlist Modal -->
    <div class="modal right fade shoppingWishlistModal" id="shoppingWishlistModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>

                <div class="modal-body">
                    <h3>My Wish List (3)</h3>

                    <div class="product-cart-content">
                        @foreach ($wishlists as $wishlist)
                            <div class="product-cart d-flex justify-content-between align-items-center">
                                <div class="">
                                    <div class="product-image">
                                        <img src="{{ asset($wishlist->product->image) }}" alt="image">
                                    </div>

                                    <div class="product-content">
                                        <h3><a
                                                href="{{ route('product.detail', $wishlist->product_id) }}">{{ $wishlist->product->title }}</a>
                                        </h3>
                                        {{-- <span>Blue / XS</span> --}}
                                        <div class="product-price">
                                            {{-- <span>1</span>
                                            <span>x</span> --}}
                                            <span class="price">{{ $wishlist->product->price }}đ</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <form action="{{ route('wishlist.del-to-wishlist', $wishlist->id) }}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <button class="remove border-0 bg-light"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                    {{-- <i class="far fa-trash-alt"></i> --}}
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <div class="product-cart-btn">
                        <a href="#" class="btn btn-light">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Wishlist Modal -->

    <!-- Start Products QuickView Modal Area -->
    @foreach ($products as $product)
        <div class="modal fade productQuickView" id="productQuickView{{ $product->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="productQuickView-image">
                                <img src="{{ $product->image }}" alt="image">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="product-content">

                                <h3><a href="#">{{ $product->title }}</a></h3>

                                <div class="price">
                                    <span id="newPrice" class="new-price">${{ $product->price }}</span>
                                </div>

                                <div class="product-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <a href="#" class="rating-count">3 reviews</a>
                                </div>

                                <ul class="product-info">
                                    <li><span>Vendor:</span> <a href="#">Lereve</a></li>
                                    <li><span>Availability:</span> <a href="#">In stock (7 items)</a></li>
                                    <li><span>Product Type:</span> <a href="#">T-Shirt</a></li>
                                </ul>

                                <div class="product-color-switch">
                                    <h4>Color:</h4>
                                    <div>
                                        {{-- @foreach ($colorIds as $color)
                                            <div>{{ $color }}</div>
                                        @endforeach --}}
                                    </div>
                                    @foreach ($product->variants as $variant)
                                        @php
                                            $rendered_colors = []; // Mảng để theo dõi các màu đã render
                                        @endphp

                                        @foreach ($product->variants as $color)
                                            @if (!in_array($color->color->id, $rendered_colors))
                                                @php
                                                    $rendered_colors[] = $color->color->id; // Đánh dấu màu đã render
                                                @endphp

                                                <label
                                                    style="width: 40px; height: 40px; background-color:{{ $color->color->name }}">
                                                    <input type="radio" data-prod-id="{{ $color->product_id }}"
                                                        name="color" id="color" value="{{ $color->color->id }}">
                                                    <div class="">{{ $color->color->name }}</div>
                                                    {{-- <input type="hidden" data-prod-id="{{ $color->product_id }}"
                                                        class="product_id" value="{{ $color->product_id }}"> --}}

                                                    {{-- {{ $color->product_id }} --}}

                                                </label>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    {{-- <ul>
                                        <li><a href="#" title="Black" class="color-black"></a></li>
                                        <li><a href="#" title="White" class="color-white"></a></li>
                                        <li class="active"><a href="#" title="Green" class="color-green"></a>
                                        </li>
                                        <li><a href="#" title="Yellow Green" class="color-yellowgreen"></a></li>
                                        <li><a href="#" title="Teal" class="color-teal"></a></li>
                                    </ul> --}}
                                </div>

                                <div class="product-size-wrapper">
                                    <h4>Size:</h4>
                                    {{-- <div>
                                        @foreach ($sizeIds as $size)
                                            <div>{{ $size }}</div>
                                        @endforeach
                                    </div> --}}
                                    @foreach ($product->variants as $variant)
                                        @php
                                            $rendered_sizes = []; // Mảng để theo dõi các màu đã render
                                        @endphp

                                        @foreach ($product->variants as $size)
                                            @if (!in_array($size->size->id, $rendered_sizes))
                                                @php
                                                    $rendered_sizes[] = $size->size->id; // Đánh dấu màu đã render
                                                @endphp

                                                <label style="width: 40px; height: 40px;">
                                                    <input type="radio" name="size" id="size"
                                                        value="{{ $size->size->id }}">
                                                    <div class="">{{ $size->size->name }}</div>
                                                </label>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    {{-- <ul>
                                        <li><a href="#">XS</a></li>
                                        <li class="active"><a href="#">S</a></li>
                                        <li><a href="#">M</a></li>
                                        <li><a href="#">XL</a></li>
                                        <li><a href="#">XXL</a></li>
                                    </ul> --}}
                                </div>

                                <div class="product-add-to-cart">
                                    <div class="input-counter">
                                        <span class="minus-btn"><i class="fas fa-minus"></i></span>
                                        <input type="text" class="qty-input" value="1" step="1">
                                        <span class="plus-btn"><i class="fas fa-plus"></i></span>
                                    </div>

                                    <button type="submit" id="addtocart" class="btn btn-primary"><i
                                            class="fas fa-cart-plus"></i> Add
                                        to
                                        Cart</button>
                                </div>

                                <a href="#" class="view-full-info">View full info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End Products QuickView Modal Area -->

    <!-- Start Size Guide Modal Area -->
    <div class="modal fade sizeGuideModal" id="sizeGuideModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>

                <div class="modal-sizeguide">
                    <h3>Size Guide</h3>
                    <p>This is an approximate conversion table to help you find your size.</p>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Italian</th>
                                    <th>Spanish</th>
                                    <th>German</th>
                                    <th>UK</th>
                                    <th>US</th>
                                    <th>Japanese</th>
                                    <th>Chinese</th>
                                    <th>Russian</th>
                                    <th>Korean</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>34</td>
                                    <td>30</td>
                                    <td>28</td>
                                    <td>4</td>
                                    <td>00</td>
                                    <td>3</td>
                                    <td>155/75A</td>
                                    <td>36</td>
                                    <td>44</td>
                                </tr>
                                <tr>
                                    <td>36</td>
                                    <td>32</td>
                                    <td>30</td>
                                    <td>6</td>
                                    <td>0</td>
                                    <td>5</td>
                                    <td>155/80A</td>
                                    <td>38</td>
                                    <td>44</td>
                                </tr>
                                <tr>
                                    <td>38</td>
                                    <td>34</td>
                                    <td>32</td>
                                    <td>8</td>
                                    <td>2</td>
                                    <td>7</td>
                                    <td>160/84A</td>
                                    <td>40</td>
                                    <td>55</td>
                                </tr>
                                <tr>
                                    <td>40</td>
                                    <td>36</td>
                                    <td>34</td>
                                    <td>10</td>
                                    <td>4</td>
                                    <td>9</td>
                                    <td>165/88A</td>
                                    <td>42</td>
                                    <td>55</td>
                                </tr>
                                <tr>
                                    <td>42</td>
                                    <td>38</td>
                                    <td>36</td>
                                    <td>12</td>
                                    <td>6</td>
                                    <td>11</td>
                                    <td>170/92A</td>
                                    <td>44</td>
                                    <td>66</td>
                                </tr>
                                <tr>
                                    <td>44</td>
                                    <td>40</td>
                                    <td>38</td>
                                    <td>14</td>
                                    <td>8</td>
                                    <td>13</td>
                                    <td>175/96A</td>
                                    <td>46</td>
                                    <td>66</td>
                                </tr>
                                <tr>
                                    <td>46</td>
                                    <td>42</td>
                                    <td>40</td>
                                    <td>16</td>
                                    <td>10</td>
                                    <td>15</td>
                                    <td>170/98A</td>
                                    <td>48</td>
                                    <td>77</td>
                                </tr>
                                <tr>
                                    <td>48</td>
                                    <td>44</td>
                                    <td>42</td>
                                    <td>18</td>
                                    <td>12</td>
                                    <td>17</td>
                                    <td>170/100B</td>
                                    <td>50</td>
                                    <td>77</td>
                                </tr>
                                <tr>
                                    <td>50</td>
                                    <td>46</td>
                                    <td>44</td>
                                    <td>20</td>
                                    <td>14</td>
                                    <td>19</td>
                                    <td>175/100B</td>
                                    <td>52</td>
                                    <td>88</td>
                                </tr>
                                <tr>
                                    <td>52</td>
                                    <td>48</td>
                                    <td>46</td>
                                    <td>22</td>
                                    <td>16</td>
                                    <td>21</td>
                                    <td>180/104B</td>
                                    <td>54</td>
                                    <td>88</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Size Guide Modal Area -->

    <!-- Start Shipping Modal Area -->
    <div class="modal fade productShippingModal" id="productShippingModal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>

                <div class="shipping-content">
                    <h3>Shipping</h3>
                    <ul>
                        <li>Complimentary ground shipping within 1 to 7 business days</li>
                        <li>In-store collection available within 1 to 7 business days</li>
                        <li>Next-day and Express delivery options also available</li>
                        <li>Purchases are delivered in an orange box tied with a Bolduc ribbon, with the exception of
                            certain items</li>
                        <li>See the delivery FAQs for details on shipping methods, costs and delivery times</li>
                    </ul>

                    <h3>Returns and Exchanges</h3>
                    <ul>
                        <li>Easy and complimentary, within 14 days</li>
                        <li>See conditions and procedure in our return FAQs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shipping Modal Area -->

    <!-- Start Products Filter Modal Area -->
    <div class="modal left fade productsFilterModal" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><i class="fas fa-times"></i> Close</span></button>

                <div class="modal-body">
                    <div class="woocommerce-sidebar-area">
                        <div class="collapse-widget filter-list-widget">
                            <h3 class="collapse-widget-title">
                                Current Selection

                                <i class="fas fa-angle-up"></i>
                            </h3>

                            <div class="selected-filters-wrap-list">
                                <ul>
                                    <li><a href="#">44</a></li>
                                    <li><a href="#">XI</a></li>
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Accessories</a></li>
                                </ul>

                                <div class="delete-selected-filters">
                                    <a href="#"><i class="far fa-trash-alt"></i> <span>Clear All</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="collapse-widget collections-list-widget">
                            <h3 class="collapse-widget-title">
                                Collections

                                <i class="fas fa-angle-up"></i>
                            </h3>

                            <ul class="collections-list-row">
                                <li class="active"><a href="#">Women’s</a></li>
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Clothing</a></li>
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Uncategorized</a></li>
                            </ul>
                        </div>

                        <div class="collapse-widget brands-list-widget">
                            <h3 class="collapse-widget-title">
                                Brands

                                <i class="fas fa-angle-up"></i>
                            </h3>

                            <ul class="brands-list-row">
                                <li class="active"><a href="#">Adidas</a></li>
                                <li><a href="#">Nike</a></li>
                                <li><a href="#">Reebok</a></li>
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">Ralph Lauren</a></li>
                                <li><a href="#">Delpozo</a></li>
                            </ul>
                        </div>

                        <div class="collapse-widget size-list-widget">
                            <h3 class="collapse-widget-title">
                                Size

                                <i class="fas fa-angle-up"></i>
                            </h3>

                            <ul class="size-list-row">
                                <li><a href="#">20</a></li>
                                <li><a href="#">24</a></li>
                                <li><a href="#">36</a></li>
                                <li><a href="#">30</a></li>
                                <li class="active"><a href="#">XS</a></li>
                                <li><a href="#">S</a></li>
                                <li><a href="#">M</a></li>
                                <li><a href="#">L</a></li>
                                <li><a href="#">L</a></li>
                                <li><a href="#">XL</a></li>
                            </ul>
                        </div>

                        <div class="collapse-widget price-list-widget">
                            <h3 class="collapse-widget-title">
                                Price

                                <i class="fas fa-angle-up"></i>
                            </h3>

                            <ul class="price-list-row">
                                <li><a href="#">$10 - $100</a></li>
                                <li class="active"><a href="#">$100 - $200</a></li>
                                <li><a href="#">$200 - $300</a></li>
                                <li><a href="#">$300 - $400</a></li>
                                <li><a href="#">$400 - $500</a></li>
                                <li><a href="#">$500 - $600</a></li>
                            </ul>
                        </div>

                        <div class="collapse-widget color-list-widget">
                            <h3 class="collapse-widget-title">
                                Color

                                <i class="fas fa-angle-up"></i>
                            </h3>

                            <ul class="color-list-row">
                                <li><a href="#" title="Black" class="color-black"></a></li>
                                <li><a href="#" title="Red" class="color-red"></a></li>
                                <li><a href="#" title="Yellow" class="color-yellow"></a></li>
                                <li><a href="#" title="White" class="color-white"></a></li>
                                <li><a href="#" title="Blue" class="color-blue"></a></li>
                                <li><a href="#" title="Green" class="color-green"></a></li>
                                <li><a href="#" title="Yellow Green" class="color-yellowgreen"></a></li>
                                <li><a href="#" title="Pink" class="color-pink"></a></li>
                                <li><a href="#" title="Violet" class="color-violet"></a></li>
                                <li><a href="#" title="Blue Violet" class="color-blueviolet"></a></li>
                                <li><a href="#" title="Lime" class="color-lime"></a></li>
                                <li><a href="#" title="Plum" class="color-plum"></a></li>
                                <li><a href="#" title="Teal" class="color-teal"></a></li>
                            </ul>
                        </div>

                        <div class="collapse-widget tag-list-widget">
                            <h3 class="collapse-widget-title">
                                Popular Tags

                                <i class="fas fa-angle-up"></i>
                            </h3>

                            <ul class="tags-list-row">
                                <li><a href="#">Vintage</a></li>
                                <li><a href="#">Black</a></li>
                                <li class="active"><a href="#">Discount</a></li>
                                <li><a href="#">Good</a></li>
                                <li><a href="#">Jeans</a></li>
                                <li><a href="#">Summer</a></li>
                                <li><a href="#">Winter</a></li>
                            </ul>
                        </div>

                        <div class="collapse-widget aside-products-widget">
                            <h3 class="aside-widget-title">
                                Popular Products
                            </h3>

                            <div class="aside-single-products">
                                <div class="products-image">
                                    <a href="#">
                                        <img src="{{ asset('fe/assets/img/img2.jpg') }}" alt="image">
                                    </a>
                                </div>

                                <div class="products-content">
                                    <span><a href="#">Men's</a></span>
                                    <h3><a href="#">Belted chino trousers polo</a></h3>

                                    <div class="product-price">
                                        <span class="new-price">$191.00</span>
                                        <span class="old-price">$291.00</span>
                                    </div>
                                </div>
                            </div>

                            <div class="aside-single-products">
                                <div class="products-image">
                                    <a href="#">
                                        <img src="{{ asset('fe/assets/img/img3.jpg') }}" alt="image">
                                    </a>
                                </div>

                                <div class="products-content">
                                    <span><a href="#">Men's</a></span>
                                    <h3><a href="#">Belted chino trousers polo</a></h3>

                                    <div class="product-price">
                                        <span class="new-price">$191.00</span>
                                        <span class="old-price">$291.00</span>
                                    </div>
                                </div>
                            </div>

                            <div class="aside-single-products">
                                <div class="products-image">
                                    <a href="#">
                                        <img src="{{ asset('fe/assets/img/img4.jpg') }}" alt="image">
                                    </a>
                                </div>

                                <div class="products-content">
                                    <span><a href="#">Men's</a></span>
                                    <h3><a href="#">Belted chino trousers polo</a></h3>

                                    <div class="product-price">
                                        <span class="new-price">$191.00</span>
                                        <span class="old-price">$291.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="collapse-widget aside-trending-widget">
                            <div class="aside-trending-products">
                                <img src="{{ asset('fe/assets/img/bestseller-hover-img1.jpg') }}" alt="image">

                                <div class="category">
                                    <h4>Top Trending</h4>
                                    <span>Spring/Summer 2018 Collection</span>
                                </div>

                                <a href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Products Filter Modal Area -->

    <!-- Start Ads Popup Area -->
    <div class="bts-popup" role="alert">
        <div class="bts-popup-container">
            <h3>Free Shipping</h3>
            <p>Worldwide free shipping for all members. To become a member subscribe for our <strong>free offers / discount
                    newsletter.</strong></p>

            <form>
                <input type="email" class="form-control" placeholder="mail@name.com" name="EMAIL" required>
                <button type="submit"><i class="far fa-paper-plane"></i></button>
            </form>

            <ul>
                <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" class="linkdein"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="#" class="instagram"><i class="fab fa-instagram"></i></a></li>
            </ul>

            <div class="img-box">
                <img src="{{ asset('fe/assets/img/women.png') }}" alt="image">
                <img src="{{ asset('fe/assets/img/women2.png') }}" alt="image">
            </div>

            <a href="#0" class="bts-popup-close"></a>
        </div>
    </div>
    <!-- End Ads Popup Area -->

@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            let dataProduct = @json($product->variants);
            let color = $(this).val();
            let size = $("input[name='size']:checked").val();
            // let product_id = $(".product_id").val();
            $(document).on('change', '#color', function() {
                color = $(this).val();
                const product_id = $(this).data('prod-id')
                // console.log(product_id);
                $.ajax({
                    type: "GET",
                    url: "{{ route('product.check-detail-quantity') }}",
                    data: {
                        product_id: product_id,
                        color: color,
                    },
                    dataType: 'json',
                    success: function(response) {
                        let sizeIds = [];

                        const res = response.data;

                        for (const item of res) {
                            sizeIds.push(item.size_id + '');
                        }
                        $("input[name='size']").each(function() {
                            $(this).prop('checked', false);

                            if (sizeIds.includes($(this).val())) {
                                $(this).removeAttr('disabled');
                            } else {
                                $(this).attr('disabled', true);
                            }
                        })
                        dataProduct.forEach(function(data) {
                            if (data.color_id == color && data.size_id == size) {
                                // console.log(data);
                                document.getElementById('newPrice').innerHTML = data
                                    .price;
                            }
                        });
                    }
                })
            })

            $(document).on('change', '#size', function() {
                size = $(this).val();
                dataProduct.forEach(function(data) {
                    if (data.color_id == color && data.size_id == size) {
                        document.getElementById('newPrice').innerHTML = data.price;
                    }
                });
            })
        })
        $(function() {
            $(document).on('click', '#addtocart', function() {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('cart.add-to-cart') }}",
                    data: {
                        quantity: $('.qty-input').val(),
                        size: $("input[name='size']:checked").val(),
                        color: $("input[name='color']:checked").val(),
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response)
                        location.reload();
                    }
                });
            });
        });
    </script> --}}
@endpush
