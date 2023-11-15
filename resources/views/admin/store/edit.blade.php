@extends('admin.layouts.master')
@section('title')
Cửa hàng
@endsection
@section('content')
    <h1 class=" d-flex justify-content-center align-items-center" style="height: 80px">
        Cập nhật cửa hàng</h1>

    <form action="{{ route('admin.store.update',$data->id) }}" method="post">
        @csrf
        @method('put')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label for="" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs" style="color: #ff6666;"></i> Tên cửa hàng:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập tên" name="name"
                       value="{{ $data->name }}">
            </div>
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Mô tả:</label>
                <textarea name="description" class="form-control" cols="80" rows="10" style="width: 100%;border-radius: 5px;">{{ $data->description }}</textarea>
            </div>
            @error('description')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs" style="color: #ff6666;"></i> Địa chỉ:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập địa chỉ" name="address"
                       value="{{ $data->address }}">
            </div>
            @error('address')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs" style="color: #ff6666;"></i> Số điện thoại:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập số điện thoại" name="phone"
                       value="{{ $data->phone }}">
            </div>
            @error('phone')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs" style="color: #ff6666;"></i> Email:</label>
                <input type="email" class="form-control" id="" placeholder="Nhập email" name="email"
                       value="{{ $data->email }}">
            </div>
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </form>
@endsection
