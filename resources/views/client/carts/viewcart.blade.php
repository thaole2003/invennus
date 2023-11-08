@extends('client.layouts.master')

@section('content')
    @php
        $currentDateTime = \Illuminate\Support\Carbon::now()->tz('Asia/Ho_Chi_Minh');
    @endphp
    <!-- Start Cart Area -->
    <section class="cart-area ptb-60" style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Sảm phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sumTotal = 0;
                                ?>

                                @foreach ($carts as $key => $value)
                                    <tr data-id="{{ $value->id }}">
                                        <form>

                                            <td>{{ $key + 1 }}</td>
                                            <input type="hidden" id="product" value="{{ $value->ProductVariant->id }}">
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img style="width:80px;height:80px"
                                                        src="{{ asset($value->ProductVariant->product->image) }}"
                                                        alt="item">
                                                </a>
                                            </td>

                                            <td class="product-name">
                                                <a href="#">{{ $value->ProductVariant->product->title }}</a>
                                                <ul>
                                                    <li>Màu: <strong>{{ $value->ProductVariant->color->name }}</strong>
                                                    </li>
                                                    <li>Kích cỡ: <strong>{{ $value->ProductVariant->size->name }}</strong>
                                                    </li>
                                                </ul>
                                            </td>

                                            <td class="product-price">
                                                <span class="unit-amount">
                                                    @if (
                                                        $value->ProductVariant->product->sales &&
                                                            $value->ProductVariant->product->sales &&
                                                            $value->ProductVariant->product->sales->start_date <= $currentDateTime &&
                                                            $value->ProductVariant->product->sales->end_date >= $currentDateTime)
                                                        <p style="text-decoration: line-through;">
                                                            {{ number_format($value->ProductVariant->price) }} VND</p>
                                                        {{ number_format(max($value->ProductVariant->price - $value->ProductVariant->product->sales->discount, 0)) }}
                                                        VND
                                                    @else
                                                        {{ number_format($value->ProductVariant->price) }} VND
                                                    @endif
                                                </span>
                                                <input type="hidden" id="price"
                                                    value="{{ $value->ProductVariant->price }}">
                                            </td>
                                            <input type="hidden" id="ProductVariant"
                                                value="{{ $value->product_radiant }}">
                                            <td class="product-quantity">

                                                <div class="input-counter">
                                                    <span class="minus-btn increment-btn"><i
                                                            class="fas fa-minus"></i></span>
                                                    <input type="text" min="0" class="qty-input"
                                                        value="{{ $value->quantity }}">
                                                    <span class="plus-btn decrement-btn"><i class="fas fa-plus"></i></span>
                                                </div>
                                            </td>
                                        </form>

                                        <td class="product-subtotal">
                                            <span class="subtotal-amount">

                                                @if (
                                                    $value->ProductVariant->product->sales &&
                                                        $value->ProductVariant->product->sales &&
                                                        $value->ProductVariant->product->sales->start_date <= $currentDateTime &&
                                                        $value->ProductVariant->product->sales->end_date >= $currentDateTime)
                                                    {{ number_format(max($value->quantity * ($value->ProductVariant->price - $value->ProductVariant->product->sales->discount), 0)) }}
                                                    VND
                                                @else
                                                    {{ number_format($value->quantity * $value->ProductVariant->price) }}
                                                    VND
                                                @endif
                                            </span>


                                        </td>
                                        <td>
                                            <form action="{{ route('cart.del-cart', $value->id) }}" method="post">
                                                @csrf
                                                @method('Delete')
                                                <button class="remove border-0 bg-light"><i
                                                        class="far fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                        <div class="d-none">
                                            @if ($value->ProductVariant->product->sales)
                                                {{ $sumTotal += $value->quantity * max($value->ProductVariant->price - $value->ProductVariant->product->sales->discount, 0) }}
                                        </div>
                    </div>
                @else
                    {{ $sumTotal += $value->quantity * $value->ProductVariant->price }}
                </div>
                @endif
            </div>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>

        <div class="cart-buttons">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-7">
                    <div class="continue-shopping-box">
                        <a href="{{ route('home') }}" class="btn btn-light">Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-totals">
            <h3>Giỏ hàng của bạn</h3>

            <ul>
                <li>Tổng tiền<span>{{ number_format($sumTotal) }} vnd</span></li>
                <li>Phí vận chuyển <span>N/A</span></li>
                <li>Thành tiền <span><b>{{ number_format($sumTotal) }} vnd</b></span></li>
            </ul>
            <a href="{{ route('cart.checkout') }}" class="btn btn-light">Tiếp tục</a>
        </div>
        </div>
        </div>
        </div>
    </section>
    <!-- End Cart Area -->
@endsection
@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(function() {
            // $('.decrement-btn').on('click', function() {
            //     // var inputValue = parseInt($('#quantity').val());
            //     let quantityStock = $('.quantity-stock').val();
            //     let quantity = $('.qty-input').val();
            //     if (quantityStock <= quantity) {
            //         $(this).css('pointer-events', 'none');
            //     } else {
            //         $(this).css('pointer-events', 'auto');
            //     }
            // });
            $(document).on('change', '.qty-input', function(e) {
                e.preventDefault();
                let quantity = $(this).val();
                let price = $('#price').val();
                let product = $('#product').val();
                // let product_radiant = $('#ProductVariant').val();
                let id = $(this).closest('tr').data('id');

                $.ajax({
                    type: 'GET',
                    url: "{{ route('cart.get-total-price') }}",
                    data: {
                        id,
                        quantity,
                        product,
                        // product_radiant,
                        price
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.code === 200) {
                            $('.subtotal-amount').text(response.data.total)
                            location.reload();

                            // let quantityStock = $('.quantity-stock').val();
                            // console.log(quantityStock);
                            // if (quantityStock = quantity) {
                            //     $('.decrement-btn').css('pointer-events', 'none');
                            // }
                        }

                    }
                });
            })

        });
    </script>
@endpush
