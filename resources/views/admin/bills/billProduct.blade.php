{{--  --}}

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
                    <th scope="col">ID</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">Name</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
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
                                    <li>Color: <strong>{{ $value->ProductVariant->color->name }}</strong>
                                    </li>
                                    <li>Size: <strong>{{ $value->ProductVariant->size->name }}</strong></li>
                                    <li>Material: <strong>Cotton</strong></li>
                                </ul>
                            </td>

                            <td>{{ number_format($value->ProductVariant->price) }}vnd</td>
                            <td>{{ $value->quantity }}</td>
                            <td>{{ number_format($value->quantity * $value->ProductVariant->price) }}
                                vnd</td>

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
