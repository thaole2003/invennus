@extends('admin.layouts.master')
@section('content')
    <h1 class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        Thêm hình ảnh</h1>

    <form action="{{ route('admin.store.store') }}" method="post">
        @csrf
        @method('post')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Name:</label>
                <input type="text" class="form-control" id="" placeholder="Enter name" name="name"
                    value="{{ old('name') }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Slug:</label>
                <input type="text" class="form-control" id="" placeholder="Enter slug" name="slug"
                    value="{{ old('slug') }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Mô tả:</label>
                <textarea name="description" class="form-control" cols="80" rows="10" style="width: 100%;border-radius: 5px;">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Địa chỉ:</label>
                <input type="text" class="form-control" id="" placeholder="Enter address" name="address"
                    value="{{ old('address') }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Số điện thoại:</label>
                <input type="text" class="form-control" id="" placeholder="Enter phone" name="phone"
                    value="{{ old('phone') }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="" class="form-label">email:</label>
                <input type="email" class="form-control" id="" placeholder="Enter email" name="email"
                    value="{{ old('email') }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Website:</label>
                <input type="text" class="form-control" id="" placeholder="Enter website" name="website"
                    value="{{ old('website') }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Website:</label>
                <input type="text" class="form-control" id="" placeholder="Enter website" name="logo"
                    value="">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

