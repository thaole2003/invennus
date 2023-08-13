@extends('admin.layouts.master')
@push('styles')
   <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="m-10">
        <h1 class="text-center">Chọn cửa hàng quản lí cửa hàng</h1>
    </div>
    <div class="w-80">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cửa hàng</th>
                    <th scope="col">Chọn</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $key => $value)
                        <tr>
                            <th scope="">{{ $key + 1 }}</th>
                            <td>{{ $value->name }}</td>
                            <td><a href="{{ route('admin.storevariant.show',$value->id) }}">Xem sản phẩm</a></td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Bạn cần thêm sản phẩm!</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{-- {{ $data->links() }} --}}
    </div>
@endsection
@push('scripts')
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>let table = new DataTable('#myTable');</script>
@endpush
