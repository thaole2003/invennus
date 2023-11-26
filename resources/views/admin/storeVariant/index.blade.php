@extends('admin.layouts.master')
@push('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="m-10">
        <h1 class="text-center">Chọn cửa hàng để quản lý sản phẩm</h1>
    </div>
    <div class="w-80">
        <table id="table" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cửa hàng</th>
                    <th scope="col">Chọn để xem sản phẩm</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                    <tr>
                        <td scope="">{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td><a class="btn btn-primary" href="{{ route('admin.storevariant.show', $value->id) }}">Xem sản phẩm</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
