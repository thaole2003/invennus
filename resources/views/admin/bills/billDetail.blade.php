@extends('admin.layouts.master')
@section('title')
    Product
@endsection
@section('content')
    <div class="m-10">
        <h1 class="text-center">Danh sách đơn hàng</h1>
    </div>
    <div>
        {{--
    @if (session('msg'))
        @if (session('msg')['success'])
            <div class="alert alert-success">{{ session('msg')['message'] }}</div>
        @else
            <div class="alert alert-danger">{{ session('msg')['message'] }}</div>
        @endif
    @endif --}}

    </div>
    <div class="w-80">
        <table id="table" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Mã</th>
                    <th scope="col">Khách hàng</th>
                    <th scope="col">Email</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Phương thức thanh toán</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Ngày đặt</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bills as $value)
                    <tr>
                        <td scope="">{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>
                            @php
                            $payMethodMapping = [
                                'pendding' => 'Chờ xử lý',
                                'preparing' => 'Đang chuẩn bị',
                                'shipping' => 'Đã gửi hàng',
                                'delivered' => 'Đã giao hàng',
                                'cancelled' => 'Đã hủy đơn hàng',
                            ];
                            @endphp
                            {{ $payMethodMapping[$value->status] ??  $payMethodMapping[$value->status] }}
                        </td>

                        <td>{{ $value->pay_method }}</td>
                        <td>{{ number_format($value->total_price)  }} VND</td>
                        <td>{{ $value->created_at->format('d-m-Y') }}</td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('admin.bill.product', $value->id) }}" class=""><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
