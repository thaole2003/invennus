@extends('admin.layouts.master')
@section('content')
    <h1 class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        Sửa màu</h1>

    <form action="{{ route('admin.color.update', $data->id) }}" method="post">
        @csrf
        @method('put')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Tên màu:</label>
                <input type="text" class="form-control" id="" placeholder="Enter color" name="name"
                    value="{{ $data->name }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Mã màu:</label>
                <input type="text" class="form-control" id="" placeholder="Enter code color" name="code"
                    value="{{ $data->code }}">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
