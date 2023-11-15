@extends('admin.layouts.master')
@section('title')
    Danh sách nhập kho
@endsection
@section('content')
    <div class="m-10">
        <h1 class="text-center">Chi tiết đơn nhập {{ $stockDetails[0] ->stock_id }}</h1>
    </div>
    <div class="w-80">
        <table id="" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Mã đơn</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Tổng tiền</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stockDetails as $stockDetail)

                    <tr>
                        <td>{{ $stockDetail ->stock_id }}</td>
                        <td>{{ $stockDetail ->productVariant->product->sku .' Màu : '.$stockDetail ->productVariant->color->name.' Kích cỡ: ' . $stockDetail->productVariant->size->name }}</td>
                        <td>{{  number_format($stockDetail->price )}} VND</td>
                        <td>{{ $stockDetail ->quantity }}</td>
                        <td>{{ number_format($stockDetail->price *  $stockDetail ->quantity) }} VND</td>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            {{-- {{ $stockDetails->links() }} --}}
        </table>
        <a class="btn btn-primary ml-5" href="/InventoryEntry">Trở lại</a>
    </div>
@endsection
