@extends('admin.layouts.master')
@section('title')
    Store
@endsection
@section('content')
    <div class="m-10">
        <h1 class="text-center">Danh sách cửa hàng</h1>
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
                    <th scope="col">Slug</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                    <th scope="col">Hoạt động</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($data as $key => $value)
                    <tr>
                        <td scope="">{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->slug }}</td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->website }}</td>

                        <td class="d-flex align-items-center">
                            <a class="btn btn-primary" href="{{ route('admin.store.edit', $value->id) }}"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.store.destroy', $value->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('chắc chắn xóa?')" class="btn btn-danger"
                                    class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
                            </form>
                        </td>
                        <td><a href="{{ route('admin.storevariant.show', $value->id) }}">xem sản phẩm</a></td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>
@endsection
