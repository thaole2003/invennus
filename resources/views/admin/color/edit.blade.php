@extends('admin.layouts.master')
@section('title')
    Color
@endsection
@section('content')
    <h1 class=" d-flex justify-content-center align-items-center" style="height: 80px">
        Sửa màu</h1>

    <form action="{{ route('admin.color.update', $data->id) }}" method="post">
        @csrf
        @method('put')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label for="" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs" style="color: #ff6666;"></i> Tên màu:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập màu" name="name"
                    value="{{ $data->name }}">
            </div>
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs" style="color: #ff6666;"></i> Mã màu:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập mã màu" name="code"
                    value="{{ $data->code }}">
            </div>
            @error('code')
            <span code="text-danger">{{$message}}</span>
            @enderror
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </form>
@endsection
