@extends('admin.layouts.master')
@section('content')
    <h1 class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        Thêm Size</h1>

    <form action="{{ route('admin.size.store') }}" method="post">
        @csrf
        @method('post')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">

            <div class="mb-3 mt-3">
                <label for="" class="form-label">Tên:</label>
                <input type="text" class="form-control" id="" placeholder="Enter name" name="name"
                    value="{{ old('name') }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Mô tả:</label>
                <textarea name="description" class="form-control" cols="80" rows="10" style="width: 100%;border-radius: 5px;">{{ old('description') }}</textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
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
