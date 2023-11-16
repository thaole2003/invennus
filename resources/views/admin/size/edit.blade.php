@extends('admin.layouts.master')
@section('title')
Kích cỡ
@endsection
@section('content')
    <h1 class=" d-flex justify-content-center align-items-center" style="height: 80px">
        Sửa kích cỡ</h1>

    <form action="{{ route('admin.size.update', $data->id) }}" method="post">
        @csrf
        @method('put')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">

            <div class="mb-3 mt-3">
                <label for="" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs" style="color: #ff6666;"></i> Tên:</label>
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

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </form>
@endsection


@push('scripts')
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endpush
