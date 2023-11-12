@extends('admin.layouts.master')
@section('title')
    Category
@endsection
@section('content')
    <h1 class=" d-flex justify-content-center align-items-center" style="height: 80px">
        Thêm danh mục</h1>

    <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Image:</label>
                <input type="file" class="form-control" name="image" accept="image/*" id="image-input"
                    placeholder="Nhập tiêu đề" value="{{ old('image') }}">
            </div>
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="mb-3 mt-3" style="text-align:center;">
                <img src="" style="width: 120px;min-height:120px;border-radius:100% ;     object-fit: cover;"
                    id="show-image" alt="">
            </div>

            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Name:</label>
                <input type="text" class="form-control" id="email" placeholder="Nhập tiêu đề" name="title"
                    value="{{ old('title') }}">
            </div>
            @error('slug')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="content" class="form-label">Description :</label>
                <textarea id="description" name="description" class="form-control">{{ old('content') }}</textarea>
            </div>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="mb-3 mt-3">
                <label for="" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                        style="color: #ff6666;"></i> Danh mục:</label><br>
                @if (count($postCate) > 0)
                    @foreach ($postCate as $key => $value)
                        <input type="checkbox" name="postCate[]" value="{{ $value->id }}" id="">
                        {{ $value->name }} <br>
                    @endforeach
                @else
                    <span>Hãy thêm 1 cửa hàng!</span>
                @endif
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
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}
    <script>
        CKEDITOR.replace('description', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
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
