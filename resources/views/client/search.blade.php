@extends('client.layouts.master')
@section('content')
    <div class="container mx-6" style="margin-top: 120px">

        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a></li>
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
                        <div class="col-lg-3 col-md-12">
                            
                                    {{-- <div class="all-products-slides-two owl-carousel owl-theme"> --}}
                                        <div class="single-product-box">
                                            <div class="product-image">

                                                <a href="#">
                                                    <img src="{{ $product->image }}" alt="image">
                                                    {{-- <img src="{{ $product->images[0]->image }}" alt="image"> --}}
                                                </a>

                                                <ul>
                                                    <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                            title="Quick View" data-bs-toggle="modal"
                                                            data-bs-target="#productQuickView{{ $product->id }}"><i
                                                                class="far fa-eye"></i></a></li>
                                                    <li><a href="{{ route('wishlist.add-to-wishlist', $product->id) }}"
                                                            data-tooltip="tooltip" data-placement="left"
                                                            title="Add to Wishlist"><i class="far fa-heart"></i></a>
                                                    </li>
                                                    <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                            title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                                </ul>
                                            </div>

                                            <div class="product-content">
                                                <h3><a
                                                        href="{{ route('product.detail', $product->id) }}">{{ $product->title }}</a>
                                                </h3>

                                                <div class="product-price">
                                                    <span class="new-price">${{ $product->price }}</span>
                                                </div>
                                                <a href="{{ route('product.detail', $product->id) }}"
                                                    class="btn btn-light">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    {{-- </div> --}}
                                </div>
                    
                    @endforeach


                </div>


            </div>

        </section>

    </div>
@endsection
