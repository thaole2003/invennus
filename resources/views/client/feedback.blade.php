@extends('client.layouts.master')
@section('content')
    <div class="container mx-6" style="margin-top: 120px">
        @php
        $currentDateTime = \Illuminate\Support\Carbon::now()->tz('Asia/Ho_Chi_Minh');
        @endphp
        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="container">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Feedback</li>
                </ul>
            </div>
        </div>
        <br>
        <hr>
        <div class="page-title-area">
            <div style="display:flex;	align-items: center;" class="container">
                <div style="flex:3;font-size:15px;font-weight:100;display:flex;align-items: center;color:#666666">Theo dõi chúng tôi qua</div>
                <div style="flex: 2;display: flex; flex-direction: column; align-items: flex-end;">
                    <ul>
                        <li><a href="https://www.instagram.com/invennus.vn?igsh=MWdjbWpjc3lrNWNuaA=="><img style="width:20px" src="{{ asset('icon/itg.png') }}" alt=""><span class="social-media-text"> Instagram</span></a></li>
                        <li><a href="https://www.facebook.com/invennus.vn?mibextid=LQQJ4d"><img style="width:20px" src="{{ asset('icon/fb.png') }}" alt=""><span class="social-media-text"> Facebook</span></a></li>
                        <li><a href="https://www.tiktok.com/@invennus.vn?_t=8jAaa6RVAON&_r=1"><img style="width:20px" src="{{ asset('icon/t.png') }}" alt=""><span class="social-media-text"> Tiktok</span></a></li>
                    </ul>
                </div>
                <style>
                    @media (max-width: 768px) {
                        .social-media-text {
                            display: none;
                        }
                    }
                </style>

            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Products Details Area -->
        <section class="products-details-area ptb-60">
            <div class="container">
                <div class="row">
                        @foreach ($feedbacks as $feedback)
                            <div class="col-lg-3 col-md-12">
                                <div class="single-news-post">
                                    <div class="news-image" style="">
                                        <a href="{{ route('product.detail', ['slug' => $feedback->product->slug, 'id' => $feedback->product_id]) }}"><img style="height:100%" src="{{ asset($feedback->image) }}"
                                                         alt="image"></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>

            </div>

        </section>

    </div>
    <style>
        @media (max-width: 435px) {
            .single-product-box .product-image img {
                width: 100%;
                height: 100px;
            }

            .single-category-boxes {
                height: 160px !important;
                width: 160px !important;
            }
        }
    </style>
@endsection

