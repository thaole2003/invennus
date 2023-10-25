@extends('admin.layouts.master')
@section('title')
    Category
@endsection
@section('content')
    <div class="m-10">
        <h1 class="text-center">Danh sách danh mục sản phẩm</h1>
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
                    <th scope="col">Tên</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Hoạt động</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($data as $value)
                        <tr>
                            <td scope="">{{ $value->id }}</td>
                            <td>{{ $value->title }}</td>
                            <td><img class="" src="{{ asset($value->image) }}" alt=""
                                    style="width: 80px;height: 80px"></td>
                            <td class="d-flex align-items-center">
                                <a class="btn btn-primary" href="{{ route('admin.post.edit', $value->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.post.destroy', $value->id) }}" method="POST">
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
