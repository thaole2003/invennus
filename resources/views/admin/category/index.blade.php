@extends('admin.layouts.master')
@section('content')
    <div class="m-10">
        <h1 class="text-center">Danh sách danh mục sản phẩm</h1>
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
        <button type="button" class="btn btn-info px-10"><a href="{{ route('admin.category.create') }}">Thêm mới</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Slug</th>
                    {{-- <th scope="col">Mô tả</th> --}}
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Hoạt động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $value)
                        <tr>
                            <th scope="">{{ $value->id }}</th>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->slug }}</td>
                            {{-- <td>{{ $value->description }}</td> --}}
                            <td><img class="w-50 h-50" src="{{ asset($value->image) }}" alt=""></td>
                            <td class="d-flex align-items-center">
                                <button>
                                    <a href="{{ route('admin.category.edit',$value->id) }}">Sửa</a>
                                </button>
                                <form action="{{ route('admin.category.destroy',$value->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="text-red-800" onclick="return confirm('Có chắc chắn xóa?')">Xóa</button>
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
