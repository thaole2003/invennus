@extends('admin.layouts.master')
@section('title')
Tài khoản
@endsection
@section('content')
    <div class="m-10">
        <h1 class="text-center">Danh sách người dùng</h1>
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
                    <th scope="col">Họ tên</th>
                    <th scope="col">Ảnh đại diện</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Chức danh</th>
                    <th scope="col">Cửa hàng</th>
                    <th scope="col">Hoạt động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $value)
                    <tr>
                        <td scope="">{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td><img style="width:80px;height:80px" class=""
                                src="{{ $value->avt ? asset($value->avt) : 'https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg' }}"
                                alt=""></td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>{{ $value->address }}</td>
                        <td>
                            @if($value->role === 'admin')
                                Quản trị viên
                            @elseif($value->role === 'employ')
                                Nhân viên
                            @elseif($value->role === 'user')
                                Người dùng
                            @else
                                Không xác định
                            @endif
                        </td>
                        <td>{{ $value->store_id ? $value->store->name : '' }}</td>
                        <td style="gap: 0.5rem;" class="d-flex align-items-center">
                            <a class="btn btn-primary" href="{{ route('admin.users.edit', $value->id) }}"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.users.destroy', $value->id) }}" method="POST">
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
