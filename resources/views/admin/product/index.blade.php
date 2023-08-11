@extends('admin.layouts.master')
@section('content')
    <div class="m-10">
        <h1 class="text-center">Danh sách sản phẩm</h1>
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
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Tên ngắn</th>
                    <th scope="col">slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">ảnh chính</th>
                    <th scope="col">độ dài(cm)</th>
                    <th scope="col">Độ rộng(cm)</th>
                    <th scope="col">Độ nặng(kg)</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $value)
                        <tr>
                            <th scope="">{{ $value->id }}</th>
                            <td>{{ $value->sku }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->metatitle }}</td>
                            <td>{{ $value->slug }}</td>
                            <td>{{ $value->description }}</td>
                            <td><img class="w-50 h-50" src="{{ asset($value->image) }}" alt=""></td>
                            <td>{{ $value->length }}</td>
                            <td>{{ $value->width }}</td>
                            <td>{{ $value->weight }}</td>
                            <td class="d-flex align-items-center">
                                <a  class="btn btn-primary" href="{{ route('admin.product.edit',$value->id) }}"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.product.destroy',$value->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('chắc chắn xóa?')" class="btn btn-danger" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
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
        {{ $data->links() }}
    </div>
@endsection
