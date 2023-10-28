@extends('admin.layouts.master')
@section('title')
    Sale
@endsection
@section('content')
    <h1 class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        Thêm sản phẩm giảm giá</h1>

    <form action="{{ route('admin.sale.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Sản phẩm muốn giảm :</label>
                <select name="product_id" id="">
                    @foreach ($data as $product)
                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->title }}
                        </option>
                    @endforeach
                </select>

            </div>
            @error('product_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Số tiền giảm :</label>
                <input type="text" class="form-control" id="email" placeholder="Nhập số tiền" name="discount"
                    value="{{ old('discount') }}">
            </div>
            @error('discount')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Ngày bắt đầu :</label>
                <input type="datetime-local" class="form-control" name="start_date" id="end_date"
                placeholder="Enter title" value="{{old('start_date')}}">
            </div>
            @error('start_date')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Ngày kết thúc :</label>
                <input type="datetime-local" class="form-control" name="end_date" id="end_date"
                placeholder="Enter title" value="{{old('end_date')}}">
            </div>
            @error('end_date')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <!-- Page level plugins -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $(() => {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show-image').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#image-input").change(function() {
                readURL(this);
            });



        });
    </script>
@endpush
