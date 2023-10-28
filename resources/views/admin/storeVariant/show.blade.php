@extends('admin.layouts.master')
@push('styles')
   <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="m-10">
        <h1 class="text-center">Sản phẩm của cửa hàng {{ $data[0]->store->name }}</h1>
    </div>
    <div class="w-80">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mã SP</th>
                    <th scope="col">Màu</th>
                    <th scope="col">Kích cỡ</th>
                    <th scope="col">Giá tiền</th>
                    <th scope="col">Số lượng</th>

                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $key => $value)
                        <tr>
                            <th scope="">{{ $key + 1 }}</th>
                            <td>{{ $value->variant->product->sku }}</td>
                            <td>{{ $value->variant->color->name }}</td>
                            <td>{{ $value->variant->size->name }}</td>
                           <td>
                            {{ number_format($value->variant->price )}} VND
                           </td>

                            <td class="d-flex align-items-center">
                                <form action="{{ route('admin.storevariant.update', $value->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <input type="number" name="quantity" value="{{ $value->quantity }}">
                                    <button type="submit"class="btn btn-danger" class="btn btn-danger"><i class="far fa-edit"></i></button>
                                </form>
                            </td>
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
