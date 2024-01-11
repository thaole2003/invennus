@extends('admin.layouts.master')
@section('title')
Feedback
@endsection
@section('content')
    <h1 class=" d-flex justify-content-center align-items-center" style="height: 80px">
        Thêm Feedback</h1>
    <form action="{{ route('admin.feedbacks.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <div class="mb-3 mt-3">
                    <div class="category-container">
                        <label for="email" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                                style="color: #ff6666;"></i> Sản phẩm</label><br>
                        @if (count($products) > 0)
                        <select name="product_id" id="">
                            @foreach ($products as $key => $product)
                            <option value="{{ $product->id }}">{{ $product->sku }}</option>
                            @endforeach
                        </select>
                        @else
                            <span>Hãy thêm 1 sản phẩm trước!</span>
                        @endif
                    </div>

                </div>
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Ảnh:</label>
                <input type="file" class="form-control" name="image" accept="image/*" id="image-input"
                       placeholder="Nhập tiêu đề" value="{{ old('image') }}">
            </div>
            @error('image')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mb-3 mt-3" style="text-align:center;">
                <img src="" style="width: 120px;min-height:120px;border-radius:100% ;     object-fit: cover;"
                     id="show-image" alt="">
            </div>

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
