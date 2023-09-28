@extends('admin.layouts.master')
@section('title')
    Color
@endsection
@section('content')
    <div class="m-10">
        <h1 class="text-center">Danh sách danh mục bài viết</h1>
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
                    <th scope="col">Tên Danh Mục</th>
                    <th scope="col">Hoạt động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $key => $value)
                        <tr>
                            <th scope="">{{ $key + 1 }}</th>
                            <td>{{ $value->name }}</td>
                            <td class="d-flex align-items-center">
                                <a class="btn btn-primary" href="{{ route('admin.postCategory.edit', $value->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.postCategory.destroy', $value->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('chắc chắn xóa?')" class="btn btn-danger"
                                        class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Bạn cần thêm màu!</td>
                    </tr>
                @endif


            </tbody>
        </table>
        {{ $data->links() }}
    </div>
@endsection
