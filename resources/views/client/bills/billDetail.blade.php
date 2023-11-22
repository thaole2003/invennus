@extends('client.layouts.master')

@section('content')
    <!-- Start Cart Area -->
    <section class="cart-area ptb-60" style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="cart-table table-responsive">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Thông tin</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Thanh toán</th>
                                    <th scope="col">Ngày tạo đơn</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($bills as $key => $value)
                                    <tr>



                                            <td style="width: 5%">{{ $key + 1 }}</td>


                                            <td class="product-name" style="width: 20%">
                                                <a href="#">{{ $value->name }}</a>
                                                <ul>
                                                    <li>SĐT: <strong>{{ $value->phone }}</strong>
                                                    </li>
                                                    <li>Email: <strong>{{ $value->email }}</strong></li>
                                                    <li>Địa chỉa: <strong>{{ $value->address }}</strong></li>
                                                </ul>
                                            </td>
                                            <td class="product-price" style="width: 10%">
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

                                            <td class="product-price " style="width: 10%">
                                                @if (array_key_exists($value->status, $statusLabels))
                                                    <span class="label label-default">{{ $statusLabels[$value->status] }}</span>

                                                    <style>
                                                        .cancel-button:hover {
                                                            background-color: white;
                                                            color: black;
                                                        }
                                                    </style>
                                                @endif
                                            </td>
                                            <td class="product-subtotal" style="width: 10%">
                                                <span class="unit-amount">{{ $value->pay_method === 'cod' ? 'Khi nhận hàng' : 'Chuyển khoản' }}</span>
                                            </td>
                                            <td class="product-subtotal" style="width: 10%">
                                                <span class="unit-amount">{{ $value->created_at->format('d-m-Y') }}</span>
                                            </td>
                                            @if ($value->status == 'pendding')
                                            <td class="product-subtotal" style="width: 10%">
                                                <a class="btn btn-primary" href="{{ route('bill.edit', $value->id) }}"
                                                    class="remove border-0 bg-light">Thông tin</a>
                                            </td>
                                            @endif
                                            <td class="" style="width: 11%">
                                                <a class="btn btn-primary" href="{{ route('bill.product', $value->id) }}"
                                                    class="remove border-0 bg-light">Xem chi tiết</a>
                                            </td>
                                            @if ($value->status == 'pendding')
                                            <td class="" style="width: 5%">
                                                <form action="{{ route('bill-client-update',$value->id ) }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <input type="text" hidden name="status" value="cancelled">
                                                    <button onclick="return confirm('Bạn có chắc chắn hủy đơn?')" class="btn btn-primary" type="submit">Hủy</button>
                                                </form>
                                            </td>
                                            @endif

                                    </tr>
                                @endforeach
                            </tbody>
                            {{ $bills->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Cart Area -->
@endsection
