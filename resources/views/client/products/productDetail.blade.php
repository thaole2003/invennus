@extends('client.layouts.master')

@section('content')
    <div class="container mx-6" style="margin-top: 120px">

        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>{{ $product->title }}</li>
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
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="products-page-gallery">
                                    <div class="product-page-gallery-main">
                                        <input type="hidden" id="product_id" value="{{ $product->id }}">

                                        @foreach ($product->images as $value)
                                            <div class="item">
                                                <img src="{{ asset($value->image) }}" alt="image">
                                            </div>
                                        @endforeach

                                    </div>

                                    <div class="product-page-gallery-preview">

                                        @foreach ($product->images as $value)
                                            <div class="item">
                                                <img src="{{ asset($value->image) }}" alt="image">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="product-details-content">
                                    <h3>{{ $product->title }}</h3>

                                    <div class="price">
                                        <span id="newPrice" class="new-price">${{ $product->price }}</span>
                                    </div>
                                    {{-- @foreach ($product->variants as $item)
                                        @if ($item->storeVariant->quantity > 0)
                                            <div>{{ $item->storeVariant->store->name }}</div>
                                            <input type="hidden" id="storevariant_id"
                                                value="{{ $item->storeVariant->id }}">
                                        @endif
                                    @endforeach --}}
                                    <ul class="product-info">
                                        <li><span>Vendor:</span> <a href="#">Lereve</a></li>
                                        <li><span>Sản phẩm:</span> <a href="#">Trong kho ({{ $totalQuantity }} sản phẩm)</a></li>
                                        <li><span>Danh mục:</span>
                                            @foreach ($product->categories as $index => $categorie)
                                                <a href="#">{{ $categorie->name }}</a>
                                                @if ($index < count($product->categories) - 1)
                                                    |
                                                @endif
                                            @endforeach
                                        </li>

                                    </ul>


                                    <div class="product-size-wrapper">
                                        <h4>Màu:</h4>
                                        <div class="d-flex gap-1">
                                            @foreach ($groupbyColors as $color)
                                            <label style="width: 40px; height:40px;border:1px solid grey;border-radius:50%">
                                                <input type="radio" name="color" id="color" hidden
                                                    value="{{ $color->id }}">
                                                <div class="text-muted">{{ $color->name }}</div>
                                            </label>
                                        @endforeach
                                        </div>

                                    </div>
                                    <div class="product-size-wrapper">
                                        <h4>Kích cỡ:</h4>
                                        <ul>
                                            @foreach ($groupbySizes as $size)
                                                {{-- @if ($item->storeVariant->quantity > 0) --}}
                                                {{-- @foreach ($sizes as $size) --}}
                                                <label id="label-size"
                                                    style="width: 40px; height:40px;background-color:grey ;border:1px solid grey;border-radius:50%">
                                                    <input type="radio" name="size" id="size"
                                                        value="{{ $size->id }}">
                                                    <div class="">{{ $size->name }}</div>
                                                </label>

                                                {{-- @endforeach --}}
                                                {{-- @endif --}}
                                            @endforeach

                                        </ul>
                                        {{-- {{ dd($szArr->sizes) }} --}}
                                        {{-- @foreach ($szArr as $item) --}}
                                        {{-- <input type="radio" name="" id="">{{ $szArr->size }} --}}
                                        {{-- <input type="radio" name="" id="">{{ $item }} --}}
                                        {{-- @foreach ($product->variants as $item)
                                            @if ($item->storeVariant->quantity > 0)
                                                <div>{{ $item->storeVariant->variant->size->name }}</div>
                                            @endif
                                        @endforeach --}}
                                        {{-- @endforeach --}}
                                    </div>
                                    <div class="product-info-btn">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#sizeGuideModal"><i
                                                class="fas fa-crop"></i> Size guide</a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productShippingModal"><i
                                                class="fas fa-truck"></i>
                                            Shipping</a>
                                    </div>

                                    <div class="product-add-to-cart">
                                        <div class="input-counter">
                                            <span class="minus-btn decrement-btn"><i class="fas fa-minus"></i></span>
                                            <input type="text" name="quantity" id="" min="1"
                                                class="form-control text-center qty-input" value="1" step="1">
                                            <span class="plus-btn increment-btn"><i class="fas fa-plus"></i></span>
                                        </div>

                                        <button type="submit" data-prod-var="" id="addtocart" class="btn btn-primary"><i
                                                class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button>
                                    </div>
                                    {{-- <div id="addtocart" class="btn">Add to cart</div> --}}

                                    <div class="buy-checkbox-btn">
                                        <div class="item">
                                            <input class="inp-cbx" id="cbx" type="checkbox">
                                            <label class="cbx" for="cbx">
                                                <span>
                                                    <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                    </svg>
                                                </span>
                                                <span>I agree with the terms and conditions</span>
                                            </label>
                                        </div>

                                        <div class="item">
                                            <a href="#" class="btn btn-primary">Buy it now!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="tab products-details-tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <ul class="tabs">
                                                <li><a href="#">
                                                        <div class="dot"></div> Mô tả
                                                    </a></li>

                                                <li><a href="#">
                                                        <div class="dot"></div> Thông tin sản phẩm
                                                    </a></li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="tab_content">
                                                <div class="tabs_item">
                                                    <div class="products-details-tab-content">
                                                        <p>
                                                            {{ $product->description }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="tabs_item">
                                                    <div class="products-details-tab-content">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Màu:</td>
                                                                        <td>
                                                                            @foreach ($groupbyColors as $index => $color)
                                                                                {{ $color->name }}
                                                                                @if ($index < count($groupbyColors) - 1)
                                                                                    ,
                                                                                @endif
                                                                            @endforeach
                                                                        </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td>Kích cỡ:</td>
                                                                        <td>
                                                                            @foreach ($groupbySizes as $index => $size)
                                                                                {{ $size->name }}
                                                                                @if ($index < count($groupbySizes) - 1)
                                                                                    ,
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Dài:</td>
                                                                        <td>{{ $product->length }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Rộng</td>
                                                                        <td>{{ $product->width }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Nặng</td>
                                                                        <td>{{ $product->weight }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tabs_item">
                                                    <div class="products-details-tab-content">
                                                        <div class="product-review-form">
                                                            <h3>Customer Reviews</h3>

                                                            <div class="review-title">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                </div>
                                                                <p>Based on 3 reviews</p>

                                                                <a href="#" class="btn btn-light">Write a
                                                                    Review</a>
                                                            </div>

                                                            <div class="review-comments">
                                                                <div class="review-item">
                                                                    <div class="rating">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <h3>Good</h3>
                                                                    <span><strong>Admin</strong> on <strong>Sep 21,
                                                                            2021</strong></span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipiscing
                                                                        elit, sed do eiusmod tempor incididunt ut labore
                                                                        et
                                                                        dolore magna aliqua. Ut enim ad minim veniam,
                                                                        quis
                                                                        nostrud exercitation.</p>

                                                                    <a href="#" class="review-report-link">Report as
                                                                        Inappropriate</a>
                                                                </div>

                                                                <div class="review-item">
                                                                    <div class="rating">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <h3>Good</h3>
                                                                    <span><strong>Admin</strong> on <strong>Sep 21,
                                                                            2021</strong></span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipiscing
                                                                        elit, sed do eiusmod tempor incididunt ut labore
                                                                        et
                                                                        dolore magna aliqua. Ut enim ad minim veniam,
                                                                        quis
                                                                        nostrud exercitation.</p>

                                                                    <a href="#" class="review-report-link">Report as
                                                                        Inappropriate</a>
                                                                </div>

                                                                <div class="review-item">
                                                                    <div class="rating">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <h3>Good</h3>
                                                                    <span><strong>Admin</strong> on <strong>Sep 21,
                                                                            2021</strong></span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipiscing
                                                                        elit, sed do eiusmod tempor incididunt ut labore
                                                                        et
                                                                        dolore magna aliqua. Ut enim ad minim veniam,
                                                                        quis
                                                                        nostrud exercitation.</p>

                                                                    <a href="#" class="review-report-link">Report as
                                                                        Inappropriate</a>
                                                                </div>
                                                            </div>

                                                            <div class="review-form">
                                                                <h3>Write a Review</h3>

                                                                <form>
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text" id="name"
                                                                            name="name" placeholder="Enter your name"
                                                                            class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input type="email" id="email"
                                                                            name="email" placeholder="Enter your email"
                                                                            class="form-control">
                                                                    </div>

                                                                    <div class="review-rating">
                                                                        <p>Rate this item</p>

                                                                        <div class="star-source">
                                                                            <svg>
                                                                                <linearGradient x1="50%"
                                                                                    y1="5.41294643%" x2="87.5527344%"
                                                                                    y2="65.4921875%" id="grad">
                                                                                    <stop stop-color="#f2b01e"
                                                                                        offset="0%"></stop>
                                                                                    <stop stop-color="#f2b01e"
                                                                                        offset="60%"></stop>
                                                                                    <stop stop-color="#f2b01e"
                                                                                        offset="100%"></stop>
                                                                                </linearGradient>
                                                                                <symbol id="star"
                                                                                    viewBox="153 89 106 108">
                                                                                    <polygon id="star-shape"
                                                                                        stroke="url(#grad)"
                                                                                        stroke-width="5"
                                                                                        fill="currentColor"
                                                                                        points="206 162.5 176.610737 185.45085 189.356511 150.407797 158.447174 129.54915 195.713758 130.842203 206 95 216.286242 130.842203 253.552826 129.54915 222.643489 150.407797 235.389263 185.45085">
                                                                                    </polygon>
                                                                                </symbol>
                                                                            </svg>
                                                                        </div>

                                                                        <div class="star-rating">
                                                                            <input type="radio" name="star"
                                                                                id="five">
                                                                            <label for="five">
                                                                                <svg class="star">
                                                                                    <use xlink:href="#star" />
                                                                                </svg>
                                                                            </label>

                                                                            <input type="radio" name="star"
                                                                                id="four">
                                                                            <label for="four">
                                                                                <svg class="star">
                                                                                    <use xlink:href="#star" />
                                                                                </svg>
                                                                            </label>

                                                                            <input type="radio" name="star"
                                                                                id="three">
                                                                            <label for="three">
                                                                                <svg class="star">
                                                                                    <use xlink:href="#star" />
                                                                                </svg>
                                                                            </label>

                                                                            <input type="radio" name="star"
                                                                                id="two">
                                                                            <label for="two">
                                                                                <svg class="star">
                                                                                    <use xlink:href="#star" />
                                                                                </svg>
                                                                            </label>

                                                                            <input type="radio" name="star"
                                                                                id="one">
                                                                            <label for="one">
                                                                                <svg class="star">
                                                                                    <use xlink:href="#star" />
                                                                                </svg>
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Review Title</label>
                                                                        <input type="text" id="review-title"
                                                                            name="review-title"
                                                                            placeholder="Enter your review a title"
                                                                            class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Body of Review (1500)</label>
                                                                        <textarea name="review-body" id="review-body" cols="30" rows="10" placeholder="Write your comments here"
                                                                            class="form-control"></textarea>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-light">Submit
                                                                        Review</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}


                    <div class="col-lg-4 col-md-12">

                        <div class="product-single-aside">
                            <div>
                                <h3>cửa hàng còn sản phẩm</h3>
                            </div>
                            @if (count($stores)>0)
                            @foreach ($stores as $store )
                                <h4>{{ $store->name }}</h4>
                            @endforeach

                            @endif
                            <div>

                            </div>
                            <div class="services-aside">
                                <div class="facility-block">
                                    <h3><i class="fas fa-plane"></i> Delivery</h3>

                                    <p>Free shipping on orders over $100.</p>
                                </div>

                                <div class="facility-block">
                                    <h3><i class="fas fa-headset"></i> Support 24/7</h3>

                                    <p>Contact us 24 hours a day, 7 days a week.</p>
                                </div>

                                <div class="facility-block">
                                    <h3><i class="fas fa-exchange-alt"></i> Return</h3>

                                    <p>Simply return it within 30 days for an exchange.</p>
                                </div>
                            </div>

                            <div class="products-payments-info">
                                <span>Guaranteed safe checkout</span>

                                <div class="payments-type">
                                    <a href="#"><img src="{{ asset('fe/assets/img/payment-image/1.svg') }}"
                                            alt="image"></a>
                                    <a href="#"><img src="{{ asset('fe/assets/img/payment-image/2.svg') }}"
                                            alt="image"></a>
                                    <a href="#"><img src="{{ asset('fe/assets/img/payment-image/3.svg') }}"
                                            alt="image"></a>
                                    <a href="#"><img src="{{ asset('fe/assets/img/payment-image/4.svg') }}"
                                            alt="image"></a>
                                    <a href="#"><img src="{{ asset('fe/assets/img/payment-image/5.svg') }}"
                                            alt="image"></a>
                                    <a href="#"><img src="{{ asset('fe/assets/img/payment-image/6.svg') }}"
                                            alt="image"></a>
                                    <a href="#"><img src="{{ asset('fe/assets/img/payment-image/7.svg') }}"
                                            alt="image"></a>
                                </div>
                            </div>

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
            <div class="related-products-area">
                <div class="container">
                    <div class="section-title">
                        <h2><span class="dot"></span> Related Products</h2>
                    </div>

                    <div class="row">
                        <div class="trending-products-slides-two owl-carousel owl-theme">
                            <div class="col-lg-12 col-md-12">
                                <div class="single-product-box">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="assets/img/trending-img5.jpg" alt="image">
                                            <img src="assets/img/trending-hover-img5.jpg" alt="image">
                                        </a>

                                        <ul>
                                            <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                    title="Quick View" data-bs-toggle="modal"
                                                    data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                            <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                    title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                            <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                    title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="product-content">
                                        <h3><a href="#">Belted chino trousers polo</a></h3>

                                        <div class="product-price">
                                            <span class="new-price">$191.00</span>
                                        </div>

                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>

                                        <a href="#" class="btn btn-light">Add to Cart</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="single-product-box">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="assets/img/trending-img6.jpg" alt="image">
                                            <img src="assets/img/trending-hover-img6.jpg" alt="image">
                                        </a>

                                        <ul>
                                            <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                    title="Quick View" data-bs-toggle="modal"
                                                    data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                            <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                    title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                            <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                    title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="product-content">
                                        <h3><a href="#">Belted chino trousers polo</a></h3>

                                        <div class="product-price">
                                            <span class="old-price">$200.00</span>
                                            <span class="new-price">$191.00</span>
                                        </div>

                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>

                                        <a href="#" class="btn btn-light">Add to Cart</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="single-product-box">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="assets/img/bestseller-img5.jpg" alt="image">
                                            <img src="assets/img/bestseller-hover-img5.jpg" alt="image">
                                        </a>

                                        <ul>
                                            <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                    title="Quick View" data-bs-toggle="modal"
                                                    data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                            <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                    title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                            <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                    title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                        </ul>

                                        <div class="sale-tag">
                                            Sale
                                        </div>
                                    </div>

                                    <div class="product-content">
                                        <h3><a href="#">Belted chino trousers polo</a></h3>

                                        <div class="product-price">
                                            <span class="new-price">$191.00</span>
                                        </div>

                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>

                                        <a href="#" class="btn btn-light">Add to Cart</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="single-product-box">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="assets/img/trending-img8.jpg" alt="image">
                                            <img src="assets/img/trending-hover-img8.jpg" alt="image">
                                        </a>

                                        <ul>
                                            <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                    title="Quick View" data-bs-toggle="modal"
                                                    data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                            <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                    title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                            <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                    title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="product-content">
                                        <h3><a href="#">Belted chino trousers polo</a></h3>

                                        <div class="product-price">
                                            <span class="new-price">$191.00</span>
                                        </div>

                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>

                                        <a href="#" class="btn btn-light">Add to Cart</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="single-product-box">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="assets/img/img2.jpg" alt="image">
                                            <img src="assets/img/img-hover2.jpg" alt="image">
                                        </a>

                                        <ul>
                                            <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                    title="Quick View" data-bs-toggle="modal"
                                                    data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                            <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                    title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                            <li><a href="#" data-tooltip="tooltip" data-placement="left"
                                                    title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                        </ul>
                                    </div>
                                    {{-- @if ($auth()->user()->id)
                                        <input type="text" id='user_id' hidden value="{{ auth()->user()->id }}">
                                    @endif --}}
                                    <div class="product-content">
                                        <h3><a href="#">Belted chino trousers polo</a></h3>

                                        <div class="product-price">
                                            <span class="new-price">$191.00</span>
                                        </div>

                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>

                                        <a href="#" class="btn btn-light">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Products Details Area -->

    </div>
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
    <script>
        $(document).ready(function() {

            let dataProduct = @json($product->variants);
            let color = $(this).val();
            let product_id = $("#product_id").val();
            let size = $("input[name='size']:checked").val();

            $(document).on('change', '#color', function() {
                color = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('product.check-detail-quantity') }}",
                    data: {
                        product_id: product_id,
                        color: color,
                    },
                    dataType: 'json',
                    success: function(response) {
                        let sizeIds = [];

                        const res = response.data;

                        for (const item of res) {
                            sizeIds.push(item.size_id + '');
                        }
                        $("input[name='size']").each(function() {
                            $(this).prop('checked', false);

                            if (sizeIds.includes($(this).val())) {
                                $(this).removeAttr('disabled');
                                $('#label-size').removeClass('not-allowed');
                            } else {
                                $(this).attr('disabled', true);
                                $('#label-size').addClass('not-allowed');
                            }
                        })
                        dataProduct.forEach(function(data) {
                            if (data.color_id == color && data.size_id == size) {
                                // console.log(data);
                                document.getElementById('newPrice').innerHTML = data
                                    .price;
                            }
                        });
                    }
                })
            })

            $(document).on('change', '#size', function() {
                size = $(this).val();
                dataProduct.forEach(function(data) {
                    if (data.color_id == color && data.size_id == size) {
                        document.getElementById('newPrice').innerHTML = data.price;
                    }
                });
            })


        })
        $(function() {
            $(document).on('click', '#addtocart', function() {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('add-to-cart') }}",
                    data: {
                        quantity: $('.qty-input').val(),
                        size: $("input[name='size']:checked").val(),
                        color: $("input[name='color']:checked").val(),
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response)
                        location.reload();
                    }
                });
            });
        });
    </script>
@endpush
