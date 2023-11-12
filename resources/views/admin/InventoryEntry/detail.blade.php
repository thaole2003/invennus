@extends('admin.layouts.master')
@section('title')
    Danh sách nhập kho
@endsection
@section('content')
    <div class="m-10">
        <h1 class="text-center">Danh sách đơn hàng</h1>
    </div>
    <div class="w-80">
        <table id="" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Mã</th>
                    <th scope="col">Tên nhà cung cấp</th>
                    <th scope="col">Ngày nhập</th>
                    <th scope="col">Kiểu</th>
                    <th scope="col">Tổng tiền</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stockDetails as $key => $value)
                    <tr>
                        <td>{{ $value->stock_id }}</td>
                        <td>{{ $value->product_variant_id }}</td>
                        <td>{{ $value->price }}</td>
                        <td>{{ $value->quantity }}</td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            {{-- {{ $stocks->links() }} --}}
        </table>
    </div>
@endsection
