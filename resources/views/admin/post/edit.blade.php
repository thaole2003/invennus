@extends('admin.layouts.master')
@section('title')
    Post
@endsection
@section('content')
    <h1 class=" d-flex justify-content-center align-items-center" style="height: 80px">
        Sửa bài viết</h1>

    <form action="{{ route('admin.post.update', $data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Image:</label>
                <input type="file" class="form-control" name="newimage" accept="image/*" id="image-input"
                    placeholder="Nhập tiêu đề" value="{{ old('image') }}">
                <input type="text" class="form-control" name="currentimage" hidden value="{{ $data->image }}">
            </div>
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="mb-3 mt-3" style="text-align:center;">
                <img src={{ asset($data->image) }}
                    style="width: 120px;min-height:120px;border-radius:100% ;     object-fit: cover;" id="show-image"
                    alt="">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Nhập tên" name="title"
                    value="{{ $data->title }}">
            </div>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Description :</label>
                <input type="text" class="form-control" id="email" placeholder="Nhập mô tả" name="description"
                    value="{{ $data->description }}">
            </div>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                        style="color: #ff6666;"></i> Danh mục:</label><br>
                @if (count($category) > 0)
                    @foreach ($category as $value)
                        <input type="checkbox" {{ in_array($value->id, $datas) ? 'checked' : '' }} name="postCate[]"
                            value="{{ $value->id }}" id="">
                        {{ $value->name }} <br>
                    @endforeach

                @else
                    <span>Hãy thêm 1 cửa hàng!</span>
                @endif
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
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
