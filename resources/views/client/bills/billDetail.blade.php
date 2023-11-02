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
                                    <th scope="col">ID</th>
                                    <th scope="col">Thông tin</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Phương thức thanh toán</th>
                                    <th scope="col">Ngày tạo đơn
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($bills as $key => $value)
                                    <tr>

                                        <form>

                                            <td style="width: 5%">{{ $key + 1 }}</td>


                                            <td class="product-name" style="width: 25%">
                                                <a href="#">{{ $value->name }}</a>
                                                <ul>
                                                    <li>Phone: <strong>{{ $value->phone }}</strong>
                                                    </li>
                                                    <li>Email: <strong>{{ $value->email }}</strong></li>
                                                    <li>Address: <strong>{{ $value->address }}</strong></li>
                                                </ul>
                                            </td>
                                            <td class="product-price">
                                                <span class="unit-amount">{{ number_format($value->total_price) }} VND</span>
                                            </td>
                                            @php
                                            $statusLabels = [
                                                'pendding' => 'Chờ xử lý',
                                                'preparing' => 'Đang chuẩn bị',
                                                'shipping' => 'Đã gửi hàng',
                                                'cancelled' => 'Hủy đơn'
                                            ];
                                            @endphp

                                            <td class="product-price">
                                                @if (array_key_exists($value->status, $statusLabels))
                                                    <span class="label label-default">{{ $statusLabels[$value->status] }}</span>
                                                @endif
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="unit-amount">{{ $value->pay_method }}</span>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="unit-amount">{{ $value->created_at->format('d-m-Y') }}</span>
                                            </td>
                                            <td class="" style="width: 15%">
                                                <a class="btn btn-primary" href="{{ route('bill.product', $value->id) }}"
                                                    class="remove border-0 bg-light">Xem chi tiết</a>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{--
                    <div class="cart-buttons">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-7">
                                <div class="continue-shopping-box">
                                    <a href="#" class="btn btn-light">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-totals">
                        <h3>Cart Totals</h3>

                        <ul>
                            <li>Subtotal <span>${{ number_format($sumTotal) }} vnd</span></li>
                            <li>Shipping <span>0</span></li>
                            <li>Total <span><b>{{ number_format($sumTotal) }} vnd</b></span></li>
                        </ul>
                        <a href="{{ route('checkout') }}" class="btn btn-light">Proceed to Checkout</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- End Cart Area -->
@endsection
