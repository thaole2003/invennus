@extends('client.layouts.master')

@section('content')
    @php
        $currentDateTime = \Illuminate\Support\Carbon::now()->tz('Asia/Ho_Chi_Minh');
    @endphp
    <div class="container mx-6" style="margin-top: 120px">

        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="container">
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li>{{ $product->title }}</li>
                </ul>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Products Details Area -->
        <section class="products-details-area ptb-60">
            <div class="container">
                <div class="row">
                    <input type="hidden" id="product_id" value="{{ $product->id }}">
                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="products-page-gallery">
                                    <div class="product-page-gallery-main">
                                        @foreach ($product->images as $value)
                                            <div class="item">
                                                <img style="width:416px;height:508px" src="{{ asset($value->image) }}"
                                                    alt="image">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="product-page-gallery-preview">
                                        @foreach ($product->images as $value)
                                            <div class="item">
                                                <img style="width:76px;height:92px" src="{{ asset($value->image) }}"
                                                    alt="image">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="product-details-content">
                                    <h3>{{ $product->title }}</h3>

                                    <div class="price">
                                        <span id="newPrice" class="new-price">{{ number_format($product->price) }}
                                            VND</span>
                                    </div>
                                    <ul class="product-info">
                                        <input type="hidden" id="product_variant">
                                        <input type="hidden" id="quantity-stock">

                                        <li>Sản phẩm: Trong kho<span id="total-quantity-stock"> ({{ $totalQuantity }}
                                                sản
                                                phẩm)</span></li>
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
                                                <label class="color-label" style="width: 40px; height:40px;">
                                                    <input style="display: none" type="radio" name="color"
                                                        id="color" value="{{ $color->id }}">
                                                    <div class="text-muted">{{ $color->name }}</div>
                                                </label>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="product-size-wrapper">
                                        <h4>Kích cỡ:</h4>
                                        <ul>
                                            @foreach ($groupbySizes as $size)
                                                <label id="label-size gap-1" class="labelSize"
                                                    style="width: 40px; height:40px;">
                                                    <input style="display: none" type="radio" name="size"
                                                        class="size" id="size" value="{{ $size->id }}">
                                                    <div class="">{{ $size->name }}</div>
                                                </label>
                                            @endforeach

                                        </ul>

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
                                            <input type="text" name="quantity" id="quantity" min="1"
                                                class="form-control text-center qty-input" value="1" step="1"
                                                readonly>
                                            <span class="plus-btn increment-btn"><i class="fas fa-plus"></i></span>
                                        </div>
                                    </div>
                                    <div class="buy-checkbox-btn">
                                        <div class="item">
                                            <button type="submit" data-prod-var="" id="addtocart"
                                                class="btn btn-primary"><i class="fas fa-cart-plus"></i> Thêm vào giỏ
                                                hàng</button>
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
                                <h3>Sản phẩm có sẵn tại : </h3>
                                <hr>
                            </div>
                            @if (count($stores) > 0)
                                @foreach ($stores as $store)
                                    <h4>{{ $store->name }}</h4>
                                    <hr>
                                @endforeach
                            @endif
                            <div>

                            </div>
                            <div class="services-aside">
                                <div class="facility-block">
                                    <h3><i class="fas fa-plane"></i>Miễn phí vận chuyển</h3>

                                    <p>Với đơn hàng trên 599.000 VND.</p>
                                </div>

                                <div class="facility-block">
                                    <h3><i class="fas fa-headset"></i>Hỗ trợ 24/7</h3>

                                    <p>Liên hệ với chúng tôi.</p>
                                </div>

                                <div class="facility-block">
                                    <h3><i class="fas fa-exchange-alt"></i> Miễn phí đổi hàng</h3>

                                    <p>Trong 30 ngày kể từ ngày mua..</p>
                                </div>
                            </div>

                            <div class="aside-trending-products">
                                <img src="https://scontent.fhan5-6.fna.fbcdn.net/v/t39.30808-6/342223368_162825819755433_5695418889023791058_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=5f2048&_nc_ohc=JKuuALvhb3EAX_tqpFK&_nc_ht=scontent.fhan5-6.fna&oh=00_AfAovCl_7qNpZ5fRd09dpzzgZ4K_63GsE62DD5FEKal5uw&oe=6540A2A3"
                                    alt="image">

                                <div class="category">
                                    <h4>Có thể bạn quan tâm</h4>
                                    <span>Cho quảng cáo</span>
                                </div>

                                <a href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($products) > 0)
                <div class="related-products-area">
                    <div class="container">
                        <div class="section-title">
                            <h2><span class="dot"></span> Sản phẩm tương tự</h2>
                        </div>

                        <div class="row">
                            <div class="trending-products-slides-two owl-carousel owl-theme">
                                @foreach ($products as $product)
                                    <div class="col-lg-12 col-md-12">
                                        <div class="single-product-box">
                                            <div class="product-image">

                                                <a href="#">
                                                    <img src="{{ asset($product->image) }}" alt="image">
                                                    <img src="{{ isset($product->images[0]->image) ? asset($product->images[0]->image) : asset('img/logo.jpg') }}"
                                                        alt="image">
                                                </a>


                                            </div>
                                            <div class="product-content">
                                                <h3><a
                                                        href="{{ route('product.detail', $product->id) }}">{{ $product->title }}</a>
                                                </h3>
                                                <div style="height: 50px" class="product-price">
                                                    @if ($product->sales && $product->sales->start_date <= $currentDateTime && $product->sales->end_date >= $currentDateTime)
                                                        @php
                                                            $discountedPrice = $product->price - $product->sales->discount;
                                                            $discountedPrice = max($discountedPrice, 0);
                                                        @endphp
                                                        <span style="text-decoration: line-through; "
                                                            class="old-price">{{ number_format($product->price) }}
                                                            VND</span><br>
                                                        <span
                                                            style="font-weight: bold;color: red; font-size: 1.25rem; line-height: 1.75rem;"
                                                            class="new-price">{{ number_format($discountedPrice) }}
                                                            VND</span>
                                                    @else
                                                        <span style=""
                                                            class="">{{ $product->metatitle }}</span><br>
                                                        <span
                                                            style="font-weight: bold; font-size: 1.25rem; color: red; line-height: 1.75rem;"
                                                            class="new-price">{{ number_format($product->price) }}
                                                            VND</span>
                                                    @endif
                                                </div>
                                                <a href="{{ route('product.detail', $product->id) }}"
                                                    class="btn btn-light">Xem chi tiết</a>
                                            </div>
                                        </div>
                                        {{-- <div class="single-product-box">
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
                                </div> --}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif

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
            var inputValue = parseInt($('#quantity').val());

            // let quantity = '';
            let dataProduct = @json($productvariants);
            console.log(dataProduct);
            let product_id = $("#product_id").val();
            console.log(product_id);
            let size = $("input[name='size']:checked").val();
            $(document).on('change', '#color', function() {
                const color = $(this).val();
                $('.color-label').removeClass('bg-danger text-light');
                $(this).closest('.color-label').addClass('bg-danger text-light');
                const sizeEl = $('input[name="size"]');
                $("#quantity").val("1");
                $('.increment-btn').css('pointer-events', 'auto')
                $.ajax({
                    type: "GET",
                    url: "{{ route('product.check-detail-quantity') }}",
                    data: {
                        product_id: product_id,
                        color: color,
                    },
                    dataType: 'json',
                    success: function(response) {
                        const data = response.data;
                        let szIds = [];
                        for (const item of data) {
                            szIds.push(item.size_id)
                            console.log(item);
                        }
                        $('input.size').each(function() {
                            const val = Number($(this).val());
                            if (szIds.includes(val)) {
                                $(this).attr('disabled', false)
                                $(this).parent().addClass('bg-primary text-light');
                            } else {
                                $(this).attr('disabled', true)
                                $(this).parent().removeClass('bg-primary text-light');
                            }
                        })
                    }
                })
            })
            $(document).on('change', '#size', function() {
                size = $(this).val();
                $('.labelSize').removeClass('border border-warning');
                $(this).closest('.labelSize').addClass('border border-warning');
                $("#quantity").val("1");
                $('.increment-btn').css('pointer-events', 'auto')
                const selectedColor = $('input[name="color"]:checked').val();
                dataProduct.forEach(function(data) {
                    if (data.color_id == selectedColor && data.size_id == size) {
                        $('#product_variant').val(data.id);
                        var forPrice = number_format(data.price, 2, '.', ',');

                        document.getElementById('newPrice').innerHTML = forPrice;
                        document.getElementById('total-quantity-stock').innerHTML = '( ' + data
                            .total_quantity_stock + ' sản phẩm)';
                        document.getElementById('quantity-stock').value = data.total_quantity_stock;
                        // quantity: $('.quantity-stock').val(),

                    }
                });
            })
            $('.increment-btn').on('click', function() {
                var quantity = $('#quantity-stock').val();
                if (inputValue >= quantity) {
                    $(this).css('pointer-events', 'none');
                } else {
                    $(this).css('pointer-events', 'auto');
                }
            });

        })
        $(function() {
            $(document).on('click', '#addtocart', function() {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('cart.add-to-cart') }}",
                    data: {
                        product_variant: $("#product_variant").val(),
                        quantity: $('.qty-input').val(),
                        size: $("input[name='size']:checked").val(),
                        color: $("input[name='color']:checked").val(),
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response)
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = "Có lỗi xảy ra: " + error;
                        console.log(errorMessage);
                        // Hiển thị lỗi cho người dùng, ví dụ:
                        alert("Sản phẩm không đủ số lượng trong kho hàng");
                    }
                });
            });
        });

        function number_format(number, decimals, dec_point, thousands_sep) {
            number = parseFloat(number);
            if (isNaN(number)) {
                return '';
            }

            decimals = !isFinite(decimals) ? 2 : decimals;
            dec_point = typeof dec_point === 'undefined' ? '.' : dec_point;
            thousands_sep = typeof thousands_sep === 'undefined' ? ',' : thousands_sep;

            var parts = number.toFixed(decimals).toString().split('.');
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep);

            // Loại bỏ ".00" nếu tồn tại
            var formattedPrice = parts.join(dec_point).replace('.00', '');

            // Thêm "VND" vào giá trị định dạng
            formattedPrice += ' VND';

            return formattedPrice;
        }
    </script>

    {{-- <script>
        // $(document).on('change', '#size', function() {
            //     size = $(this).val();
            //     console.log(size);
            //     dataProduct.forEach(function(data) {
            //         if (data.color_id == color && data.size_id ==
            //             size) {
            // document.getElementById('total-quantity-stock').innerHTML ='( ' + data.total_quantity_stock + ' sản phẩm)';
            //             quantity = data.total_quantity_stock;
            //             var formattedPrice = number_format(data
            //                 .price, 2, '.', ',');
            //             document.getElementById('newPrice')
            //                 .innerHTML = formattedPrice;
            //         }
            //     });
            // }) 
        $(function() {
            let quantity;
            let dataProduct = @json($product->variants);
            let color = $(this).val();
            let product_id = $("#product_id").val();
            let size = $("input[name='size']:checked").val();

            

            $(document).on('change', '#size', function() {
                size = $(this).val();
                dataProduct.forEach(function(data) {
                    if (data.color_id == color && data.size_id == size) {
                        document.getElementById('total-quantity-stock').innerHTML = '( ' + data
                            .total_quantity_stock + ' sản phẩm)';
                        quantity = data.total_quantity_stock;
                        var formattedPrice = number_format(data.price, 2, '.', ',');
                        document.getElementById('newPrice').innerHTML = formattedPrice;
                    }
                });
            }) $('.increment-btn').on('click', function() {
                var inputValue = parseInt($('#quantity').val());
                console.log(quantity);
                if (inputValue >= quantity) {
                    $(this).css('pointer-events', 'none');
                } else {
                    $(this).css('pointer-events', 'auto');
                }
            });
        })

        
    </script> --}}
@endpush
