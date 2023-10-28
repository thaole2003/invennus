@extends('admin.layouts.master')
@section('title')
    Sale
@endsection
@section('content')
    <div class="m-10">
        <h1 class="text-center">Danh sách mã giảm giá</h1>
    </div>
    <div>

        @if (session('msg'))
            @if (session('msg')['success'])
                <div class="alert alert-success">{{ session('msg')['message'] }}</div>
            @else
                <div class="alert alert-danger">{{ session('msg')['message'] }}</div>
            @endif
        @endif

    </div>
    <div class="w-80">
        <table id="table" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Tiền giảm</th>
                    <th scope="col">Ngày bắt đầu</th>
                    <th scope="col">Ngày kết thúc</th>
                    <th scope="col">Hành động</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $value)
                    <tr>
                        <td scope="">{{ $value->id }}</td>
                        <td>{{ $value->product->title }}</td>
                        <td>{{ number_format($value->discount) }} VND</td>
                        <td>{{ $value->start_date }}</td>
                        <td>{{ $value->end_date }}</td>
                        <td style="gap: 0.5rem;" class="d-flex align-items-center">
                            <a class="btn btn-primary" href="{{ route('admin.sale.edit', $value->id) }}"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.sale.destroy', $value->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('chắc chắn xóa?')" class="btn btn-danger"
                                    class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
                            </form>
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>
@endsection
