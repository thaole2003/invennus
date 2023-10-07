@extends('admin.layouts.master')
@section('title')
    Store
@endsection
@section('content')
    <div class="m-10">
        <h1 class="text-center">Danh sách nhà cung  cấp</h1>
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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Hoạt động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $key => $value)
                        <tr>
                            <th scope="">{{ $key + 1 }}</th>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->address }}</td>
                            <td>{{ $value->phone }}</td>
                            <td>{{ $value->email }}</td>

                            <td class="d-flex align-items-center">
                                <a  class="btn btn-primary" href="{{ route('admin.vendors.edit',$value->id) }}"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.vendors.destroy',$value->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('chắc chắn xóa?')" class="btn btn-danger" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Bạn cần thêm nhà cung cấp mới!</td>
                    </tr>
                @endif


            </tbody>
        </table>
        {{ $data->links() }}
    </div>
@endsection