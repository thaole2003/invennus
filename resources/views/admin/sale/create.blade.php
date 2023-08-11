@extends('admin.layouts.master')
@section('content')
    <h1 class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        Cate Add</h1>

    <form action="{{ route('admin.sale.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Product :</label>
                <select name="product_id" id="">
                    @foreach ($data as $product)
                        <option value="{{ $product->id }}">{{ $product->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">% Giảm:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter discount" name="discount"
                    value="{{ old('discount') }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">bắt đầu :</label>
                <input type="datetime-local" class="form-control" name="start_date" id="end_date"
                placeholder="Enter title" value="{{old('start_date')}}">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">kết thúc :</label>
                <input type="datetime-local" class="form-control" name="end_date" id="end_date"
                placeholder="Enter title" value="{{old('end_date')}}">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
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
