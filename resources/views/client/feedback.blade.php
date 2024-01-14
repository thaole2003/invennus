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
        <!-- End Page Title Area -->

        <!-- Start Products Details Area -->
        <section class="products-details-area ptb-60">
            <div class="container">
                <div class="row">
                        @foreach ($feedbacks as $feedback)
                            <div class="col-lg-3 col-md-12">
                                <div class="single-news-post">
                                    <div class="news-image" style="">
                                        <a href="{{ route('product.detail', $feedback->product_id) }}"><img style="height:340px" src="{{ asset($feedback->image) }}"
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
                height: 240px;
            }

            .single-category-boxes {
                height: 160px !important;
                width: 160px !important;
            }
        }
    </style>
@endsection

