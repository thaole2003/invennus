@extends('client.layouts.master')

@section('content')
    <div class="container mx-6" style="margin-top: 120px">

        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Belted chino trousers polo</li>
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
                                        <span class="new-price">${{ $product->price }}</span>
                                    </div>
                                    @foreach ($product->variants as $item)
                                        @if ($item->storeVariant->quantity > 0)
                                            <div>{{ $item->storeVariant->store->name }}</div>
                                            <input type="hidden" id="storevariant_id"
                                                value="{{ $item->storeVariant->id }}">
                                        @endif
                                    @endforeach
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

                                    <div class="product-size-wrapper">
                                        <h4>Size:</h4>
                                        {{-- <ul>
                                            <li><a href="#">{{ $szArr['size'] }}</a></li>
                                        </ul> --}}
                                        {{-- {{ dd($szArr->sizes) }} --}}
                                        {{-- @foreach ($szArr as $item) --}}
                                        <input type="radio" name="" id="">{{ $szArr->size }}
                                        <input type="radio" name="" id="">{{ $item }}
                                        @foreach ($product->variants as $item)
                                            @if ($item->storeVariant->quantity > 0)
                                                <div>{{ $item->storeVariant->variant->size->name }}</div>
                                                {{-- <input type="hidden" id="storevariant_id"
                                                    value="{{ $item->storeVariant->id }}"> --}}
                                            @endif
                                        @endforeach
                                        {{-- @endforeach --}}
                                    </div>
                                    <div class="product-size-wrapper">
                                        <h4>Color:</h4>
                                        <input type="radio" name="" value="{{ $szArr->color_id }}"
                                            id="">{{ $szArr->color }}
                                            @foreach ($product->variants as $item)
                                            @if ($item->storeVariant->quantity > 0)
                                                <div>{{ $item->storeVariant->variant->color->name }}</div>
                                                {{-- <input type="hidden" id="storevariant_id"
                                                    value="{{ $item->storeVariant->id }}"> --}}
                                            @endif
                                        @endforeach
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
                                            <span class="minus-btn"><i class="fas fa-minus"></i></span>
                                            <input type="text" value="1">
                                            <span class="plus-btn"><i class="fas fa-plus"></i></span>
                                        </div>

                                        <button type="submit" id="addtocart" class="btn btn-primary"><i
                                                class="fas fa-cart-plus"></i>
                                            Add
                                            to Cart</button>
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
                                                        <div class="dot"></div> Description
                                                    </a></li>

                                                <li><a href="#">
                                                        <div class="dot"></div> Additional information
                                                    </a></li>

                                                <li><a href="#">
                                                        <div class="dot"></div> Reviews
                                                    </a></li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="tab_content">
                                                <div class="tabs_item">
                                                    <div class="products-details-tab-content">
                                                        <p>Design inspiration lorem ipsum dolor sit amet, consectetuer
                                                            adipiscing elit. Morbi commodo, ipsum sed pharetra gravida,
                                                            orci
                                                            magna rhoncus neque, id pulvinar odio lorem non turpis.
                                                            Nullam
                                                            sit amet enim. Suspendisse id velit vitae ligula volutpat
                                                            condimentum. Aliquam erat volutpat. Sed quis velit. Nulla
                                                            facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam
                                                            consectetuer. Sed aliquam, nunc eget euismod ullamcorper,
                                                            lectus
                                                            nunc ullamcorper orci, fermentum bibendum enim nibh eget
                                                            ipsum.
                                                            Nam consectetuer. Sed aliquam, nunc eget euismod
                                                            ullamcorper,
                                                            lectus nunc ullamcorper orci, fermentum bibendum enim nibh
                                                            eget
                                                            ipsum. Nulla libero. Vivamus pharetra posuere sapien.</p>

                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <ul>
                                                                    <li>Fabric 1: 100% Polyester</li>
                                                                    <li>Fabric 2: 100% Polyester,Lining: 100% Polyester
                                                                    </li>
                                                                    <li>Fabric 3: 75% Polyester, 20% Viscose, 5%
                                                                        Elastane
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <ol>
                                                                    <li>Fabric 1: 75% Polyester, 20% Viscose, 5%
                                                                        Elastane
                                                                    </li>
                                                                    <li>Fabric 2: 100% Polyester,Lining: 100% Polyester
                                                                    </li>
                                                                    <li>Fabric 3: 100% Polyester</li>
                                                                </ol>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tabs_item">
                                                    <div class="products-details-tab-content">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Color:</td>
                                                                        <td>Blue, Purple, White</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Size:</td>
                                                                        <td>20, 24</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Material:</td>
                                                                        <td>100% Polyester</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Height:</td>
                                                                        <td>180 cm - 5' 11”</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Bust</td>
                                                                        <td>83 cm - 32”</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Waist</td>
                                                                        <td>57 cm - 22”</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Hips</td>
                                                                        <td>88 cm - 35</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Shipping</td>
                                                                        <td>Free</td>
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
        $(function() {

            $(document).on('click', '#addtocart', function() {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('add-to-cart') }}",
                    data: {
                        product_id: $('#product_id').val(),
                        storevariant_id: $('#storevariant_id').val(),
                        quantity: 1,
                        user_id: 1,
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response)
                        // location.reload();
                        // Xem còn lỗi gì k 
                        // em insert vaof laf okee roif a
                        // di ngu thoi
                        // OK thôi để mai a bảo ngủ đi thôi
                        // okee a

                    }
                });
            });
        })
    </script>
@endpush
