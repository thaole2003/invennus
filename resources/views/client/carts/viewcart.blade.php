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
                                                <input type="hidden" class="price"
                                                    value="{{ $value->ProductVariant->price }}">
                                            </td>
                                            <input type="hidden" class="ProductVariant"
                                                value="{{ $value->product_radiant }}">
                                            {{-- <td> --}}
                                            <input type="hidden" class="quantity-stock"
                                                value="{{ $value->ProductVariant->total_quantity_stock }}">
                                            {{-- </td> --}}
                                            <td class="product-quantity">
                                                <div class="input-counter">
                                                    <span class="minus-btn decrement-btn"><i
                                                            class="fas fa-minus"></i></span>
                                                    <input type="text" name="quantity" id="quantity" min="1"
                                                        class="form-control text-center qty-input"
                                                        value="{{ $value->quantity }}" step="1" readonly>
                                                    <span class="plus-btn increment-btn" id="plusBtn"><i
                                                            class="fas fa-plus"></i></span>
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
                <li>Tổng tiền<span id="totalPriceForUser">{{ number_format($sumTotal) }} vnd</span></li>
                <li>Phí vận chuyển <span>N/A</span></li>
                <li>Thành tiền <span id="totalPriceForUser"><b>{{ number_format($sumTotal) }} vnd</b></span></li>
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
        $(document).ready(function() {
            var quantityStates = {};
            $(document).ready(function() {
                $('.qty-input').each(function() {
                    checkAndUpdateButtonState($(this).closest('tr'));
                });

                $(document).on('change', '.qty-input', function(e) {
                    e.preventDefault();
                    let id = $(this).closest('tr').data('id');
                    let quantity = $(this).val();
                    let price = $('.price').val();
                    let product = $('.product').val();

                    $.ajax({
                        type: 'GET',
                        url: "{{ route('cart.get-total-price') }}",
                        data: {
                            id,
                            quantity,
                            product,
                            price
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.code === 200) {
                                location.reload();
                                // var totalValue = response.total;
                                // var formattedTotal = number_format(totalValue);
                                // $(this).closest('tr').find('.subtotal-amount').text(
                                //     formattedTotal);
                                // var totalValue = response.total;
                                var sumFormattedTotal = number_format(response
                                    .totalPrice);
                                $('span#totalPriceForUser').text(sumFormattedTotal);
                                quantityStates[id] = quantity;
                                checkAndUpdateButtonState($(this).closest('tr'));
                            }
                        }.bind(this)
                    });
                });
                function checkAndUpdateButtonState(row) {
                    var quantityInStock = parseInt(row.find('.quantity-stock').val(), 10);
                    var quantityInCart = parseInt(row.find('.qty-input').val(), 10);
                    var addButton = row.find('.plus-btn');
                    var previousQuantity = quantityStates[row.data('id')] || quantityInCart;

                    if (quantityInStock <= previousQuantity) {
                        addButton.css('pointer-events', 'none');
                        addButton.css('cursor', 'not-allowed');
                    } else {
                        addButton.css('pointer-events', 'auto');
                        addButton.css('cursor', 'pointer');
                    }

                }
            });


            // function updatePointerEvents() {
            //     var inputValue = parseInt($('#quantity').val());
            //     var quantity = parseInt($('#quantity-stock').val());

            //     $('.increment-btn').css('pointer-events', inputValue >= quantity ? 'none' : 'auto');
            //     $('.decrement-btn').css('pointer-events', inputValue <= 1 ? 'none' : 'auto');
            // }

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
        });
    </script>
@endpush
