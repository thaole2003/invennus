@extends('admin.layouts.master')
@section('title')
    Import quyền
@endsection
@section('content')
    <h1 class=" d-flex justify-content-center align-items-center" style="height: 80px">
        Import quyền</h1>

    <form action="{{ route('admin.import') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="form-group mb-3">
                <label for="exampleInputEmail1" class="form-label">File Import</label>
                <input type="file" name="import_file" class="form-control">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </div>
    </form>
@endsection
