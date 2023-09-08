@extends('admin.layouts.master')
@section('title')
    Product
@endsection
@section('content')
    <div class="m-10">
        <h1 class="text-center">Danh sách sản phẩm</h1>
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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Status</th>
                    <th scope="col">Payments Method</th>
                    <th scope="col">Order Created Date</th>
                </tr>
            </thead>
            <tbody>
                @if (count($bills) > 0)
                    @foreach ($bills as $value)
                        <tr>
                            <th scope="">{{ $value->id }}</th>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->address }}</td>
                            <td>{{ $value->phone }}</td>
                            <td>{{ $value->status }}</td>
                            <td>{{ $value->pay_method }}</td>
                            <td>{{ $value->created_at->format('d-m-Y') }}</td>
                            <td class="d-flex align-items-center">
                                <a href="{{ route('admin.bill.product', $value->id) }}" class="remove border-0 bg-light"><i
                                        class="far fa-trash-alt"></i></a>
                            </td>
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
