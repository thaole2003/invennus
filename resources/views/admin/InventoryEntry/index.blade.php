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
                @foreach ($stocks as $key => $stock)
                    <tr>
                        <td>{{ $stock->id }}</td>
                        <td>{{ $stock->vender->name }}</td>
                        <td>{{ $stock->type }}</td>
                        <td>{{ $stock->total_price }}</td>
                        <td>{{ $stock->created_at }}</td>

                        {{-- <td>
                            @if ($value->status == 'cancelled' || $value->status == 'shipping')
                                <span class="label label-{{ $value->status == 'cancelled' ? 'danger' : 'success' }}">
                                    {{ $value->status == 'cancelled' ? 'Đã hủy đơn hàng' : 'Đã gửi hàng' }}
                                </span>
                            @else
                                <select class="payment_status" data-id="{{ $value->id }}">
                                    <option value="pendding" {{ $value->status == 'pendding' ? 'selected' : '' }}>Chờ xử lý
                                    </option>
                                    <option value="preparing" {{ $value->status == 'preparing' ? 'selected' : '' }}>Đang
                                        chuẩn bị</option>
                                    <option value="shipping" {{ $value->status == 'shipping' ? 'selected' : '' }}>Đã gửi
                                        hàng</option>
                                    <option value="cancelled" {{ $value->status == 'cancelled' ? 'selected' : '' }}>Hủy đơn
                                    </option>
                                </select>
                            @endif
                        </td> --}}

                        <td class="d-flex align-items-center">
                            <a href="{{ route('InventoryEntryDetail', $stock->id) }}" class=""><i
                                    class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            {{-- {{ $stocks->links() }} --}}
        </table>
    </div>
@endsection
