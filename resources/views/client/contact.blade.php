@extends('client.layouts.master')
@section('content')
    <div class="container mx-6" style="margin-top: 120px">

        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Liên hệ</li>
                </ul>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Contact Area -->
        <section class="contact-area ptb-60">
            <div class="container p-0">
                <div class="section-title">
                    <h2><span class="dot"></span> Liên hệ </h2>
                </div>

                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div class="contact-info">
                            <h3>Về chúng tôi</h3>
                            <p></p>

                            <ul class="contact-list">
                                <li><i class="fas fa-map-marker-alt"></i> Địa chỉ: Nguyễn Trãi, Thanh Xuân, Hà Nội</li>
                                <li><i class="fas fa-phone"></i> Điện thoại: <a href="#">0399 292 339</a></li>
                                <li><i class="far fa-envelope"></i> Email: <a href="#"><span class="__cf_email__"
                                            data-cfemail="b2c1c7c2c2ddc0c6f2d1dddfd7c0dd9cd1dddf">invennus.vn@gmail.com</span></a>
                                </li>
{{--                                <li><i class="fas fa-fax"></i> Fax: <a href="#">(+84) 3321 329 12</a></li>--}}
                            </ul>
                            <h3>Thời gian mở cửa - Cửa hàng trực tuyến</h3>
                            <ul class="opening-hours">
                                <li><span>Hàng ngày:</span> 9 giờ - 22 giờ</li>
                            </ul>

                            <h3>Theo dõi:</h3>
                            {{-- <ul class="social">
                                <li><a href="https://www.tiktok.com/@invennus.vn?_t=8jAaa6RVAON&_r=1" target="_blank"><img src="{{ asset('fe/assets/img/icon/tiktok.jpg') }}" alt="image"></a></li>
                                <li><a href="https://shope.ee/5KmymIYORQ" target="_blank"><img src="{{ asset('fe/assets/img/icon/shopee.jpg') }}" alt="image"></a></li>
                                <li><a href="https://s.lazada.vn/s.3OMk9?dsource=share&laz_share_info=821161101_100_1600_0_821161101_null&laz_token=ff391434b3134ba21b7ce4535a66f4a7" target="_blank"><img src="{{ asset('fe/assets/img/icon/laz.jpg') }}" alt="image"></a></li>
                             </ul> --}}
                             <ul class="social" style="">
                                <li><a href="https://zalo.me/0399292338" target="_blank"><img style="width: 40px;height: 40px; margin-right:10px" src="{{ asset('icon/contact/zl.png') }}" alt="image"></a></li>
                                <li><a href="https://www.tiktok.com/@invennus.vn?_t=8jAaa6RVAON&_r=1" target="_blank"><img style=" margin-right:10px" src="{{ asset('icon/contact/ti.png') }}" alt="image"></a></li>
                                <li><a href="https://www.facebook.com/invennus.vn?mibextid=LQQJ4d" target="_blank"><img style="width: 40px;height: 40px; margin-right:10px" src="{{ asset('icon/contact/fb.png') }}" alt="image"></a></li>
                                <li><a href="https://www.instagram.com/invennus.vn?igsh=MWdjbWpjc3lrNWNuaA==" target="_blank"><img style=" margin-right:10px" src="{{ asset('icon/contact/ig.png') }}" alt="image"></a></li>
                                <li><a href="https://shope.ee/5KmymIYORQ" target="_blank"><img style="margin-right:10px" src="{{ asset('icon/contact/sp.png') }}" alt="image"></a></li>
                                <li><a href="https://s.lazada.vn/s.3OMk9?dsource=share&laz_share_info=821161101_100_1600_0_821161101_null&laz_token=ff391434b3134ba21b7ce4535a66f4a7" target="_blank"><img style="margin-right:10px" src="{{ asset('icon/contact/la.png') }}" alt="image"></a></li>
                            </ul>
                            <div id="map" class="w-100 h-100 py-4">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.8550433652604!2d105.81054951109121!3d20.998446988737822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac90c642fc01%3A0x6aab5a22f55b82bd!2zxJAuIE5ndXnhu4VuIFRyw6NpLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1700709555889!5m2!1svi!2s"
                                    width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-7 col-md-12">
                        <div class="contact-form">
                            <h3>Gửi tin nhắn cho chúng tôi</h3>
                            <form class="pt-5" action="{{ route('contact-form') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Họ và tên <span class="text-danger fs-5">*</span></label>
                                            <input required type="text" name="name" id="name" class="form-control"
                                                placeholder="Nhập họ tên của bạn">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Email <span class="text-danger fs-5">*</span></label>
                                            <input required type="email" name="email" id="email" class="form-control"
                                                placeholder="Nhập địa chỉ email">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Số điện thoại <span class="text-danger fs-5">*</span></label>
                                            <input required type="tel" name="phone_number" id="phone_number" class="form-control"
                                                placeholder="Nhập số điện thoại">
                                                @error('phone_number')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <input type="file" class="form-control" name="image" accept="image/*" id="image-input"
                                    placeholder="Nhập tiêu đề" value="{{ old('image') }}">
                            </div>
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror --}}

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Nội dung <span class="text-danger fs-5">*</span></label>
                                            <textarea name="message" id="message" style="height: 100px; " cols="30" rows="8" required
                                                data-error="Vui lòng nhập nội dung" class="form-control py-2" placeholder="Nhập nội dung"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Gửi tin nhắn</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Area -->

        <!-- Map -->

    </div>
@endsection
