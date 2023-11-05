@extends('admin.layouts.master')
@section('title')
    Product
@endsection
@section('content')
    <div class="m-10">
        <h1 class="text-center">Danh sách sản phẩm của danh mục {{ $data[0]->name }}</h1>
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
        <table id="table" class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mã</th>
                    <th scope="col">Tên SP</th>
                    <th scope="col">Tên ngắn</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Ảnh chính</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $item)
                     @foreach ($item->products as $value)
                        <tr>
                            <th scope="">{{ $value->id }}</th>
                            <td>{{ $value->sku }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->metatitle }}</td>
                            <td>{!! substr($value->description, 0, 20) !!}</td>
                            <td><img  style="width: 80px;height: 80px" src="{{ asset($value->image) }}" alt=""></td>
                            <td class="d-flex align-items-center">
                                <a  class="btn btn-primary" href="{{ route('admin.product.edit',$value->id) }}"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.product.destroy',$value->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('chắc chắn xóa?')" class="btn btn-danger" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
                            </form>
                            <a  class="btn btn-primary" href="{{ route('admin.product.show',$value->id) }}"><i class="fas fa-eye"></i></a>

                        </td>
                        </tr>
                    @endforeach
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Bạn cần thêm sản phẩm!</td>
                    </tr>
                @endif


            </tbody>
        </table>

    </div>
@endsection
