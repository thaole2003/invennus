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
                @if (count($bills->billDetail) > 0)
                    @foreach ($bills->billDetail as $value)
                        <tr>
                            <th scope="">{{ $value->id }}</th>
                            <td><img style="width: 80px;height: 80px"
                                    src="{{ asset($value->ProductVariant->product->image) }}" alt=""></td>
                            <td class="">
                                {{ $value->ProductVariant->product->title }}
                                <ul>
                                    <li>Màu: <strong>{{ $value->ProductVariant->color->name }}</strong>
                                    </li>
                                    <li>Kích cỡ: <strong>{{ $value->ProductVariant->size->name }}</strong></li>
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
