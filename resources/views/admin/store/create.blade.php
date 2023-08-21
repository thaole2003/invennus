@extends('admin.layouts.master')
@section('title')
    Store
@endsection
@section('content')
    <h1 class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        Thêm cửa hàng</h1>

    <form action="{{ route('admin.store.store') }}" method="post">
        @csrf
        @method('post')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label for="" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs" style="color: #ff6666;"></i> Name:</label>
                <input type="text" class="form-control" id="" placeholder="Enter name" name="name"
                    value="{{ old('name') }}">
            </div>
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Slug:</label>
                <input type="text" class="form-control" id="" value="" placeholder="Enter slug" name="slug"
                    value="{{ old('slug') }}">
            </div>
            @error('slug')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Mô tả:</label>
                <textarea name="description" class="form-control" cols="80" rows="10" style="width: 100%;border-radius: 5px;">{{ old('description') }}</textarea>
            </div>
            @error('description')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs" style="color: #ff6666;"></i> Địa chỉ:</label>
                <input type="text" class="form-control" id="" placeholder="Enter address" name="address"
                    value="{{ old('address') }}">
            </div>
            @error('address')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs" style="color: #ff6666;"></i> Số điện thoại:</label>
                <input type="text" class="form-control" id="" placeholder="Enter phone" name="phone"
                    value="{{ old('phone') }}">
            </div>
            @error('phone')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="" class="form-label"> <i class="fas fa-star-of-life fa-rotate-180 fa-xs" style="color: #ff6666;"></i> Email:</label>
                <input type="email" class="form-control" id="" placeholder="Enter email" name="email"
                    value="{{ old('email') }}">
            </div>
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Website:</label>
                <input type="text" class="form-control" id="" placeholder="Enter website" name="website"
                    value="{{ old('website') }}">
            </div>
            @error('website')
            <span class="text-danger">{{$message}}</span>
            @enderror


            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

