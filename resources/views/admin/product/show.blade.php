@extends('admin.layouts.master')
@section('content')
    <div class="m-10">
        <h1 class="text-center">Cập nhật giá sản phẩm {{ $data[0]->product->title }}</h1>
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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mã</th>
                    <th scope="col">Màu</th>
                    <th scope="col">Kích cỡ</th>
                    <th scope="col">Giá</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $key => $value)
                        <tr>
                            <th scope="">{{  $key +1 }}</th>
                            <td>{{ $value->product->sku }}</td>
                            <td>{{ $value->color->name }}</td>
                            <td>{{ $value->size->name }}</td>
                            <td class="d-flex align-items-center">
                                <form action="{{ route('admin.variant.editprice',$value->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                <input type="number" name="price" value={{ $value->price }}>
                                <button><i class="fas fa-edit"></i></button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Bạn cần thêm danh mục!</td>
                    </tr>
                @endif


            </tbody>
        </table>
    </div>
@endsection
