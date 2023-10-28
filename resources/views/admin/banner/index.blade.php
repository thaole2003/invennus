@extends('admin.layouts.master')
@section('title')
    Banner
@endsection
@section('content')
    <div class="m-10">
        <h1 class="text-center">Danh sách hình ảnh</h1>
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
                    <th scope="col">Tiêu đề ngắn</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Đường dẫn</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Hoạt động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                    <tr>
                        <td scope="">{{ $key + 1 }}</td>
                        <td>{{ $value->meta_title }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{!! substr($value->description, 0, 20) !!}</td>
                        <td>{{ $value->link }}</td>
                        <td><img style="width:150px;height:80px" src="{{ asset($value->image) }}" alt="" width="300px"
                                height="150px"></td>
                        <td>{!! $value->is_active == 1
                            ? '<button class="btn btn-success">Kích hoạt</button>'
                            : '<button class="btn btn-danger">Chưa kích hoạt</button>' !!}
                        </td>
                        <td class="d-flex align-items-center " style="gap: 0.5rem;">
                            <a class="btn btn-primary" href="{{ route('admin.banner.edit', $value->id) }}"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.banner.destroy', $value->id) }}" method="POST">
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
