<!doctype html>
<html class="no-js" lang="">


<!-- Mirrored from affixtheme.com/html/xmee/demo/login-29.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Sep 2023 17:20:41 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Xmee | Login and Register Form Html Templates</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('authen/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('authen/css/fontawesome-all.min.css') }}">
    <!-- Vegas CSS -->
    <link rel="stylesheet" href="{{ asset('authen/css/vegas.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('authen/font/flaticon.css') }}">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('authen/style.css') }}">
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div id="preloader" class="preloader">
        <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
    </div>
    <section class="fxt-template-animation fxt-template-layout29">
        <div class="container-fluid">
            <!-- <img src="img/figure/bg33-1.jpg" alt=""> -->
            <div class="row">
                <div class="vegas-container col-md-6 col-12 fxt-bg-img" id="vegas-slide"
                    data-vegas-options='{"delay":5000, "timer":false,"animation":"kenburns", "transition":"swirlLeft", "slides":[{"src": "{{ asset('authen/img/figure/bg33-1.jpg') }}"}, {"src": "{{ asset('authen/img/figure/bg35-1.jpg') }}"}, {"src": "{{ asset('authen/img/figure/bg36-1.jpg') }}"}]}'>
                    <div class="fxt-page-switcher">
                        <a href="{{ route('login') }}"
                            class="switcher-text1 {{ route('login') ? '' : 'active' }}">Đăng nhập</a>
                        <a href="{{ route('register') }}"
                            class="switcher-text1 {{ route('register') ? '' : 'active' }}">Đăng ký</a>
                        <a href="{{ route('home') }}"
                        class="switcher-text1 {{ route('register') ? '' : 'active' }}">Trang chủ</a>
                    </div>
                </div>
                <div class="col-md-6 col-12 fxt-bg-color">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('authen/') }}"></script>
    <!-- jquery-->
    <script src="{{ asset('authen/js/jquery.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('authen/js/bootstrap.min.js') }}"></script>
    <!-- Imagesloaded js -->
    <script src="{{ asset('authen/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Vegas js -->
    <script src="{{ asset('authen/js/vegas.min.js') }}"></script>
    <!-- Validator js -->
    <script src="{{ asset('authen/js/validator.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('authen/js/main.js') }}"></script>

</body>


<!-- Mirrored from affixtheme.com/html/xmee/demo/login-29.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Sep 2023 17:20:42 GMT -->

</html>
