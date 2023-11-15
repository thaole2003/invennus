@extends('admin.layouts.master')
@section('title')
    Đơn hàng
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
                @foreach ($bills as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>
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
                        </td>
                        <td>{{ $value->pay_method }}</td>
                        <td>{{ number_format($value->total_price) }} VND</td>
                        <td>{{ $value->created_at->format('d-m-Y') }}</td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('admin.bill.product', $value->id) }}" class=""><i
                                    class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            {{ $bills->links() }}
        </table>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.payment_status').on('change', function() {
                let status = $(this).val();
                let id = $(this).data('id');
                $.ajax({
                    url: '{{ route('admin.bill.update-status') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Thêm CSRF token để bảo vệ khỏi tấn công CSRF
                        status: status,
                        id: id
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endpush
