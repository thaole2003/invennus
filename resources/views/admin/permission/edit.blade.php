@extends('admin.layouts.master')
@section('title')
    Cập nhật quyền
@endsection
@section('content')
    <h1 class=" d-flex justify-content-center align-items-center" style="height: 80px">
        Cập nhật quyền</h1>

    <form action="{{ route('admin.permissions.update', $data->id) }}" method="post">
        @csrf
        @method('put')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Tên quyền</label>
                <input type="text" class="form-control" id="" placeholder="Nhập tên quyền"
                    name="name"  value="{{ old('name', $data->name ?? '') }}">
            </div>
            <div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </form>
@endsection

