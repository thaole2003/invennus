@extends('admin.layouts.master')
@section('content')
    <div class="m-10">
        <h1 class="text-center">Cập nhật giá sản phẩm</h1>
    </div>
    <div>

    @if(session('msg'))
        @if(session('msg')['success'])
            <div class="alert alert-success">{{ session('msg')['message'] }}</div>
        @else
            <div class="alert alert-danger">{{ session('msg')['message'] }}</div>
        @endif
    @endif

        </div>
    <div class="w-80">
        <table id="table" class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mã</th>
                    <th scope="col">Màu</th>
                    <th scope="col">Kích cỡ</th>
                    <th scope="col">Giá sản phẩm</th>
                    <th scope="col">Số lượng trong kho</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($data as $key => $value)
                        <tr class="">
                            <th scope="">{{  $key +1 }}</th>
                            <td>{{ $value->product->sku }}</td>
                            <td>{{ $value->color->name }}</td>
                            <td>{{ $value->size->name }}</td>
                            <td class="d-flex align-items-center">
                                <form action="{{ route('admin.variant.editprice',$value->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                <input type="number" min="0" name="price" value={{ $value->price }}>
                                <button><i class="fas fa-edit"></i></button>
                            </form>
                            </td>
                            <td>
                                <form action="{{ route('admin.variant.updatequantitystock',$value->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <input type="number" min="0" name="total_quantity_stock" value={{ $value->total_quantity_stock }}>
                                <button><i class="fas fa-edit"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach



            </tbody>
        </table>
    </div>
@endsection
