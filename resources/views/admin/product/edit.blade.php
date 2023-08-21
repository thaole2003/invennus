@extends('admin.layouts.master')
@section('content')
    <h1 class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        Sửa sản phẩm</h1>
    <div class="d-flex">
        <form class="col-md-10" action="{{ route('admin.product.update', $data->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row mx-2">
                <div class="col-md-8">

                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Mã sản phẩm:</label>
                        <input type="text" class="form-control" id="" placeholder="SKU" name="sku"
                            value="{{ $data->sku }}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Tên:</label>
                        <input type="text" class="form-control" id="" placeholder="Title" name="title"
                            value="{{ $data->title }}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Tên ngắn:</label>
                        <input type="text" class="form-control" id="" placeholder="Meta title" name="metatitle"
                            value="{{ $data->metatitle }}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Giá chung:</label>
                        <input type="text" class="form-control" id="email" placeholder="Meta title" name="price"
                            value="{{ $data->price }}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Slug:</label>
                        <input type="text" class="form-control" id="email" placeholder=" Slug" name="slug"
                            value="{{ $data->slug }}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Độ dài:</label>
                        <input type="text" class="form-control" id="email" placeholder="Đơn vị cm" name="length"
                            value="{{ $data->length }}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Độ rộng:</label>
                        <input type="text" class="form-control" id="" placeholder="Đơn vị cm" name="width"
                            value="{{ $data->width }}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Nặng:</label>
                        <input type="text" class="form-control" id="" placeholder="Đơn vị kg" name="weight"
                            value="{{ $data->weight }}">
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Description :</label>
                        <textarea type="text" class="form-control" id="email" placeholder="Enter description" name="description"> {{ $data->description }}</textarea>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Ảnh chính:</label>
                        <input type="file" class="form-control" name="newimage" accept="image/*" id="image-input"
                            placeholder="Enter title" value="{{ old('image') }}">
                        <input type="text" name="currentimage" hidden value="{{ $data->image }}">
                    </div>
                    <div class="mb-3 mt-3" style="text-align:center;">
                        <img src="{{ asset($data->image) }}"
                            style="width: 120px;min-height:120px;border-radius:100% ;     object-fit: cover;"
                            id="show-image" alt="">
                    </div>
                    <div>

                    </div>
                    <div class="d-flex">
                        <label class="col-md-4" for="">Ảnh sản phẩm : </label><input type="file"
                            class="form-control" name="images[]" placeholder="Enter title" value="{{ old('images') }}"
                            multiple>
                    </div>





                </div>

            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>




        <div>
            <h2>ảnh sản phẩm</h2>
            <div class="d-flex col-md-2">
                @if ($data->images->count() > 0)
                    @foreach ($data->images as $key => $value)
                        <div class="">
                            <form id="{{ $key + 10 }}" action="{{ route('admin.image.destroy', $value->id) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <div class="mb-3 mt-3" style="text-align:center;">
                                    <img src="{{ asset($value->image) }}"
                                        style="width: 120px;min-height:120px;max-height:120px; border-radius:100% ; object-fit: cover;"
                                        alt="">
                                </div>
                                <button onclick="return confirm('chắc chắn xóa ảnh này?')">Xóa</button>
                            </form>
                        </div>
                    @endforeach
                @else
                    <p>Không có hình ảnh nào.</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function addColorField() {
            var container = document.querySelector('.color-container');

            var colorDiv = document.createElement('div');
            colorDiv.innerHTML = `
            <input type="text" name="color[]" placeholder="Màu">
            <button class="delete-button" onclick="deleteColorField(this)">Xóa</button>
        `;

            container.appendChild(colorDiv);
        }

        function deleteColorField(button) {
            var container = document.querySelector('.color-container');
            var colorDiv = button.parentElement;

            container.removeChild(colorDiv);
        }
    </script>
    <script>
        function addSizeField() {
            var container = document.querySelector('.size-container');

            var sizeDiv = document.createElement('div');
            sizeDiv.innerHTML = `
            <input type="text" name="size[]" placeholder="Kích thước">
            <button class="delete-button" onclick="deleteSizeField(this)">Xóa</button>
        `;

            container.appendChild(sizeDiv);
        }

        function deleteSizeField(button) {
            var container = document.querySelector('.size-container');
            var sizeDiv = button.parentElement;

            container.removeChild(sizeDiv);
        }
    </script>
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
