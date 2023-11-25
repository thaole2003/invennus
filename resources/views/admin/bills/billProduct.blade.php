@extends('admin.layouts.master')
@section('title')
    Đơn hàng
@endsection
@section('content')
    <div class="m-10">
        <h1 class="text-center">Chi tiết đơn hàng</h1>
    </div>
    <div>
    </div>
    <div class="w-80">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                @if (count($billDetail) > 0)
                    @foreach ($billDetail as $value)
                        <tr>
                            <th scope="">{{ $value->id }}</th>
                            <td><img style="width: 80px;height: 80px"
                                    src="{{ asset($value->product_image) }}" alt=""></td>
                            <td class="">
                                <span class="" style="font-weight: bold">{{ $value->product_sku }}</span> - {{ $value->product_name }}
                                <ul>
                                    <li>Màu: <strong>{{ $value->color }}</strong>
                                    </li>
                                    <li>Kích cỡ: <strong>{{ $value->size }}</strong></li>
                                    <li>Giá: <strong>{{ number_format($value->price) }} VND</strong></li>
                                </ul>
                            </td>

                            <td>{{ $value->quantity }}</td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Bạn cần thêm sản phẩm!</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
