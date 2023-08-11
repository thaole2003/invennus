@extends('admin.layouts.master')
@section('content')
    <h1 class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        Thêm sản phẩm</h1>

    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="row mx-2">
            <div class="col-md-8">

                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Mã sản phẩm:</label>
                    <input type="text" class="form-control" id="" placeholder="SKU" name="sku"
                        value="{{ old('sku') }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Tên:</label>
                    <input type="text" class="form-control" id="" placeholder="Title" name="title" value="{{ old('title') }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Tên ngắn:</label>
                    <input type="text" class="form-control" id="" placeholder="Meta title" name="metatitle"
                        value="{{ old('metatitle') }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Giá chung:</label>
                    <input type="text" class="form-control" id="email" placeholder="Meta title" name="price"
                        value="{{ old('price') }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Slug:</label>
                    <input type="text" class="form-control" id="email" placeholder=" Slug" name="slug"
                        value="{{ old('slug') }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Độ dài:</label>
                    <input type="text" class="form-control" id="email" placeholder="Đơn vị cm" name="length"
                        value="{{ old('length') }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Độ rộng:</label>
                    <input type="text" class="form-control" id="" placeholder="Đơn vị cm" name="width"
                        value="{{ old('width') }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Nặng:</label>
                    <input type="text" class="form-control" id="" placeholder="Đơn vị kg" name="weight"
                        value="{{ old('weight') }}">
                </div>

            </div>
            <div class="col-md-4">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Description :</label>
                    <textarea type="text" class="form-control" id="email" placeholder="Enter description"
                        name="description" value="{{ old('description') }}"></textarea>
                </div>
                <div class="d-flex">
                    <div class="mb-3 mt-3">
                        <div class="size-container">
                            <label for="email" class="form-label">Kích cỡ :</label><br>
                            <input type="text" name="size[]" placeholder="Kích thước"><br>
                        </div>

                        <label onclick="addSizeField()">Thêm Kích thước</label>
                    </div>
                    <div class="mb-3 mt-3">
                        <div class="color-container">
                            <label for="email" class="form-label">Màu :</label><br>
                            <input type="text" name="color[]" placeholder="Màu sắc">
                        </div>
                        <label onclick="addColorField()">Thêm Màu</label>

                    </div>
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Cửa hàng có:</label><br>
                    @if(count($store)>0)
                    @foreach ($store as $key =>$value )
                    <input type="checkbox" name="store_id[]" value="{{ $value->id }}" id=""> {{ $value->name }} <br>

                    @endforeach
                    @else
                    <span>let add category!</span>
                    @endif
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Ảnh sản phẩm ( thêm nhiều ảnh):</label>
                    <input type="file" class="form-control" name="images[]"
                        placeholder="Enter title" value="{{ old('images') }}" multiple>
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Ảnh chinh:</label>
                    <input type="file" class="form-control" name="image" accept="image/*" id="image-input"
                        placeholder="Enter title" value="{{ old('image') }}">
                </div>
                <div class="mb-3 mt-3" style="text-align:center;">
                    <img src="" style="width: 120px;min-height:120px;border-radius:100% ;     object-fit: cover;"
                        id="show-image" alt="">
                </div>

            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        {{-- <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">


        </div> --}}
    </form>
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
