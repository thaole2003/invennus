@extends('client.layouts.master')

@section('content')
    @php
    $currentDateTime = \Illuminate\Support\Carbon::now()->tz('Asia/Ho_Chi_Minh');
    @endphp
    <section class="checkout-area ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="user-actions">
                        <i class="fas fa-sign-in-alt"></i>
                    </div>
                </div>
            </div>

            <form action="{{ route('bill.store') }}" method="POST">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="billing-details">
                            <h3 class="title">Thông tin nhận hàng</h3>

                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Họ tên người nhận <span class="required">*</span></label>
                                        <input name="name" value="{{ auth()->user()->name }}" type="text"
                                            class="form-control">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>Địa chỉ <span class="required">*</span></label>
                                        <input name="address" type="text" value="{{ auth()->user()->address }}"
                                            class="form-control">
                                            @error('address')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Địa chỉ email <span class="required">*</span></label>
                                        <input name="email" type="email" value="{{ auth()->user()->email }}"
                                            class="form-control">
                                            @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Phone <span class="required">*</span></label>
                                        <input name="phone" type="text" value="{{ auth()->user()->phone }}"
                                            class="form-control">
                                            @error('phone')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="note" name="notes" id="notes" cols="30" rows="6" placeholder="Ghi chú"
                                            lass="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="order-details">
                            <h3 class="title">Đơn của bạn</h3>

                            <div class="order-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $totalAmount = 0; ?>

                                        @foreach ($carts as $value)
                                            <tr>
                                                <td class="product-name">
                                                    <a href="#">{{ $value->ProductVariant->product->title }}</a>
                                                    <span> x {{ $value->quantity }}</span>
                                                </td>

                                                <td class="product-total">
                                                    <span
                                                        class="subtotal-amount">
                                                        @if ($value->ProductVariant->product->sales &&
                                                        $value->ProductVariant->product->sales &&
                                                        $value->ProductVariant->product->sales->start_date <= $currentDateTime &&
                                                         $value->ProductVariant->product->sales->end_date >= $currentDateTime)
                                                        {{ number_format($subtotal=max($value->quantity * ($value->ProductVariant->price - $value->ProductVariant->product->sales->discount), 0)) }} VND
                                                        @else
                                                            {{ number_format($subtotal=$value->quantity * $value->ProductVariant->price) }} VND
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                            <div class="d-none">
                                                {{ $totalAmount += $subtotal }}

                                            </div>
                                        @endforeach

                                        <td class="order-subtotal">
                                            <span>Tạm tính</span>
                                        </td>

                                        <td class="order-subtotal-price">
                                            <span class="order-subtotal-amount"> {{ number_format($totalAmount) }}</span>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td class="order-shipping">
                                                <span>Vận chuyển</span>
                                            </td>

                                            <td class="shipping-price">
                                                <span>N/A</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="total-price">
                                                <span>Thành tiền</span>
                                            </td>

                                            <td class="product-subtotal">
                                                <span
                                                    class="subtotal-amount">{{ number_format($totalAmount) }}</span>
                                                <input type="text" name="total_price" value="{{ $totalAmount }}"
                                                    hidden>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="payment-method">
                                <p>
                                    <input type="radio" id="direct-bank-transfer" name="pay_method" value="cod" checked>
                                    <label for="direct-bank-transfer">Thanh toán khi nhận hàng</label>
                                </p>
                                <p>
                                    <input type="radio" id="paypal-momo" name="pay_method" value="paypal-momo" name="radio-group">
                                    <label for="paypal-momo">PayPal (Momo)</label>
                                </p>
                                <p>
                                    <input type="radio" id="paypal-vnpay" name="pay_method" value="paypal-vnpay" name="radio-group">
                                    <label for="paypal-vnpay">PayPal (VNPay)</label>
                                </p>
                            </div>

                            <button href="#" class="btn btn-primary order-btn">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-center">
                <form action="{{ route('bill.momo_payment') }}" method="POST">
                    @csrf
                    @method('post')
                    <input type="hidden" name="total_momo" value="{{ $totalAmount }}">
                    <button class="btn btn-primary" name="payUrl" id="momoPaymentBtn">Thanh toán Momo</button>
                </form>

                <form action="" method="POST">
                    @csrf
                    @method('post')
                    <input type="hidden" name="total_vnpay" value="{{ $totalAmount }}">
                    <button class="btn btn-primary" name="payUrl" id="vnPayPaymentBtn">Thanh toán VNPay</button>
                </form>
            </div>

        </div>
    </section>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        // Ẩn các nút ban đầu
        $('#momoPaymentBtn').hide();
        $('#vnPayPaymentBtn').hide();
        $('#codPaymentBtn').show();

        // Sự kiện khi người dùng thay đổi lựa chọn thanh toán
        $('input[name="pay_method"]').change(function () {
            if ($(this).val() === 'cod') {
                $('#momoPaymentBtn').hide();
                $('#vnPayPaymentBtn').hide();
                $('#codPaymentBtn').show();
            } else if ($(this).val() === 'paypal-momo') {
                $('#codPaymentBtn').hide();
                $('#vnPayPaymentBtn').hide();
                $('#momoPaymentBtn').show();
            } else if ($(this).val() === 'paypal-vnpay') {
                $('#codPaymentBtn').hide();
                $('#momoPaymentBtn').hide();
                $('#vnPayPaymentBtn').show();
            }
        });
    });
</script>
@endpush
