@extends('client.layouts.master')

@section('content')
    {{-- Banner --}}
    <div class="home-slides-two owl-carousel owl-theme">
        @foreach ($banners as $banner)
            <div class="banner-section jarallax" style="background-image: url({{ $banner->image }})">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- AndBanner --}}

    {{--    Sản phẩm nổi bật--}}
    <section class="all-products-area pb-60 pt-60">
        <div class="container">
            <div class="tab products-category-tab">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <ul class="tabs without-bg">
                            <li><a href="#">
                                    <span class="dot"></span> Sản phẩm mới nhất
                                </a></li>
                            <li><a href="#">
                                    <span class="dot"></span>Sản phẩm giảm sâu
                                </a></li>
                            <li><a href="#">
                                    <span class="dot"></span>Tất cả sản phẩm
                                </a></li>
                        </ul>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="tab_content">
                            <div class="tabs_item">
                                <img src="" class="" alt="">
                                <div class="all-products-slides-two owl-carousel owl-theme">
                                    @foreach ($products as $product)
                                        <div class="single-product-box" style="position: relative">
                                            <span class="sold-out-btn"
                                                  style="padding: 10px 20px;font-size: 16px;font-weight: bold;background-color:red;position: absolute;top:10px;z-index:5;left:5px;color:white;border-radius:10px;display:{{ $product->getTotalQuantityStock() === 0 ? 'block' : 'none'  }}">Tạm hết hàng</span>
                                            <div class="product-image">

                                                <a href="#">
                                                    <img src="{{ $product->image }}" alt="image">
                                                    <img src="{{ isset($product->images[0]->image) ? $product->images[0]->image : asset('img/logo.jpg') }}"
                                                         alt="image">
                                                </a>

                                                <ul>
                                                    <li><a href="{{ route('product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}"
                                                           data-tooltip="tooltip" data-placement="left"
                                                           title="Quick View" data-bs-toggle="modal"
                                                           data-bs-target="#productQuickView{{ $product->id }}"><i
                                                                    class="far fa-eye"></i></a></li>
                                                        <?php
                                                        $user_id = null;
                                                        $wishlistcheck = null;

                                                        if (Auth::check()) {
                                                            $user_id = auth()->user()->id;
                                                            $wishlistcheck = \App\Models\wishlist::where('user_id', $user_id)
                                                                ->where('product_id', $product->id)
                                                                ->first();
                                                        }
                                                        ?>

                                                    @if ($wishlistcheck)
                                                        <form id="removeFromWishlistForm{{ $product->id }}"
                                                              action="{{ route('wishlist.del-to-wishlist', $wishlistcheck->id) }}"
                                                              method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <li><a id="removeFromWishlist{{ $product->id }}"
                                                                   data-tooltip="tooltip"
                                                                   data-placement="left" title="Remove from Wishlist"><i
                                                                            class="fas fa-heart"></i></a></li>
                                                        </form>

                                                        <script>
                                                            document.getElementById('removeFromWishlist{{ $product->id }}').addEventListener('click', function (event) {
                                                                event.preventDefault();
                                                                document.getElementById('removeFromWishlistForm{{ $product->id }}').submit();
                                                            });
                                                        </script>

                                                    @else
                                                        <li>
                                                            <a href="{{ route('wishlist.add-to-wishlist', $product->id) }}"
                                                               data-tooltip="tooltip" data-placement="left"
                                                               title="Add to Wishlist"><i class="far fa-heart"></i></a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="product-content">
                                                <h3><a class="text-content-a"
                                                       href="{{ route('product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}">{!! mb_strimwidth($product->title, 0, 65, '...') !!}
                                                    </a>
                                                </h3>
                                                <div style="height: 50px" class="product-price">
                                                    @if ($product->sales)
                                                        @php
                                                            $discountedPrice = $product->price - $product->sales->discount;
                                                            $discountedPrice = max($discountedPrice, 0);
                                                        @endphp
                                                        <span style="text-decoration: line-through; "
                                                              class="old-price">{{ number_format($product->price) }}
                                                            VND</span><br>
                                                        <span
                                                                style="font-weight: bold;color: red; font-size: 1.25rem; line-height: 1.75rem;"
                                                                class="new-price">{{ number_format($discountedPrice) }}
                                                            VND</span>
                                                    @else
                                                        <span style=""
                                                              class="">{!! mb_strimwidth($product->metatitle, 0, 25, '...') !!}</span>
                                                        <br>
                                                        <span
                                                                style="font-weight: bold; font-size: 1.25rem; color: red; line-height: 1.75rem;"
                                                                class="new-price">{{ number_format($product->price) }}
                                                            VND</span>
                                                    @endif
                                                </div>
                                                <a href="{{ route('product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}"
                                                   class="btn btn-light">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="tabs_item">
                                {{--                                Sản phẩm giảm sâu--}}
                                <div class="all-products-slides-two owl-carousel owl-theme">
                                    @foreach ($product_sale as $product)
                                        <div class="single-product-box" style="position: relative">
                                            <span class="sold-out-btn"
                                                  style="padding: 10px 20px;font-size: 16px;font-weight: bold;background-color:red;position: absolute;top:10px;z-index:5;left:5px;color:white;border-radius:10px;display:{{ $product->getTotalQuantityStock() === 0 ? 'block' : 'none'  }}">Tạm hết hàng</span>
                                            <div class="product-image">

                                                <a href="#">
                                                    <img src="{{ $product->image }}" alt="image">
                                                    <img src="{{ isset($product->images[0]->image) ? $product->images[0]->image : asset('img/logo.jpg') }}"
                                                         alt="image">
                                                </a>

                                                <ul>
                                                    <li><a href="{{ route('product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}"
                                                           data-tooltip="tooltip" data-placement="left"
                                                           title="Quick View" data-bs-toggle="modal"
                                                           data-bs-target="#productQuickView{{ $product->id }}"><i
                                                                    class="far fa-eye"></i></a></li>
                                                        <?php
                                                        $user_id = null;
                                                        $wishlistcheck = null;

                                                        if (Auth::check()) {
                                                            $user_id = auth()->user()->id;
                                                            $wishlistcheck = \App\Models\wishlist::where('user_id', $user_id)
                                                                ->where('product_id', $product->id)
                                                                ->first();
                                                        }
                                                        ?>

                                                    @if ($wishlistcheck)
                                                        <form id="removeFromWishlistForm{{ $product->id }}"
                                                              action="{{ route('wishlist.del-to-wishlist', $wishlistcheck->id) }}"
                                                              method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <li><a id="removeFromWishlist{{ $product->id }}"
                                                                   data-tooltip="tooltip"
                                                                   data-placement="left" title="Remove from Wishlist"><i
                                                                            class="fas fa-heart"></i></a></li>
                                                        </form>

                                                        <script>
                                                            document.getElementById('removeFromWishlist{{ $product->id }}').addEventListener('click', function (event) {
                                                                event.preventDefault();
                                                                document.getElementById('removeFromWishlistForm{{ $product->id }}').submit();
                                                            });
                                                        </script>

                                                    @else
                                                        <li>
                                                            <a href="{{ route('wishlist.add-to-wishlist', $product->id) }}"
                                                               data-tooltip="tooltip" data-placement="left"
                                                               title="Add to Wishlist"><i class="far fa-heart"></i></a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="product-content">
                                                <h3><a class="text-content-a"
                                                       href="{{ route('product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}">{!! mb_strimwidth($product->title, 0, 65, '...') !!}
                                                    </a>
                                                </h3>
                                                <div style="height: 50px" class="product-price">
                                                    @if ($product->sales)
                                                        @php
                                                            $discountedPrice = $product->price - $product->sales->discount;
                                                            $discountedPrice = max($discountedPrice, 0);
                                                        @endphp
                                                        <span style="text-decoration: line-through; "
                                                              class="old-price">{{ number_format($product->price) }}
                                                            VND</span><br>
                                                        <span
                                                                style="font-weight: bold;color: red; font-size: 1.25rem; line-height: 1.75rem;"
                                                                class="new-price">{{ number_format($discountedPrice) }}
                                                            VND</span>
                                                    @else
                                                        <span style=""
                                                              class="">{!! mb_strimwidth($product->metatitle, 0, 25, '...') !!}</span>
                                                        <br>
                                                        <span
                                                                style="font-weight: bold; font-size: 1.25rem; color: red; line-height: 1.75rem;"
                                                                class="new-price">{{ number_format($product->price) }}
                                                            VND</span>
                                                    @endif
                                                </div>
                                                <a href="{{ route('product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}"
                                                   class="btn btn-light">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="tabs_item">
                                {{--                                Tất cả sản phẩm--}}
                                <img src="" class="" alt="">
                                <div class="all-products-slides-two owl-carousel owl-theme">
                                    @foreach ($productall as $product)
                                        <div class="single-product-box">
                                            <span class="sold-out-btn"
                                                  style="padding: 10px 20px;font-size: 16px;font-weight: bold;background-color:red;position: absolute;top:10px;z-index:5;left:5px;color:white;border-radius:10px;display:{{ $product->getTotalQuantityStock() === 0 ? 'block' : 'none'  }}">Tạm hết hàng</span>
                                            <div class="product-image">

                                                <a href="#">
                                                    <img src="{{ $product->image }}" alt="image">
                                                    <img src="{{ isset($product->images[0]->image) ? $product->images[0]->image : asset('img/logo.jpg') }}"
                                                         alt="image">
                                                </a>

                                                <ul>
                                                    <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                           title="Quick View" data-bs-toggle="modal"
                                                           data-bs-target="#productQuickView{{ $product->id }}"><i
                                                                    class="far fa-eye"></i></a></li>
                                                        <?php
                                                        $user_id = null;
                                                        $wishlistcheck = null;

                                                        if (Auth::check()) {
                                                            $user_id = auth()->user()->id;
                                                            $wishlistcheck = \App\Models\wishlist::where('user_id', $user_id)
                                                                ->where('product_id', $product->id)
                                                                ->first();
                                                        }
                                                        ?>

                                                    @if ($wishlistcheck)
                                                        <form id="removeFromWishlistForm{{ $product->id }}"
                                                              action="{{ route('wishlist.del-to-wishlist', $wishlistcheck->id) }}"
                                                              method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <li><a id="removeFromWishlist{{ $product->id }}"
                                                                   data-tooltip="tooltip"
                                                                   data-placement="left" title="Remove from Wishlist"><i
                                                                            class="fas fa-heart"></i></a></li>
                                                        </form>

                                                        <script>
                                                            document.getElementById('removeFromWishlist{{ $product->id }}').addEventListener('click', function (event) {
                                                                event.preventDefault();
                                                                document.getElementById('removeFromWishlistForm{{ $product->id }}').submit();
                                                            });
                                                        </script>

                                                    @else
                                                        <li>
                                                            <a href="{{ route('wishlist.add-to-wishlist', $product->id) }}"
                                                               data-tooltip="tooltip" data-placement="left"
                                                               title="Add to Wishlist"><i class="far fa-heart"></i></a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="product-content">
                                                <h3><a class="text-content-a"
                                                    href="{{ route('product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}">{!! mb_strimwidth($product->title, 0, 65, '...') !!}
                                                    </a>
                                                </h3>
                                                <div style="height: 50px" class="product-price">
                                                    @if ($product->sales)
                                                        @php
                                                            $discountedPrice = $product->price - $product->sales->discount;
                                                            $discountedPrice = max($discountedPrice, 0);
                                                        @endphp
                                                        <span style="text-decoration: line-through; "
                                                              class="old-price">{{ number_format($product->price) }}
                                                            VND</span><br>
                                                        <span
                                                                style="font-weight: bold;color: red; font-size: 1.25rem; line-height: 1.75rem;"
                                                                class="new-price">{{ number_format($discountedPrice) }}
                                                            VND</span>
                                                    @else
                                                        <span style=""
                                                              class="">{!! mb_strimwidth($product->metatitle, 0, 25, '...') !!}</span>
                                                        <br>
                                                        <span
                                                                style="font-weight: bold; font-size: 1.25rem; color: red; line-height: 1.75rem;"
                                                                class="new-price">{{ number_format($product->price) }}
                                                            VND</span>
                                                    @endif
                                                </div>
                                                <a href="{{ route('product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}"
                                                   class="btn btn-light">Xem chi tiết</a>
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
    {{--    End Sản phẩm nổi bật--}}

    {{-- Category --}}
    <section class="all-products-area pb-60">
        <div class="container">
            <div class="section-title">
                <h2>Danh mục</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="tab_content">
                        <div class="tabs_item">
                            <img src="" class="" alt="">
                            <div class="all-products-slides-two owl-carousel owl-theme">
                                @if (count($category) > 0)
                                    @foreach ($category as $item)
                                        <div style="position: relative" class="single-category-boxes">
                                            <img class="" style="width:301.5px;height:402px"
                                                 src="{{ $item->image ? asset($item->image) : asset('fe/assets/img/category-products-img5.jpg') }}"
                                                 alt="image">
{{--                                            <h3 class="cate-name" style="color: black">{{ $item->name }}<br>--}}
{{--                                                <span style="color: black " class="cate-count"> ( {{ $item->products_count }} Sản Phẩm)</span>--}}
{{--                                            </h3>--}}
                                            <form action="{{ route('search') }}" method="POST" class="">
                                                @csrf
                                                @method('post')
                                                <input type="" hidden name="category_id"
                                                       value="{{ $item->id }}">
                                                <button class="shop-now-btn"
                                                        style="border-radius:15px;position: absolute; bottom:10px;right:10px">
                                                    Xem
                                                    ngay
                                                </button>
                                            </form>
                                            <a href="#" class="link-btn"></a>
                                        </div>
                                        {{--                                            </div>--}}
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- EndCategory--}}

    {{--    Chính sách--}}
    <section class="facility-area black-bg container" style="background-color: #f5f5f5;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="facility-box" style="">
                        <div class="icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="text-content-facility">
                            <h3 style="color:#0b0b0b">Thanh toán khi nhận hàng.</h3>
                            <p style="color:#0b0b0b">Giao hàng toàn quốc.</p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="facility-box">
                        <div class="icon">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <div class="text-content-facility">
                            <h3 style="color:#0b0b0b">Hỗ Trợ Đổi Trả</h3>
                            <p style="color:#0b0b0b">7 ngày từ khi nhận hàng.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="facility-box">
                        <div class="icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="text-content-facility" style="color:#0b0b0b">
                            <h3 style="color:#0b0b0b">Miễn phí giao hàng</h3>
                            <p style="color:#0b0b0b">Với đơn hàng trên 300.000đ</p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="facility-box">
                        <div class="icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="text-content-facility" style="color:#0b0b0b">
                            <h3 style="color:#0b0b0b">Hỗ trợ 24/7</h3>
                            <p style="color:#0b0b0b">Hotline: 0399292338.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Start News Area -->
    <section class="news-area ptb-60">
        <div class="container">
            <div class="section-title">
                <h2><a style="color:black" href="/feedback">Feedback</a></h2>
            </div>

            <div class="row">
                <div class="news-slides owl-carousel owl-theme">
                    @foreach ($feedbacks as $feedback)
                        <div class="col-lg-12 col-md-12">
                            <div class="single-news-post">
                                <div class="news-image" style="">
                                    <a href="{{ route('product.detail', ['slug' => $feedback->product->slug, 'id' => $feedback->product_id]) }}">
                                        <img style="height:100%" src="{{ asset($feedback->image) }}" alt="image"></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- {{ $posts->links() }} --}}
                </div>
            </div>
        </div>
    </section>
    <section class="news-area ptb-60">
        <div class="container">
            <div class="section-title">
                <h2><a style="color: black" href="/post">Bài viết mới nhất</a></h2>
            </div>

            <div class="row">
                <div class="news-slides owl-carousel owl-theme">
                    @foreach ($posts as $post)
                        <div class="col-lg-12 col-md-12">
                            <div class="single-news-post">
                                <div class="news-image" style="">
                                    <a href="#"><img style="height:100%" src="{{ asset($post->image) }}"
                                                     alt="image"></a>
                                </div>

                                <div class="news-content">
                                    <h3>
                                        <a style="min-height:55px" href="{{ route('post.detail', $post->id) }}">{!! mb_strimwidth($post->title, 0, 75, '...') !!}</a>
                                    </h3>
                                    <span class="author">Người đăng : <a href="#">{{ $post->user->name }}</a></span>
                                    <p>{{ $post->name }}</p>
                                    <a href="{{ route('post.detail', $post->id) }}" class="btn btn-light">Đọc chi
                                        tiết</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{--                    {{ $posts->links() }}--}}
                </div>
            </div>
        </div>
    </section>
    <!-- End News Area -->
    <!-- Start News Area -->

    <!-- End News Area -->

    <!-- Start Partner Area -->
    <div class="partner-area container">
        <div class="container ">
            <div class="partner-slides owl-carousel owl-theme text-center">
                <div class="partner-item" style="width: 105px; height: 105px">
                    <a href="#" target="_blank"><img src="{{ asset('fe/assets/img/item/1.jpg') }}"
                                                     alt="image"></a>
                </div>

                <div class="partner-item" style="width: 105px; height: 105px">
                    <a href="#" target="_blank"><img src="{{ asset('fe/assets/img/item/2.jpg') }}"
                                                     alt="image"></a>
                </div>

                <div class="partner-item" style="width: 105px; height: 105px">
                    <a href="#" target="_blank"><img src="{{ asset('fe/assets/img/item/3.jpg') }}"
                                                     alt="image"></a>
                </div>

                <div class="partner-item" style="width: 105px; height: 105px">
                    <a href="#" target="_blank"><img src="{{ asset('fe/assets/img/item/4.jpg') }}"
                                                     alt="image"></a>
                </div>

                <div class="partner-item" style="width: 105px; height: 105px">
                    <a href="#" target="_blank"><img src="{{ asset('fe/assets/img/item/5.jpg') }}"
                                                     alt="image"></a>
                </div>

                <div class="partner-item" style="width: 105px; height: 105px">
                    <a href="#" target="_blank"><img src="{{ asset('fe/assets/img/item/6.jpg') }}"
                                                     alt="image"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Partner Area -->

    <!-- Start Shopping Cart Modal -->
    <div class="modal right fade shoppingCartModal" id="shoppingCartModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                <div class="modal-body">
                    <h3>My Cart </h3>
                    <div class="product-cart-content">
                        {{-- @if (count($carts) > 0)
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
                                <h2><a href="{{ route('product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}">{{ $product->metatitle }}</a>
                                </h2>

                                <h3><a href="{{ route('product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}">{{ $product->title }}</a></h3>

                                <div class="price">
                                    <span id="newPrice"
                                          class="new-price">{{ number_format($product->price) }} VND</span>
                                </div>

                                {{-- <div class="product-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <a href="#" class="rating-count">3 reviews</a>
                                </div> --}}

                                <ul class="product-info">
                                    {{-- <li><span>Vendor:</span> <a href="#">Lereve</a></li> --}}
                                    {{-- <li><span>Availability:</span> <a href="#">In stock (7 items)</a></li> --}}
                                    {{-- <li><span>Product Type:</span> <a href="#">T-Shirt</a></li> --}}
                                </ul>

                                {{-- <div class="product-color-switch">
                                    <h4>Color:</h4>
                                    <div>

                                    </div>
                                    @foreach ($product->variants as $variant)
                                        @php
                                            $rendered_colors = [];
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

                                                </label>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div> --}}

                                {{-- <div class="product-size-wrapper">
                                    <h4>Size:</h4>
                                    @foreach ($product->variants as $variant)
                                        @php
                                            $rendered_sizes = [];
                                        @endphp

                                        @foreach ($product->variants as $size)
                                            @if (!in_array($size->size->id, $rendered_sizes))
                                                @php
                                                    $rendered_sizes[] = $size->size->id;
                                                @endphp

                                                <label style="width: 40px; height: 40px;">
                                                    <input type="radio" name="size" id="size"
                                                        value="{{ $size->size->id }}">
                                                    <div class="">{{ $size->size->name }}</div>
                                                </label>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div> --}}

                                {{-- <div class="product-add-to-cart">
                                    <div class="input-counter">
                                        <span class="minus-btn"><i class="fas fa-minus"></i></span>
                                        <input type="text" class="qty-input" value="1" step="1">
                                        <span class="plus-btn"><i class="fas fa-plus"></i></span>
                                    </div>

                                    <button type="submit" id="addtocart" class="btn btn-primary"><i
                                            class="fas fa-cart-plus"></i> Add
                                        to
                                        Cart</button>
                                </div> --}}

                                <a href="{{ route('product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}" class="view-full-info">Xem chi
                                    tiết</a>
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
                            certain items
                        </li>
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
            <p>Worldwide free shipping for all members. To become a member subscribe for our <strong>free offers /
                    discount
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


    <style>
        .text-content-a {
            font-style: 16px;
        }

        @media (max-width: 435px) {
            .single-product-box .product-image img {
                width: 100%;
                height: 240px;
            }

            .single-category-boxes {
                height: 160px !important;
                width: 160px !important;
            }

            .cate-name {
                font-size: 16px !important;
            }

            .cate-count {
                font-size: 12px;
            }

            .mean-bar {
                background-color: #0b0b0b !important;
                height: 55px !important;
            }

            .mean-container .mean-nav .navbar-nav {
                height: 220px;
            }

            .facility-box {
                display: flex;
                align-items: center;
            }

            .facility-box > * {
                padding-right: 5px;
            }

            .text-content-facility {
                text-align: start;
                padding-left: 25px;
            }

            .new-price {
                font-size: 16px !important;
            }
        }
    </style>
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
@endpush
