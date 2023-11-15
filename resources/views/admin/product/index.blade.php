@extends('admin.layouts.master')
@section('title')
    Sản phẩm
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
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Tên ngắn</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Ảnh chính</th>
                    <th scope="col">Hành động</th>
                    <th scope="col">Kho</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                    <tr>
                        <td scope="">{{ $key + 1 }}</td>
                        <td>{{ $value->sku }}</td>
                        <td>{!! substr($value->title, 0, 20) !!}</td>
                        <td>{!! substr($value->metatitle, 0, 20) !!}</td>
                        <td>{!! substr($value->description, 0, 20) !!}</td>
                        <td><img style="width:80px;height:80px" src="{{ asset($value->image) }}" alt=""></td>

                        <td  style="gap: 0.5rem;" class="d-flex align-items-center">
                            <a class="btn btn-primary" href="{{ route('admin.product.edit', $value->id) }}"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.product.destroy', $value->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('chắc chắn xóa?')" class="btn btn-danger"
                                    class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
                            </form>

                        </td>
                        <td>  <a class="btn btn-primary" href="{{ route('admin.product.show', $value->id) }}"><i
                            class="fas fa-eye"></i></a>
</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
