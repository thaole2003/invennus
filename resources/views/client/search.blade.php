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
                    {{-- @foreach ($product as $item) --}}
                    <div class="col-lg-8 col-md-12">
                        @foreach ($products as $product)
                        <div class="modal fade productQuickView"  tabindex="-1" role="dialog"
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
                    </div>
                    {{-- @endforeach --}}
                </div>
            </div>
        </section>
        <!-- End Products Details Area -->

    </div>
@endsection
