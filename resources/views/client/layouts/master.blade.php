<!doctype html>
<html lang="zxx">

<!-- Mirrored from templates.envytheme.com/comero/default/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Aug 2023 11:01:06 GMT -->

<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invennus</title>
    <meta name="author" content="SEIKO">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="{{ asset('fe/assets/css/bootstrap.min.css') }}">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{ asset('fe/assets/css/animate.min.css') }}">
    <!-- Font Awesome Min CSS -->
    <link rel="stylesheet" href="{{ asset('fe/assets/css/fontawesome.min.css') }}">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="{{ asset('fe/assets/css/owl.carousel.min.css') }}">
    <!-- niceSelect CSS -->
    <link rel="stylesheet" href="{{ asset('fe/assets/css/nice-select.css') }}">
    <!-- Magnific Popup Min CSS -->
    <link rel="stylesheet" href="{{ asset('fe/assets/css/magnific-popup.min.css') }}">
    <!-- MeanMenu CSS -->
    <link rel="stylesheet" href="{{ asset('fe/assets/css/meanmenu.css') }}">
    <!-- ION rangeSlider Min CSS -->
    <link rel="stylesheet" href="{{ asset('fe/assets/css/ion.rangeSlider.min.css') }}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('fe/assets/css/slick.css') }}">
    <!-- Slick Theme CSS -->
    <link rel="stylesheet" href="{{ asset('fe/assets/css/slick-theme.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('fe/assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('fe/assets/css/responsive.css') }}">

    <title>Trang chủ</title>

    <link rel="icon" type="image/png" href="{{ asset('img/logo.jpg') }}">
</head>

<body>

    @include('client.layouts.components.header')

    @yield('content')
    @php
        $wishlists = auth()->check()
            ? \App\Models\wishlist::latest()
                ->where('user_id', auth()->user()->id)
                ->get()
            : collect();
    @endphp
    <div class="modal right fade shoppingWishlistModal" id="shoppingWishlistModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>

                <div class="modal-body">
                    <h3>Sản phẩm yêu thích</h3>

                    <div class="product-cart-content">
                        @if (count($wishlists) > 0)
                            @foreach ($wishlists as $wishlist)
                                <div class="product-cart d-flex justify-content-between align-items-center">
                                    <div class="">
                                        <div class="product-image">
                                            <img style="width:50px;height:55px"
                                                src="{{ asset($wishlist->product->image) }}" alt="image">
                                        </div>

                                        <div class="product-content">
                                            <h3><a
                                                    href="{{ route('product.detail', $wishlist->product_id) }}">{{ $wishlist->product->title }}</a>
                                            </h3>
{{--                                            <div class="product-price">--}}
{{--                                                <span class="price">{{ number_format($wishlist->product->price) }}--}}
{{--                                                    VND</span>--}}
{{--                                            </div>--}}
                                            <div style="height: 50px" class="product-price">
                                                @if ($wishlist->product->sales)
                                                    @php
                                                        $discountedPrice = $wishlist->product->price - $wishlist->product->sales->discount;
                                                        $discountedPrice = max($discountedPrice, 0);
                                                    @endphp
                                                    <span style="text-decoration: line-through; "
                                                          class="old-price">{{ number_format($wishlist->product->price) }}
                                                            VND</span><br>
                                                    <span
                                                            style="font-weight: bold;color: red; font-size: 1.25rem; line-height: 1.75rem;"
                                                            class="new-price">{{ number_format($discountedPrice) }}
                                                            VND</span>
                                                @else
                                                    <span style=""
                                                          class="">{!! mb_strimwidth($wishlist->product->metatitle, 0, 25, '...') !!}</span>
                                                    <br>
                                                    <span
                                                            style="font-weight: bold; font-size: 1.25rem; color: red; line-height: 1.75rem;"
                                                            class="new-price">{{ number_format($wishlist->product->price) }}
                                                            VND</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <form action="{{ route('wishlist.del-to-wishlist', $wishlist->id) }}"
                                            method="post">
                                            @csrf
                                            @method('Delete')
                                            <button class="remove border-0 bg-light"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            Bạn chưa lưu sản phẩm nào!
                        @endif
                    </div>

                    <div class="product-cart-btn">
                        <a href="{{ route('home') }}" class="btn btn-light">Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>


    <!-- Start Footer Area -->
    @include('client.layouts.components.footer')
    <!-- End Footer Area -->

    <div class="go-top"><i class="fas fa-arrow-up"></i><i class="fas fa-arrow-up"></i></div>


    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "102664425547952");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v18.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- JQuery Min Js -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('fe/assets/js/jquery.min.js') }}"></script>
    <!-- Popper Min JS -->
    <script src="{{ asset('fe/assets/js/popper.min.js') }}"></script>
    <!-- Bootstrap Min Js -->
    <script src="{{ asset('fe/assets/js/bootstrap.min.js') }}"></script>
    <!-- Parallax Min JS -->
    <script src="{{ asset('fe/assets/js/parallax.min.js') }}"></script>
    <!-- Slick Min JS -->
    <script src="{{ asset('fe/assets/js/slick.js') }}"></script>
    <!-- Owl Carousel Min JS -->
    <script src="{{ asset('fe/assets/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup Min JS -->
    <script src="{{ asset('fe/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- niceSelect Min JS -->
    <script src="{{ asset('fe/assets/js/jquery.nice-select.min.js') }}"></script>
    <!-- MeanMenu JS -->
    <script src="{{ asset('fe/assets/js/jquery.meanmenu.js') }}"></script>
    <!-- ION rangeSlider Min JS  -->
    <script src="{{ asset('fe/assets/js/ion.rangeSlider.min.js') }}"></script>
    <!-- Form Validator Min JS -->
    <script src="{{ asset('fe/assets/js/form-validator.min.js') }}"></script>
    <!-- Contact Form Min JS -->
    <script src="{{ asset('fe/assets/js/contact-form-script.js') }}"></script>
    <!-- ajaxChimp Min JS -->
    <script src="{{ asset('fe/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <!-- Comero Map JS FILE -->
    <script src="{{ asset('fe/assets/js/comero-map.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('fe/assets/js/main.js') }}"></script>


    @stack('scripts')

</body>

<!-- Mirrored from templates.envytheme.com/comero/default/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Aug 2023 11:01:40 GMT -->

</html>
