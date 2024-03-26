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
                    <li>Tìm kiếm</li>
                </ul>
            </div>
        </div>
        <!-- End Page Title Area -->
        <!-- Start Products Details Area -->
        <section class="products-details-area ptb-60">
            <div class="container">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-6">
                            <div class="single-product-box"style="position: relative">
                                            <span class="sold-out-btn" style="padding: 10px 20px;font-size: 16px;font-weight: bold;background-color:red;position: absolute;top:10px;z-index:5;left:5px;color:white;border-radius:10px;display:{{ $product->getTotalQuantityStock() === 0 ? 'block' : 'none'  }}">Tạm hết hàng</span>
                                            <div class="product-image">

                                                <a href="#">
                                                    <img src="{{ $product->image }}" alt="image">
                                                </a>
                                            </div>

                                            <div class="product-content">
                                                <h3><a
                                                    href="{{ route('product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}">{!! mb_strimwidth($product->title, 0, 50, '...') !!}</a>
                                            </h3>
                                                <div style="height: 50px" class="product-price">
                                                    @if ($product->sales &&
                                                    $product->sales->start_date <= $currentDateTime &&
                                                     $product->sales->end_date >= $currentDateTime)
                                                        <span style="text-decoration: line-through; " class="old-price">{{ number_format($product->price) }} VND</span><br>
                                                        <span style="font-weight: bold; color: red; font-size: 1.25rem; line-height: 1.75rem;" class="new-price">
                                                            {{ number_format(max($product->price - $product->sales->discount, 0), 0) }} VND
                                                        </span>

                                                    @else
                                                    <span style="" class="">{{ $product->metatitle}}</span><br>
                                                        <span style="font-weight: bold; font-size: 1.25rem; color: red; line-height: 1.75rem;" class="new-price">{{ number_format($product->price) }} VND</span>
                                                    @endif
                                                </div>
                                                <a href="{{ route('product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}"
                                                    class="btn btn-light">Xem chi tiết</a>
                                            </div>
                                        </div>
                                </div>

                    @endforeach


                </div>

            </div>

        </section>

    </div>
@endsection
