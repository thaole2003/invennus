<header class="header-area">
    <!-- Start Top Header Area -->
    {{-- <div class="top-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <ul class="top-header-nav">
                        <li><a href="about.html">About</a></li>
                        <li><a href="about.html">Our Stores</a></li>
                        <li><a href="faq.html">FAQ's</a></li>
                        <li><a href="contact-us.html">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-5 col-md-6">
                    <ul class="top-header-right-nav">
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#shoppingWishlistModal">Wishlist <i
                                    class="far fa-heart"></i></a></li>
                        <li><a href="compare.html">Compare <i class="fas fa-balance-scale"></i></a></li>
                        <li>
                            <div class="languages-list">
                                <select>
                                    <option value="1">Eng</option>
                                    <option value="2">Ger</option>
                                    <option value="3">Span</option>
                                </select>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Top Header Area -->

    <!-- Start Navbar Area -->
    <div class="navbar-area bg-black">
        <div class="comero-mobile-nav">
            <div class="logo">
                <a href="{{ route('home') }}"><img style="width:35px;height:35px" src="{{ asset('img/logo.jpg') }}"
                        alt="logo"></a>
            </div>
        </div>

        <div class="comero-nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" style="width:70px" href="{{ route('home') }}"><img
                            src="{{ asset('img/logo.jpg') }}" alt="logo"></a>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item p-relative">
                                <a href="{{ route('home') }}" class="nav-link active">Trang Chủ</a>
                            </li>

                            <li class="nav-item p-relative">
                                <a href="/post" class="nav-link active">Tin tức</a>
                            </li>
                            <li class="nav-item p-relative">
                                <a href="{{ route('get-contact-form') }}" class="nav-link active">Liên hệ</a>
                            </li>
                        </ul>


                        <div class="others-option">
                            <div class="option-item"><i class="search-btn fas fa-search fa-lg"></i>
                                <i class="close-btn fas fa-times  fa-lg"></i>

                                <div style="width:500px" class="search-overlay search-popup">
                                    <div style="border:solid 1px black" class='search-box'>
                                        <form action="{{ route('search') }}" class="search-form" method="POST">
                                            @csrf
                                            @method('POST')
                                            <input class="search-input" required name="keyword" placeholder="Tìm kiếm"
                                                type="text">

                                            <button class="search-button" type="submit"><i
                                                    class="fas fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @if (auth()->check())
                                @if (auth()->user()->role === 'admin' || auth()->user()->role === 'employ')
                                    <div class="option-item">
                                        <a href="{{ route('admin.home') }}">Quản lí cửa hàng </a>
                                    </div>
                                @endif
                            @endif
                            <div class="option-item">
                                @php
                                    use App\Models\Cart;
                                    $countCart = 0;
                                    if (auth()->check()) {
                                        $countCart = Cart::where('user_id', auth()->user()->id)->sum('quantity');
                                    }
                                @endphp

                                <a href="{{ route('cart.view-cart') }}">Giỏ hàng ({{ $countCart }}) <i
                                        class="fas fa-shopping-bag"></i></a>

                            </div>
                            @if (auth()->check())
                                <div class="option-item">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#shoppingWishlistModal">Yêu
                                        thích <i class="far fa-heart"></i></a>
                                </div>
                            @endif

                            <div class="option-item">
                                @guest
                                    <div class="d-flex">
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                                            </li>
                                        @endif

                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                            </li>
                                        @endif
                                    </div>
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a style="color: black ; font-size: 0.875rem;line-height: 1.25rem;"
                                                class="dropdown-item" href="{{ route('bill.index') }}">
                                                Đơn hàng
                                            </a>
                                            <a style="color: black ; font-size: 0.875rem;line-height: 1.25rem;"
                                                class="dropdown-item" href="/changeinfo">
                                                {{ __('Đổi thông tin') }}
                                            </a>
                                            <a style="color: black ; font-size: 0.875rem;line-height: 1.25rem;"
                                                class="dropdown-item" href="/changepassword">
                                                {{ __('Đổi mật khẩu') }}
                                            </a>
                                            <a style="color: black ; font-size: 0.875rem;line-height: 1.25rem;"
                                                class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Đăng xuất') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

    </div>
</header>

<!-- Start Main Banner Area -->

<!-- End Main Banner Area -->
