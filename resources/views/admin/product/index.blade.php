@extends('admin.layouts.master')
@section('title')
    Product
@endsection
@section('content')
    <div class="m-10">
        <h1 class="text-center">Danh sách sản phẩm</h1>
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
                    <th scope="col">Mã</th>
                    <th scope="col">Tên SP</th>
                    <th scope="col">Tên ngắn</th>
                    <th scope="col">slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">ảnh chính</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                    <tr>
                        <td scope="">{{ $key + 1 }}</td>
                        <td>{{ $value->sku }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->metatitle }}</td>
                        <td>{{ $value->slug }}</td>
                        <td>{{ $value->description }}</td>
                        <td><img class="w-50 h-50" src="{{ asset($value->image) }}" alt=""></td>

                        <td class="d-flex align-items-center">
                            <a class="btn btn-primary" href="{{ route('admin.product.edit', $value->id) }}"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.product.destroy', $value->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('chắc chắn xóa?')" class="btn btn-danger"
                                    class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
                            </form>
                            <a class="btn btn-primary" href="{{ route('admin.product.show', $value->id) }}"><i
                                    class="fas fa-eye"></i></a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $data->links() }} --}}
    </div>
@endsection
