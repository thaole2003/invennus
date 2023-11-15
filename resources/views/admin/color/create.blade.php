@extends('admin.layouts.master')
@section('title')
    Màu sắc
@endsection
@section('content')
    <h1 class=" d-flex justify-content-center align-items-center" style="height: 80px">
        Thêm màu</h1>

    <form action="{{ route('admin.color.store') }}" method="post">
        @csrf
        @method('post')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label for="" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs" style="color: #ff6666;"></i> Tên màu:</label>
                <input type="text" class="form-control" id="" placeholder="Tên màu" name="name"
                    value="{{ old('name') }}">
            </div>
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs" style="color: #ff6666;"></i> Mã màu:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập mã màu" name="code"
                    value="{{ old('code') }}">
            </div>
            @error('code')
            <span class="text-danger">{{$message}}</span>
            @enderror

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </div>
    </form>
@endsection
