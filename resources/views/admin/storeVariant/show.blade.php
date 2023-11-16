@extends('admin.layouts.master')
@push('styles')
   <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="m-10">
        <h1 class="text-center">Sản phẩm của cửa hàng</h1>
    </div>
    <div class="w-80">
        <table id="table" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Tên ngắn</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Ảnh chính</th>
                    <th scope="col">Số lượng theo cửa hàng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productGroups as $key => $value)
                {{-- {{ dd($value['product']) }} --}}
                    <tr>
                        <td scope="">{{ $key + 1 }}</td>
                        <td>{{ $value['product']->sku }}</td>
                        <td>{!! substr($value['product']->title, 0, 20) !!}</td>
                        <td>{!! substr($value['product']->metatitle, 0, 20) !!}</td>
                        <td>{!! substr($value['product']->description, 0, 20) !!}</td>
                        <td><img style="width:80px;height:80px" src="{{ asset($value['product']->image) }}" alt=""></td>
                        <td  style="gap: 0.5rem;" class="d-flex align-items-center">
                            <a class="btn btn-primary" href="{{ route('admin.showStoreVariant', [$id, $value['product']->id]) }}">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <table class="table" id="myTable">
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
                    @foreach ($data as $key => $value['product'])
                        <tr>
                            <th scope="">{{ $key + 1 }}</th>
                            <td>{{ $value['product']->variant->product->sku }}</td>
                            <td>{{ $value['product']->variant->color->name }}</td>
                            <td>{{ $value['product']->variant->size->name }}</td>
                            <td>
                                {{ number_format($value['product']->variant->price )}} VND
                            </td>
                            <td class="d-flex align-items-center">
                                <form action="{{ route('admin.storevariant.update', $value['product']->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <input type="number" name="quantity" value="{{ $value['product']->quantity }}">
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
        </table> --}}
    </div>
@endsection
@push('scripts')
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>let table = new DataTable('#myTable');</script>
@endpush
