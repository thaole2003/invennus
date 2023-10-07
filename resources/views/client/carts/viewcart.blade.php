@extends('client.layouts.master')

@section('content')
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
                                                    <img src="{{ $value->ProductVariant->product->image }}" alt="item">
                                                </a>
                                            </td>

                                            <td class="product-name">
                                                <a href="#">{{ $value->ProductVariant->product->title }}</a>
                                                <ul>
                                                    <li>Color: <strong>{{ $value->ProductVariant->color->name }}</strong>
                                                    </li>
                                                    <li>Size: <strong>{{ $value->ProductVariant->size->name }}</strong></li>
                                                    <li>Material: <strong>Cotton</strong></li>
                                                </ul>
                                            </td>

                                            <td class="product-price">
                                                <span class="unit-amount">{{ number_format($value->ProductVariant->price) }}
                                                    vnd</span>
                                                <input type="hidden" id="price"
                                                    value="{{ number_format($value->ProductVariant->price) }}" vnd>
                                            </td>

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
                                            <span
                                                class="subtotal-amount">{{ number_format($value->quantity * $value->ProductVariant->price) }}
                                                vnd</span>

                                        </td>
                                        <td>
                                            <form action="{{ route('del-cart', $value->id) }}" method="post">
                                                @csrf
                                                @method('Delete')
                                                <button class="remove border-0 bg-light"><i
                                                        class="far fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                        <div class="d-none">
                                            {{ $sumTotal += $value->quantity * $value->ProductVariant->price }}</div>
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
                            <li>Phí vận chuyển <span>0</span></li>
                            <li>Thành tiền <span><b>{{ number_format($sumTotal) }} vnd</b></span></li>
                        </ul>
                        <a href="{{ route('checkout') }}" class="btn btn-light">Tiếp tục</a>
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
            $(document).on('change', '.qty-input', function(e) {
                e.preventDefault();
                let quantity = $(this).val();
                let price = $('#price').val();
                let product = $('#product').val();
                let id = $(this).closest('tr').data('id');
                $.ajax({
                    type: 'GET',
                    url: "/get-total-price",
                    data: {
                        id,
                        quantity,
                        product,
                        price
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.code === 200) {
                            $('.subtotal-amount').text(response.data.total)
                            location.reload();
                        }
                    }
                });
            })

        });
    </script>
@endpush
