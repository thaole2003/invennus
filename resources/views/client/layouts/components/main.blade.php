@extends('client.layouts.master')

@section('content')

    <!-- Start Facility Area -->
    <section class="facility-area black-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="facility-box">
                        <div class="icon">
                            <i class="fas fa-plane"></i>
                        </div>
                        <h3>Free Shipping World Wide</h3>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="facility-box">
                        <div class="icon">
                            <i class="fas fa-money-check-alt"></i>
                        </div>
                        <h3>100% money back guarantee</h3>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="facility-box">
                        <div class="icon">
                            <i class="far fa-credit-card"></i>
                        </div>
                        <h3>Many payment gatways</h3>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="facility-box">
                        <div class="icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3>24/7 online support</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Facility Area -->

    <!-- Start Category Boxes Area -->
    <section class="category-boxes-area pt-60">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-category-boxes">
                        <img src="{{asset('fe/assets/img/category-products-img5.jpg')}}" alt="image">

                        <h3>Bags</h3>

                        <a href="#" class="shop-now-btn">Shop Now</a>

                        <a href="#" class="link-btn"></a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-category-boxes">
                        <img src="{{asset('fe/assets/img/category-products-img6.jpg')}}" alt="image">

                        <h3>Shoes</h3>

                        <a href="#" class="shop-now-btn">Shop Now</a>

                        <a href="#" class="link-btn"></a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-category-boxes">
                        <img src="{{asset('fe/assets/img/category-products-img7.jpg')}}" alt="image">

                        <h3>Watches</h3>

                        <a href="#" class="shop-now-btn">Shop Now</a>

                        <a href="#" class="link-btn"></a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-category-boxes">
                        <img src="{{asset('fe/assets/img/category-products-img8.jpg')}}" alt="image">

                        <h3>Glasses</h3>

                        <a href="#" class="shop-now-btn">Shop Now</a>

                        <a href="#" class="link-btn"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Category Boxes Area -->

    <!-- Start All Products Area -->
    <section class="all-products-area pb-60">
        <div class="container">
            <div class="tab products-category-tab">
                <div class="section-title">
                    <h2>Product Overview</h2>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <ul class="tabs without-bg">
                            <li><a href="#">
                                    <span class="dot"></span> Latest Products
                                </a></li>

                            <li><a href="#">
                                    <span class="dot"></span> Special Products
                                </a></li>

                            <li><a href="#">
                                    <span class="dot"></span> Featured Products
                                </a></li>
                        </ul>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="tab_content">
                            <div class="tabs_item">
                                <div class="all-products-slides-two owl-carousel owl-theme">
                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img1.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover1.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Linen crochet trim t-shirt</a></h3>

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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img2.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover2.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Neck empire sleeve t-shirts</a></h3>

                                            <div class="product-price">
                                                <span class="old-price">$400.00</span>
                                                <span class="new-price">$300.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img3.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover3.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Mermaid pencil midi lace</a></h3>

                                            <div class="product-price">
                                                <span class="new-price">$166.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img4.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover4.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Criss-cross V neck bodycon</a></h3>

                                            <div class="product-price">
                                                <span class="new-price">$200.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img5.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover5.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">The cosmic cornucopia</a></h3>

                                            <div class="product-price">
                                                <span class="new-price">$150.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img6.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover6.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Tenku remastered</a></h3>

                                            <div class="product-price">
                                                <span class="new-price">$177.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img7.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover7.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Women's sherpa lined hoodie</a></h3>

                                            <div class="product-price">
                                                <span class="old-price">$300.00</span>
                                                <span class="new-price">$299.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img8.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover8.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
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

                            <div class="tabs_item">
                                <div class="all-products-slides-two owl-carousel owl-theme">
                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img1.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover1.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Linen crochet trim t-shirt</a></h3>

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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img2.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover2.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Neck empire sleeve t-shirts</a></h3>

                                            <div class="product-price">
                                                <span class="old-price">$400.00</span>
                                                <span class="new-price">$300.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img3.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover3.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Mermaid pencil midi lace</a></h3>

                                            <div class="product-price">
                                                <span class="new-price">$166.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img4.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover4.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Criss-cross V neck bodycon</a></h3>

                                            <div class="product-price">
                                                <span class="new-price">$200.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img5.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover5.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">The cosmic cornucopia</a></h3>

                                            <div class="product-price">
                                                <span class="new-price">$150.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img6.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover6.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Tenku remastered</a></h3>

                                            <div class="product-price">
                                                <span class="new-price">$177.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img7.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover7.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Women's sherpa lined hoodie</a></h3>

                                            <div class="product-price">
                                                <span class="old-price">$300.00</span>
                                                <span class="new-price">$299.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img8.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover8.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
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

                            <div class="tabs_item">
                                <div class="all-products-slides-two owl-carousel owl-theme">
                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img1.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover1.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Linen crochet trim t-shirt</a></h3>

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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img2.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover2.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Neck empire sleeve t-shirts</a></h3>

                                            <div class="product-price">
                                                <span class="old-price">$400.00</span>
                                                <span class="new-price">$300.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img3.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover3.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Mermaid pencil midi lace</a></h3>

                                            <div class="product-price">
                                                <span class="new-price">$166.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img4.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover4.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Criss-cross V neck bodycon</a></h3>

                                            <div class="product-price">
                                                <span class="new-price">$200.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img5.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover5.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">The cosmic cornucopia</a></h3>

                                            <div class="product-price">
                                                <span class="new-price">$150.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img6.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover6.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Tenku remastered</a></h3>

                                            <div class="product-price">
                                                <span class="new-price">$177.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img7.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover7.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-content">
                                            <h3><a href="#">Women's sherpa lined hoodie</a></h3>

                                            <div class="product-price">
                                                <span class="old-price">$300.00</span>
                                                <span class="new-price">$299.00</span>
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

                                    <div class="single-product-box">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{asset('fe/assets/img/img8.jpg')}}" alt="image">
                                                <img src="{{asset('fe/assets/img/img-hover8.jpg')}}" alt="image">
                                            </a>

                                            <ul>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#productQuickView"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#" data-tooltip="tooltip" data-placement="left" title="Add to Compare"><i class="fas fa-sync"></i></a></li>
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
            </div>
        </div>
    </section>
    <!-- End all Products Area -->

    <!-- Start Products Offer Area -->
    <section class="products-offer-area bg-image2 ptb-60 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="products-offer-content">
                <span>Limited Time Offer</span>
                <h1>-40% Off</h1>
                <p>Get The Best Deals Now</p>
                <a href="#" class="btn btn-primary">Discover Now</a>
            </div>
        </div>
    </section>
    <!-- End Products Offer Area -->

    <!-- Start News Area -->
    <section class="news-area ptb-60">
        <div class="container">
            <div class="section-title">
                <h2><span class="dot"></span> Comero News</h2>
            </div>

            <div class="row">
                <div class="news-slides owl-carousel owl-theme">
                    <div class="col-lg-12 col-md-12">
                        <div class="single-news-post">
                            <div class="news-image">
                                <a href="#"><img src="{{asset('fe/assets/img/blog-img1.jpg')}}" alt="image"></a>
                            </div>

                            <div class="news-content">
                                <h3><a href="#">Styling White Jeans after Labor Day</a></h3>
                                <span class="author">By <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <a href="#" class="btn btn-light">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="single-news-post">
                            <div class="news-image">
                                <a href="#"><img src="{{asset('fe/assets/img/blog-img2.jpg')}}" alt="image"></a>
                            </div>

                            <div class="news-content">
                                <h3><a href="#">The Best Ecommerce Platform for Growing Sales</a></h3>
                                <span class="author">By <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <a href="#" class="btn btn-light">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="single-news-post">
                            <div class="news-image">
                                <a href="#"><img src="{{asset('fe/assets/img/blog-img3.jpg')}}" alt="image"></a>
                            </div>

                            <div class="news-content">
                                <h3><a href="#">The Evolution of the B2B Buying Process</a></h3>
                                <span class="author">By <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <a href="#" class="btn btn-light">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="single-news-post">
                            <div class="news-image">
                                <a href="#"><img src="{{asset('fe/assets/img/blog-img4.jpg')}}" alt="image"></a>
                            </div>

                            <div class="news-content">
                                <h3><a href="#">The Best eCommerce Blogs for Online Retailers</a></h3>
                                <span class="author">By <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <a href="#" class="btn btn-light">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="single-news-post">
                            <div class="news-image">
                                <a href="#"><img src="{{asset('fe/assets/img/blog-img5.jpg')}}" alt="image"></a>
                            </div>

                            <div class="news-content">
                                <h3><a href="#">How to Do Social Media Customer Service</a></h3>
                                <span class="author">By <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <a href="#" class="btn btn-light">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End News Area -->

    <!-- Start Partner Area -->
    <div class="partner-area">
        <div class="container">
            <div class="partner-slides owl-carousel owl-theme">
                <div class="partner-item">
                    <a href="#" target="_blank"><img src="{{asset('fe/assets/img/partner1.png')}}" alt="image"></a>
                </div>

                <div class="partner-item">
                    <a href="#" target="_blank"><img src="{{asset('fe/assets/img/partner2.png')}}" alt="image"></a>
                </div>

                <div class="partner-item">
                    <a href="#" target="_blank"><img src="{{asset('fe/assets/img/partner3.png')}}" alt="image"></a>
                </div>

                <div class="partner-item">
                    <a href="#" target="_blank"><img src="{{asset('fe/assets/img/partner4.png')}}" alt="image"></a>
                </div>

                <div class="partner-item">
                    <a href="#" target="_blank"><img src="{{asset('fe/assets/img/partner5.png')}}" alt="image"></a>
                </div>

                <div class="partner-item">
                    <a href="#" target="_blank"><img src="{{asset('fe/assets/img/partner6.png')}}" alt="image"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Partner Area -->

    <!-- Start Subscribe Area -->
    <section class="subscribe-area ptb-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="newsletter-content">
                        <h3>Subscribe to our newsletter</h3>
                        <p>A short sentence describing what someone will receive by subscribing</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <form class="newsletter-form" data-bs-toggle="validator">
                        <input type="email" class="form-control" placeholder="Enter your email address" name="EMAIL" required autocomplete="off">
                        <button type="submit">Subscribe</button>
                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Subscribe Area -->

    <!-- Start Instagram Area -->
    <div class="instagram-area">
        <div class="instagram-slides owl-carousel owl-theme">
            <div class="instagram-box">
                <img src="{{asset('fe/assets/img/instagram1.jpg')}}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>

            <div class="instagram-box">
                <img src="{{asset('fe/assets/img/instagram2.jpg')}}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>

            <div class="instagram-box">
                <img src="{{asset('fe/assets/img/instagram3.jpg')}}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>

            <div class="instagram-box">
                <img src="{{asset('fe/assets/img/instagram4.jpg')}}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>

            <div class="instagram-box">
                <img src="{{asset('fe/assets/img/instagram5.jpg')}}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>

            <div class="instagram-box">
                <img src="{{asset('fe/assets/img/instagram6.jpg')}}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>

            <div class="instagram-box">
                <img src="{{asset('fe/assets/img/instagram7.jpg')}}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>

            <div class="instagram-box">
                <img src="{{asset('fe/assets/img/instagram8.jpg')}}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>

            <div class="instagram-box">
                <img src="{{asset('fe/assets/img/instagram9.jpg')}}" alt="image">

                <div class="icon">
                    <i class="fab fa-instagram"></i>
                </div>

                <a href="https://www.instagram.com/" target="_blank"></a>
            </div>
        </div>
    </div>
    <!-- End Instagram Area -->

    <!-- Start Shopping Cart Modal -->
    <div class="modal right fade shoppingCartModal" id="shoppingCartModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <div class="modal-body">
                    <h3>My Cart (3)</h3>

                    <div class="product-cart-content">
                        <div class="product-cart">
                            <div class="product-image">
                                <img src="{{asset('fe/assets/img/img2.jpg')}}" alt="image">
                            </div>

                            <div class="product-content">
                                <h3><a href="#">Belted chino trousers polo</a></h3>
                                <span>Blue / XS</span>
                                <div class="product-price">
                                    <span>1</span>
                                    <span>x</span>
                                    <span class="price">$191.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-cart">
                            <div class="product-image">
                                <img src="{{asset('fe/assets/img/img3.jpg')}}" alt="image">
                            </div>

                            <div class="product-content">
                                <h3><a href="#">Belted chino trousers polo</a></h3>
                                <span>Blue / XS</span>
                                <div class="product-price">
                                    <span>1</span>
                                    <span>x</span>
                                    <span class="price">$191.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-cart">
                            <div class="product-image">
                                <img src="{{asset('fe/assets/img/img4.jpg')}}" alt="image">
                            </div>

                            <div class="product-content">
                                <h3><a href="#">Belted chino trousers polo</a></h3>
                                <span>Blue / XS</span>
                                <div class="product-price">
                                    <span>1</span>
                                    <span>x</span>
                                    <span class="price">$191.00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-cart-subtotal">
                        <span>Subtotal</span>

                        <span class="subtotal">$500.00</span>
                    </div>

                    <div class="product-cart-btn">
                        <a href="#" class="btn btn-primary">Proceed to Checkout</a>
                        <a href="#" class="btn btn-light">View Shopping Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shopping Cart Modal -->

    <!-- Start Wishlist Modal -->
    <div class="modal right fade shoppingWishlistModal" id="shoppingWishlistModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <div class="modal-body">
                    <h3>My Wish List (3)</h3>

                    <div class="product-cart-content">
                        <div class="product-cart">
                            <div class="product-image">
                                <img src="{{asset('fe/assets/img/img2.jpg')}}" alt="image">
                            </div>

                            <div class="product-content">
                                <h3><a href="#">Belted chino trousers polo</a></h3>
                                <span>Blue / XS</span>
                                <div class="product-price">
                                    <span>1</span>
                                    <span>x</span>
                                    <span class="price">$191.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-cart">
                            <div class="product-image">
                                <img src="{{asset('fe/assets/img/img3.jpg')}}" alt="image">
                            </div>

                            <div class="product-content">
                                <h3><a href="#">Belted chino trousers polo</a></h3>
                                <span>Blue / XS</span>
                                <div class="product-price">
                                    <span>1</span>
                                    <span>x</span>
                                    <span class="price">$191.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-cart">
                            <div class="product-image">
                                <img src="{{asset('fe/assets/img/img4.jpg')}}" alt="image">
                            </div>

                            <div class="product-content">
                                <h3><a href="#">Belted chino trousers polo</a></h3>
                                <span>Blue / XS</span>
                                <div class="product-price">
                                    <span>1</span>
                                    <span>x</span>
                                    <span class="price">$191.00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-cart-btn">
                        <a href="#" class="btn btn-light">View Shopping Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Wishlist Modal -->

    <!-- Start Products QuickView Modal Area -->
    <div class="modal fade productQuickView" id="productQuickView" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="productQuickView-image">
                            <img src="{{asset('fe/assets/img/quick-view-img.jpg')}}" alt="image">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="product-content">
                            <h3><a href="#">Belted chino trousers polo</a></h3>

                            <div class="price">
                                <span class="new-price">$191.00</span>
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

                                <ul>
                                    <li><a href="#" title="Black" class="color-black"></a></li>
                                    <li><a href="#" title="White" class="color-white"></a></li>
                                    <li class="active"><a href="#" title="Green" class="color-green"></a></li>
                                    <li><a href="#" title="Yellow Green" class="color-yellowgreen"></a></li>
                                    <li><a href="#" title="Teal" class="color-teal"></a></li>
                                </ul>
                            </div>

                            <div class="product-size-wrapper">
                                <h4>Size:</h4>

                                <ul>
                                    <li><a href="#">XS</a></li>
                                    <li class="active"><a href="#">S</a></li>
                                    <li><a href="#">M</a></li>
                                    <li><a href="#">XL</a></li>
                                    <li><a href="#">XXL</a></li>
                                </ul>
                            </div>

                            <div class="product-add-to-cart">
                                <div class="input-counter">
                                    <span class="minus-btn"><i class="fas fa-minus"></i></span>
                                    <input type="text" value="1">
                                    <span class="plus-btn"><i class="fas fa-plus"></i></span>
                                </div>

                                <button type="submit" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            </div>

                            <a href="#" class="view-full-info">View full info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Products QuickView Modal Area -->

    <!-- Start Size Guide Modal Area -->
    <div class="modal fade sizeGuideModal" id="sizeGuideModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>

                <div class="modal-sizeguide">
                    <h3>Size Guide</h3>
                    <p>This is an approximate conversion table to help you find your size.</p>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Italian</th>
                                <th>Spanish</th>
                                <th>German</th>
                                <th>UK</th>
                                <th>US</th>
                                <th>Japanese</th>
                                <th>Chinese</th>
                                <th>Russian</th>
                                <th>Korean</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>34</td>
                                <td>30</td>
                                <td>28</td>
                                <td>4</td>
                                <td>00</td>
                                <td>3</td>
                                <td>155/75A</td>
                                <td>36</td>
                                <td>44</td>
                            </tr>
                            <tr>
                                <td>36</td>
                                <td>32</td>
                                <td>30</td>
                                <td>6</td>
                                <td>0</td>
                                <td>5</td>
                                <td>155/80A</td>
                                <td>38</td>
                                <td>44</td>
                            </tr>
                            <tr>
                                <td>38</td>
                                <td>34</td>
                                <td>32</td>
                                <td>8</td>
                                <td>2</td>
                                <td>7</td>
                                <td>160/84A</td>
                                <td>40</td>
                                <td>55</td>
                            </tr>
                            <tr>
                                <td>40</td>
                                <td>36</td>
                                <td>34</td>
                                <td>10</td>
                                <td>4</td>
                                <td>9</td>
                                <td>165/88A</td>
                                <td>42</td>
                                <td>55</td>
                            </tr>
                            <tr>
                                <td>42</td>
                                <td>38</td>
                                <td>36</td>
                                <td>12</td>
                                <td>6</td>
                                <td>11</td>
                                <td>170/92A</td>
                                <td>44</td>
                                <td>66</td>
                            </tr>
                            <tr>
                                <td>44</td>
                                <td>40</td>
                                <td>38</td>
                                <td>14</td>
                                <td>8</td>
                                <td>13</td>
                                <td>175/96A</td>
                                <td>46</td>
                                <td>66</td>
                            </tr>
                            <tr>
                                <td>46</td>
                                <td>42</td>
                                <td>40</td>
                                <td>16</td>
                                <td>10</td>
                                <td>15</td>
                                <td>170/98A</td>
                                <td>48</td>
                                <td>77</td>
                            </tr>
                            <tr>
                                <td>48</td>
                                <td>44</td>
                                <td>42</td>
                                <td>18</td>
                                <td>12</td>
                                <td>17</td>
                                <td>170/100B</td>
                                <td>50</td>
                                <td>77</td>
                            </tr>
                            <tr>
                                <td>50</td>
                                <td>46</td>
                                <td>44</td>
                                <td>20</td>
                                <td>14</td>
                                <td>19</td>
                                <td>175/100B</td>
                                <td>52</td>
                                <td>88</td>
                            </tr>
                            <tr>
                                <td>52</td>
                                <td>48</td>
                                <td>46</td>
                                <td>22</td>
                                <td>16</td>
                                <td>21</td>
                                <td>180/104B</td>
                                <td>54</td>
                                <td>88</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Size Guide Modal Area -->

    <!-- Start Shipping Modal Area -->
    <div class="modal fade productShippingModal" id="productShippingModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>

                <div class="shipping-content">
                    <h3>Shipping</h3>
                    <ul>
                        <li>Complimentary ground shipping within 1 to 7 business days</li>
                        <li>In-store collection available within 1 to 7 business days</li>
                        <li>Next-day and Express delivery options also available</li>
                        <li>Purchases are delivered in an orange box tied with a Bolduc ribbon, with the exception of certain items</li>
                        <li>See the delivery FAQs for details on shipping methods, costs and delivery times</li>
                    </ul>

                    <h3>Returns and Exchanges</h3>
                    <ul>
                        <li>Easy and complimentary, within 14 days</li>
                        <li>See conditions and procedure in our return FAQs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shipping Modal Area -->

    <!-- Start Products Filter Modal Area -->
    <div class="modal left fade productsFilterModal" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i> Close</span></button>

                <div class="modal-body">
                    <div class="woocommerce-sidebar-area">
                        <div class="collapse-widget filter-list-widget">
                            <h3 class="collapse-widget-title">
                                Current Selection

                                <i class="fas fa-angle-up"></i>
                            </h3>

                            <div class="selected-filters-wrap-list">
                                <ul>
                                    <li><a href="#">44</a></li>
                                    <li><a href="#">XI</a></li>
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Accessories</a></li>
                                </ul>

                                <div class="delete-selected-filters">
                                    <a href="#"><i class="far fa-trash-alt"></i> <span>Clear All</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="collapse-widget collections-list-widget">
                            <h3 class="collapse-widget-title">
                                Collections

                                <i class="fas fa-angle-up"></i>
                            </h3>

                            <ul class="collections-list-row">
                                <li class="active"><a href="#">Women’s</a></li>
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Clothing</a></li>
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Uncategorized</a></li>
                            </ul>
                        </div>

                        <div class="collapse-widget brands-list-widget">
                            <h3 class="collapse-widget-title">
                                Brands

                                <i class="fas fa-angle-up"></i>
                            </h3>

                            <ul class="brands-list-row">
                                <li class="active"><a href="#">Adidas</a></li>
                                <li><a href="#">Nike</a></li>
                                <li><a href="#">Reebok</a></li>
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">Ralph Lauren</a></li>
                                <li><a href="#">Delpozo</a></li>
                            </ul>
                        </div>

                        <div class="collapse-widget size-list-widget">
                            <h3 class="collapse-widget-title">
                                Size

                                <i class="fas fa-angle-up"></i>
                            </h3>

                            <ul class="size-list-row">
                                <li><a href="#">20</a></li>
                                <li><a href="#">24</a></li>
                                <li><a href="#">36</a></li>
                                <li><a href="#">30</a></li>
                                <li class="active"><a href="#">XS</a></li>
                                <li><a href="#">S</a></li>
                                <li><a href="#">M</a></li>
                                <li><a href="#">L</a></li>
                                <li><a href="#">L</a></li>
                                <li><a href="#">XL</a></li>
                            </ul>
                        </div>

                        <div class="collapse-widget price-list-widget">
                            <h3 class="collapse-widget-title">
                                Price

                                <i class="fas fa-angle-up"></i>
                            </h3>

                            <ul class="price-list-row">
                                <li><a href="#">$10 - $100</a></li>
                                <li class="active"><a href="#">$100 - $200</a></li>
                                <li><a href="#">$200 - $300</a></li>
                                <li><a href="#">$300 - $400</a></li>
                                <li><a href="#">$400 - $500</a></li>
                                <li><a href="#">$500 - $600</a></li>
                            </ul>
                        </div>

                        <div class="collapse-widget color-list-widget">
                            <h3 class="collapse-widget-title">
                                Color

                                <i class="fas fa-angle-up"></i>
                            </h3>

                            <ul class="color-list-row">
                                <li><a href="#" title="Black" class="color-black"></a></li>
                                <li><a href="#" title="Red" class="color-red"></a></li>
                                <li><a href="#" title="Yellow" class="color-yellow"></a></li>
                                <li><a href="#" title="White" class="color-white"></a></li>
                                <li><a href="#" title="Blue" class="color-blue"></a></li>
                                <li><a href="#" title="Green" class="color-green"></a></li>
                                <li><a href="#" title="Yellow Green" class="color-yellowgreen"></a></li>
                                <li><a href="#" title="Pink" class="color-pink"></a></li>
                                <li><a href="#" title="Violet" class="color-violet"></a></li>
                                <li><a href="#" title="Blue Violet" class="color-blueviolet"></a></li>
                                <li><a href="#" title="Lime" class="color-lime"></a></li>
                                <li><a href="#" title="Plum" class="color-plum"></a></li>
                                <li><a href="#" title="Teal" class="color-teal"></a></li>
                            </ul>
                        </div>

                        <div class="collapse-widget tag-list-widget">
                            <h3 class="collapse-widget-title">
                                Popular Tags

                                <i class="fas fa-angle-up"></i>
                            </h3>

                            <ul class="tags-list-row">
                                <li><a href="#">Vintage</a></li>
                                <li><a href="#">Black</a></li>
                                <li class="active"><a href="#">Discount</a></li>
                                <li><a href="#">Good</a></li>
                                <li><a href="#">Jeans</a></li>
                                <li><a href="#">Summer</a></li>
                                <li><a href="#">Winter</a></li>
                            </ul>
                        </div>

                        <div class="collapse-widget aside-products-widget">
                            <h3 class="aside-widget-title">
                                Popular Products
                            </h3>

                            <div class="aside-single-products">
                                <div class="products-image">
                                    <a href="#">
                                        <img src="{{asset('fe/assets/img/img2.jpg')}}" alt="image">
                                    </a>
                                </div>

                                <div class="products-content">
                                    <span><a href="#">Men's</a></span>
                                    <h3><a href="#">Belted chino trousers polo</a></h3>

                                    <div class="product-price">
                                        <span class="new-price">$191.00</span>
                                        <span class="old-price">$291.00</span>
                                    </div>
                                </div>
                            </div>

                            <div class="aside-single-products">
                                <div class="products-image">
                                    <a href="#">
                                        <img src="{{asset('fe/assets/img/img3.jpg')}}" alt="image">
                                    </a>
                                </div>

                                <div class="products-content">
                                    <span><a href="#">Men's</a></span>
                                    <h3><a href="#">Belted chino trousers polo</a></h3>

                                    <div class="product-price">
                                        <span class="new-price">$191.00</span>
                                        <span class="old-price">$291.00</span>
                                    </div>
                                </div>
                            </div>

                            <div class="aside-single-products">
                                <div class="products-image">
                                    <a href="#">
                                        <img src="{{asset('fe/assets/img/img4.jpg')}}" alt="image">
                                    </a>
                                </div>

                                <div class="products-content">
                                    <span><a href="#">Men's</a></span>
                                    <h3><a href="#">Belted chino trousers polo</a></h3>

                                    <div class="product-price">
                                        <span class="new-price">$191.00</span>
                                        <span class="old-price">$291.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="collapse-widget aside-trending-widget">
                            <div class="aside-trending-products">
                                <img src="{{asset('fe/assets/img/bestseller-hover-img1.jpg')}}" alt="image">

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
        </div>
    </div>
    <!-- End Products Filter Modal Area -->

    <!-- Start Ads Popup Area -->
    <div class="bts-popup" role="alert">
        <div class="bts-popup-container">
            <h3>Free Shipping</h3>
            <p>Worldwide free shipping for all members. To become a member subscribe for our <strong>free offers / discount newsletter.</strong></p>

            <form>
                <input type="email" class="form-control" placeholder="mail@name.com" name="EMAIL" required>
                <button type="submit"><i class="far fa-paper-plane"></i></button>
            </form>

            <ul>
                <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" class="linkdein"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="#" class="instagram"><i class="fab fa-instagram"></i></a></li>
            </ul>

            <div class="img-box">
                <img src="{{asset('fe/assets/img/women.png')}}" alt="image">
                <img src="{{asset('fe/assets/img/women2.png')}}" alt="image">
            </div>

            <a href="#0" class="bts-popup-close"></a>
        </div>
    </div>
    <!-- End Ads Popup Area -->

@endsection