@extends('admin.layouts.master')
@section('title')
    Banner
@endsection
@section('content')
    <h1 class=" bg-success fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        Thêm hình ảnh</h1>

    <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Tiêu đề ngắn:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập tiêu đề ngắn" name="meta_title"
                    value="{{ old('meta_title') }}">
            </div>
                @error('meta_title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Tiêu đề:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập tiêu đề " name="title"
                    value="{{ old('title') }}">
            </div>
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror


                <div class="mb-3 mt-3">
                    <label for="" class="form-label">Mô tả:</label>
                    <textarea type="text" class="form-control" name="description">
                    </textarea>
                </div>
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="mb-3 mt-3">
                    <label for="" class="form-label">Đường dẫn tới:</label>
                    <input type="text" class="form-control" name="link"
                        value="{{ old('link') }}">
                </div>
                @error('link')
                <span class="text-danger">{{$message}}</span>
                @enderror
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Trạng thái:</label>

                <select name="is_active" id="">
                    <option value="1">Kích hoạt</option>
                    <option value="2">Chưa kích hoạt</option>
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs" style="color: #ff6666;"></i> Image:</label>
                <input type="file" class="form-control" name="image" accept="image/*" id="image-input"
                    placeholder="Enter title" value="{{ old('image') }}">
            </div>
                @error('image')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            <div class="mb-3 mt-3" style="text-align:center;">
                <img src="" style="width: 120px;min-height:120px;border-radius:100% ;     object-fit: cover;"
                    id="show-image" alt="">
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
